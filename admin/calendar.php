<?php
    require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tour Schedule Calendar - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .calendar-grid {
      grid-template-columns: repeat(7, minmax(0, 1fr));
    }
    .day-cell {
      min-height: 110px;
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
            <a href="<?= BASE_URL ?>admin/" class="px-3.5 py-2 text-sm font-semibold rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                Bookings List
            </a>
            <!-- Tour Calendar Link -->
            <a href="<?= BASE_URL ?>admin/calendar" class="px-3.5 py-2 text-sm font-semibold rounded-lg bg-indigo-50 text-indigo-600 transition">
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
            <a href="<?= BASE_URL ?>admin/" class="block px-3 py-2 text-sm font-semibold rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
            Bookings List
            </a>
            <a href="<?= BASE_URL ?>admin/calendar" class="block px-3 py-2 text-sm font-semibold rounded-lg bg-indigo-50 text-indigo-600">
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
 
  <script>
    $(document).ready(function() {

      // Mobile menu toggle script
      $('#mobileMenuBtn').on('click', function() {
          let menu = $('#mobileMenu');
          let icon = $('#mobileMenuIcon');
          
          menu.toggleClass('hidden');
          
          if (menu.hasClass('hidden')) {
            icon.removeClass('fa-xmark').addClass('fa-bars');
          } else {
            icon.removeClass('fa-bars').addClass('fa-xmark');
          }
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