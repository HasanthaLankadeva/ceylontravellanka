<?php
    require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Executive Analytics & Business Intelligence - Tour Schedule Calendar</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    #tourModal{
      margin-top: 0 !important;
    }
    .calendar-grid {
      grid-template-columns: repeat(7, minmax(0, 1fr));
    }
    .day-cell {
      min-height: 110px;
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
      <div class="max-w-7xl mx-auto p-6">
        
        <!-- Calendar Header Controls -->
        <div class="flex flex-col sm:flex-row items-center justify-between bg-white p-4 rounded-t-xl border-b border-slate-200 shadow-sm gap-4">
          <div class="flex items-center space-x-4">
            <h2 id="calendarMonthYear" class="text-xl font-bold text-slate-800"></h2>
            <button id="todayBtn" class="px-3 py-1 text-sm bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition">Today</button>
          </div>

          <div class="flex items-center space-x-2">
            <button id="prevBtn" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 rounded-lg text-slate-700 transition">
              &#8592; Prev
            </button>
            <button id="nextBtn" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 rounded-lg text-slate-700 transition">
              Next &#8594;
            </button>
          </div>
        </div>

        <!-- Days of Week Header -->
        <div class="grid calendar-grid bg-slate-100 border-x border-slate-200 text-center text-xs font-semibold uppercase text-slate-500 tracking-wider py-2">
          <div>Sun</div>
          <div>Mon</div>
          <div>Tue</div>
          <div>Wed</div>
          <div>Thu</div>
          <div>Fri</div>
          <div>Sat</div>
        </div>

        <!-- Calendar Grid Body -->
        <div id="calendarGrid" class="grid calendar-grid bg-white border border-slate-200 rounded-b-xl shadow-sm divide-x divide-y divide-slate-200">
          <!-- Generated via jQuery -->
        </div>
      </div>

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
            <p><strong>Order:</strong> <a href="#"><span id="modalRef"></span></a></p>
            <p><strong>Guest Name:</strong> <span id="modalGuest"></span></p>
            <p><strong>Contact:</strong> <span id="modalContact"></span></p>
            <p><strong>Driver:</strong> <span id="modalDriver"></span></p>
            <p><strong>Dates:</strong> <span id="modalDates"></span></p>
          </div>

          <div class="mt-6 text-right">
            <button id="closeModalBtn" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">Close</button>
          </div>
        </div>
      </div>
    </main>
 
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
              buildGrid(year, month);
            }
          }
        });
      }

      function buildGrid(year, month) {
        const grid = $('#calendarGrid');
        grid.empty();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const today = new Date();

        // 1. Render Blank leading cells
        for (let i = 0; i < firstDay; i++) {
          grid.append('<div class="day-cell bg-slate-50/50 p-2"></div>');
        }

        // 2. Render Day Cells
        for (let day = 1; day <= daysInMonth; day++) {
          const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          const isToday = today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;

          let cellHtml = `
            <div class="day-cell p-2 transition hover:bg-slate-50 ${isToday ? 'bg-indigo-50/40' : ''}">
              <div class="text-right">
                <span class="text-xs font-semibold ${isToday ? 'bg-indigo-600 text-white px-2 py-0.5 rounded-full' : 'text-slate-500'}">${day}</span>
              </div>
              <div class="mt-1 space-y-1 event-container" data-date="${dateStr}"></div>
            </div>
          `;
          grid.append(cellHtml);
        }

        // 3. Render Badges with Transfer Details attached
        tourEvents.forEach(function(tour) {
          const isMultiDay = tour.tour_start_date && tour.tour_end_date && (tour.tour_start_date !== tour.tour_end_date);
          const tourTypeLabel = isMultiDay ? 'Multi-Day' : 'Single-Day';

          // A. Start Date Badge (Indigo)
          if (tour.tour_start_date) {
            $(`.event-container[data-date="${tour.tour_start_date}"]`).append(`
              <div class="tour-item truncate px-2 py-1 text-xs font-medium rounded bg-indigo-100 text-indigo-700 hover:bg-indigo-200 cursor-pointer transition" 
                   data-id="${tour.id}" 
                   data-event-type="${isMultiDay ? 'Multi-Day Tour' : 'Single-Day Tour'}">
                <span class="font-bold">[${tourTypeLabel}]</span> ${tour.guest_name || tour.order_number}
              </div>
            `);
          }

          // B. Transfer Date Badges (Sky Blue)
          if (tour.transfers && Array.isArray(tour.transfers)) {
            tour.transfers.forEach(function(transfer) {
              if (transfer.date) {
                $(`.event-container[data-date="${transfer.date}"]`).append(`
                  <div class="tour-item truncate px-2 py-1 text-xs font-medium rounded bg-sky-100 text-sky-700 hover:bg-sky-200 cursor-pointer transition" 
                       data-id="${tour.id}" 
                       data-event-type="Transfer" 
                       data-transfer-title="${transfer.title || transfer.transfer_title || 'Transfer'}"
                       data-transfer-date="${transfer.date}">
                    <span class="font-bold">[Transfer]</span> ${transfer.title || transfer.transfer_title || tour.guest_name || 'Transfer'}
                  </div>
                `);
              }
            });
          }

          // C. End Date Badge (Amber / Multi-Day Only)
          if (isMultiDay && tour.tour_end_date) {
            $(`.event-container[data-date="${tour.tour_end_date}"]`).append(`
              <div class="tour-item truncate px-2 py-1 text-xs font-medium rounded bg-amber-100 text-amber-700 hover:bg-amber-200 cursor-pointer transition" 
                   data-id="${tour.id}" 
                   data-event-type="Tour End">
                <span class="font-bold">[End Tour]</span> ${tour.guest_name || tour.order_number}
              </div>
            `);
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

          // 1. Show transfer title if clicked on a transfer badge, otherwise fallback to tour title
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
          
          // 2. Contact Info Fallback: Email -> Mobile (with WhatsApp link)
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

          // 3. Set display date (transfer date if transfer badge clicked, else tour date range)
          if (eventType === 'Transfer' && transferDate) {
            $('#modalDates').text(transferDate);
          } else {
            $('#modalDates').text(`${tour.tour_start_date}${isMultiDay ? ' to ' + tour.tour_end_date : ''}`);
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