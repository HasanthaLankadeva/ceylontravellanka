<?php
require_once __DIR__ . '/../config/config.php';

// --- DATABASE & DATA LOGIC ---
include 'db.php';

// Helper function: Parse Country from Mobile Number (E.164 Prefix Mapping)
function getCountryFromMobile($mobile) {
    if (empty($mobile)) return 'Unknown';
    $cleanMobile = preg_replace('/[^0-9]/', '', $mobile);

    // Common phone prefixes
    $prefixes = [
        '94'  => ['name' => 'Sri Lanka', 'code' => 'lk'],
        '44'  => ['name' => 'United Kingdom', 'code' => 'gb'],
        '1'   => ['name' => 'USA / Canada', 'code' => 'us'],
        '61'  => ['name' => 'Australia', 'code' => 'au'],
        '49'  => ['name' => 'Germany', 'code' => 'de'],
        '33'  => ['name' => 'France', 'code' => 'fr'],
        '358' => ['name' => 'Finland', 'code' => 'fi'],
        '91'  => ['name' => 'India', 'code' => 'in'],
        '971' => ['name' => 'UAE', 'code' => 'ae'],
        '65'  => ['name' => 'Singapore', 'code' => 'sg'],
    ];

    foreach ($prefixes as $prefix => $info) {
        if (strpos($cleanMobile, $prefix) === 0) {
            return $info['name'];
        }
    }
    return 'Other / Unmapped';
}

// Fetch All Tours using Database Schema Fields
$sql = "SELECT id, order_number, guest_name, guest_mobile, tour_charge, tour_start_date, status FROM bookings";
$result = $conn->query($sql);

$countryTotals = [];
$overallMonthly = array_fill(1, 12, 0); // Jan to Dec overall
$countryMonthly = [];                   // Jan to Dec breakdown per country
$totalRevenue = 0;
$totalBookings = 0;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $amount  = floatval($row['tour_charge']);
        $mobile  = $row['guest_mobile'];
        $country = getCountryFromMobile($mobile);

        // Aggregate Country Revenue & Booking Count
        if (!isset($countryTotals[$country])) {
            $countryTotals[$country] = ['revenue' => 0, 'count' => 0];
        }
        $countryTotals[$country]['revenue'] += $amount;
        $countryTotals[$country]['count'] += 1;

        // Aggregate Monthly Revenue
        if (!empty($row['tour_start_date'])) {
            $month = intval(date('n', strtotime($row['tour_start_date'])));
            
            // Overall Monthly Total
            $overallMonthly[$month] += $amount;

            // Country-wise Monthly Total
            if (!isset($countryMonthly[$country])) {
                $countryMonthly[$country] = array_fill(1, 12, 0);
            }
            $countryMonthly[$country][$month] += $amount;
        }

        $totalRevenue += $amount;
        $totalBookings++;
    }
}

// Sort Countries by Overall Revenue (Descending)
uasort($countryTotals, function($a, $b) {
    return $b['revenue'] <=> $a['revenue'];
});

// Convert arrays to JSON for Chart.js rendering
$countryLabelsJson  = json_encode(array_keys($countryTotals));
$countryDataJson    = json_encode(array_column($countryTotals, 'revenue'));
$overallMonthlyJson = json_encode(array_values($overallMonthly));
$countryMonthlyJson = json_encode($countryMonthly);
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
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Total Revenue</p>
              <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">LKR <?php echo number_format($totalRevenue, 2); ?></h3>
            </div>
            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg shrink-0"><i class="fa-solid fa-sack-dollar text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-emerald-600 font-medium mt-3 flex items-center gap-1"><i class="fa-solid fa-arrow-trend-up"></i> Dynamic calculation</p>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Total Bookings</p>
              <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1"><?php echo $totalBookings; ?></h3>
            </div>
            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-lg shrink-0"><i class="fa-solid fa-plane-departure text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-slate-500 font-medium mt-3">All recorded tours</p>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Top Country Market</p>
              <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">
                <?php echo !empty($countryTotals) ? array_key_first($countryTotals) : 'N/A'; ?>
              </h3>
            </div>
            <div class="p-2.5 bg-sky-50 text-sky-600 rounded-lg shrink-0"><i class="fa-solid fa-earth-americas text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-sky-600 font-medium mt-3">Highest overall revenue source</p>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Avg. Booking Value</p>
              <h3 class="text-xl sm:text-2xl font-black text-slate-900 mt-1">
                LKR <?php echo $totalBookings > 0 ? number_format($totalRevenue / $totalBookings, 2) : '0.00'; ?>
              </h3>
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
                <optgroup label="By Country">
                  <?php foreach (array_keys($countryMonthly) as $cName): ?>
                    <option value="<?php echo htmlspecialchars($cName); ?>"><?php echo htmlspecialchars($cName); ?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>
              <span class="text-[11px] sm:text-xs bg-slate-100 text-slate-600 font-medium px-2 py-1 rounded-md"><?php echo date('Y'); ?></span>
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
            <tbody class="divide-y divide-slate-200">
              <?php if (!empty($countryTotals)): ?>
                <?php foreach ($countryTotals as $country => $cData): 
                  $percentage = $totalRevenue > 0 ? round(($cData['revenue'] / $totalRevenue) * 100, 1) : 0;
                ?>
                  <tr class="hover:bg-slate-50 transition">
                    <td class="px-4 sm:px-6 py-3.5 font-semibold text-slate-800 flex items-center gap-2 whitespace-nowrap">
                      <i class="fa-solid fa-location-dot text-indigo-500"></i>
                      <?php echo htmlspecialchars($country); ?>
                    </td>
                    <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap"><?php echo $cData['count']; ?> Tours</td>
                    <td class="px-4 sm:px-6 py-3.5 font-bold text-slate-900 whitespace-nowrap">LKR <?php echo number_format($cData['revenue'], 2); ?></td>
                    <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap">
                      <div class="flex items-center gap-3">
                        <div class="w-20 sm:w-32 bg-slate-100 rounded-full h-2 overflow-hidden">
                          <div class="bg-indigo-600 h-2 rounded-full" style="width: <?php echo $percentage; ?>%"></div>
                        </div>
                        <span class="text-xs font-semibold text-slate-600"><?php echo $percentage; ?>%</span>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="px-6 py-4 text-center text-slate-400">No booking records found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
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
        $('.sidebar-text').toggleClass('hidden');
        $('#collapseIcon').toggleClass('fa-angles-left fa-angles-right');
      });

      // Data mappings from PHP
      const countryLabels   = <?php echo $countryLabelsJson; ?>;
      const countryData     = <?php echo $countryDataJson; ?>;
      const overallData     = <?php echo $overallMonthlyJson; ?>;
      const countryDataMap  = <?php echo $countryMonthlyJson; ?>;
      const months          = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

      // Render Monthly Growth Line Chart
      const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
      const monthlyChart = new Chart(ctxMonthly, {
        type: 'line',
        data: {
          labels: months,
          datasets: [{
            label: 'Revenue (LKR)',
            data: overallData,
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

      // Toggle Monthly View (Overall vs Country-Wise)
      $('#growthViewSelect').on('change', function() {
        const selectedView = $(this).val();

        if (selectedView === 'overall') {
          monthlyChart.data.datasets[0].data = overallData;
          monthlyChart.data.datasets[0].borderColor = '#4f46e5';
          monthlyChart.data.datasets[0].backgroundColor = 'rgba(79, 70, 229, 0.1)';
        } else if (countryDataMap[selectedView]) {
          const cValues = Object.values(countryDataMap[selectedView]);
          monthlyChart.data.datasets[0].data = cValues;
          monthlyChart.data.datasets[0].borderColor = '#0284c7';
          monthlyChart.data.datasets[0].backgroundColor = 'rgba(2, 132, 199, 0.1)';
        }

        monthlyChart.update();
      });

      // Render Country Source Bar Chart
      const ctxCountry = document.getElementById('countryChart').getContext('2d');
      new Chart(ctxCountry, {
        type: 'bar',
        data: {
          labels: countryLabels,
          datasets: [{
            label: 'Revenue by Country',
            data: countryData,
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

    });
  </script>
</body>
</html>