<?php
require_once __DIR__ . '/../config/config.php';

// --- DATABASE & DATA LOGIC ---
include 'db.php'; // Expects $pdo instance of PDO

// Helper function: Parse Country from Mobile Number (E.164 Prefix Mapping)
function getCountryFromMobile($mobile) {
    if (empty($mobile)) return 'Unknown';
    $cleanMobile = preg_replace('/[^0-9]/', '',$mobile);

    // Common phone prefixes (Longer prefixes first to prevent false matches)
    $prefixes = [
        '358' => ['name' => 'Finland', 'code' => 'fi'],
        '971' => ['name' => 'UAE', 'code' => 'ae'],
        '94'  => ['name' => 'Sri Lanka', 'code' => 'lk'],
        '44'  => ['name' => 'United Kingdom', 'code' => 'gb'],
        '61'  => ['name' => 'Australia', 'code' => 'au'],
        '49'  => ['name' => 'Germany', 'code' => 'de'],
        '33'  => ['name' => 'France', 'code' => 'fr'],
        '31'  => ['name' => 'Netherlands', 'code' => 'nl'],
        '91'  => ['name' => 'India', 'code' => 'in'],
        '65'  => ['name' => 'Singapore', 'code' => 'sg'],
        '1'   => ['name' => 'USA / Canada', 'code' => 'us'],
        '27'  => ['name' => 'South Africa', 'code' => 'za'],
    ];

    foreach ($prefixes as $prefix =>$info) {
        if (strpos($cleanMobile,$prefix) === 0) {
            return $info['name'];
        }
    }
    return 'Other / Unmapped';
}

$currentYear = (int)date('Y');
$yearlyData  = [];$yearsFound  = [];

try {
    // Fetch all booking records with valid start dates
    $sql = "SELECT id, order_number, guest_name, guest_mobile, tour_charge, tour_start_date, status, total_vehicle_cost 
            FROM bookings 
            WHERE tour_start_date IS NOT NULL AND tour_start_date != '0000-00-00'";
    $stmt = $pdo->query($sql);
    $rows =$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as$row) {
        $tourCharge  = floatval($row['tour_charge'] ?? 0);
        $vehicleCost = floatval($row['total_vehicle_cost'] ?? 0);

        if ($tourCharge == 0) {
            continue;
        }

        $amount  = $tourCharge -$vehicleCost;
        $mobile  =$row['guest_mobile'];
        $country = getCountryFromMobile($mobile);

        $timestamp = strtotime($row['tour_start_date']);
        $year      = (int)date('Y',$timestamp);
        $month     = (int)date('n',$timestamp);

        $yearsFound[$year] = true;

        // Structure yearly aggregated container
        if (!isset($yearlyData[$year])) {
            $yearlyData[$year] = [
                'totalRevenue'   => 0,
                'totalBookings'  => 0,
                'overallMonthly' => array_fill(1, 12, 0),
                'countryTotals'  => [],
                'countryMonthly' => []
            ];
        }

        // Increment Year Totals
        $yearlyData[$year]['totalRevenue']  +=$amount;
        $yearlyData[$year]['totalBookings'] += 1;
        $yearlyData[$year]['overallMonthly'][$month] +=$amount;

        // Aggregate Country Totals
        if (!isset($yearlyData[$year]['countryTotals'][$country])) {$yearlyData[$year]['countryTotals'][$country] = ['revenue' => 0, 'count' => 0];
        }
        $yearlyData[$year]['countryTotals'][$country]['revenue'] +=$amount;
        $yearlyData[$year]['countryTotals'][$country]['count']   += 1;

        // Aggregate Country Monthly Breakdown
        if (!isset($yearlyData[$year]['countryMonthly'][$country])) {
            $yearlyData[$year]['countryMonthly'][$country] = array_fill(1, 12, 0);         }$yearlyData[$year]['countryMonthly'][$country][$month] +=$amount;
    }

} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
}

// Ensure the current year exists in the list of selectable years
$yearsFound[$currentYear] = true;
$availableYears = array_keys($yearsFound);
rsort($availableYears);

// Ensure every available year has a default structure
foreach ($availableYears as$yr) {
    if (!isset($yearlyData[$yr])) {
        $yearlyData[$yr] = [
            'totalRevenue'   => 0,
            'totalBookings'  => 0,
            'overallMonthly' => array_fill(1, 12, 0),
            'countryTotals'  => [],
            'countryMonthly' => []
        ];
    } else {
        // Sort country totals descending by revenue
        uasort($yearlyData[$yr]['countryTotals'], function($a,$b) {
            return $b['revenue'] <=>$a['revenue'];
        });
    }
}

// Convert all yearly dataset logic to JSON for client-side JavaScript rendering
$yearlyDataJson = json_encode($yearlyData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Executive Analytics & Business Intelligence - Tour Inventory</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Chart.js for Visualizations -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #f1f5f9; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
  </style>
</head>
<body class="bg-slate-100 font-sans text-slate-800 flex h-screen overflow-hidden">

  <!-- MOBILE OVERLAY BACKDROP -->
  <div id="sidebarBackdrop" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden transition-opacity"></div>

  <!-- SIDEBAR NAVIGATION -->
  <aside id="sidebar" class="fixed md:relative inset-y-0 left-0 -translate-x-full md:translate-x-0 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between transition-transform duration-300 ease-in-out flex-shrink-0 z-40">
    <div>
      <div class="h-16 flex items-center justify-between px-6 bg-slate-950 border-b border-slate-800">
        <div class="flex items-center gap-3">
          <div class="bg-indigo-600 text-white p-2 rounded-lg shrink-0">
            <i class="fa-solid fa-compass text-xl"></i>
          </div>
          <div class="sidebar-text">
            <h1 class="text-base font-bold text-white leading-tight">Tour Inventory</h1>
            <p class="text-xs text-slate-400">Enterprise BI Admin</p>
          </div>
        </div>
        <!-- Mobile Close Button -->
        <button id="closeSidebarBtn" class="md:hidden text-slate-400 hover:text-white">
          <i class="fa-solid fa-xmark text-xl"></i>
        </button>
      </div>

      <nav class="p-4 space-y-1 overflow-y-auto max-h-[calc(100vh-120px)]">
        <div class="px-3 py-2 text-[11px] font-semibold text-slate-500 uppercase tracking-wider sidebar-text">Core Operations</div>

        <a href="<?= BASE_URL ?>admin/calculator" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-calculator text-lg w-5"></i>
          <span class="sidebar-text">Calculator</span>
        </a>
        
        <a href="<?= BASE_URL ?>admin/" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-list-check text-lg w-5"></i>
          <span class="sidebar-text">Bookings List</span>
        </a>

        <a href="<?= BASE_URL ?>admin/calendar" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-regular fa-calendar-days text-lg w-5"></i>
          <span class="sidebar-text">Tour Calendar</span>
        </a>

        <a href="<?= BASE_URL ?>admin/dashboard" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg bg-indigo-600 text-white transition">
          <i class="fa-solid fa-chart-line text-lg w-5"></i>
          <span class="sidebar-text">Analytics & Reports</span>
        </a>

        <div class="px-3 py-2 mt-4 text-[11px] font-semibold text-slate-500 uppercase tracking-wider sidebar-text">Management</div>

        <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-car-side text-lg w-5"></i>
          <span class="sidebar-text">Fleet & Drivers</span>
        </a>

        <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-file-invoice-dollar text-lg w-5"></i>
          <span class="sidebar-text">Invoices & Logs</span>
        </a>
      </nav>
    </div>

    <!-- Desktop Collapse Button -->
    <div class="p-3 border-t border-slate-800 hidden md:block">
      <button id="toggleSidebarBtn" class="w-full flex items-center justify-center gap-2 py-2 text-xs font-semibold text-slate-400 bg-slate-800 hover:bg-slate-700 hover:text-white rounded-lg transition">
        <i class="fa-solid fa-angles-left text-sm" id="collapseIcon"></i>
        <span class="sidebar-text">Collapse Menu</span>
      </button>
    </div>
  </aside>

  <!-- MAIN CONTENT CONTAINER -->
  <div class="flex-1 flex flex-col h-full overflow-y-auto w-full">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-20 shadow-sm">
      <div class="px-4 sm:px-6 h-16 flex items-center justify-between gap-2">
        <div class="flex items-center gap-3">
          <!-- Mobile Drawer Toggle Button -->
          <button id="mobileSidebarToggle" class="md:hidden p-2 text-slate-600 hover:text-slate-900 rounded-lg focus:bg-slate-100">
            <i class="fa-solid fa-bars text-xl"></i>
          </button>
          <div>
            <h2 class="text-sm sm:text-base font-bold text-slate-800 leading-tight">Country Intelligence & Analytics</h2>
            <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">Real-time business insights derived from guest contact records</p>
          </div>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
          <button class="px-2.5 sm:px-3.5 py-1.5 text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition border border-slate-200 flex items-center gap-1.5">
            <i class="fa-solid fa-download"></i> <span class="hidden sm:inline">Export PDF</span>
          </button>
          <div class="h-6 w-px bg-slate-200"></div>
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 font-semibold flex items-center justify-center text-xs border border-indigo-200 shrink-0">CTL</div>
            <span class="text-xs font-medium text-slate-700 hidden lg:inline">Ceylon T. Admin</span>
          </div>
        </div>
      </div>
    </header>

    <main class="p-4 sm:p-6 space-y-6 max-w-7xl w-full mx-auto">

      <!-- Executive KPI Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Total Revenue (<span class="selected-year-label"><?php echo $currentYear; ?></span>)</p>
              <h3 id="kpiTotalRevenue" class="text-xl sm:text-2xl font-black text-slate-900 mt-1">LKR 0.00</h3>
            </div>
            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg shrink-0"><i class="fa-solid fa-sack-dollar text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-emerald-600 font-medium mt-3 flex items-center gap-1"><i class="fa-solid fa-arrow-trend-up"></i> Dynamic calculation</p>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Total Bookings</p>
              <h3 id="kpiTotalBookings" class="text-xl sm:text-2xl font-black text-slate-900 mt-1">0</h3>
            </div>
            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-lg shrink-0"><i class="fa-solid fa-plane-departure text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-slate-500 font-medium mt-3">Recorded tours for <span class="selected-year-label"><?php echo $currentYear; ?></span></p>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Top Country Market</p>
              <h3 id="kpiTopCountry" class="text-xl sm:text-2xl font-black text-slate-900 mt-1">N/A</h3>
            </div>
            <div class="p-2.5 bg-sky-50 text-sky-600 rounded-lg shrink-0"><i class="fa-solid fa-earth-americas text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-sky-600 font-medium mt-3">Highest overall revenue source</p>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Avg. Booking Value</p>
              <h3 id="kpiAvgBooking" class="text-xl sm:text-2xl font-black text-slate-900 mt-1">LKR 0.00</h3>
            </div>
            <div class="p-2.5 bg-purple-50 text-purple-600 rounded-lg shrink-0"><i class="fa-solid fa-chart-pie text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-slate-500 font-medium mt-3">Per tour average</p>
        </div>
      </div>

      <!-- Charts Section -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
        
        <!-- Monthly Growth Chart (Overall vs. Country Switcher) -->
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">
            <h3 class="text-xs sm:text-sm font-bold text-slate-800 flex items-center gap-2">
              <i class="fa-solid fa-chart-area text-indigo-600"></i> Monthly Business Growth
            </h3>
            <div class="flex items-center gap-2">
              <select id="growthViewSelect" class="text-xs border border-slate-300 rounded-lg px-2.5 py-1 bg-white font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="overall">Overall Revenue</option>
                <optgroup id="growthViewCountryOptions" label="By Country"></optgroup>
              </select>

              <!-- Year Filter Select Dropdown -->
              <select id="yearSelect" class="text-xs border border-slate-300 rounded-lg px-2.5 py-1 bg-slate-100 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <?php foreach ($availableYears as$yr): ?>
                  <option value="<?php echo $yr; ?>" <?php echo ($yr ===$currentYear) ? 'selected' : ''; ?>>
                    <?php echo $yr; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="h-56 sm:h-64">
            <canvas id="monthlyChart"></canvas>
          </div>
        </div>

        <!-- Revenue by Country Source Bar Chart -->
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-xs sm:text-sm font-bold text-slate-800 flex items-center gap-2">
              <i class="fa-solid fa-flag text-indigo-600"></i> Revenue by Country Source
            </h3>
            <span class="text-[11px] sm:text-xs bg-slate-100 text-slate-600 font-medium px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-md">Mobile Dial Code</span>
          </div>
          <div class="h-56 sm:h-64">
            <canvas id="countryChart"></canvas>
          </div>
        </div>

      </div>

      <!-- Country Breakdown Table -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
          <h3 class="text-xs sm:text-sm font-bold text-slate-800 flex items-center gap-2">
            <i class="fa-solid fa-globe text-indigo-600"></i> Country Market Share Breakdown
          </h3>
          <span class="text-[11px] text-slate-500 hidden sm:inline">Auto-derived from guest contact details</span>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs sm:text-sm text-slate-600 min-w-[500px]">
            <thead class="bg-slate-100 text-[11px] sm:text-xs font-semibold uppercase text-slate-500 border-b border-slate-200">
              <tr>
                <th class="px-4 sm:px-6 py-3">Country</th>
                <th class="px-4 sm:px-6 py-3">Bookings</th>
                <th class="px-4 sm:px-6 py-3">Revenue (LKR)</th>
                <th class="px-4 sm:px-6 py-3">Revenue Share</th>
              </tr>
            </thead>
            <tbody id="countryTableBody" class="divide-y divide-slate-200"></tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  <script>
    $(document).ready(function() {
      
      // Mobile Drawer Toggle Handler
      function openMobileSidebar() {
        $('#sidebar').removeClass('-translate-x-full');
        $('#sidebarBackdrop').removeClass('hidden');
      }

      function closeMobileSidebar() {
        $('#sidebar').addClass('-translate-x-full');
        $('#sidebarBackdrop').addClass('hidden');
      }

      $('#mobileSidebarToggle').on('click', openMobileSidebar);
      $('#closeSidebarBtn, #sidebarBackdrop').on('click', closeMobileSidebar);

      // Desktop Collapse Handler
      $('#toggleSidebarBtn').on('click', function() {
        const sidebar = $('#sidebar');
        sidebar.toggleClass('w-64 w-20');
        $('.sidebar-text').toggleClass('hidden');$('#collapseIcon').toggleClass('fa-angles-left fa-angles-right');
      });

      // Datasets payload dynamically grouped by Year
      const yearlyData = <?php echo $yearlyDataJson; ?>;
      const months     = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

      // Initialize Chart Instances
      const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
      const monthlyChart = new Chart(ctxMonthly, {
        type: 'line',
        data: {
          labels: months,
          datasets: [{
            label: 'Revenue (LKR)',
            data: [],
            borderColor: '#4f46e5',
            backgroundColor: 'rgba(79, 70, 229, 0.1)',
            fill: true,
            tension: 0.3,
            borderWidth: 2,
            pointBackgroundColor: '#4f46e5'
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
            x: { grid: { display: false } }
          }
        }
      });

      const ctxCountry = document.getElementById('countryChart').getContext('2d');
      const countryChart = new Chart(ctxCountry, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: 'Revenue by Country',
            data: [],
            backgroundColor: '#0284c7',
            borderRadius: 6
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            y: { beginAtZero: true, grid: { color: '#f1f5f9' } },
            x: { grid: { display: false } }
          }
        }
      });

      // Master function to render full analytics dynamically without changing URL
      function renderDashboard(year) {
        const data = yearlyData[year] || {
          totalRevenue: 0,
          totalBookings: 0,
          overallMonthly: Array(12).fill(0),
          countryTotals: {},
          countryMonthly: {}
        };

        // Update Dynamic UI Labels
        $('.selected-year-label').text(year);

        // 1. KPI Cards
        const totalRev = data.totalRevenue;
        const totalBks = data.totalBookings;
        const avgBkg  = totalBks > 0 ? (totalRev / totalBks) : 0;
        const topCtry = Object.keys(data.countryTotals).length > 0 ? Object.keys(data.countryTotals)[0] : 'N/A';

        $('#kpiTotalRevenue').text('LKR ' + totalRev.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#kpiTotalBookings').text(totalBks);
        $('#kpiTopCountry').text(topCtry);
        $('#kpiAvgBooking').text('LKR ' + avgBkg.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

        // 2. Growth View Select Options (Country Dropdown)
        const $countryOptGroup =$('#growthViewCountryOptions');
        $countryOptGroup.empty();
        
        const countries = Object.keys(data.countryMonthly);
        countries.forEach(country => {
          $countryOptGroup.append(`<option value="${country}">${country}</option>`);
        });

        // Reset Growth Select view to "overall"
        $('#growthViewSelect').val('overall');

        // 3. Update Monthly Chart
        const overallValues = Object.values(data.overallMonthly);
        monthlyChart.data.datasets[0].data = overallValues;
        monthlyChart.data.datasets[0].borderColor = '#4f46e5';
        monthlyChart.data.datasets[0].backgroundColor = 'rgba(79, 70, 229, 0.1)';
        monthlyChart.update();

        // 4. Update Country Chart
        const countryLabels = Object.keys(data.countryTotals);
        const countryRevenues = countryLabels.map(c => data.countryTotals[c].revenue);

        countryChart.data.labels = countryLabels;
        countryChart.data.datasets[0].data = countryRevenues;
        countryChart.update();

        // 5. Update Breakdown Table
        const $tableBody =$('#countryTableBody');
        $tableBody.empty();

        if (countryLabels.length > 0) {
          countryLabels.forEach(country => {
            const cData = data.countryTotals[country];
            const pct = totalRev > 0 ? ((cData.revenue / totalRev) * 100).toFixed(1) : 0;
            const revFormatted = cData.revenue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            $tableBody.append(`
              <tr class="hover:bg-slate-50 transition">
                <td class="px-4 sm:px-6 py-3.5 font-semibold text-slate-800 flex items-center gap-2 whitespace-nowrap">
                  <i class="fa-solid fa-location-dot text-indigo-500"></i> ${country}
                </td>
                <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap">${cData.count} Tours</td>
                <td class="px-4 sm:px-6 py-3.5 font-bold text-slate-900 whitespace-nowrap">LKR ${revFormatted}</td>
                <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap">
                  <div class="flex items-center gap-3">
                    <div class="w-20 sm:w-32 bg-slate-100 rounded-full h-2 overflow-hidden">
                      <div class="bg-indigo-600 h-2 rounded-full" style="width: ${pct}%"></div>
                    </div>
                    <span class="text-xs font-semibold text-slate-600">${pct}%</span>
                  </div>
                </td>
              </tr>
            `);
          });
        } else {
          $tableBody.append(`
            <tr>
              <td colspan="4" class="px-6 py-4 text-center text-slate-400">No booking records found for ${year}.</td>
            </tr>
          `);
        }
      }

      // Handle Year Selection Event
      $('#yearSelect').on('change', function() {
        const selectedYear = parseInt($(this).val());
        renderDashboard(selectedYear);
      });

      // Handle View Switcher Event (Overall vs Country-Wise for Selected Year)
      $('#growthViewSelect').on('change', function() {
        const selectedYear = parseInt($('#yearSelect').val());
        const selectedView = $(this).val();
        const yearObj = yearlyData[selectedYear];

        if (!yearObj) return;

        if (selectedView === 'overall') {
          monthlyChart.data.datasets[0].data = Object.values(yearObj.overallMonthly);
          monthlyChart.data.datasets[0].borderColor = '#4f46e5';
          monthlyChart.data.datasets[0].backgroundColor = 'rgba(79, 70, 229, 0.1)';
        } else if (yearObj.countryMonthly[selectedView]) {
          monthlyChart.data.datasets[0].data = Object.values(yearObj.countryMonthly[selectedView]);
          monthlyChart.data.datasets[0].borderColor = '#0284c7';
          monthlyChart.data.datasets[0].backgroundColor = 'rgba(2, 132, 199, 0.1)';
        }

        monthlyChart.update();
      });

      // Initial page setup rendering default current year
      renderDashboard(<?php echo $currentYear; ?>);

    });
  </script>
</body>
</html>