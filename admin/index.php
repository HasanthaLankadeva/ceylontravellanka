<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tour Inventory Management System</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f4f6f9; font-size: 13px; }
        h2 { color: #1e3a8a; }
        .table-container { overflow-x: auto; background: #fff; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; min-width: 1400px; }
        th, td { padding: 8px 10px; border: 1px solid #d1d5db; text-align: left; }
        th { background-color: #1e3a8a; color: #fff; font-weight: 600; text-transform: uppercase; font-size: 11px; }
        tr:nth-child(even) { background-color: #f9fafb; }
        /* Status Badge Styles */
        .badge { padding: 5px 10px; border-radius: 12px; font-weight: 600; font-size: 11px; display: inline-block; }

        .badge-payment-recieved { background-color: #116b43; color: #ffffff; }
        .badge-completed        { background-color: #d1f2be; color: #1e5e22; }
        .badge-ongoing          { background-color: #fde68a; color: #854d0e; }
        .badge-upcoming         { background-color: #bae6fd; color: #0369a1; }
        .btn { padding: 6px 12px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        .btn-add { margin-bottom: 15px; background: #16a34a; font-weight: bold; }
        
        /* Modal */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-content { background: #fff; width: 70%; margin: 3% auto; padding: 20px; border-radius: 8px; max-height: 85vh; overflow-y: auto; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
        .form-group { display: flex; flex-direction: column; }
        .form-group label { font-weight: bold; margin-bottom: 3px; font-size: 11px; }
        .form-group input, .form-group select { padding: 6px; border: 1px solid #ccc; border-radius: 4px; }
    </style>
</head>
<body>

    <h2>Tour Inventory Dashboard</h2>
    <button class="btn btn-add" id="openModalBtn">+ Add New Booking</button>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Enquiry</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Days</th>
                    <th>Guest Name</th>
                    <th>Mobile</th>
                    <th>Flight</th>
                    <th>Arrival</th>
                    <th>Driver</th>
                    <th>Driver Mobile</th>
                    <th>Agreement</th>
                    <th>Tour Charge</th>
                    <th>Other Inc.</th>
                    <th>Adv. Inc.</th>
                    <th>Driver Chg.</th>
                    <th>Other Exp.</th>
                    <th>Adv. Exp.</th>
                    <th>Profit</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="inventoryTable">
                <!-- Data loaded via jQuery AJAX -->
            </tbody>
        </table>
    </div>

    <!-- Booking Form Modal -->
    <div id="bookingModal" class="modal">
        <div class="modal-content">
            <h3 id="modalTitle">Add Booking</h3>
            <form id="bookingForm">
                <input type="hidden" id="booking_id" name="id">
                <div class="grid-3">
                    <div class="form-group"><label>Order Number</label><input type="text" name="order_number" required></div>
                    <div class="form-group"><label>Enquiry Date</label><input type="date" name="enquiry_date"></div>
                    <div class="form-group"><label>Start Date</label><input type="date" name="tour_start_date"></div>
                    <div class="form-group"><label>End Date</label><input type="date" name="tour_end_date"></div>
                    <div class="form-group"><label>Tour Days</label><input type="number" name="tour_days" value="0"></div>
                    <div class="form-group"><label>Guest Name</label><input type="text" name="guest_name" required></div>
                    <div class="form-group"><label>Guest Mobile</label><input type="text" name="guest_mobile"></div>
                    <div class="form-group"><label>Flight</label><input type="text" name="flight"></div>
                    <div class="form-group"><label>Arrival Time</label><input type="text" name="arrival_time"></div>
                    <div class="form-group"><label>Driver Name</label><input type="text" name="driver_name"></div>
                    <div class="form-group"><label>Driver Mobile</label><input type="text" name="driver_mobile"></div>
                    <div class="form-group"><label>Agreement Link</label><input type="url" name="agreement_link"></div>
                    <div class="form-group"><label>Tour Charge</label><input type="number" step="0.01" class="calc-profit" name="tour_charge" value="0.00"></div>
                    <div class="form-group"><label>Other Income</label><input type="number" step="0.01" class="calc-profit" name="income_other" value="0.00"></div>
                    <div class="form-group"><label>Advance Income</label><input type="number" step="0.01" name="income_advance" value="0.00"></div>
                    <div class="form-group"><label>Driver Charges</label><input type="number" step="0.01" class="calc-profit" name="driver_charges" value="0.00"></div>
                    <div class="form-group"><label>Other Expenses</label><input type="number" step="0.01" class="calc-profit" name="expense_other" value="0.00"></div>
                    <div class="form-group"><label>Advance Expenses</label><input type="number" step="0.01" name="expense_advance" value="0.00"></div>
                    <div class="form-group"><label>Calculated Profit</label><input type="text" id="calculated_profit" readonly style="background:#e5e7eb; font-weight:bold;"></div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="statusSelect">
                            <option value="Payment Recieved">Payment Recieved</option>
                            <option value="Completed">Completed</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Upcoming">Upcoming</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn" style="background:#16a34a;">Save Record</button>
                <button type="button" class="btn" id="closeModalBtn" style="background:#dc2626;">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            loadBookings();

            function loadBookings() {
                $.getJSON('ajax_handler?action=fetch', function(data) {
                    let rows = '';
                    $.each(data, function(i, row) {
                        
                        let badgeClass = 'badge-upcoming';
                        switch (row.status) {
                            case 'Payment Recieved': badgeClass = 'badge-payment-recieved'; break;
                            case 'Completed':        badgeClass = 'badge-completed'; break;
                            case 'Ongoing':          badgeClass = 'badge-ongoing'; break;
                            case 'Upcoming':         badgeClass = 'badge-upcoming'; break;
                        }

                        let agreement = row.agreement_link ? `<a href="${row.agreement_link}" target="_blank">Link</a>` : '-';
                        
                        // Convert row object to JSON string to safely pass into data attribute
                        let rowJson = JSON.stringify(row).replace(/'/g, "&apos;");

                        rows += `<tr>
                            <td>${row.order_number || '-'}</td>
                            <td>${row.enquiry_date || '-'}</td>
                            <td>${row.tour_start_date || '-'}</td>
                            <td>${row.tour_end_date || '-'}</td>
                            <td>${row.tour_days} Days</td>
                            <td><b>${row.guest_name}</b></td>
                            <td>${row.guest_mobile || '-'}</td>
                            <td>${row.flight || '-'}</td>
                            <td>${row.arrival_time || '-'}</td>
                            <td>${row.driver_name || '-'}</td>
                            <td>${row.driver_mobile || '-'}</td>
                            <td>${agreement}</td>
                            <td>${parseFloat(row.tour_charge).toLocaleString()}</td>
                            <td>${parseFloat(row.income_other).toLocaleString()}</td>
                            <td>${parseFloat(row.income_advance).toLocaleString()}</td>
                            <td>${parseFloat(row.driver_charges).toLocaleString()}</td>
                            <td>${parseFloat(row.expense_other).toLocaleString()}</td>
                            <td>${parseFloat(row.expense_advance).toLocaleString()}</td>
                            <td style="font-weight:bold; color:${row.profit >= 0 ? '#16a34a' : '#dc2626'}">${parseFloat(row.profit).toLocaleString()}</td>
                            <td><span class="badge ${badgeClass}">${row.status}</span></td>
                            <td>
                                <button class="btn edit-btn" style="background:#f59e0b;" data-booking='${rowJson}'>Edit</button>
                            </td>
                        </tr>`;
                    });
                    $('#inventoryTable').html(rows);
                });
            }

            // Real-time local profit calculation in Form
            $('.calc-profit').on('input', function() {
                let charge = parseFloat($('input[name="tour_charge"]').val()) || 0;
                let incOther = parseFloat($('input[name="income_other"]').val()) || 0;
                let driverChg = parseFloat($('input[name="driver_charges"]').val()) || 0;
                let expOther = parseFloat($('input[name="expense_other"]').val()) || 0;

                let profit = (charge + incOther) - (driverChg + expOther);
                $('#calculated_profit').val(profit.toFixed(2));
            });

            // Modal Controls
            $('#openModalBtn').click(function() { $('#bookingForm')[0].reset(); $('#bookingModal').show(); });
            $('#closeModalBtn').click(function() { $('#bookingModal').hide(); });

            // Form Submit via AJAX
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();
                $.post('ajax_handler?action=save', $(this).serialize(), function(res) {
                    let response = JSON.parse(res);
                    if(response.status === 'success') {
                        $('#bookingModal').hide();
                        loadBookings();
                    } else {
                        alert('Error saving record: ' + response.message);
                    }
                });
            });

            // Populate Modal Form when Edit Button is clicked
            $(document).on('click', '.edit-btn', function() {
                let booking = $(this).data('booking');

                $('#modalTitle').text('Edit Booking #' + (booking.order_number || booking.id));
                $('#booking_id').val(booking.id);
                
                // Populate form inputs by matching input [name] with data keys
                $.each(booking, function(key, value) {
                    $(`[name="${key}"]`).val(value);
                });

                // Trigger profit calculation for the loaded values
                $('.calc-profit').trigger('input');

                $('#bookingModal').show();
            });

            // Reset Modal Title and Fields when clicking "Add New Booking"
            $('#openModalBtn').click(function() { 
                $('#modalTitle').text('Add Booking');
                $('#booking_id').val(''); 
                $('#bookingForm')[0].reset(); 
                $('#calculated_profit').val('0.00');
                $('#bookingModal').show(); 
            });
        });
    </script>
</body>
</html>