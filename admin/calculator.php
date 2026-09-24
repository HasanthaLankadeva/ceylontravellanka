<?php
    require_once __DIR__ . '/../config/config.php';
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
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base Styles & Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Main Container Card */
        .calculator-card {
            max-width: 650px;
            width: 100%;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #1a252f;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Sections */
        .section {
            border-bottom: 1px solid #edf2f7;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Form Groups (Stacked on Mobile, Side-by-Side on Desktop) */
        .form-group {
            display: flex;
            flex-direction: column; /* Stacks label and input vertically for touch screens */
            margin-bottom: 12px;
        }

        .form-group label {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #4a5568;
        }

        /* Touch-Friendly Inputs & Select Dropdowns */
        .form-group input, 
        .form-group select,
        .quote-template-area {
            width: 100%;
            min-height: 44px; /* Touch target standard for mobile tap area */
            padding: 10px 12px;
            font-size: 16px; /* Prevents iOS auto-zoom on input focus */
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            background-color: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus, 
        .form-group select:focus,
        .quote-template-area:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.15);
        }

        input[readonly] {
            background-color: #f7fafc;
            color: #718096;
            border-color: #e2e8f0;
            cursor: not-allowed;
        }

        /* Quotation Display Box */
        .quotation-box {
            margin-top: 20px;
        }

        .quotation-box .left{
            margin-bottom: 18px;
        }
        
        .quotation-box .left,
        .quotation-box .right{
            background: #0f172a; /* Slate 900 */
            color: #f8fafc; /* Slate 50 */
            padding: 18px;
            border: 1px solid #1e293b; /* Slate 800 */
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.12), 0 4px 6px -4px rgba(15, 23, 42, 0.08);
        }

        .quotation-box h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #38bdf8; /* Sky Blue accent for section title */
            border-bottom: 1px solid #334155; /* Subtle divider */
            padding-bottom: 10px;
            margin-bottom: 14px;
        }

        /* Price Rows */
        .quotation-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95rem;
            color: #cbd5e1; /* Muted slate for labels */
            margin: 8px 0;
        }

        .quotation-row strong {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff; /* Crisp white for values */
        }

        /* Action Button */
        .btn-generate {
            background-color: #2563eb; /* Royal Blue */
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            margin-top: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-generate:hover {
            background-color: #1d4ed8;
        }

        .btn-generate:active {
            transform: scale(0.99);
        }

        /* Mobile-friendly Buttons */
        .btn-action {
            width: 100%;
            min-height: 48px; /* Larger tap area for thumbs */
            font-size: 1rem;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-action:active {
            transform: scale(0.98);
        }

        .btn-generate {
            background-color: #2563eb;
            color: #ffffff;
        }

        .btn-generate:hover {
            background-color: #0056b3;
        }

        .btn-copy {
            background-color: #ffc107;
            color: #1a252f;
            margin-top: 12px;
            display: none;
        }

        .btn-copy:hover {
            background-color: #e0a800;
        }

        .quote-template-area {
            height: 250px;
            margin-top: 15px;
            resize: vertical;
            font-family: inherit;
            line-height: 1.4;
            display: none;
        }

        /* Desktop & Larger Screens Optimization */
        @media (min-width: 576px) {

            .calculator-card {
                padding: 30px;
            }

            .form-group {
                flex-direction: row; /* Horizontal alignment on wide screens */
                align-items: center;
            }

            .form-group label {
                flex: 1;
                margin-bottom: 0;
            }

            .form-group input, 
            .form-group select {
                flex: 1.2;
            }
        }
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
        
        <a href="<?= BASE_URL ?>admin/calculator" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg bg-indigo-600 text-white transition">
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

        <a href="<?= BASE_URL ?>admin/dashboard" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
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
          <!-- Right: Actions & User -->
          <div class="flex items-center gap-2 sm:gap-4 shrink-0">
          <!-- Notification Bell -->
          <button class="relative p-2 text-slate-500 hover:text-slate-600 rounded-full hover:bg-slate-100 transition">
            <i class="fa-regular fa-bell text-lg"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-indigo-600 rounded-full"></span>
          </button>
          <div class="h-6 w-px bg-slate-200"></div>
          <!-- User Profile -->
            <div class="flex items-center gap-2 sm:gap-3">
                <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 font-semibold flex items-center justify-center text-sm border border-indigo-200 shrink-0">
                CTL
                </div>
                <div class="hidden sm:block text-left">
                <p class="text-sm font-medium text-slate-700 leading-tight">Ceylon T.</p>
                <p class="text-xs text-slate-500">Administrator</p>
                </div>
            </div>
        </div>
      </div>
    </header>

    <!-- Main Container -->
    <main class="p-4 sm:p-6 space-y-6 max-w-7xl w-full mx-auto">

        <div class="calculator-card">
            <!-- 1. Number of Days -->
            <div class="section">
                <div class="section-title">1. Number of Days</div>
                <div class="form-group">
                    <label>Start Date:</label>
                    <input type="date" id="startDate">
                </div>
                <div class="form-group">
                    <label>End Date:</label>
                    <input type="date" id="endDate">
                </div>
                <div class="form-group">
                    <label>Total Days:</label>
                    <input type="number" id="totalDays" value="0">
                </div>
            </div>

            <!-- 2. Vehicle Type -->
            <div class="section">
                <div class="section-title">2. Vehicle Type</div>
                <div class="form-group">
                    <label>Select Vehicle:</label>
                    <select id="vehicleType">
                        <option value="">-- Select Vehicle --</option>
                    </select>
                </div>
            </div>

            <!-- 3. Per Day Rate -->
            <div class="section">
                <div class="section-title">3. Per Day Rate</div>
                <div class="form-group">
                    <label>Maximum Mileage (km):</label>
                    <input type="number" id="maxMileage" value="0" readonly>
                </div>
                <div class="form-group">
                    <label>Daily Rate (LKR):</label>
                    <input type="number" id="dailyRate" value="0" readonly>
                </div>
                <div class="form-group">
                    <label>Total (LKR):</label>
                    <input type="number" id="totalDailyRate" value="0" readonly>
                </div>
            </div>

            <!-- 4. Per KM Rate -->
            <div class="section">
                <div class="section-title">4. Per KM Rate</div>
                <div class="form-group">
                    <label>Driver Bata (LKR):</label>
                    <input type="number" id="driverBata" value="0" min="0" readonly>
                </div>
                <div class="form-group">
                    <label>Driver Accommodation (LKR):</label>
                    <input type="number" id="driverAccommodation" value="0" min="0" readonly>
                </div>
                <div class="form-group">
                    <label>Ticket & Parking (LKR):</label>
                    <input type="number" id="ticketParking" value="4000" readonly>
                </div>
                <div class="form-group">
                    <label>Total (LKR):</label>
                    <input type="number" id="totalMileageRate" value="0" readonly>
                </div>
            </div>

            <!-- 5. Extra Mileage -->
            <div class="section">
                <div class="section-title">5. Extra Mileage</div>
                <div class="form-group">
                    <label>Extra Mileage (km):</label>
                    <input type="number" id="extraMileage" value="0" min="0">
                </div>
                <div class="form-group">
                    <label>Extra Mileage Rate (LKR):</label>
                    <input type="number" id="extraMileageRate" value="0" readonly>
                </div>
                <div class="form-group">
                    <label>Extra Mileage Cost (LKR):</label>
                    <input type="number" id="extraMileageCost" value="0" readonly>
                </div>
            </div>

            <!-- 6. Other Expenses -->
            <div class="section">
                <div class="section-title">6. Other Expenses</div>
                <div class="form-group">
                    <label>Total Other Expenses (LKR):</label>
                    <input type="number" id="otherExpenses" value="0" min="0">
                </div>
            </div>

            <!-- 7. Profit -->
            <div class="section">
                <div class="section-title">7. Profit</div>
                <div class="form-group">
                    <label>Profit Margin (LKR):</label>
                    <input type="number" id="profit" value="0" min="0">
                </div>
            </div>

            <!-- 8. Currency Conversion Rates (Hidden Info Displayed for clarity) -->
            <div class="section">
                <div class="section-title">8. Exchange Rates (From XML)</div>
                <div class="form-group">
                    <label>USD Exchange Rate (1 USD):</label>
                    <input type="number" id="usdRate" value="0" readonly>
                </div>
                <div class="form-group">
                    <label>GBP Exchange Rate (1 GBP):</label>
                    <input type="number" id="gbpRate" value="0" readonly>
                </div>
            </div>

            <!-- Final Quotation Display -->
            <div class="quotation-box">
                <div class="left">
                    <h3>Per Day Quotation</h3>
                    <div class="quotation-row">
                        <span>Total LKR:</span>
                        <strong id="pd_finalLKR">0.00</strong>
                    </div>
                    <div class="quotation-row">
                        <span>Total USD:</span>
                        <strong id="pd_finalUSD">0.00</strong>
                    </div>
                    <div class="quotation-row">
                        <span>Total GBP:</span>
                        <strong id="pd_finalGBP">0.00</strong>
                    </div>

                    <!-- Quote Generation Actions -->
                    <button type="button" data-id="per-day" class="btnGenerateQuote per-day btn-action btn-generate">Generate Quote</button>
                </div>
                <div class="right">
                    <h3>Per KM Quotation</h3>
                    <div class="quotation-row">
                        <span>Total LKR:</span>
                        <strong id="pkm_finalLKR">0.00</strong>
                    </div>
                    <div class="quotation-row">
                        <span>Total USD:</span>
                        <strong id="pkm_finalUSD">0.00</strong>
                    </div>
                    <div class="quotation-row">
                        <span>Total GBP:</span>
                        <strong id="pkm_finalGBP">0.00</strong>
                    </div>

                    <!-- Quote Generation Actions -->
                    <button type="button" data-id="per-km" class="btnGenerateQuote btn-action btn-generate">Generate Quote</button>
                </div>
            </div>

            <textarea id="quoteOutput" class="quote-template-area"></textarea>
            <button type="button" id="btnCopyQuote" class="btn-action btn-copy">Copy Quotation</button>
        </div>
    </main>
    
<script>
$(document.body).ready(function() {
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

    let vehicleData = {};
    let exchangeRates = {};

    // 1. Fetch XML Data via PHP
    $.ajax({
        url: 'get_rates',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                vehicleData = response.vehicles;
                exchangeRates = response.exchange_rates;
                driverCharges = response.driver_charges;

                // Populate Vehicle Dropdown
                $.each(vehicleData, function(key, val) {
                    $('#vehicleType').append(new Option(key, key));
                });

                // Set Exchange Rates
                $('#usdRate').val(exchangeRates.USD);
                $('#gbpRate').val(exchangeRates.GBP);
            } else {
                alert('Error loading XML data');
            }
        }
    });

    // 2. Trigger recalculations on input change
    $('#startDate, #endDate, #totalDays, #vehicleType, #extraMileage, #otherExpenses, #driverBata, #driverAccommodation, #profit').on('input change', function() {
        calculateAll();
    });

    function calculateAll(id) {
        // Step 1: Calculate Days
        let start = new Date($('#startDate').val());
        let end = new Date($('#endDate').val());
        let totalDays = $('#totalDays').val();

        //if(!totalDays){
            if (!isNaN(start) && !isNaN(end) && end >= start) {
                let days = 0;
                let diffTime = Math.abs(end - start);
                days = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // Including start date
                $('#totalDays').val(days);
            }
        //}
        
        

        // Step 3: Vehicle Daily Rates
        let selectedVehicle = $('#vehicleType').val();
        let dailyRate = 0;
        let dailyBata = 0;
        let dailyAccommodation = 0;
        let extraRate = 0;

        if (selectedVehicle && vehicleData[selectedVehicle]) {
            dailyRate = vehicleData[selectedVehicle].daily_rate;
            dailyBata = vehicleData[selectedVehicle].bata;
            dailyAccommodation = vehicleData[selectedVehicle].accommodation;
            extraRate = vehicleData[selectedVehicle].extra_mileage_rate;
        }

        let totalDailyRate = totalDays > 0 ? (dailyRate * totalDays) : dailyRate;
        $('#totalDailyRate').val(totalDailyRate);

        $('#dailyRate').val(dailyRate);
        $('#driverBata').val(dailyBata);
        $('#driverAccommodation').val(dailyAccommodation);
        $('#extraMileageRate').val(extraRate);

        // Step 2: Calculate Max Mileage
        let extra = (selectedVehicle && selectedVehicle == 'Mini Bus') ? 0 : 200;
        let maxMileage = totalDays > 0 ? (100 * totalDays) + extra : 0;
        $('#maxMileage').val(maxMileage);

        // step 3: Calculate Mileage Rate
        let transportCharge = maxMileage > 0 ? (extraRate * maxMileage) : 0;
        let totalBata = totalDays > 0 ? (dailyBata * totalDays) : 0;
        let totalAccommodation = totalDays > 0 ? (dailyAccommodation * (totalDays - 1)) : 0;
        let ticketParkingValue = parseFloat($('#ticketParking').val()) || 0;
        let ticketParking = ticketParkingValue > 0 ? ticketParkingValue : 0;
        let totalMileageRate = transportCharge + totalBata + ticketParking + totalAccommodation;

        $('#totalMileageRate').val(totalMileageRate);

        // Step 4: Extra Mileage Cost
        let extraKm = parseFloat($('#extraMileage').val()) || 0;
        let extraCost = extraKm * extraRate;
        $('#extraMileageCost').val(extraCost);

        // Step 5: Other Expenses
        let other = parseFloat($('#otherExpenses').val()) || 0;

        // Step 7: Profit
        let profit = parseFloat($('#profit').val()) || 0;

        // Base vehicle cost
        let pd_vehicleBaseCost = parseFloat($('#totalDailyRate').val()) || 0;
        let pkm_vehicleBaseCost = parseFloat($('#totalMileageRate').val()) || 0;


        // Total LKR calculation
        let pd_totalLKR = pd_vehicleBaseCost + extraCost + other + profit;
        let pkm_totalLKR = pkm_vehicleBaseCost + extraCost + other + profit;

        // Exchange conversions
        let usdRate = parseFloat($('#usdRate').val()) || 1;
        let gbpRate = parseFloat($('#gbpRate').val()) || 1;

        let pd_totalUSD = usdRate > 0 ? (pd_totalLKR / usdRate) : 0;
        let pkm_totalUSD = usdRate > 0 ? (pkm_totalLKR / usdRate) : 0;

        let pd_totalGBP = gbpRate > 0 ? (pd_totalLKR / gbpRate) : 0;
        let pkm_totalGBP = gbpRate > 0 ? (pkm_totalLKR / gbpRate) : 0;

        // Step 8: Update Final Output
        $('#pd_finalLKR').text(pd_totalLKR.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#pd_finalUSD').text(pd_totalUSD.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#pd_finalGBP').text(pd_totalGBP.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

        $('#pkm_finalLKR').text(pkm_totalLKR.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#pkm_finalUSD').text(pkm_totalUSD.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#pkm_finalGBP').text(pkm_totalGBP.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

        return {
            days: totalDays,
            vehicle: selectedVehicle || '[Vehicle Name]',
            maxMileage: maxMileage,
            extraRate: extraRate,
            totalLKR: (id && id == 'per-day') ? pd_totalLKR.toLocaleString('en-US') : pkm_totalLKR.toLocaleString('en-US'),
            totalUSD: (id && id == 'per-day') ? Math.round(pd_totalUSD) : Math.round(pkm_totalUSD),
            totalGBP: (id && id == 'per-day') ? Math.round(pd_totalGBP) : Math.round(pkm_totalGBP)
        };
    }

    // 3. Generate Quote Template Button Action
    $('.btnGenerateQuote').on('click', function() {
        let id = $(this).attr('data-id');
        let values = calculateAll(id);

        let quoteTemplate = `*${values.days}-Day Tour Package* 

🚐 *Vehicle:* ${values.vehicle} 
📅 *Duration:* ${values.days} days
💰 *Total Price:* ${values.totalLKR} LKR / approximately ${values.totalUSD} USD or ${values.totalGBP} GBP
🛣️ *Maximum Mileage:* ${values.maxMileage} km
➕ *Extra Mileage:* ${values.extraRate} LKR per additional km

The price includes all transport-related costs:
    ● Fuel
    ● Experienced and licensed English-speaking driver
    ● Driver’s accommodation and meals
    ● Parking fees
    ● Highway/toll charges
    ● Vehicle-related expenses
    ● Well-maintained, safe, and comfortable vehicle with good air conditioning
    ● Flexible driver who can assist as a guide and adjust the daily schedule according to your plans
    ● Full commercial passenger insurance is included, covering all passengers in the vehicle for the entire duration of the journey.

The driver will take care of you throughout the journey and help make your Sri Lanka trip safe, comfortable, and enjoyable.`;

        $('#quoteOutput').val(quoteTemplate).show();
        $('#btnCopyQuote').show();
        
        // Auto-scroll to the quote section
        $('html, body').animate({
            scrollTop: $("#quoteOutput").offset().top - 50
        }, 300);
    });

    // 4. Copy Quotation Button Action
    $('#btnCopyQuote').on('click', function() {
        let quoteText = $('#quoteOutput');
        quoteText.select();
        document.execCommand('copy');

        let originalBtnText = $(this).text();
        $(this).text('Copied to Clipboard! ✓').css('background-color', '#28a745').css('color', '#fff');

        setTimeout(() => {
            $(this).text(originalBtnText).css('background-color', '#ffc107').css('color', '#212529');
        }, 2000);
    });

});
</script>

</body>
</html>