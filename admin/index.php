<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Inventory Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        .max-w-7xl{ max-width: 90rem !important; }

        /* Base Pill Style for Dropdown */
        .status-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            font-size: 0.8125rem;
            font-weight: 600;
            padding: 0.35rem 1.8rem 0.35rem 0.85rem;
            border-radius: 50rem;
            border: 1px solid transparent;
            cursor: pointer;
            outline: none;
            transition: all 0.2s ease-in-out;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23475569' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.6rem center;
            background-size: 11px;
        }

        .status-select:hover {
            filter: brightness(0.95);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .status-select:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        /* Color Schemes per Status */
        .status-select[data-status="Upcoming"] {
            background-color: #e0f2fe;
            color: #0369a1;
            border-color: #bae6fd;
        }

        .status-select[data-status="On Going"] {
            background-color: #fef3c7;
            color: #b45309;
            border-color: #fde68a;
        }

        .status-select[data-status="Completed"] {
            background-color: #dcfce7;
            color: #15803d;
            border-color: #bbf7d0;
        }

        .status-select[data-status="Payment Recieved"] {
            background-color: #f3e8ff;
            color: #6b21a8;
            border-color: #e9d5ff;
        }

        .status-select[data-status="Canceled"] {
            background-color: #fee2e2;
            color: #b91c1c;
            border-color: #fecaca;
        }

        /* Reset dropdown options back to standard neutral styling inside native list */
        .status-select option {
            background-color: #ffffff;
            color: #1e293b;
        }

        .upcoming-soon{
            border-left: 6px solid #ff3d00 !important;
        }

        .row-ongoing{
            border-left: 6px solid #00bf60 !important;
        }

        /* Layout & Card Scaffolding */
        .modal { display: none; position: fixed; top: 36px; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-content {
            background: #f8fafc;
            width: 80%;
            max-width: 950px;
            margin: 2% auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            max-height: 90vh;
            overflow-y: auto;
        }
        .modal-header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px; margin-bottom: 20px; }
        .modal-header h3 { margin: 0; color: #0f172a; font-size: 18px; }
        .close-btn { font-size: 24px; cursor: pointer; color: #64748b; }

        .form-section {
            background: #ffffff;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            margin-bottom: 16px;
        }
        .section-heading {
            font-size: 13px;
            font-weight: 700;
            color: #2563eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 6px;
        }
        .section-subheading {
            font-size: 12px;
            font-weight: 700;
            color: #5e78b1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 20px 0 4px;
            padding-bottom: 6px;
        }

        /* Grids */
        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
        .grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }
        .grid-2-compact { display: grid; grid-template-columns: 1fr 1fr; gap: 6px; }

        /* Form Controls */
        .form-group { display: flex; flex-direction: column; }
        .form-group label { font-weight: 600; font-size: 11px; color: #475569; margin-bottom: 4px; }
        .form-group input, .form-group select, .form-group textarea {
            padding: 8px 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 12px;
            outline: none;
            transition: border 0.2s;
        }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: #2563eb; }

        /* Package Row Item */
        .package-row { display: grid; grid-template-columns: 3fr 2fr; gap: 8px; margin-bottom: 8px; align-items: center; }
        #packageSummaryContainer .package-row { grid-template-columns: 1fr 2fr 1fr 1fr 40px; }
        .btn-remove-row { background: #ef4444; color: #fff; border: none; border-radius: 4px; padding: 8px; cursor: pointer; font-weight: bold; }

        /* Buttons */
        .modal-footer { display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px; }
        .btn-save { background: #16a34a; color: #fff; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 14px; }
        .btn-cancel { background: #64748b; color: #fff; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 14px; }
        .btn-secondary { background: #e2e8f0; color: #1e293b; border: none; padding: 6px 12px; border-radius: 6px; font-size: 11px; font-weight: 600; cursor: pointer; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">
    <!-- Top Navigation Header -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Left: Branding -->
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-600 text-white p-2 rounded-lg">
                        <i class="fa-solid fa-compass text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-slate-900 leading-tight">Tour Inventory</h1>
                        <p class="text-xs text-slate-500">Fleet & Booking Management</p>
                    </div>
                </div>

                <!-- Right: Actions & User -->
                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-slate-500 hover:text-slate-600 rounded-full hover:bg-slate-100 transition">
                        <i class="fa-regular fa-bell text-lg"></i>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-indigo-600 rounded-full"></span>
                    </button>
                    <div class="h-6 w-px bg-slate-200"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-700 font-semibold flex items-center justify-center text-sm border border-indigo-200">
                            CTL
                        </div>
                        <div class="hidden sm:block text-left">
                            <p class="text-sm font-medium text-slate-700">Ceylon T.</p>
                            <p class="text-xs text-slate-500">Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

        <!-- Stat Cards Summary -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Bookings</p>
                    <h3 id="total-bookings" class="text-2xl font-bold text-slate-800 mt-1"></h3>
                    <span id="bookings-growth" class="text-xs text-emerald-600 font-medium inline-flex items-center gap-1 mt-1">
                        <i class="fa-solid fa-arrow-up"></i> 
                    </span>
                </div>
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Upcoming Tours</p>
                    <h3 id="upcoming-tours" class="text-2xl font-bold text-slate-800 mt-1"></h3>
                    <span class="text-xs text-indigo-600 font-medium inline-flex items-center gap-1 mt-1">
                        Active in queue
                    </span>
                </div>
                <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Ongoing Tours</p>
                    <h3 id="ongoing-tours" class="text-2xl font-bold text-slate-800 mt-1"></h3>
                    <span class="text-xs text-indigo-600 font-medium inline-flex items-center gap-1 mt-1">
                        Active in queue
                    </span>
                </div>
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Assigned Drivers</p>
                    <h3 id="assigned-drivers" class="text-2xl font-bold text-slate-800 mt-1"></h3>
                    <span class="text-xs text-amber-600 font-medium inline-flex items-center gap-1 mt-1">
                        <i class="fa-solid fa-triangle-exclamation"></i> <span id="unassigned-drivers-text"></span>
                    </span>
                </div>
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-id-card"></i>
                </div>
            </div>
        </div>

        <!-- Dashboard Action Bar & Table Controls -->
        <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <!-- Left: Search and Filters -->
            <div class="flex flex-1 flex-wrap items-center gap-3">
                <div class="relative flex-1 min-w-[240px] max-w-xs">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-500 text-sm"></i>
                    <input id="filter-search" type="text" placeholder="Search order, guest, vehicle..." class="w-full pl-9 pr-4 py-2 text-sm bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition">
                </div>

                <select id="filter-vehicle" class="py-2 px-3 text-sm bg-slate-50 border border-slate-200 rounded-lg text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All Vehicles</option>
                    <option value="sedan">Sedan</option>
                    <option value="suv">SUV Mini</option>
                </select>

                <select id="filter-status" class="py-2 px-3 text-sm bg-slate-50 border border-slate-200 rounded-lg text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All Statuses</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="On Going">On Going</option>
                    <option value="Completed">Completed</option>
                    <option value="Payment Recieved">Payment Recieved</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>

            <!-- Right: Action Buttons -->
            <div class="flex items-center gap-2">
                <button class="px-3 py-2 text-sm text-slate-600 hover:text-slate-800 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded-lg flex items-center gap-2 transition font-medium">
                    <i class="fa-solid fa-download"></i> Export
                </button>
                <button id="openModalBtn" class="px-4 py-2 text-sm text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg flex items-center gap-2 shadow-sm transition font-medium">
                    <i class="fa-solid fa-plus"></i> Add New Booking
                </button>
            </div>
        </div>
    

        <!-- Data Table Container -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            <th class="py-3.5 px-4">Order #</th>
                            <th class="py-3.5 px-4">Schedule</th>
                            <th class="py-3.5 px-4">Guest Details</th>
                            <th class="py-3.5 px-4">Vehicle & Driver</th>
                            <th class="py-3.5 px-4">Documents & Logs</th>
                            <th class="py-3.5 px-4 text-right">Charges</th>
                            <th class="py-3.5 px-4 text-center">Status</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="inventoryTable" class="divide-y divide-slate-200">
                        <!-- Data loaded via jQuery AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Booking Form Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Booking Information</h3>
                <span class="close-btn" id="closeModalBtn">&times;</span>
            </div>
            
            <form id="bookingForm">
                <input type="hidden" id="booking_id" name="id" value="">
                <input type="hidden" id="agreement_id" name="agreement_id" value="">
                <input type="hidden" id="paging_id" name="paging_id" value="">

                <!-- 1. Booking Details -->
                <div class="form-section">
                    <div class="section-heading">Booking Details</div>
                    <div class="grid-4">
                        <div class="form-group"><label>Order Number</label><input type="text" name="order_number" placeholder="#BKG-2026-001" readonly></div>
                        <div class="form-group"><label>Start Date</label><input type="date" name="tour_start_date" id="tour_start_date"></div>
                        <div class="form-group"><label>End Date</label><input type="date" name="tour_end_date" id="tour_end_date"></div>
                        <div class="form-group"><label>Tour Days</label><input type="number" name="tour_days" id="tour_days" value="0" readonly style="background:#f3f4f6; cursor: not-allowed;"></div>
                    </div>
                </div>

                <!-- 2. Client Details -->
                <div class="form-section">
                    <div class="section-heading">Client Details</div>
                    <div class="grid-2">
                        <div class="form-group">
                            <label>Guest Name</label>
                            <div class="grid-2-compact">
                                <input type="text" name="guest_name" placeholder="Guest Name" required>
                                <input type="text" name="paging_name" placeholder="Paging Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Head Count</label>
                            <div class="grid-2-compact">
                                <input type="number" name="adults_count" placeholder="Adults" min="0">
                                <input type="number" name="children_count" placeholder="Children" min="0">
                            </div>
                        </div>
                        <div class="form-group"><label>Guest Mobile</label><input type="text" name="guest_mobile"></div>
                        <div class="form-group"><label>Guest Email</label><input type="email" name="guest_email"></div>
                    </div>
                </div>

                <!-- 3. Vehicle Details -->
                <div class="form-section">
                    <div class="section-heading">Vehicle Details</div>
                    <div class="grid-3">
                        <div class="form-group"><label>Vehicle</label><select id="vehicle_model" name="vehicle_model"><option value="">-- Select Vehicle --</option></select></div>
                        <div class="form-group"><label>Mileage Limit (km)</label><input id="mileage_limit" type="number" name="mileage_limit" placeholder="1200"></div>
                        <div class="form-group"><label>Extra Mileage Charge (/km)</label><input id="extra_mileage_charge" type="number" step="0.01" name="extra_mileage_charge" placeholder="0.00"></div>
                    </div>
                </div>

                <!-- 4. Financial & Package Summary -->
                <div class="form-section">
                    <div class="section-heading">Financial & Package Summary</div>
                    <div class="section-subheading">Full Tour</div>
                    <div class="default-row form-group package-row">
                        <input id="tour_title" type="text" name="tour_title" placeholder="Title (e.g., Tour Fee)" value="">
                        <!--input type="text" name="details" placeholder="Details" value="" readonly style="background:#f3f4f6; cursor: not-allowed;"-->
                        <input id="tour_charge" type="number" step="0.01" name="tour_charge" placeholder="Amount" value="">
                        <!--button type="button" class="btn-remove-row">&times;</button-->
                    </div>
                    <div id="packageSummaryContainer">
                        <div class="section-subheading">Seporate Transfers</div>
                        <!-- Dynamic Rows Rendered Here -->
                    </div>
                    <button type="button" class="btn btn-secondary" id="addPackageRowBtn" style="margin-top:10px;">+ Add New Row</button>
                </div>

                <!-- 4.1 Financial & Package Summary -->
                <div class="form-section">
                    <div class="section-heading">Itinerary</div>
                    <div class="form-group">
                        <textarea name="itinerary" rows="10" placeholder="Enter Itinerary..."></textarea>
                    </div>
                </div>

                <!-- 5. Flight & Schedule Details -->
                <div class="form-section">
                    <div class="section-heading">Flight & Schedule Details</div>
                    <div class="grid-3">
                        <div class="form-group"><label>Pickup From / Flight</label><input type="text" name="pickup_from" placeholder="e.g., Airport / Hotel Pickup"></div>
                        <div class="form-group"><label>Pickup Date</label><input type="date" name="pickup_date"></div>
                        <div class="form-group"><label>Time</label><input type="time" name="arrival_time"></div>
                    </div>
                </div>

                <!-- 6. Driver Details -->
                <div class="form-section">
                    <div class="section-heading">Driver Details</div>
                    <div class="grid-2">
                        <div class="form-group"><label>Driver Name</label>
                        <!--select id="driver_name" name="driver_name"><option value="">-- Select Driver --</option></select></div-->
                        <input type="text" name="driver_name" list="driver_list" placeholder="Select or type a driver"><datalist id="driver_list"></datalist></div>
                        <div class="form-group"><label>Driver Mobile</label><input type="text" name="driver_mobile"></div>
                    </div>
                </div>

                <!-- 7. Financial Details -->
                <div class="form-section">
                    <div class="section-heading">Financial Details</div>
                    <div class="grid-4">
                        <div class="form-group"><label>Advance from Client</label><input type="number" step="0.01" name="income_advance" value="0.00"></div>
                        <div class="form-group"><label>Driver Charges</label><input type="number" step="0.01" class="calc-profit" name="driver_charges" value="0.00"></div>
                        <div class="form-group"><label>Other Expenses</label><input type="number" step="0.01" class="calc-profit" name="expense_other" value="0.00"></div>
                        <div class="form-group"><label>Advance to Driver</label><input type="number" step="0.01" name="expense_advance" value="0.00"></div>
                    </div>
                </div>

                <!-- 8. Special Notes & Payment Options -->
                <div class="form-section">
                    <div class="grid-2">
                        <div class="form-group">
                            <div class="section-heading">Payment Options</div>
                            <textarea name="payment_options" rows="6" placeholder="Enter special instructions or notes...">Payment Schedule : (Cash in LKR/USD/EURO/GBP).
* First 50% Payment: Due on the second day of the tour. 
* Final Balance: Due one day before the tour finishes.</textarea>
                        </div>
                        <div class="form-group">
                            <div class="section-heading">Special Notes</div>
                            <textarea name="special_notes" rows="6" placeholder="Enter special instructions or notes..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- 9. Status -->
                <div class="form-section">
                    <div class="grid-4">
                        <div class="form-group">
                            <div class="section-heading">Status</div>
                            <select name="status" class="status-select">
                                <option value="Upcoming">Upcoming</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                                <option value="Payment Recieved">Payment Recieved</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-save">Save Booking</button>
                    <button type="button" class="btn btn-cancel" id="closeModalBtn2">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Real-time search input trigger with keyup
            $('#filter-search').on('keyup input', function() {
                loadBookings();
            });

            // Dropdown change triggers
            $('#filter-vehicle, #filter-status').on('change', function() {
                loadBookings();
            });

            $(document).on('change', '.status-select', function() {
                let selectElement = $(this);
                let bookingId     = selectElement.data('id');
                let newStatus     = selectElement.val();

                // Dynamically update data-status attribute to trigger CSS color shift immediately
                selectElement.attr('data-status', newStatus);
                selectElement.prop('disabled', true);

                $.ajax({
                    url: 'ajax_handler?action=update_status',
                    type: 'POST',
                    data: {
                        id: bookingId,
                        status: newStatus
                    },
                    dataType: 'json',
                    success: function(response) {
                        selectElement.prop('disabled', false);
                        if (response.status !== 'success') {
                            alert('Failed to update status: ' + response.message);
                        }
                    },
                    error: function() {
                        selectElement.prop('disabled', false);
                        alert('An error occurred while updating status.');
                    }
                });
            });

            loadBookings();

            function loadBookings() {

                const searchVal = $('#filter-search').val();
                const vehicleVal = $('#filter-vehicle').val();
                const statusVal = $('#filter-status').val();

                $.ajax({
                    url: 'ajax_handler',
                    type: 'GET',
                    data: {
                        action: 'fetch',
                        search: searchVal,
                        vehicle: vehicleVal,
                        status: statusVal
                    },
                    dataType: 'json',
                    success: function(data) {

                        calculateDashboardStats(data);
                        
                        let rows = '';
                        $.each(data, function(i, row) {
                            
                            let badgeClass = 'badge-upcoming';
                            switch (row.status) {
                                case 'Payment Recieved': badgeClass = 'badge-payment-recieved'; break;
                                case 'Completed':        badgeClass = 'badge-completed'; break;
                                case 'Ongoing':          badgeClass = 'badge-ongoing'; break;
                                case 'Upcoming':         badgeClass = 'badge-upcoming'; break;
                            }

                            let agreement = row.agreement_link ? row.agreement_link : '-';
                            
                            // Convert row object to JSON string to safely pass into data attribute
                            let rowJson = JSON.stringify(row).replace(/'/g, "&apos;");

                            // Parse dates to calculate the difference in days
                            let today = new Date();
                            today.setHours(0, 0, 0, 0); // Reset time for accurate date comparison

                            let startDate = new Date(row.tour_start_date);
                            let endDate = new Date(row.tour_end_date);

                            // Strip time components from start and end dates
                            startDate.setHours(0, 0, 0, 0);
                            endDate.setHours(0, 0, 0, 0);

                            let timeDiff = startDate.getTime() - today.getTime();
                            let daysUntilStart = Math.ceil(timeDiff / (1000 * 3600 * 24));

                            let rowClass = '';

                            if (today > endDate) {
                                // Tour date has already passed
                                rowClass = 'row-completed';
                            } else if (today >= startDate && today <= endDate) {
                                // Currently active / in progress
                                rowClass = 'row-ongoing';
                            } else if (daysUntilStart >= 0 && daysUntilStart <= 3) {
                                // Starting within 7 days
                                rowClass = 'upcoming-soon';
                            }

                            // Check full tour or not
                            let fullTour = parseFloat(row.tour_charge) > 0 ? 'Yes' : 'No';

                            // Build transfer count span dynamically
                            let transferSpan = row.transfers_count > 1 ? `${row.transfers_count}` : '-';

                            // Function to format "YYYY-MM-DD" into "Sep 22 - Sep 26"
                            function formatTourDates(startDateStr, endDateStr) {
                                let options = { month: 'short', day: 'numeric', timeZone: 'UTC' };
                                
                                let start = new Date(startDateStr).toLocaleDateString('en-US', options);
                                let end = new Date(endDateStr).toLocaleDateString('en-US', options);
                                
                                return `${start} - ${end}`;
                            }

                            // Example usage with jQuery:
                            let tour_start_date = row.tour_start_date;
                            let tour_end_date = row.tour_end_date;

                            let formattedRange = formatTourDates(tour_start_date, tour_end_date);

                            let statusOptions = ['Upcoming', 'On Going', 'Completed', 'Payment Recieved', 'Canceled'];

                            let dropdownHtml = `<select class="status-select" data-id="${row.id}" data-status="${row.status}">`;
                            statusOptions.forEach(opt => {
                                let selected = (row.status === opt) ? 'selected' : '';
                                dropdownHtml += `<option value="${opt}" ${selected}>${opt}</option>`;
                            });
                            dropdownHtml += `</select>`;

                            rows += `<tr class="hover:bg-slate-50/80 transition ${rowClass}">
                                <td class="py-4 px-4 font-semibold text-indigo-600 whitespace-nowrap">${row.order_number || '-'} 
                                <div class="text-xs text-slate-600">Full Tour: ${fullTour}</div>
                                <div class="text-xs text-slate-600">Transfers: ${transferSpan}</div></td>
                                <td class="py-4 px-4 whitespace-nowrap"><div class="font-medium text-slate-800">${formattedRange || '-'}</div>
                                    <div class="text-xs text-slate-500">${row.tour_days} Days</div></td>
                                <td class="py-4 px-4">
                                    <div class="font-medium text-slate-800">${row.guest_name}</div>
                                    <div class="text-xs text-slate-500 flex items-center gap-2 m-1">
                                        <span><i class="fa-solid fa-phone text-slate-400"></i> ${row.guest_mobile || '-'}</span>
                                    </div>
                                    <div class="text-xs text-slate-500">
                                        <i class="fa-solid fa-repl text-slate-400"></i> ${row.guest_email || '-'}
                                    </div>
                                </td>
                                <td class="py-4 px-4 whitespace-nowrap">
                                    <div class="text-slate-700 font-medium"><i class="fa-solid fa-car text-slate-500 mr-1"></i> ${row.vehicle_model || '-'}</div>
                                    ${
                                        row.driver_name 
                                        ? `<div class="text-xs text-emerald-600 font-medium mt-0.5">
                                                Driver: ${row.driver_name}
                                        </div>`
                                        : `<div class="text-xs text-amber-600 mt-0.5">
                                                Driver: <span class="text-amber-600 italic">Unassigned</span>
                                        </div>`
                                    }
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-wrap gap-1.5 text-xs">
                                        ${agreement}
                                        <!--a href="https://drive.google.com/file/d/19UX-WLQbKeysj4nbrhjnt5XOoq2FylpI/preview" target="_blank" rel="noopener" download class="px-2 py-0.5 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded transition">Mileage</a>
                                        <a href="https://drive.google.com/file/d/1LBj6PElXf5OhqHPzZ8SjFZ7hGpT_U533/preview" target="_blank" rel="noopener" download="Mileage_Sheet.pdf" class="px-2 py-0.5 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded transition">Shops</a-->
                                        <button id="client-links" data-mobile="${row.guest_mobile}" class="mt-2 px-2 py-0.5 bg-green-100 text-green-600 hover:bg-indigo-100 rounded font-medium transition">📲 Send Client Links</button>
                                        <button id="driver-links" data-mobile="${row.driver_mobile}" class="mt-1 px-2 py-0.5 bg-green-100 text-green-600 hover:bg-indigo-100 rounded font-medium transition">📲 Send Driver Links</button>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-right whitespace-nowrap">
                                    <div class="font-semibold text-slate-800">LKR ${parseFloat(row.tour_charge).toLocaleString()}</div>
                                    <div class="text-xs text-slate-500">Adv: ${parseFloat(row.income_advance).toLocaleString()} / Driver: ${parseFloat(row.expense_advance).toLocaleString()}</div>
                                </td>
                                <td class="py-4 px-4 text-center whitespace-nowrap">
                                    ${dropdownHtml}
                                </td>
                                <td class="py-4 px-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <button class="p-1.5 text-slate-500 hover:text-indigo-600 rounded-lg hover:bg-slate-100 transition edit-btn" title="Edit" data-booking='${rowJson}'>
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="p-1.5 text-slate-500 hover:text-slate-600 rounded-lg hover:bg-slate-100 transition" title="More Options">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>`;
                        });
                        $('#inventoryTable').html(rows);

                    },
                    error: function(xhr, status, error) {
                        console.error('Fetch error:', error);
                    }
            
                });

                // Function to compute dashboard statistics from the bookings array
                function calculateDashboardStats(bookings) {
                    const today = new Date();
                    const currentYear = today.getFullYear();
                    const currentMonth = today.getMonth(); // 0-indexed (0 = Jan, 8 = Sep)

                    let totalBookings = bookings.length;
                    let currentMonthCount = 0;
                    let previousMonthCount = 0;
                    let ongoingCount = 0;
                    let upcomingCount = 0;
                    let assignedCount = 0;

                    const todayStr = today.toISOString().split('T')[0];

                    bookings.forEach(item => {
                        // Date parsing for month comparison (using tour_start_date or created date)
                        const startDate = new Date(item.created_at);
                        const itemYear = startDate.getFullYear();
                        const itemMonth = startDate.getMonth();

                        // Current Month Count
                        if (itemYear === currentYear && itemMonth === currentMonth) {
                            currentMonthCount++;
                        }
                        // Previous Month Count
                        else if (
                            (currentMonth === 0 && itemYear === currentYear - 1 && itemMonth === 11) ||
                            (itemYear === currentYear && itemMonth === currentMonth - 1)
                        ) {
                            previousMonthCount++;
                        }

                        // Ongoing / Upcoming status logic
                        if (item.tour_start_date <= todayStr && item.tour_end_date >= todayStr) {
                            ongoingCount++;
                        } else if (item.tour_start_date > todayStr) {
                            upcomingCount++;
                        }

                        // Driver Assignment logic
                        if (item.driver_name && item.driver_name.trim() !== '' && item.driver_name !== '-') {
                            assignedCount++;
                        }
                    });

                    // Calculate percentage growth rate
                    let percentChange = 0;
                    if (previousMonthCount > 0) {
                        percentChange = Math.round(((currentMonthCount - previousMonthCount) / previousMonthCount) * 100);
                    } else if (currentMonthCount > 0) {
                        percentChange = 100; // Default static fallback matching your target design if no prev month data exists
                    }

                    const sign = percentChange >= 0 ? '+' : '';
                    const growthText = `${sign}${percentChange}% this month`;

                    // Update DOM
                    $('#total-bookings').text(totalBookings.toLocaleString());
                    $('#bookings-growth').html(`<i class="fa-solid fa-arrow-${percentChange >= 0 ? 'up' : 'down'}"></i> ${growthText}`);
                    $('#upcoming-tours').text(upcomingCount);
                    $('#ongoing-tours').text(ongoingCount);
                    $('#assigned-drivers').text(`${assignedCount} / ${totalBookings}`);
                    $('#unassigned-drivers-text').text(`${totalBookings - assignedCount} Unassigned`);
                }
            }

            let vehicleData = {};
            let exchangeRates = {};

            // Fetch XML Data via PHP
            $.ajax({
                url: 'get_rates',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        vehicleData = response.vehicles;
                        exchangeRates = response.exchange_rates;

                        let vehicleOptionCount = $('#vehicle_model option').length;
                     
                        if(vehicleOptionCount == 1){
                            // Populate Vehicle Dropdown
                            $.each(vehicleData, function(key, val) {
                                $('#vehicle_model').append(new Option(key, key));
                            });
                        }
                    } else {
                        alert('Error loading XML data');
                    }
                }
            });

            // 1. Add Dynamic Financial Package Row
            function addPackageRow(date = '', title = '', details = '', amount = '') {
                let html = `
                    <div class="form-group package-row">
                        <input type="date" name="drop_date[]" value="${date}">
                        <input type="text" name="drop_title[]" placeholder="Title (e.g., Tour Fee)" value="${title}">
                        <input type="text" name="drop_details[]" placeholder="Details" value="${details}">
                        <input type="number" step="0.01" name="drop_charge[]" placeholder="Amount" value="${amount}">
                        <button type="button" class="btn-remove-row">&times;</button>
                    </div>`;
                $('#packageSummaryContainer').append(html);
            }

            // Add initial row on open
            $('#addPackageRowBtn').click(function() { addPackageRow(); });

            // Remove row event
            $(document).on('click', '.btn-remove-row', function() {
                $(this).closest('.package-row').remove();
            });

            // Modal Controls
            $('#openModalBtn').click(function() { $('#bookingForm')[0].reset(); $('#bookingModal').show(); });
            $('#closeModalBtn, #closeModalBtn2').click(function() { $('#bookingModal').hide(); });

            // Form Submit via AJAX
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();

                let submitButton = e.target.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.innerText = 'Generating Documents...';

                let formdata = $(this).serialize();
                let params = new URLSearchParams(formdata);

                let tourChargeLKR = params.get('tour_charge'); // Your tour charge in LKR

                // Calculate and round to nearest whole number
                var tourChargeUSD = Math.round(tourChargeLKR / exchangeRates.USD);
                var tourChargeGBP = Math.round(tourChargeLKR / exchangeRates.GBP);

                // Gather dynamic rows from form
                var transfers = [];
                $('.package-row').each(function() {
                    var date = $(this).find('input[name="drop_date[]"]').val();
                    var title = $(this).find('input[name="drop_title[]"]').val();
                    var details = $(this).find('input[name="drop_details[]"]').val();
                    var amount = $(this).find('input[name="drop_charge[]"]').val();

                    // Only append if at least title or amount is filled out
                    if (title || amount) {
                        transfers.push({
                            date: date,
                            title: title,
                            details: details,
                            amount: amount
                        });
                    }
                });

                // Build payload object matching your placeholder keys
                let payload = {
                    agreementID: params.get('agreement_id'),
                    pagingID: params.get('paging_id'),
                    bookingRef: params.get('order_number'),
                    guest_name: params.get('guest_name'),
                    paging_name: params.get('paging_name'),
                    adults: params.get('adults_count'),
                    children: params.get('children_count'),
                    guest_mobile: params.get('guest_mobile'),
                    guest_email: params.get('guest_email'),
                    tour_start_date: params.get('tour_start_date'),
                    tour_end_date: params.get('tour_end_date'),
                    tour_title: params.get('tour_title'),
                    vehicle_model: params.get('vehicle_model'),
                    mileage_limit: params.get('mileage_limit'),
                    extra_mileage_charge: params.get('extra_mileage_charge'),
                    tour_charge: tourChargeLKR,
                    usd: tourChargeUSD,
                    gbp: tourChargeGBP,
                    pickup_from: params.get('pickup_from'),
                    pickup_date: params.get('pickup_date'),
                    pickup_time: params.get('arrival_time'),
                    transfers: transfers,
                    itinerary: params.get('itinerary'),
                    driver_name: params.get('driver_name'),
                    driver_mobile: params.get('driver_mobile'),
                    payment_options: params.get('payment_options')
                };

                let scriptURL = 'https://script.google.com/macros/s/AKfycbxlgA3xrX8HKT4BmFHEP25vB5sRyg10KcSN37z5YqbdyMvUS6eXe93yBSWZ27ybhAJS/exec';

                fetch(scriptURL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'text/plain;charset=utf-8' }, // Prevents CORS preflight issues in Apps Script
                    body: JSON.stringify(payload)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.result === 'success') {
                    // Display the shareable link on your web page
                    
                    let links = `<a href="${data.docUrl}" target="_blank" rel="noopener" class="px-2 py-0.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 rounded font-medium transition">Document</a> <a id="agreement-pdf" data-docid="${data.agreement_file_id}" href="${data.pdfUrl}" target="_blank" rel="noopener" class="px-2 py-0.5 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded transition">PDF</a> <a id="paging-pdf" data-docid="${data.paging_file_id}" href="${data.pagingUrl}" target="_blank" rel="noopener" class="px-2 py-0.5 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded transition">Paging</a>`;

                    // Append Google Doc and PDF links to FormData object
                    formdata += '&agreement_link=' + encodeURIComponent(links);

                    $.post('ajax_handler?action=save', formdata, function(res) {
                        let response = JSON.parse(res);
                        if(response.status === 'success') {
                            $('#bookingModal').hide();
                            loadBookings();
                        } else {
                            alert('Error saving record: ' + response.message);
                        }
                    });

                    } else {
                        alert('Error creating document: ' + data.error);
                    }
                })
                .catch(err => {
                    console.error('Fetch error:', err);
                })
                .finally(() => {
                    submitButton.disabled = false;
                    submitButton.innerText = 'Save Booking';
                });
                
            });

            // Populate Modal Form when Edit Button is clicked
            $(document).on('click', '.edit-btn', function() {
                let booking = $(this).data('booking');

                $('#modalTitle').text('Edit Booking ' + (booking.order_number || booking.id));
                $('#booking_id').val(booking.id);
                $('#packageSummaryContainer .package-row').remove();
                
                // Populate form inputs by matching input [name] with data keys
                $.each(booking, function(key, value) {
                    $(`[name="${key}"]`).val(value);
                    if(key == 'agreement_link'){
                        let agreementFileId = $('a[data-docid]').eq(0).data('docid');
                        let pagingFileId    = $('a[data-docid]').eq(1).data('docid');

                        $('#agreement_id').val(agreementFileId);
                        $('#paging_id').val(pagingFileId);
                    }

                    if(key == 'transfers'){
                        if (value) {
                            let data = typeof value === 'string' ? JSON.parse(value) : value;
                            
                            $.each(data, function(index, item) {
                                addPackageRow(item.date, item.title, item.details, item.charge);
                            });
                        }
                    }
                    
                });

                let vehicle = $('#vehicle_model').val();
                
                $('#driver_list').empty();
                
                // Populate Driver Dropdown
                $.each(vehicleData[vehicle].drivers, function(key, val) {
                    $('#driver_list').append(
                        $('<option>', {
                            value: val.name
                        })
                    );
                });

                $('#bookingModal').show();
            });

            // Reset Modal Title and Fields when clicking "Add New Booking"
            $('#openModalBtn').click(function() { 
                $('#modalTitle').text('Add Booking');
                $('#booking_id').val(''); 
                $('#bookingForm')[0].reset(); 
                //$('#calculated_profit').val('0.00');
                //addPackageRow();

                // Fetch dynamic Order Number from server
                $.getJSON('ajax_handler?action=get_next_order_number', function(res) {
                    if (res.status === 'success') {
                        $('input[name="order_number"]').val(res.order_number);
                    } else {
                        // Fallback generation if AJAX request fails
                        let today = new Date();
                        let yyyy = today.getFullYear();
                        let mm = String(today.getMonth() + 1).padStart(2, '0');
                        let dd = String(today.getDate()).padStart(2, '0');
                        $('input[name="order_number"]').val(`#BKG-${yyyy}${mm}${dd}01`);
                    }
                });

                $('#bookingModal').show();
            });

            // Trigger recalculations on input change
            $('#tour_start_date, #tour_end_date').on('input change', function(e) {
                calculateAll();
            });

            $(document).on('change', '#vehicle_model', function(e) {
                calculateAll();
                
                let vehicle = $(this).val();
                
                $('#driver_list').empty();
                
                // Populate Driver Dropdown
                $.each(vehicleData[vehicle].drivers, function(key, val) {
                    $('#driver_list').append(
                        $('<option>', {
                            value: val.name
                        })
                    );
                });
                
            });

            function calculateAll(id) {
                let start = new Date($('#tour_start_date').val());
                let end = new Date($('#tour_end_date').val());
                let diffDays = $('#tour_days').val();

                if (start && end && end >= start) {
                    let diffTime = Math.abs(end - start);
                    diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; 
                    $('#tour_days').val(diffDays);
                }

                // Vehicle Related Rates
                let selectedVehicle = $('#vehicle_model').val();
                let extraRate = 0;

                if (selectedVehicle && vehicleData[selectedVehicle]) {
                    extraRate = vehicleData[selectedVehicle].extra_mileage_rate;
                }
                
                $('#extra_mileage_charge').val(extraRate);

                let extra = (selectedVehicle && selectedVehicle == 'Mini Bus') ? 0 : 200;
                let maxMileage = diffDays > 0 ? (100 * diffDays) + extra : 0;
                $('#mileage_limit').val(maxMileage);

                let packageName = (diffDays && selectedVehicle) ? `${diffDays}-Day Private ${selectedVehicle} Rental` : '';
                $('#tour_title').val(packageName);
                
            }

            $(document).on('click', '#client-links', function(){
                let mobile = $(this).attr('data-mobile');
                let link = $('#agreement-pdf').attr('href');
                let docListText = `${link}\n`;
                let header = `Hello! Here are your formal Tour Agreement for your Booking:\n\n`;

                let fullMessage = header + docListText;

                // Open WhatsApp
                let whatsappUrl = `https://api.whatsapp.com/send?phone=${mobile}&text=${encodeURIComponent(fullMessage)}`;
                window.open(whatsappUrl, '_blank');
            });

            $(document).on('click', '#driver-links', function(){
                let mobile = $(this).attr('data-mobile');
                let agreement = $('#agreement-pdf').attr('href');
                let paging = $('#agreement-pdf').attr('href');
                let mileage = 'https://drive.google.com/file/d/19UX-WLQbKeysj4nbrhjnt5XOoq2FylpI/preview';
                let shops = 'https://drive.google.com/file/d/1LBj6PElXf5OhqHPzZ8SjFZ7hGpT_U533/preview';

                // Build array of text lines
    let lines = [
        "Hi, here are all the documents for next Tour:",
        "",
        "• *Agreement:* " + agreement,
        "",
        "• *Paging:* " + paging,
        "",
        "• *Mileage:* " + mileage,
        "",
        "• *Shops:* " + shops
    ];

    // Join with %0A directly to force URL newline encoding
    let encodedMessage = lines.map(line => encodeURIComponent(line)).join('%0A');

    // Launch WhatsApp
    let whatsappUrl = "https://api.whatsapp.com/send?phone=" + mobile + "&text=" + encodedMessage;
    window.open(whatsappUrl, '_blank');
            });
        });
    </script>
</body>
</html>