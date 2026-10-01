<?php
require_once __DIR__ . '/../config/config.php';
include 'db.php'; // Expects $pdo instance of PDO

$successMsg = '';$errorMsg   = '';

// --- SAVE INVOICE LOGIC ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) &&$_POST['action'] === 'save_invoice') {
    $invNumber   = trim($_POST['invoice_number'] ?? '');
    $invDate     = trim($_POST['invoice_date'] ?? '');
    $dueDate     = trim($_POST['due_date'] ?? '');
    $clientName  = trim($_POST['client_name'] ?? '');
    $clientComp  = trim($_POST['client_company'] ?? '');
    $clientEmail = trim($_POST['client_email'] ?? '');
    $clientPhone = trim($_POST['client_phone'] ?? '');
    $clientAddr  = trim($_POST['client_address'] ?? '');
    $subtotal    = floatval($_POST['subtotal'] ?? 0);
    $tax         = floatval($_POST['tax_amount'] ?? 0);
    $discount    = floatval($_POST['discount_amount'] ?? 0);
    $grandTotal  = floatval($_POST['grand_total'] ?? 0);
    $notes       = trim($_POST['notes'] ?? '');

    $descriptions =$_POST['item_description'] ?? [];
    $quantities   =$_POST['item_qty'] ?? [];
    $rates        =$_POST['item_rate'] ?? [];

    if (empty($invNumber) || empty($clientName) || empty($descriptions)) {
      $errorMsg = "Please fill in all required invoice details and at least one item line.";
    } else {
        try {
            $pdo->beginTransaction();

            $stmt =$pdo->prepare("INSERT INTO invoices (invoice_number, invoice_date, due_date, client_name, client_company, client_email, client_phone, client_address, subtotal, tax_amount, discount_amount, grand_total, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$invNumber,$invDate, $dueDate,$clientName, $clientComp,$clientEmail, $clientPhone,$clientAddr, $subtotal,$tax, $discount,$grandTotal, $notes]);
            $invoiceId =$pdo->lastInsertId();

            $itemStmt =$pdo->prepare("INSERT INTO invoice_items (invoice_id, description, quantity, rate, amount) VALUES (?, ?, ?, ?, ?)");
            for ($i = 0; $i < count($descriptions);$i++) {
                $desc = trim($descriptions[$i]);$qty  = intval($quantities[$i] ?? 1);
                $rate = floatval($rates[$i] ?? 0);$amt  = $qty * $rate;
                if (!empty($desc)) {
                    $itemStmt->execute([$invoiceId, $desc,$qty, $rate,$amt]);
                }
            }

            $pdo->commit();
            $successMsg = "Invoice #{$invNumber} created successfully!";
        } catch (PDOException $e) {$pdo->rollBack();
            error_log("Invoice Save Error: " . $e->getMessage());$errorMsg = "Database error: Could not save invoice.";
        }
    }
}

// Generate Next Default Invoice Number
$defaultInvNum = 'CTL-INV-' . date('Ymd') . '-' . rand(100, 999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice Generator - Ceylon Travel Lanka</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    /* PRINT STYLES - Optimized for clean PDF / Paper Export */
    @media print {
      body { background: white !important; color: black !important; }
      #sidebar, header, #actionButtons, .no-print { display: none !important; }
      main { padding: 0 !important; margin: 0 !important; max-width: 100% !important; }
      .printable-card { border: none !important; shadow: none !important; padding: 0 !important; }
      input, textarea, select { border: none !important; background: transparent !important; padding: 0 !important; resize: none !important; }
      .remove-row-btn { display: none !important; }
    }
  </style>
</head>
<body class="bg-slate-100 font-sans text-slate-800 flex h-screen overflow-hidden">

  <!-- MOBILE OVERLAY BACKDROP -->
  <div id="sidebarBackdrop" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden"></div>

  <!-- SIDEBAR NAVIGATION -->
  <aside id="sidebar" class="fixed md:relative inset-y-0 left-0 -translate-x-full md:translate-x-0 w-64 bg-slate-900 text-slate-300 flex flex-col justify-between transition-transform duration-300 flex-shrink-0 z-40">
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

        <a href="<?= BASE_URL ?>admin/invoices" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg bg-indigo-600 text-white transition">
          <i class="fa-solid fa-file-invoice-dollar text-lg w-5"></i>
          <span class="sidebar-text">Invoices</span>
        </a>
      </nav>
    </div>

    <div class="p-3 border-t border-slate-800 hidden md:block">
      <button id="toggleSidebarBtn" class="w-full flex items-center justify-center gap-2 py-2 text-xs font-semibold text-slate-400 bg-slate-800 hover:bg-slate-700 hover:text-white rounded-lg transition">
        <i class="fa-solid fa-angles-left text-sm" id="collapseIcon"></i>
        <span class="sidebar-text">Collapse Menu</span>
      </button>
    </div>
  </aside>

  <!-- MAIN CONTAINER -->
  <div class="flex-1 flex flex-col h-full overflow-y-auto w-full">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-20 shadow-sm">
      <div class="px-4 sm:px-6 h-16 flex items-center justify-between gap-2">
        <div class="flex items-center gap-3">
          <!-- Mobile Drawer Toggle Button -->
          <button id="mobileSidebarToggle" class="md:hidden p-2 text-slate-600 hover:text-slate-900 rounded-lg focus:bg-slate-100">
            <i class="fa-solid fa-bars text-xl"></i>
          </button>
          <div>
            <h2 class="text-sm sm:text-base font-bold text-slate-800 leading-tight">Invoice Generator</h2>
            <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">Issue, print, and track billing for partner agencies and corporate clients</p>
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

    <main class="p-4 sm:p-6 space-y-6 max-w-5xl w-full mx-auto">

      <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-4">
        <div id="actionButtons" class="flex items-center gap-2 sm:gap-3">
          <button onclick="window.print()" class="px-3.5 py-1.5 text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition border border-slate-200 flex items-center gap-1.5">
            <i class="fa-solid fa-print"></i> <span>Print / Save PDF</span>
          </button>
          <button form="invoiceForm" type="submit" class="px-3.5 py-1.5 text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition flex items-center gap-1.5 shadow-sm">
            <i class="fa-solid fa-floppy-disk"></i> <span>Save Invoice</span>
          </button>
        </div>
      </div>

      <?php if (!empty($successMsg)): ?>
        <div class="no-print p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center gap-2">
          <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
          <span><?= htmlspecialchars($successMsg) ?></span>
        </div>
      <?php endif; ?>

      <?php if (!empty($errorMsg)): ?>
        <div class="no-print p-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl flex items-center gap-2">
          <i class="fa-solid fa-circle-exclamation text-rose-500 text-sm"></i>
          <span><?= htmlspecialchars($errorMsg) ?></span>
        </div>
      <?php endif; ?>

      <!-- INVOICE FORM CONTAINER -->
      <form id="invoiceForm" method="POST" class="printable-card bg-white p-6 sm:p-10 rounded-xl border border-slate-200 shadow-sm space-y-8">
        <input type="hidden" name="action" value="save_invoice">

        <!-- BRANDING & INVOICE HEADER -->
        <div class="flex flex-col sm:flex-row justify-between items-start gap-6 border-b border-slate-200 pb-6">
          <div>
            <h1 class="text-2xl font-black text-indigo-900 tracking-tight">Ceylon Travel Lanka</h1>
            <p class="text-xs text-slate-500 font-medium">Your Gateway to Unforgettable Adventures in Sri Lanka</p>
            <p class="text-xs text-slate-500 mt-2">
              83 / D Weliya North, Minuwangoda 11550, Sri Lanka<br>
              Phone/WhatsApp: +94 75 980 0348<br>
              Email: contact@ceylontravellanka.com
            </p>
          </div>

          <div class="text-left sm:text-right w-full sm:w-auto">
            <span class="inline-block px-3 py-1 bg-indigo-50 text-indigo-700 font-bold text-xs rounded-md uppercase tracking-wider mb-2">TAX INVOICE</span>
            
            <div class="space-y-2">
              <div class="flex items-center justify-start sm:justify-end gap-2 text-xs">
                <span class="font-semibold text-slate-500">Invoice #:</span>
                <input type="text" name="invoice_number" value="<?= $defaultInvNum ?>" required class="font-bold text-slate-800 border border-slate-300 rounded px-2 py-1 text-xs w-44 text-right">
              </div>

              <div class="flex items-center justify-start sm:justify-end gap-2 text-xs">
                <span class="font-semibold text-slate-500">Date:</span>
                <input type="date" name="invoice_date" value="<?= date('Y-m-d') ?>" required class="text-slate-800 border border-slate-300 rounded px-2 py-1 text-xs w-44 text-right">
              </div>

              <div class="flex items-center justify-start sm:justify-end gap-2 text-xs">
                <span class="font-semibold text-slate-500">Due Date:</span>
                <input type="date" name="due_date" value="<?= date('Y-m-d', strtotime('+14 days')) ?>" required class="text-slate-800 border border-slate-300 rounded px-2 py-1 text-xs w-44 text-right">
              </div>
            </div>
          </div>
        </div>

        <!-- CLIENT DETAILS (BILLED TO) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-slate-50 p-4 rounded-lg border border-slate-200">
          <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Billed To (3rd Party Client):</h3>
            <div class="space-y-2">
              <input type="text" name="client_name" placeholder="Contact Name / Agency Person *" required class="w-full text-xs font-semibold border border-slate-300 rounded px-2.5 py-1.5 bg-white">
              <input type="text" name="client_company" placeholder="Company / Hotel Name" class="w-full text-xs border border-slate-300 rounded px-2.5 py-1.5 bg-white">
              <input type="email" name="client_email" placeholder="Email Address" class="w-full text-xs border border-slate-300 rounded px-2.5 py-1.5 bg-white">
            </div>
          </div>

          <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Contact & Billing Address:</h3>
            <div class="space-y-2">
              <input type="text" name="client_phone" placeholder="Phone / WhatsApp Number" class="w-full text-xs border border-slate-300 rounded px-2.5 py-1.5 bg-white">
              <textarea name="client_address" rows="2" placeholder="Billing Address Details" class="w-full text-xs border border-slate-300 rounded px-2.5 py-1.5 bg-white"></textarea>
            </div>
          </div>
        </div>

        <!-- INVOICE ITEMS TABLE -->
        <div>
          <table class="w-full text-left text-xs text-slate-700">
            <thead class="bg-slate-100 text-[11px] font-semibold uppercase text-slate-500 border-b border-slate-200">
              <tr>
                <th class="py-3 px-3 w-1/2">Service / Tour Description</th>
                <th class="py-3 px-3 text-center w-20">Qty / Days</th>
                <th class="py-3 px-3 text-right w-32">Rate (LKR)</th>
                <th class="py-3 px-3 text-right w-36">Amount (LKR)</th>
                <th class="py-3 px-2 text-center w-12 no-print"></th>
              </tr>
            </thead>
            <tbody id="invoiceItemsBody" class="divide-y divide-slate-200">
              <!-- Default Row 1 -->
              <tr class="item-row">
                <td class="p-2">
                  <input type="text" name="item_description[]" placeholder="e.g., 7-Day Chauffeur Driven Tour Service (Passenger: John Doe)" required class="w-full text-xs border border-slate-300 rounded p-1.5">
                </td>
                <td class="p-2">
                  <input type="number" name="item_qty[]" value="1" min="1" class="qty-input w-full text-xs text-center border border-slate-300 rounded p-1.5">
                </td>
                <td class="p-2">
                  <input type="number" step="0.01" name="item_rate[]" value="0.00" min="0" class="rate-input w-full text-xs text-right border border-slate-300 rounded p-1.5">
                </td>
                <td class="p-2 text-right font-bold text-slate-800">
                  <span class="line-amount">0.00</span>
                </td>
                <td class="p-2 text-center no-print">
                  <button type="button" class="remove-row-btn text-slate-400 hover:text-rose-600 transition"><i class="fa-solid fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>

          <button type="button" id="addRowBtn" class="no-print mt-3 px-3 py-1.5 text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition border border-slate-200 flex items-center gap-1">
            <i class="fa-solid fa-plus text-indigo-600"></i> Add Item Line
          </button>
        </div>

        <!-- TOTALS & PAYMENT NOTES -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-slate-200">
          <div>
            <h4 class="text-xs font-bold uppercase text-slate-500 mb-2">Payment Terms & Notes</h4>
            <textarea name="notes" rows="4" class="w-full text-xs border border-slate-300 rounded p-2 text-slate-600" placeholder="Bank details, payment instructions, or booking conditions...">Bank Transfer Info:
Bank: Bank of Ceylon
Account Name: Ceylon Travel Lanka
Account No: 0000-XXXX-XXXX
Branch: Colombo Main</textarea>
          </div>

          <div class="space-y-2 text-xs text-slate-600">
            <div class="flex justify-between items-center py-1">
              <span class="font-semibold text-slate-500">Subtotal:</span>
              <span class="font-bold text-slate-800">LKR <span id="subtotalDisplay">0.00</span></span>
              <input type="hidden" name="subtotal" id="subtotalInput" value="0.00">
            </div>

            <div class="flex justify-between items-center py-1">
              <span class="font-semibold text-slate-500">Tax / Service Charge (LKR):</span>
              <input type="number" step="0.01" name="tax_amount" id="taxInput" value="0.00" class="w-28 text-right text-xs border border-slate-300 rounded p-1">
            </div>

            <div class="flex justify-between items-center py-1">
              <span class="font-semibold text-slate-500">Discount (LKR):</span>
              <input type="number" step="0.01" name="discount_amount" id="discountInput" value="0.00" class="w-28 text-right text-xs border border-slate-300 rounded p-1">
            </div>

            <div class="flex justify-between items-center py-2 border-t-2 border-slate-800 text-sm font-black text-indigo-950">
              <span>Grand Total Due:</span>
              <span>LKR <span id="grandTotalDisplay">0.00</span></span>
              <input type="hidden" name="grand_total" id="grandTotalInput" value="0.00">
            </div>
          </div>
        </div>

        <!-- AUTHORIZATION FOOTER -->
        <div class="pt-8 flex justify-between items-end text-xs text-slate-500 border-t border-slate-100">
          <div>
            <p>Thank you for choosing Ceylon Travel Lanka!</p>
          </div>
          <div class="text-center border-t border-slate-300 pt-2 w-48">
            <p class="font-bold text-slate-700">Authorized Signature</p>
          </div>
        </div>

      </form>

    </main>
  </div>

  <script>
    $(document).ready(function() {
      // Sidebar Controls
      $('#mobileSidebarToggle').on('click', function() {
        $('#sidebar').removeClass('-translate-x-full');
        $('#sidebarBackdrop').removeClass('hidden');
      });

      $('#closeSidebarBtn, #sidebarBackdrop').on('click', function() {
        $('#sidebar').addClass('-translate-x-full');
        $('#sidebarBackdrop').addClass('hidden');
      });

      $('#toggleSidebarBtn').on('click', function() {
        $('#sidebar').toggleClass('w-64 w-20');
        $('.sidebar-text').toggleClass('hidden');$('#collapseIcon').toggleClass('fa-angles-left fa-angles-right');
      });

      // Recalculate Invoice Line Amounts & Grand Totals
      function calculateTotals() {
        let subtotal = 0;

        $('.item-row').each(function() {
          const qty = parseFloat($(this).find('.qty-input').val()) || 0;
          const rate = parseFloat($(this).find('.rate-input').val()) || 0;
          const amount = qty * rate;

          $(this).find('.line-amount').text(amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
          subtotal += amount;
        });

        const tax = parseFloat($('#taxInput').val()) || 0;
        const discount = parseFloat($('#discountInput').val()) || 0;
        const grandTotal = Math.max(0, subtotal + tax - discount);

        $('#subtotalDisplay').text(subtotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#subtotalInput').val(subtotal.toFixed(2));

        $('#grandTotalDisplay').text(grandTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        $('#grandTotalInput').val(grandTotal.toFixed(2));
      }

      // Add New Row
      $('#addRowBtn').on('click', function() {
        const newRow = `
          <tr class="item-row">
            <td class="p-2">
              <input type="text" name="item_description[]" placeholder="Description of service..." required class="w-full text-xs border border-slate-300 rounded p-1.5">
            </td>
            <td class="p-2">
              <input type="number" name="item_qty[]" value="1" min="1" class="qty-input w-full text-xs text-center border border-slate-300 rounded p-1.5">
            </td>
            <td class="p-2">
              <input type="number" step="0.01" name="item_rate[]" value="0.00" min="0" class="rate-input w-full text-xs text-right border border-slate-300 rounded p-1.5">
            </td>
            <td class="p-2 text-right font-bold text-slate-800">
              <span class="line-amount">0.00</span>
            </td>
            <td class="p-2 text-center no-print">
              <button type="button" class="remove-row-btn text-slate-400 hover:text-rose-600 transition"><i class="fa-solid fa-trash"></i></button>
            </td>
          </tr>`;
        $('#invoiceItemsBody').append(newRow);
      });

      // Remove Row
      $(document).on('click', '.remove-row-btn', function() {
        if ($('.item-row').length > 1) {$(this).closest('tr').remove();
          calculateTotals();
        }
      });

      // Recalculate on input change
      $(document).on('input', '.qty-input, .rate-input, #taxInput, #discountInput', calculateTotals);
    });
  </script>
</body>
</html>