<?php
    require_once __DIR__ . '/../config/config.php';
?>
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

        #bookingModal.modal{ display: none; }

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

        #inventoryCards .status-select{
            font-size: 0.75rem;
            line-height: 1rem;
        }
        #inventoryCards .agreement-doc{
            display: none;
        }
        table #agreement-doc{
            display: none;
        }
        .modal-content{
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col">
    <!-- Top Navigation Header -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center gap-2">
            
            <!-- Left: Branding -->
            <div class="flex items-center gap-3 shrink-0">
            <div class="bg-indigo-600 text-white p-2 rounded-lg flex items-center justify-center">
                <i class="fa-solid fa-compass text-xl"></i>
            </div>
            <div>
                <h1 class="text-base sm:text-lg font-bold text-slate-900 leading-tight">Tour Inventory</h1>
                <p class="text-[11px] sm:text-xs text-slate-500">Fleet &amp; Booking Management</p>
            </div>
            </div>

            <!-- Center: Desktop Navigation Links -->
            <nav class="hidden md:flex items-center space-x-1">
            <!-- Active Page Link (Bookings List) -->
            <a href="<?= BASE_URL ?>admin/" class="px-3.5 py-2 text-sm font-semibold rounded-lg bg-indigo-50 text-indigo-600 transition">
                Bookings List
            </a>
            <!-- Tour Calendar Link -->
            <a href="<?= BASE_URL ?>admin/calendar" class="px-3.5 py-2 text-sm font-semibold rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                Tour Calendar
            </a>
            <!-- Reports Link -->
            <a href="<?= BASE_URL ?>admin/calculator" class="px-3.5 py-2 text-sm font-semibold rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                Quotation
            </a>
            </nav>

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

            <!-- Mobile Menu Toggle Button -->
            <button id="mobileMenuBtn" class="md:hidden p-2 ml-1 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition" aria-label="Toggle Navigation">
                <i id="mobileMenuIcon" class="fa-solid fa-bars text-xl"></i>
            </button>
            </div>

        </div>

        <!-- Mobile Navigation Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-slate-100 py-3 space-y-1">
            <a href="<?= BASE_URL ?>admin/" class="block px-3 py-2 text-sm font-semibold rounded-lg bg-indigo-50 text-indigo-600">
            Bookings List
            </a>
            <a href="<?= BASE_URL ?>admin/calendar" class="block px-3 py-2 text-sm font-semibold rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
            Tour Calendar
            </a>
            <a href="<?= BASE_URL ?>admin/calculator" class="block px-3 py-2 text-sm font-semibold rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
            Quotation
            </a>
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
                </select>

                <select id="filter-status" class="py-2 px-3 text-sm bg-slate-50 border border-slate-200 rounded-lg text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All Statuses</option>
                    <option value="Upcoming">Upcoming</option>
                    <option value="On Going">On Going</option>
                    <option value="Completed">Completed</option>
                    <option value="Payment Received">Payment Received</option>
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
    
        <!-- ================================================================= -->
        <!-- MOBILE VIEW: Interactive Card Layout (Visible on screens < md)    -->
        <!-- ================================================================= -->
        <div id="inventoryCards" class="grid grid-cols-1 gap-4 md:hidden">
            <!-- Data loaded via jQuery AJAX -->
        </div>

        <!-- ================================================================= -->
        <!-- DESKTOP VIEW: Full Data Table (Visible on screens >= md)           -->
        <!-- ================================================================= -->
        <div class="hidden md:block bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
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
    <div id="bookingModal" class="modal fixed inset-0 z-50 flex items-center justify-center p-2 sm:p-4 overflow-y-auto bg-slate-900/60 backdrop-blur-sm">

        <!-- Modal Content Box -->
        <div class="modal-content bg-white rounded-2xl shadow-2xl border border-slate-200 w-full max-w-5xl max-h-[92vh] flex flex-col overflow-hidden my-auto">
            <!-- Sticky Modal Header -->
            <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between bg-white sticky top-0 z-10">
                <div class="flex items-center space-x-3">
                    <div class="bg-emerald-100 text-emerald-700 p-2 rounded-xl">
                        <i class="fa-solid fa-pen-to-square text-base"></i>
                    </div>
                    <div>
                        <h3 id="modalTitle" class="text-base sm:text-lg font-bold text-slate-900"></h3>
                        <p class="text-xs text-slate-500">Update reservation details, vehicle assignment, and financial summaries</p>
                    </div>
                </div>
                <button id="closeModalBtn" class="text-slate-400 hover:text-slate-600 p-2 rounded-xl hover:bg-slate-100 transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Scrollable Form Container -->
             <form id="bookingForm" class="flex-1 overflow-y-auto custom-scrollbar p-4 sm:p-6 space-y-6 bg-slate-50/50">
                
                <input type="hidden" id="booking_id" name="id" value="61">
                <input type="hidden" id="agreement_id" name="agreement_id" value="">
                <input type="hidden" id="paging_id" name="paging_id" value="">

                <!-- 1. Booking Details -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-calendar-days text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">1. Booking Details</h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Order Number</label>
                            <input type="text" name="order_number" value="" readonly="" class="w-full bg-slate-100 border border-slate-200 rounded-lg px-3 py-2 font-medium text-slate-500 cursor-not-allowed outline-none">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Start Date</label>
                            <input type="date" name="tour_start_date" id="tour_start_date" value="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">End Date</label>
                            <input type="date" name="tour_end_date" id="tour_end_date" value="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Tour Days</label>
                            <input type="number" name="tour_days" id="tour_days" value="" readonly="" class="w-full bg-slate-100 border border-slate-200 rounded-lg px-3 py-2 font-bold text-slate-700 cursor-not-allowed outline-none">
                        </div>
                    </div>
                </div>

                <!-- 2. Client Details -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-user text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">2. Client Details</h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Guest &amp; Paging Name</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                <input type="text" name="guest_name" value="" placeholder="Guest Name" required="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                                <input type="text" name="paging_name" placeholder="Paging Name (Optional)" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                            </div>
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Head Count</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" name="adults_count" placeholder="Adults" min="0" value="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                                <input type="number" name="children_count" placeholder="Children" min="0" value="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                            </div>
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Guest Mobile</label>
                            <input type="text" name="guest_mobile" placeholder="+XX XX XXX XXXX" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Guest Email</label>
                            <input type="email" name="guest_email" placeholder="guest@example.com" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                    </div>
                </div>

                <!-- 3. Vehicle Details -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-car-side text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">3. Vehicle Details</h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Vehicle Category</label>
                            <select id="vehicle_model" name="vehicle_model" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none bg-white transition">
                                <option value="">-- Select Vehicle --</option>
                                <option value="Sedan">Sedan</option>
                                <option value="SUV Mini">SUV Mini</option>
                                <option value="SUV New">SUV New</option>
                                <option value="KDH Flat Roof">KDH Flat Roof</option>
                                <option value="KDH High Roof">KDH High Roof</option>
                                <option value="Luxury Van">Luxury Van</option>
                                <option value="Mini Bus">Mini Bus</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Mileage Limit (km)</label>
                            <input id="mileage_limit" type="number" name="mileage_limit" value="" placeholder="0.00" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Extra Mileage Charge (/km)</label>
                            <input id="extra_mileage_charge" type="number" step="0.01" name="extra_mileage_charge" value="" placeholder="0.00" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                    </div>
                </div>

                <!-- 4. Financial & Package Summary -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-receipt text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">4. Financial &amp; Package Summary</h4>
                    </div>
                    
                    <!-- Full Tour Section -->
                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wide">Full Tour Package</label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                            <input id="tour_title" type="text" name="tour_title" placeholder="Title (e.g., 5-Day Private Sedan Rental)" value="" class="sm:col-span-2 border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                            <input id="tour_charge" type="number" step="0.01" name="tour_charge" placeholder="Amount (LKR)" value="" class="border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition font-semibold">
                        </div>
                    </div>

                    <!-- Separate Transfers Section -->
                    <div class="pt-2 space-y-2">
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wide">Separate Transfers</label>
                        <div id="packageSummaryContainer" class="space-y-2">
                            <!-- Dynamic Rows Rendered Here -->
                        </div>
                        <button type="button" class="mt-2 bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-semibold flex items-center space-x-1 transition" id="addPackageRowBtn">
                            <i class="fa-solid fa-plus text-[10px]"></i>
                            <span>Add New Transfer Row</span>
                        </button>
                    </div>
                </div>

                <!-- 4.1 Itinerary -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-3">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-map-location-dot text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">5. Itinerary Details</h4>
                    </div>
                    <textarea name="itinerary" rows="4" placeholder="Day 1: Airport Pickup to Kandy
Day 2: Kandy City Tour..." class="w-full text-xs border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg p-3 text-slate-800 outline-none transition leading-relaxed"></textarea>
                </div>

                <!-- 5. Flight & Schedule Details -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-plane-arrival text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">6. Flight &amp; Schedule Details</h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Pickup From / Flight</label>
                            <input type="text" name="pickup_from" placeholder="e.g. CMB Airport / UL-504" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Pickup Date</label>
                            <input type="date" name="pickup_date" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Arrival Time</label>
                            <input type="time" name="arrival_time" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                    </div>
                </div>

                <!-- 6. Driver Details -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-id-card text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">7. Driver Assignment</h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Driver Name</label>
                            <input id="driver_name" type="text" name="driver_name" list="driver_list" placeholder="Select or type driver..." value="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                            <datalist id="driver_list"></datalist>
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Driver Mobile</label>
                            <input id="driver_mobile" type="text" name="driver_mobile" placeholder="+94 7X XXX XXXX" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition">
                        </div>
                    </div>
                </div>

                <!-- 7. Driver & Extra Financials -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="flex items-center space-x-2 border-b border-slate-100 pb-2">
                        <i class="fa-solid fa-wallet text-emerald-600 text-sm"></i>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-700">8. Financial Breakdown</h4>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Client Advance</label>
                            <input type="number" step="0.01" name="income_advance" value="" placeholder="Amount (LKR)" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition font-semibold">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Driver Charges</label>
                            <input type="number" step="0.01" class="calc-profit w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition" name="driver_charges" placeholder="Amount (LKR)" value="">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Other Expenses</label>
                            <input type="number" step="0.01" class="calc-profit w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition" name="expense_other" placeholder="Amount (LKR)" value="">
                        </div>
                        <div>
                            <label class="block font-medium text-slate-700 mb-1">Driver Advance</label>
                            <input type="number" step="0.01" name="expense_advance" placeholder="Amount (LKR)" value="" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 outline-none transition font-semibold">
                        </div>
                    </div>
                </div>

                <!-- 8. Payment Schedule & Special Notes -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-2">Payment Options</label>
                            <textarea name="payment_options" rows="4" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg p-3 text-slate-800 outline-none transition leading-relaxed">Payment Schedule : (Cash in LKR/USD/EURO/GBP).
* First 50% Payment: Due on the second day of the tour. 
* Final Balance: Due one day before the tour finishes.</textarea>
                        </div>
                        <div>
                            <label class="block font-bold uppercase tracking-wider text-slate-700 mb-2">Special Notes</label>
                            <textarea name="special_notes" rows="4" placeholder="Enter special instructions or notes..." class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg p-3 text-slate-800 outline-none transition leading-relaxed"></textarea>
                        </div>
                    </div>
                </div>

                <!-- 9. Reservation Status -->
                <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200/80 shadow-sm space-y-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">Booking Status</label>
                    <div class="max-w-xs text-xs">
                        <select name="status" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-3 py-2 text-slate-800 font-semibold outline-none bg-white transition">
                            <option value="Upcoming" selected="">Upcoming</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                            <option value="Payment Recieved">Payment Recieved</option>
                        </select>
                    </div>
                </div>

            </form>

            <!-- Sticky Modal Footer -->
             <div class="px-5 py-3.5 border-t border-slate-100 flex items-center justify-end space-x-3 bg-slate-50 sticky bottom-0 z-10">
                <button type="button" id="closeModalBtn2" class="px-4 py-2 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 rounded-xl text-xs font-semibold shadow-sm transition">
                    Cancel
                </button>
                <button type="submit" form="bookingForm" class="bookingForm-submit px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-semibold shadow-md shadow-emerald-200 transition flex items-center space-x-1.5">
                    <i class="fa-solid fa-check text-[10px]"></i>
                    <span>Save Booking</span>
                </button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mobile menu toggle script
            $('#mobileMenuBtn').on('click', function() {
                let menu = $('#mobileMenu');
                let icon = $('#mobileMenuIcon');
                
                menu.toggleClass('hidden');
                
                if (menu.classList.contains('hidden')) {
                    icon.removeClass('fa-xmark');
                    icon.addClass('fa-bars');
                } else {
                    icon.removeClass('fa-bars');
                    icon.addClass('fa-xmark');
                }
            });

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

                const urlParams = new URLSearchParams(window.location.search);console.log(urlParams.get('search'));
                const searchVal = urlParams.get('search') || $('#filter-search').val();
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
                        let cards = '';

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

                            let today = new Date();
                            today.setHours(0, 0, 0, 0);

                            let rowClass = ''; // Default status class

                           // Safely parse transfers if it's a JSON string
                            let transfers = row.transfers;
                            if (typeof transfers === 'string') {
                                try {
                                    transfers = JSON.parse(transfers);
                                } catch (e) {
                                    transfers = [];
                                }
                            }

                            // Now check if it's a non-empty array
                            if (Array.isArray(transfers) && transfers.length > 0) {
                                console.log("Transfers length:", transfers.length);

                                for (let transfer of transfers) {
                                    if (!transfer.date) continue;

                                    let transferDate = new Date(`${transfer.date}T00:00:00`);
                                    let timeDiff = transferDate.getTime() - today.getTime();
                                    let daysUntilTransfer = Math.ceil(timeDiff / (1000 * 3600 * 24));

                                    /*if (today > transferDate) {
                                        rowClass = 'row-completed';
                                    } */
                                    
                                    if (today.getTime() === transferDate.getTime()) {
                                        rowClass = 'row-ongoing';
                                    } else if (daysUntilTransfer > 0 && daysUntilTransfer <= 2) {
                                        rowClass = 'upcoming-soon';
                                    }
                                }
                            }

                            // Parse dates to calculate the difference in days
                            let startDate = new Date(row.tour_start_date);
                            let endDate = new Date(row.tour_end_date);

                            // Strip time components from start and end dates
                            startDate.setHours(0, 0, 0, 0);
                            endDate.setHours(0, 0, 0, 0);

                            let timeDiff = startDate.getTime() - today.getTime();
                            let daysUntilStart = Math.ceil(timeDiff / (1000 * 3600 * 24));

                            if (today > endDate) {
                                // Tour date has already passed
                                rowClass = 'row-completed';
                            } else if (today >= startDate && today <= endDate) {
                                // Currently active / in progress
                                rowClass = 'row-ongoing';
                            } else if (daysUntilStart >= 0 && daysUntilStart <= 2) {
                                // Starting within 2 days
                                rowClass = 'upcoming-soon';
                            }

                            // Check full tour or not
                            let fullTour = parseFloat(row.tour_charge) > 0 ? 'Yes' : 'No';

                            // Build transfer count span dynamically
                            let transferSpan = row.transfers_count > 0 ? `${row.transfers_count}` : '-';

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
                                    <div class="grid grid-cols-2 gap-2">
                                        ${agreement}
                                        <!--a href="https://drive.google.com/file/d/19UX-WLQbKeysj4nbrhjnt5XOoq2FylpI/preview" target="_blank" rel="noopener" download class="px-2 py-0.5 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded transition">Mileage</a>
                                        <a href="https://drive.google.com/file/d/1LBj6PElXf5OhqHPzZ8SjFZ7hGpT_U533/preview" target="_blank" rel="noopener" download="Mileage_Sheet.pdf" class="px-2 py-0.5 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded transition">Shops</a>
                                        <button id="client-links" data-mobile="${row.guest_mobile}" class="mt-2 px-2 py-0.5 bg-green-100 text-green-600 hover:bg-indigo-100 rounded font-medium transition">📲 Send Client Links</button>
                                        <button id="driver-links" data-mobile="${row.driver_mobile}" class="mt-1 px-2 py-0.5 bg-green-100 text-green-600 hover:bg-indigo-100 rounded font-medium transition">📲 Send Driver Links</button-->
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

                            cards += `<!-- Card -->
                                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 hover:border-emerald-300 transition-colors ${rowClass}">
                                    <div class="flex items-start justify-between border-b border-slate-100 pb-3 mb-3">
                                        <div>
                                            <div class="flex items-center space-x-2">
                                                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">
                                                    ${row.order_number || '-'}
                                                </span>
                                                <span class="text-xs">
                                                    ${dropdownHtml}
                                                </span>
                                            </div>
                                            <h3 class="text-base font-bold text-slate-900 mt-2">${row.guest_name}</h3>
                                            <a href="https://wa.me/${row.guest_mobile || '-'}" class="text-xs text-emerald-600 font-medium hover:underline inline-flex items-center mt-0.5">
                                                <i class="fa-solid fa-phone text-[10px] mr-1"></i> ${row.guest_mobile || '-'}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-3 text-xs mb-4">
                                        <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                                            <span class="text-slate-400 block font-medium mb-1"><i class="fa-regular fa-calendar-check mr-1 text-slate-500"></i> Schedule</span>
                                            <span class="font-semibold text-slate-700 block">${formattedRange || '-'}</span>
                                            <span class="text-slate-500 text-[11px]">${row.tour_days} Days</span>
                                        </div>
                                        <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                                            <span class="text-slate-400 block font-medium mb-1"><i class="fa-solid fa-car-side mr-1 text-slate-500"></i> Vehicle</span>
                                            <span class="font-semibold text-slate-700 block">${row.vehicle_model || '-'}</span>
                                            ${
                                                row.driver_name 
                                                ? `<span class="text-emerald-600 font-medium text-[11px]"><i class="fa-solid fa-user-check mr-1"></i>${row.driver_name}</span>`
                                                : `<span class="text-amber-600 font-medium text-[11px]"><i class="fa-solid fa-triangle-exclamation mr-1"></i>Unassigned</span>`
                                            }
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between pt-2 border-t border-slate-100">
                                        <div>
                                            <span class="text-[11px] text-slate-400 block uppercase tracking-wider font-medium">Total Charge</span>
                                            <span class="text-base font-black text-slate-900">LKR ${parseFloat(row.tour_charge).toLocaleString()}</span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="p-2 text-slate-600 hover:bg-slate-100 rounded-lg transition edit-btn" data-booking='${rowJson}'>
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="toggle-details-btn px-3 py-1.5 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 rounded-lg text-xs font-semibold transition flex items-center space-x-1">
                                                <span>Details</span>
                                                <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-200"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Slide Toggle Details Panel -->
                                    <div class="details-panel hidden mt-4 pt-4 border-t border-slate-100 space-y-3 text-xs">
                                        <!-- Client Advance -->
                                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                            <div class="flex justify-between items-center mb-1">
                                                <span class="font-bold text-slate-700"><i class="fa-solid fa-wallet text-emerald-600 mr-1.5"></i>Client Advance</span>
                                                <span class="font-bold text-slate-900">${parseFloat(row.income_advance).toLocaleString() || '-'}</span>
                                            </div>
                                        </div>

                                        <!-- Driver Advance -->
                                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                            <div class="flex justify-between items-center mb-1">
                                                <span class="font-bold text-slate-700"><i class="fa-solid fa-hand-holding-dollar text-emerald-600 mr-1.5"></i>Driver Advance</span>
                                                <span class="font-bold text-slate-900">${parseFloat(row.expense_advance).toLocaleString() || '-'}</span>
                                            </div>
                                        </div>
                                        <!-- Documents -->
                                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                            <span class="font-bold text-slate-700 block mb-2"><i class="fa-solid fa-folder-open text-emerald-600 mr-1.5"></i>Documents</span>
                                            <div class="grid grid-cols-2 gap-2">
                                                ${agreement}
                                                <a href="https://drive.google.com/file/d/19UX-WLQbKeysj4nbrhjnt5XOoq2FylpI/preview" target="_blank" rel="noopener" download class="bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between">
                                                <span class="text-slate-600 text-[11px] truncate"><i class="fa-solid fa-file-csv text-emerald-500 mr-1"></i>Mileage</span>
                                                <button class="text-emerald-600 text-[11px]"><i class="fa-solid fa-download"></i></button>
                                                </a>
                                                <a href="https://drive.google.com/file/d/1LBj6PElXf5OhqHPzZ8SjFZ7hGpT_U533/preview" target="_blank" rel="noopener" download="Mileage_Sheet.pdf" class="bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between">
                                                <span class="text-slate-600 text-[11px] truncate"><i class="fa-solid fa-store text-amber-500 mr-1"></i>Shops</span>
                                                <button class="text-emerald-600 text-[11px]"><i class="fa-solid fa-download"></i></button>
                                                </a>
                                                <button id="client-links" data-mobile="${row.guest_mobile}" class="bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between" fdprocessedid="gn1aj"><span class="text-slate-600 text-[11px] truncate">📲 Send Client Links</span></button>
                                                <button id="driver-links" data-mobile="${row.driver_mobile}" class="bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between" fdprocessedid="gn1aj"><span class="text-slate-600 text-[11px] truncate">📲 Send Driver Links</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                        });

                        $('#inventoryCards').html(cards);
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
                                $('#filter-vehicle').append(new Option(key, key));
                            });
                        }

                        let filterVehicleOptionCount = $('#filter-vehicle option').length;
                        if(filterVehicleOptionCount == 1){
                            // Populate Vehicle Dropdown
                            $.each(vehicleData, function(key, val) {
                                $('#filter-vehicle').append(new Option(key, key));
                            });
                        }
                    } else {
                        alert('Error loading XML data');
                    }
                }
            });

            // 1. Add Dynamic Financial Package Row
            function addPackageRow(date = '', title = '', details = '', amount = '') {
                let html = `<div class="form-group package-row grid grid-cols-1 sm:grid-cols-12 gap-2 text-xs items-center bg-slate-50/80 p-2.5 rounded-lg border border-slate-200">
                        <div class="sm:col-span-2">
                            <input type="date" name="drop_date[]" value="${date}" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-2.5 py-1.5 text-slate-800 outline-none bg-white transition">
                        </div>
                        <div class="sm:col-span-3">
                            <input type="text" name="drop_title[]" placeholder="Title (e.g., Airport to Kandy )" value="${title}" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-2.5 py-1.5 text-slate-800 outline-none bg-white transition">
                        </div>
                        <div class="sm:col-span-4">
                            <input type="text" name="drop_details[]" placeholder="Details" value="${details}" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-2.5 py-1.5 text-slate-800 outline-none bg-white transition">
                        </div>
                        <div class="sm:col-span-2">
                            <input type="number" step="0.01" name="drop_charge[]" placeholder="Amount" value="${amount}" class="w-full border border-slate-300 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 rounded-lg px-2.5 py-1.5 text-slate-800 outline-none bg-white font-semibold transition">
                        </div>
                        <div class="sm:col-span-1 flex justify-end">
                            <button type="button" class="btn-remove-row text-red-500 hover:text-white hover:bg-red-500 w-7 h-7 rounded-lg transition duration-150 flex items-center justify-center font-bold text-base leading-none">×</button>
                        </div>
                    </div>`;
                $('#packageSummaryContainer').append(html);
            }

            // Add initial row on open
            $('#addPackageRowBtn').click(function() { addPackageRow(); });

            // Remove row event
            $(document).on('click', '.btn-remove-row', function() {
                $(this).closest('.package-row').remove();
            });

            $(document).on('click', '.toggle-details-btn', function() {
                // Find nearest details panel (works for both mobile cards and table rows)
                let panel = $(this).closest('.bg-white, tr').next('.details-panel');
                
                if (panel.length === 0) {
                    panel = $(this).closest('.bg-white').find('.details-panel');
                }

                // Toggle visibility with slide animation
                panel.slideToggle(200);

                // Rotate chevron icon
                const icon = $(this).find('.fa-chevron-down');
                icon.toggleClass('rotate-180');
            });

            // Modal Controls
            $('#openModalBtn').click(function() { $('#bookingForm')[0].reset(); $('#bookingModal').show(); });
            $('#closeModalBtn, #closeModalBtn2').click(function() { $('#bookingModal').hide(); });

            // Form Submit via AJAX
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();

                let submitButton = $('.bookingForm-submit');
                submitButton.disabled = true;
                submitButton.find('span').text('Generating Documents...');

                // Prevent duplicate submissions
                if (submitButton.prop('disabled')) {
                    return false;
                }

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
                    
                    let links = `<a id="agreement-doc" href="${data.docUrl}" target="_blank" rel="noopener" class="agreement-doc bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between"><span class="text-slate-600 text-[11px] truncate"><i class="fa-solid fa-file-pdf text-red-500 mr-1"></i>Agreement</span><button class="text-emerald-600 text-[11px]" fdprocessedid="g9kb1"><i class="fa-solid fa-download"></i></button></a><a id="agreement-pdf" data-docid="${data.agreement_file_id}" href="${data.pdfUrl}" target="_blank" rel="noopener" class="bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between"><span class="text-slate-600 text-[11px] truncate"><i class="fa-solid fa-file-pdf text-red-500 mr-1"></i>Agreement</span><button class="text-emerald-600 text-[11px]" fdprocessedid="4ggpl"><i class="fa-solid fa-download"></i></button></a> <a id="paging-pdf" data-docid="${data.paging_file_id}" href="${data.pagingUrl}" target="_blank" rel="noopener" class="bg-white p-2 rounded-lg border border-slate-200 flex items-center justify-between"><span class="text-slate-600 text-[11px] truncate"><i class="fa-solid fa-file-image text-blue-500 mr-1"></i>Paging</span><button class="text-emerald-600 text-[11px]" fdprocessedid="4ggpl"><i class="fa-solid fa-download"></i></button></a>`;

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

                $('.bookingForm-submit').find('span').text('Save Booking');

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
                $('#packageSummaryContainer .package-row').remove();
                $('.bookingForm-submit').find('span').text('Save Booking');
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

            $(document).on('change', '#driver_name', function(e) {
                let vehicle = $('#vehicle_model').val();
                let driver = $(this).val();
                
                $.each(vehicleData[vehicle].drivers, function(key, val) {
                    if(val.name == driver){
                        $('#driver_mobile').val(val.mobile);
                    }
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
                let agreement = $(this).siblings('#agreement-pdf').attr('href');
                let paging = $(this).siblings('#paging-pdf').attr('href');
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