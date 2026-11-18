<?php
    require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceylon Travel Lanka - Tour Schedule Calendar</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    #tourModal {
      margin-top: 0 !important;
    }
    .calendar-grid {
      grid-template-columns: repeat(7, minmax(0, 1fr));
    }
    .day-cell {
      min-height: 135px;
    }
    .tour-item.with-border {
      outline: 2px solid #ef4444;
      outline-offset: -2px;
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

        <a href="<?= BASE_URL ?>admin/calculator" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-calculator text-lg w-5"></i>
          <span class="sidebar-text">Calculator</span>
        </a>
        
        <a href="<?= BASE_URL ?>admin/" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-list-check text-lg w-5"></i>
          <span class="sidebar-text">Bookings List</span>
        </a>

        <a href="<?= BASE_URL ?>admin/calendar" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg bg-indigo-600 text-white transition">
          <i class="fa-regular fa-calendar-days text-lg w-5"></i>
          <span class="sidebar-text">Tour Calendar</span>
        </a>

        <a href="<?= BASE_URL ?>admin/dashboard" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-chart-line text-lg w-5"></i>
          <span class="sidebar-text">Analytics & Reports</span>
        </a>

        <div class="px-3 py-2 mt-4 text-[11px] font-semibold text-slate-500 uppercase tracking-wider sidebar-text">Accounting</div>

        <a href="<?= BASE_URL ?>admin/cashbook" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-wallet text-lg w-5"></i>
          <span class="sidebar-text">Cash Book</span>
        </a>

        <div class="px-3 py-2 mt-4 text-[11px] font-semibold text-slate-500 uppercase tracking-wider sidebar-text">Management</div>

        <a href="#" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-car-side text-lg w-5"></i>
          <span class="sidebar-text">Fleet & Drivers</span>
        </a>

        <a href="<?= BASE_URL ?>admin/invoice" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white transition">
          <i class="fa-solid fa-file-invoice-dollar text-lg w-5"></i>
          <span class="sidebar-text">Invoices</span>
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
            <h2 class="text-sm sm:text-base font-bold text-slate-800 leading-tight">Operations Schedule</h2>
            <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">Visual daily calendar for driver assignments and active itineraries</p>
          </div>
        </div>

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
    <main class="p-4 sm:p-6 max-w-7xl w-full mx-auto space-y-5">
      
      <!-- Top Title & Navigation Bar (Desktop style) -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <h1 class="text-2xl font-bold text-slate-900">Tour Calendar</h1>
          <p class="text-xs sm:text-sm text-slate-500 mt-0.5">View all upcoming and ongoing tours and transfers.</p>
        </div>

        <div class="flex items-center gap-2 self-start sm:self-auto">
          <button id="prevBtn" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs sm:text-sm font-medium text-slate-700 shadow-sm transition">
            &#8592; Prev
          </button>
          <button id="todayBtn" class="px-3.5 py-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg text-xs sm:text-sm font-semibold transition">
            Today
          </button>
          <button id="nextBtn" class="px-3.5 py-2 bg-white hover:bg-slate-50 border border-slate-200 rounded-lg text-xs sm:text-sm font-medium text-slate-700 shadow-sm transition">
            Next &#8594;
          </button>
        </div>
      </div>

      <!-- Calendar Card Wrapper -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        
        <!-- Month & Year Title -->
        <div class="px-5 sm:px-6 pt-5 sm:pt-6 pb-4">
          <h2 id="calendarMonthYear" class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight"></h2>
        </div>

        <!-- Legend Bar -->
        <div class="flex flex-wrap items-center gap-x-6 gap-y-2.5 px-5 sm:px-6 pb-4 border-b border-slate-200 text-xs font-medium text-slate-600">
          <div class="flex items-center gap-2">
            <span class="w-3.5 h-3.5 rounded bg-emerald-500 inline-block"></span>
            <span>Multi Day</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="w-3.5 h-3.5 rounded bg-purple-500 inline-block"></span>
            <span>Single Day</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="w-3.5 h-3.5 rounded bg-rose-500 inline-block"></span>
            <span>End Day</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="w-3.5 h-3.5 rounded bg-amber-400 inline-block"></span>
            <span>Transfer</span>
          </div>
        </div>

        <!-- ================= DESKTOP VIEW (7-Column Monthly Grid) ================= -->
        <div class="hidden md:block">
          <!-- Days of Week Header -->
          <div class="grid calendar-grid bg-slate-50/80 border-b border-slate-200 text-center text-xs font-semibold uppercase text-slate-500 tracking-wider py-3">
            <div>SUN</div>
            <div>MON</div>
            <div>TUE</div>
            <div>WED</div>
            <div>THU</div>
            <div>FRI</div>
            <div>SAT</div>
          </div>

          <!-- Calendar Grid Body -->
          <div id="desktopCalendarGrid" class="grid calendar-grid bg-white divide-x divide-y divide-slate-200">
            <!-- Generated via jQuery -->
          </div>
        </div>

        <!-- ================= MOBILE VIEW (Vertical Daily Agenda) ================= -->
        <div id="mobileCalendarList" class="md:hidden divide-y divide-slate-100">
          <!-- Generated via jQuery -->
        </div>

      </div>
    </main>

    <!-- Tour Detail Modal -->
    <div id="tourModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden flex items-center justify-center p-4 z-50">
      <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-6">
        <div class="flex justify-between items-start border-b border-slate-100 pb-3">
          <div>
            <h3 id="modalTitle" class="text-lg font-bold text-slate-800">Tour Details</h3>
            <span id="modalType" class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded"></span>
          </div>
          <button id="closeModal" class="text-slate-400 hover:text-slate-600 font-bold text-xl">&times;</button>
        </div>
        
        <div class="mt-4 space-y-2 text-sm text-slate-600">
          <p><strong>Order:</strong> <a href="#" class="text-indigo-600 hover:underline font-medium"><span id="modalRef"></span></a></p>
          <p><strong>Guest Name:</strong> <span id="modalGuest"></span></p>
          <p><strong>Contact:</strong> <span id="modalContact"></span></p>
          <p><strong>Driver:</strong> <span id="modalDriver"></span></p>
          <p><strong>Driver Mobile:</strong> <span id="modalDriverContact"></span></p>
          <p><strong>Dates:</strong> <span id="modalDates"></span></p>
          <div class="notes"></div>
        </div>

        <div class="mt-6 text-right">
          <button id="closeModalBtn" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">Close</button>
        </div>
      </div>
    </div>
  </div>
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

      let currentDate = new Date();
      let tourEvents = [];

      function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();

        // Header Title
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $('#calendarMonthYear').text(`${monthNames[month]} ${year}`);

        // Fetch Tours for current Month/Year
        $.ajax({
          url: 'get_tours',
          type: 'GET',
          data: { month: month + 1, year: year },
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              tourEvents = response.data;
              buildDesktopGrid(year, month);
              buildMobileAgenda(year, month);
            }
          }
        });
      }

      // Reusable card builder (bracketed label on desktop, plain label on mobile)
      function createEventCardHtml(tour, typeKey, titleText, transferDate = '') {
        const guestName = tour.guest_name || 'Guest';
        const orderNo = tour.order_number || tour.booking_ref || '';
        const noteBorderClass = tour.special_notes ? 'with-border' : '';

        const styles = {
          'Multi Day': {
            wrapper: 'bg-emerald-50 border-l-4 border-emerald-500 hover:bg-emerald-100/80',
            typeText: 'text-emerald-700',
            guestText: 'text-emerald-950',
            subText: 'text-emerald-700',
            orderText: 'text-emerald-600',
            modalType: 'Multi-Day Tour'
          },
          'Single Day': {
            wrapper: 'bg-purple-50 border-l-4 border-purple-500 hover:bg-purple-100/80',
            typeText: 'text-purple-700',
            guestText: 'text-purple-950',
            subText: 'text-purple-700',
            orderText: 'text-purple-600',
            modalType: 'Single-Day Tour'
          },
          'End Day': {
            wrapper: 'bg-rose-50 border-l-4 border-rose-500 hover:bg-rose-100/80',
            typeText: 'text-rose-700',
            guestText: 'text-rose-950',
            subText: 'text-rose-700',
            orderText: 'text-rose-600',
            modalType: 'Tour End'
          },
          'Transfer': {
            wrapper: 'bg-amber-50 border-l-4 border-amber-400 hover:bg-amber-100/80',
            typeText: 'text-amber-800',
            guestText: 'text-amber-950',
            subText: 'text-amber-800',
            orderText: 'text-amber-700',
            modalType: 'Transfer'
          }
        };

        const s = styles[typeKey];
        const transferAttrs = typeKey === 'Transfer' 
          ? `data-transfer-title="${titleText}" data-transfer-date="${transferDate}"` 
          : '';

        return `
          <div class="tour-item rounded-lg md:rounded-md p-3 md:p-2 cursor-pointer transition ${s.wrapper} ${noteBorderClass}"
               data-id="${tour.id}"
               data-event-type="${s.modalType}"
               ${transferAttrs}>
            <div class="text-xs md:text-[11px] font-bold ${s.typeText}">
              <span class="hidden md:inline">[${typeKey}]</span>
              <span class="md:hidden">${typeKey}</span>
            </div>
            <div class="text-sm md:text-xs font-bold ${s.guestText} mt-0.5 truncate">${guestName}</div>
            <div class="text-xs md:text-[11px] font-medium ${s.subText} mt-0.5 truncate">${titleText}</div>
            ${orderNo ? `<div class="text-xs md:text-[11px] ${s.orderText} mt-0.5 truncate">${orderNo}</div>` : ''}
          </div>
        `;
      }

      // ================= 1. BUILD DESKTOP 7-COLUMN GRID =================
      function buildDesktopGrid(year, month) {
        const grid = $('#desktopCalendarGrid');
        grid.empty();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const today = new Date();

        // Blank leading cells
        for (let i = 0; i < firstDay; i++) {
          grid.append('<div class="day-cell bg-slate-50/40 p-2"></div>');
        }

        // Day Cells
        for (let day = 1; day <= daysInMonth; day++) {
          const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          const isToday = today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;

          grid.append(`
            <div class="day-cell p-2 transition hover:bg-slate-50/70 ${isToday ? 'bg-indigo-50/40' : ''}">
              <div class="text-right mb-1.5">
                <span class="inline-flex items-center justify-center text-xs font-semibold ${isToday ? 'w-6 h-6 bg-indigo-600 text-white rounded-full' : 'text-slate-600 px-1'}">${day}</span>
              </div>
              <div class="space-y-1.5 desktop-event-container" data-date="${dateStr}"></div>
            </div>
          `);
        }

        // Trailing blank cells to complete the final week row cleanly
        const totalCells = firstDay + daysInMonth;
        const remainder = totalCells % 7;
        if (remainder > 0) {
          for (let i = 0; i < 7 - remainder; i++) {
            grid.append('<div class="day-cell bg-slate-50/40 p-2"></div>');
          }
        }

        // Populate Desktop Event Cards
        tourEvents.forEach(function(tour) {
          const isMultiDay = tour.tour_start_date && tour.tour_end_date && (tour.tour_start_date !== tour.tour_end_date);
          const tourTitle = tour.tour_title || 'Private Tour';

          if (tour.tour_start_date) {
            const typeKey = isMultiDay ? 'Multi Day' : 'Single Day';
            $(`.desktop-event-container[data-date="${tour.tour_start_date}"]`).append(
              createEventCardHtml(tour, typeKey, tourTitle)
            );
          }

          if (tour.transfers && Array.isArray(tour.transfers)) {
            tour.transfers.forEach(function(transfer) {
              if (transfer.date) {
                const trTitle = transfer.title || transfer.transfer_title || 'Transfer';
                $(`.desktop-event-container[data-date="${transfer.date}"]`).append(
                  createEventCardHtml(tour, 'Transfer', trTitle, transfer.date)
                );
              }
            });
          }

          if (isMultiDay && tour.tour_end_date) {
            $(`.desktop-event-container[data-date="${tour.tour_end_date}"]`).append(
              createEventCardHtml(tour, 'End Day', tourTitle)
            );
          }
        });
      }

      // ================= 2. BUILD MOBILE VERTICAL AGENDA =================
      function buildMobileAgenda(year, month) {
        const listContainer = $('#mobileCalendarList');
        listContainer.empty();

        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const today = new Date();
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const fullDayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const shortDayNames = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];

        for (let day = 1; day <= daysInMonth; day++) {
          const cellDate = new Date(year, month, day);
          const dayOfWeek = cellDate.getDay();
          const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          const paddedDay = String(day).padStart(2, '0');
          const isToday = today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;

          const badgeClasses = isToday ? 'bg-indigo-600 text-white shadow-sm' : 'bg-slate-100 text-slate-700';
          const subTextClasses = isToday ? 'text-indigo-200' : 'text-slate-400';

          listContainer.append(`
            <div class="p-4 sm:p-5 transition ${isToday ? 'bg-indigo-50/30' : ''}">
              <div class="flex items-center gap-3.5">
                <div class="w-12 py-1.5 rounded-xl flex flex-col items-center justify-center shrink-0 ${badgeClasses}">
                  <span class="text-base font-bold leading-none">${paddedDay}</span>
                  <span class="text-[10px] font-semibold tracking-wider mt-1 ${subTextClasses}">${shortDayNames[dayOfWeek]}</span>
                </div>
                <div>
                  <h3 class="text-sm font-semibold text-slate-800">${fullDayNames[dayOfWeek]}, ${paddedDay} ${monthNames[month]}</h3>
                  ${isToday ? '<span class="text-xs font-semibold text-indigo-600 block mt-0.5">Today</span>' : ''}
                </div>
              </div>

              <div class="mt-3 space-y-2.5 mobile-event-container" data-date="${dateStr}">
                <p class="no-bookings-msg text-xs text-slate-400 pt-1">No bookings</p>
              </div>
            </div>
          `);
        }

        function appendMobileCard(dateStr, cardHtml) {
          const container = $(`.mobile-event-container[data-date="${dateStr}"]`);
          if (container.length) {
            container.find('.no-bookings-msg').remove();
            container.append(cardHtml);
          }
        }

        tourEvents.forEach(function(tour) {
          const isMultiDay = tour.tour_start_date && tour.tour_end_date && (tour.tour_start_date !== tour.tour_end_date);
          const tourTitle = tour.tour_title || 'Private Tour';

          if (tour.tour_start_date) {
            const typeKey = isMultiDay ? 'Multi Day' : 'Single Day';
            appendMobileCard(tour.tour_start_date, createEventCardHtml(tour, typeKey, tourTitle));
          }

          if (tour.transfers && Array.isArray(tour.transfers)) {
            tour.transfers.forEach(function(transfer) {
              if (transfer.date) {
                const trTitle = transfer.title || transfer.transfer_title || 'Transfer';
                appendMobileCard(transfer.date, createEventCardHtml(tour, 'Transfer', trTitle, transfer.date));
              }
            });
          }

          if (isMultiDay && tour.tour_end_date) {
            appendMobileCard(tour.tour_end_date, createEventCardHtml(tour, 'End Day', tourTitle));
          }
        });
      }

      // Month Navigation Controls
      $('#prevBtn').click(function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
      });

      $('#nextBtn').click(function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
      });

      $('#todayBtn').click(function() {
        currentDate = new Date();
        renderCalendar(currentDate);
      });

      // Event Click Handler - Show Detail Modal
      $(document).on('click', '.tour-item', function() {
        const tourId = $(this).data('id');
        const eventType = $(this).data('event-type'); 
        const transferTitle = $(this).data('transfer-title');
        const transferDate = $(this).data('transfer-date');
        
        const tour = tourEvents.find(t => t.id == tourId);

        if (tour) {
          const isMultiDay = tour.tour_start_date && tour.tour_end_date && (tour.tour_start_date !== tour.tour_end_date);

          if (eventType === 'Transfer' && transferTitle) {
            $('#modalTitle').text(transferTitle);
          } else {
            $('#modalTitle').text(tour.tour_title || 'Tour Details');
          }

          const link = `<?= BASE_URL ?>admin/?search=${encodeURIComponent(tour.order_number || '')}`;

          $('#modalRef').parent('a').attr('href', link);
          $('#modalRef').text(tour.order_number || tour.booking_ref || '-');
          $('#modalType').text(eventType || (isMultiDay ? 'Multi-Day Tour' : 'Single-Day Tour'));
          $('#modalGuest').text(tour.guest_name || '-');
          
          // Contact Info Fallback: Email -> Mobile (with WhatsApp link)
          let email = tour.guest_email || tour.email || '';
          let mobile = tour.guest_mobile || tour.mobile || tour.guest_phone || tour.phone || '';

          let contactHtml = '-';
          if (mobile && mobile.trim() !== '') {
            let cleanPhone = mobile.replace(/[^0-9]/g, '');
            contactHtml = `
              <a href="https://wa.me/${cleanPhone}" target="_blank" rel="noopener" class="inline-flex items-center text-emerald-600 hover:underline font-medium">
                ${mobile} 
                <span class="ml-1 text-xs bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-semibold">WhatsApp</span>
              </a>`;
          } else if (email && email.trim() !== '') {
            contactHtml = `<a href="mailto:${email}" class="text-indigo-600 hover:underline">${email}</a>`;
          }
          $('#modalContact').html(contactHtml);

          $('#modalDriver').text(tour.driver_name || 'Unassigned');
          
          let drivermobile = tour.driver_mobile || '';
          let driverContactHtml = '-';
          if (drivermobile && drivermobile.trim() !== '') {
            let cleanDriverPhone = drivermobile.replace(/[^0-9]/g, '');
            driverContactHtml = `
              <a href="https://wa.me/${cleanDriverPhone}" target="_blank" rel="noopener" class="inline-flex items-center text-emerald-600 hover:underline font-medium">
                ${drivermobile} 
                <span class="ml-1 text-xs bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded font-semibold">WhatsApp</span>
              </a>`;
          }
          $('#modalDriverContact').html(driverContactHtml);

          // Set display date
          if (eventType === 'Transfer' && transferDate) {
            $('#modalDates').text(transferDate);
          } else {
            $('#modalDates').text(`${tour.tour_start_date}${isMultiDay ? ' to ' + tour.tour_end_date : ''}`);
          }

          if (tour.special_notes) {
            $('.notes').html(`
              <div style="background-color: #FEF3C7; border-left: 4px solid #F59E0B; padding: 12px; border-radius: 6px; margin-top: 14px;">
                <div style="font-weight: 600; color: #92400E; font-size: 13px; display: flex; align-items: center; gap: 6px;">
                  ⚠️ Special Notes:
                </div>
                <div style="color: #78350F; font-size: 13px; margin-top: 4px;">${tour.special_notes}</div>
              </div>
            `);
          } else {
            $('.notes').html('');
          }

          $('#tourModal').removeClass('hidden');
        }
      });

      // Close Modal
      $('#closeModal, #closeModalBtn').click(function() {
        $('#tourModal').addClass('hidden');
      });

      // Initial Render
      renderCalendar(currentDate);
    });
  </script>

</body>
</html>