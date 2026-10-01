<?php
require_once __DIR__ . '/../config/config.php';
include 'db.php'; // Expects $pdo instance of PDO

session_start(); // Start session to persist success/error messages across redirects

$successMsg = $_SESSION['successMsg'] ?? '';
$errorMsg   = $_SESSION['errorMsg'] ?? '';

// Clear session messages after loading them
unset($_SESSION['successMsg'], $_SESSION['errorMsg']);

// --- HANDLE NEW TRANSACTION SUBMISSION ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_transaction') {
    $date        = trim($_POST['transaction_date'] ?? '');
    $type        = trim($_POST['type'] ?? '');
    $category    = trim($_POST['category'] ?? '');
    $amount      = floatval($_POST['amount'] ?? 0);
    $reference   = trim($_POST['reference_no'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($date) || !in_array($type, ['debit', 'credit']) || empty($category) || $amount <= 0) {
        $_SESSION['errorMsg'] = "Please fill in all required fields with valid values.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO cash_book (transaction_date, type, category, amount, reference_no, description) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$date, $type, $category, $amount, $reference, $description]);
            
            $_SESSION['successMsg'] = "Transaction recorded successfully!";
        } catch (PDOException $e) {
            error_log("Cash Book Insert Error: " . $e->getMessage());
            $_SESSION['errorMsg'] = "Database error: Unable to record transaction.";
        }
    }

    // --- PRG FIX: Redirect to clear POST data ---
    $queryString = $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '';
    header("Location: " . $_SERVER['PHP_SELF'] . $queryString);
    exit;
}

// --- FETCH FILTERED DATA & TOTALS ---
$selectedYear  = isset($_GET['year']) ? (int)$_GET['year'] : (int)date('Y');
$selectedMonth = isset($_GET['month']) ? (int)$_GET['month'] : 0; // 0 = All Months

$whereConditions = ["YEAR(transaction_date) = :year"];
$params = [':year' => $selectedYear];

if ($selectedMonth > 0) {
    $whereConditions[] = "MONTH(transaction_date) = :month";
    $params[':month'] = $selectedMonth;
}

$whereClause = "WHERE " . implode(" AND ", $whereConditions);

$totalDebit  = 0;
$totalCredit = 0;
$transactions = [];

try {
    // Calculate Summaries
    $summarySql = "SELECT 
                    SUM(CASE WHEN type = 'debit' THEN amount ELSE 0 END) AS total_debit,
                    SUM(CASE WHEN type = 'credit' THEN amount ELSE 0 END) AS total_credit
                   FROM cash_book {$whereClause}";
    $stmtSummary = $pdo->prepare($summarySql);
    $stmtSummary->execute($params);
    $summary = $stmtSummary->fetch(PDO::FETCH_ASSOC);

    $totalDebit  = floatval($summary['total_debit'] ?? 0);
    $totalCredit = floatval($summary['total_credit'] ?? 0);

    // Fetch Transactions List
    $listSql = "SELECT * FROM cash_book {$whereClause} ORDER BY transaction_date DESC, id DESC";
    $stmtList = $pdo->prepare($listSql);
    $stmtList->execute($params);
    $transactions = $stmtList->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    error_log("Cash Book Query Error: " . $e->getMessage());
}

$netBalance = ($totalDebit) - $totalCredit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cash Book (Debit & Credit) - Admin Panel</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-slate-100 font-sans text-slate-800 flex h-screen overflow-hidden">

  <!-- MOBILE BACKDROP -->
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

        <a href="<?= BASE_URL ?>admin/cashbook" class="flex items-center gap-3 px-3.5 py-2.5 text-sm font-medium rounded-lg bg-indigo-600 text-white transition">
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
            <h2 class="text-sm sm:text-base font-bold text-slate-800 leading-tight">Cash Book Ledger</h2>
            <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">Track daily income debits, driver payouts, and operational expenses</p>
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

    <main class="p-4 sm:p-6 space-y-6 max-w-7xl w-full mx-auto">

      <!-- ALERTS -->
      <?php if (!empty($successMsg)): ?>
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center gap-2">
          <i class="fa-solid fa-circle-check text-emerald-500 text-sm"></i>
          <span><?= htmlspecialchars($successMsg) ?></span>
        </div>
      <?php endif; ?>

      <?php if (!empty($errorMsg)): ?>
        <div class="p-4 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl flex items-center gap-2">
          <i class="fa-solid fa-circle-exclamation text-rose-500 text-sm"></i>
          <span><?= htmlspecialchars($errorMsg) ?></span>
        </div>
      <?php endif; ?>

      <!-- FINANCIAL KPI SUMMARY CARDS -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5">
        
        <!-- Total Debit Card -->
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Total Debit (Income In)</p>
              <h3 class="text-xl sm:text-2xl font-black text-emerald-600 mt-1">LKR <?= number_format($totalDebit, 2) ?></h3>
            </div>
            <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg shrink-0"><i class="fa-solid fa-arrow-down-left text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-slate-500 font-medium mt-3">All cash receipts & incoming transfers</p>
        </div>

        <!-- Total Credit Card -->
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Total Credit (Expenses Out)</p>
              <h3 class="text-xl sm:text-2xl font-black text-rose-600 mt-1">LKR <?= number_format($totalCredit, 2) ?></h3>
            </div>
            <div class="p-2.5 bg-rose-50 text-rose-600 rounded-lg shrink-0"><i class="fa-solid fa-arrow-up-right text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-slate-500 font-medium mt-3">All payouts, fuel, driver & operational costs</p>
        </div>

        <!-- Net Cash Balance Card -->
        <div class="bg-white p-4 sm:p-5 rounded-xl border border-slate-200 shadow-sm">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-xs font-semibold uppercase text-slate-500 tracking-wider">Net Cash Balance</p>
              <h3 class="text-xl sm:text-2xl font-black <?= $netBalance >= 0 ? 'text-indigo-600' : 'text-rose-600' ?> mt-1">
                LKR <?= number_format($netBalance, 2) ?>
              </h3>
            </div>
            <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-lg shrink-0"><i class="fa-solid fa-scale-balanced text-lg sm:text-xl"></i></div>
          </div>
          <p class="text-xs text-slate-500 font-medium mt-3">Current period net position</p>
        </div>

      </div>

      <!-- FILTER BAR -->
      <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
          <div>
            <label for="year" class="block text-[11px] font-semibold uppercase text-slate-500">Year</label>
            <select name="year" id="year" onchange="this.form.submit()" class="text-xs border border-slate-300 rounded-lg px-3 py-1.5 bg-white font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
              <?php 
              $currentYear = (int)date('Y');
              for ($y = $currentYear; $y >= $currentYear - 4; $y--): ?>
                <option value="<?= $y ?>" <?= $selectedYear === $y ? 'selected' : '' ?>><?= $y ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <div>
            <label for="month" class="block text-[11px] font-semibold uppercase text-slate-500">Month</label>
            <select name="month" id="month" onchange="this.form.submit()" class="text-xs border border-slate-300 rounded-lg px-3 py-1.5 bg-white font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
              <option value="0" <?= $selectedMonth === 0 ? 'selected' : '' ?>>All Months</option>
              <?php 
              $months = [1=>'Jan', 2=>'Feb', 3=>'Mar', 4=>'Apr', 5=>'May', 6=>'Jun', 7=>'Jul', 8=>'Aug', 9=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dec'];
              foreach ($months as $num => $name): ?>
                <option value="<?= $num ?>" <?= $selectedMonth === $num ? 'selected' : '' ?>><?= $name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
        <div>
          <div class="flex items-center gap-2 sm:gap-3">
            <button id="openModalBtn" class="px-3.5 py-1.5 text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition flex items-center gap-1.5 shadow-sm">
              <i class="fa-solid fa-plus"></i> <span>Add Entry</span>
            </button>
          </div>

          <span class="text-xs font-semibold text-slate-500">
            Showing <?= count($transactions) ?> record(s)
          </span>
        </div>
      </div>

      <!-- TRANSACTION LEDGER TABLE -->
      <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
          <h3 class="text-xs sm:text-sm font-bold text-slate-800 flex items-center gap-2">
            <i class="fa-solid fa-list-ol text-indigo-600"></i> Cash Book Entry Logs
          </h3>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs sm:text-sm text-slate-600 min-w-[650px]">
            <thead class="bg-slate-100 text-[11px] sm:text-xs font-semibold uppercase text-slate-500 border-b border-slate-200">
              <tr>
                <th class="px-4 sm:px-6 py-3">Date</th>
                <th class="px-4 sm:px-6 py-3">Reference / Category</th>
                <th class="px-4 sm:px-6 py-3">Description</th>
                <th class="px-4 sm:px-6 py-3 text-right">Debit (In)</th>
                <th class="px-4 sm:px-6 py-3 text-right">Credit (Out)</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
              <?php if (!empty($transactions)): ?>
                <?php foreach ($transactions as $row): ?>
                  <tr class="hover:bg-slate-50 transition">
                    <td class="px-4 sm:px-6 py-3.5 font-medium text-slate-800 whitespace-nowrap">
                      <?= date('M d, Y', strtotime($row['transaction_date'])) ?>
                    </td>
                    <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap">
                      <div class="font-bold text-slate-800"><?= htmlspecialchars($row['category']) ?></div>
                      <?php if (!empty($row['reference_no'])): ?>
                        <div class="text-[11px] text-slate-400">Ref: <?= htmlspecialchars($row['reference_no']) ?></div>
                      <?php endif; ?>
                    </td>
                    <td class="px-4 sm:px-6 py-3.5 text-slate-500 max-w-xs truncate">
                      <?= htmlspecialchars($row['description'] ?? 'N/A') ?>
                    </td>
                    <td class="px-4 sm:px-6 py-3.5 text-right font-bold text-emerald-600 whitespace-nowrap">
                      <?= $row['type'] === 'debit' ? 'LKR ' . number_format($row['amount'], 2) : '-' ?>
                    </td>
                    <td class="px-4 sm:px-6 py-3.5 text-right font-bold text-rose-600 whitespace-nowrap">
                      <?= $row['type'] === 'credit' ? 'LKR ' . number_format($row['amount'], 2) : '-' ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="px-6 py-6 text-center text-slate-400">
                    No transaction entries found for the selected filter period.
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  <!-- ADD TRANSACTION MODAL -->
  <div id="transactionModal" class="fixed inset-0 bg-slate-900/60 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl border border-slate-200 max-w-lg w-full overflow-hidden">
      <div class="px-6 py-4 bg-slate-900 text-white flex items-center justify-between">
        <h3 class="text-sm font-bold flex items-center gap-2">
          <i class="fa-solid fa-wallet text-indigo-400"></i> Record Cash Transaction
        </h3>
        <button id="closeModalBtn" class="text-slate-400 hover:text-white transition">
          <i class="fa-solid fa-xmark text-lg"></i>
        </button>
      </div>

      <form method="POST" class="p-6 space-y-4">
        <input type="hidden" name="action" value="add_transaction">

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Date *</label>
            <input type="date" name="transaction_date" value="<?= date('Y-m-d') ?>" required class="w-full text-xs border border-slate-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Transaction Type *</label>
            <select name="type" required class="w-full text-xs border border-slate-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
              <option value="debit">Debit (Income In)</option>
              <option value="credit">Credit (Expense Out)</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Category *</label>
            <input type="text" name="category" placeholder="e.g. Tour Advance, Fuel Cost" required class="w-full text-xs border border-slate-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Amount (LKR) *</label>
            <input type="number" step="0.01" min="0.01" name="amount" placeholder="0.00" required class="w-full text-xs border border-slate-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
          </div>
        </div>

        <div>
          <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Reference No. / Voucher #</label>
          <input type="text" name="reference_no" placeholder="e.g. ORD-1024 or INV-88" class="w-full text-xs border border-slate-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
          <label class="block text-xs font-semibold text-slate-600 uppercase mb-1">Description</label>
          <textarea name="description" rows="3" placeholder="Optional transaction details..." class="w-full text-xs border border-slate-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>

        <div class="pt-2 flex justify-end gap-3">
          <button type="button" id="cancelModalBtn" class="px-4 py-2 text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition">Cancel</button>
          <button type="submit" class="px-4 py-2 text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg transition shadow-sm">Save Entry</button>
        </div>
      </form>
    </div>
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
        $('.sidebar-text').toggleClass('hidden');
        $('#collapseIcon').toggleClass('fa-angles-left fa-angles-right');
      });

      // Modal Controls
      $('#openModalBtn').on('click', function() {
        $('#transactionModal').removeClass('hidden');
      });

      $('#closeModalBtn, #cancelModalBtn').on('click', function() {
        $('#transactionModal').addClass('hidden');
      });
    });
  </script>
</body>
</html>