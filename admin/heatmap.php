<?php
    require_once __DIR__ . '/../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ceylon Travel Lanka - Cost Calculator</title>
  
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

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .controls {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin: 20px 0;
        }
        label { display: grid; gap: 5px; }
        select, input, button { padding: 9px; }
        #preview {
            position: relative;
            height: 75vh;
            min-height: 450px;
            overflow: hidden;
            border: 1px solid #ccc;
            background: #fff;
        }
        #site {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }
        #heatLayer {
            position: absolute !important;
            inset: 0;
            pointer-events: none;
        }
        #status, #summary { margin: 12px 0; }
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
            <h2 class="text-sm sm:text-base font-bold text-slate-800 leading-tight">Route & Rate Calculator</h2>
            <p class="text-[11px] sm:text-xs text-slate-500 hidden sm:block">Estimate tour pricing, mileage, and driver allowances</p>
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
        <div class="controls">
            <label>Page
                <select id="page"></select>
            </label>

            <label>Device
                <select id="device">
                <option value="all">All devices</option>
                <option value="desktop">Desktop</option>
                <option value="tablet">Tablet</option>
                <option value="mobile">Mobile</option>
                </select>
            </label>

            <label>From
                <input type="date" id="from">
            </label>

            <label>To
                <input type="date" id="to">
            </label>

            <button id="load">Load heatmap</button>
        </div>

        <div id="summary"></div>
        <div id="status" role="status">Loading pages…</div>

        <div id="preview">
            <iframe id="site" title="Page preview"></iframe>
            <div id="heatLayer"></div>
        </div>
        
    </main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Pinned release of heatmap.js -->
<script src="https://cdn.jsdelivr.net/npm/heatmap.js@2.0.5/build/heatmap.min.js"></script>
    
<script>
    (() => {
        "use strict";

        var _host = window.location.host;
        var _base_path = (_host == 'localhost') ? 'http://localhost/ceylontravellanka/' : 'https://ceylontravellanka.com/';

        const $ = id => document.getElementById(id);

        const pageSelect = $("page");
        const deviceSelect = $("device");
        const fromInput = $("from");
        const toInput = $("to");
        const iframe = $("site");
        const layer = $("heatLayer");
        const status = $("status");
        const summary = $("summary");

        function localDate(d) {
            const copy = new Date(d.getTime());
            copy.setMinutes(copy.getMinutes() - copy.getTimezoneOffset());
            return copy.toISOString().slice(0, 10);
        }

        const today = new Date();
        const weekAgo = new Date(today);
        weekAgo.setDate(weekAgo.getDate() - 7);

        toInput.value = localDate(today);
        fromInput.value = localDate(weekAgo);

        const heat = h337.create({
            container: layer,
            radius: 28,
            maxOpacity: 0.65,
            minOpacity: 0.05,
            blur: 0.85
        });

        let clickData = [];
        let activePage = "";
        let renderRequest = 0;

        async function getJSON(url) {
            const response = await fetch(url, {
            credentials: "same-origin",
            headers: { "Accept": "application/json" }
            });

            if (!response.ok) {
            throw new Error("HTTP " + response.status);
            }

            return response.json();
        }

        function validPath(path) {
            return typeof path === "string" &&
            path.startsWith("/") &&
            !path.startsWith("//") &&
            !path.includes("?") &&
            !path.includes("#");
        }

        async function loadPages() {
            const pages = await getJSON(_base_path + "heatmap/pages");

            pageSelect.replaceChildren();

            for (const row of pages) {
            if (!validPath(row.page_path)) continue;

            const option = document.createElement("option");
            option.value = row.page_path;
            option.textContent =
                row.page_path + " (" + row.click_count + " clicks)";

            pageSelect.appendChild(option);
            }

            if (!pageSelect.options.length) {
            status.textContent = "No recorded clicks yet.";
            return;
            }

            await loadHeatmap();
        }

        function renderHeatmap() {
            if (renderRequest) {
            cancelAnimationFrame(renderRequest);
            }

            renderRequest = requestAnimationFrame(() => {
            renderRequest = 0;

            try {
                const win = iframe.contentWindow;

                if (!win || !win.document.body) return;

                const width = win.innerWidth;
                const height = win.innerHeight;
                const scrollY = win.scrollY;

                // Combine nearby events into 8px buckets.
                const buckets = new Map();

                for (const c of clickData) {
                const x = Math.round(Number(c.x_ratio) * width);
                const y = Math.round(Number(c.doc_y) - scrollY);

                // Allow rendering points across a large vertical document span
                if (y < -3000 || y > height + 3000) continue;

                const bx = Math.round(x / 8) * 8;
                const by = Math.round(y / 8) * 8;
                const key = bx + ":" + by;

                buckets.set(key, (buckets.get(key) || 0) + 1);
                }

                const points = [];

                for (const [key, count] of buckets) {
                const [x, y] = key.split(":").map(Number);
                points.push({ x, y, value: count });
                }

                let max = 1;

                for (const point of points) {
                if (point.value > max) max = point.value;
                }

                heat.setData({
                max,
                min: 0,
                data: points
                });

                summary.textContent =
                "Recorded clicks: " + clickData.length +
                " | Visible hotspot locations: " + points.length;

            } catch (err) {
                status.textContent =
                "Could not render preview. Check your site's frame policy.";
            }
            });
        }

        async function loadHeatmap() {
            const page = pageSelect.value;

            if (!validPath(page)) return;

            activePage = page;
            clickData = [];
            heat.setData({ max: 1, min: 0, data: [] });

            status.textContent = "Loading click events…";
            summary.textContent = "";

            try {
            const query = new URLSearchParams({
                page,
                device: deviceSelect.value,
                from: fromInput.value,
                to: toInput.value
            });

            const result = await getJSON(
            _base_path + "heatmap/clicks?" + query.toString()
            );

            if (activePage !== page) return;

            clickData = result.clicks || [];

            if (iframe.getAttribute("src") !== page) {
                iframe.src = page;
            } else {
                renderHeatmap();
            }

            status.textContent = clickData.length
                ? "Heatmap loaded. Scroll the preview to explore."
                : "No clicks for this page and filter.";

            } catch (err) {
            status.textContent =
                "Unable to load data. Check your login and API files.";
            }
        }

        iframe.addEventListener("load", () => {
            try {
            const win = iframe.contentWindow;

            // Same-origin only.
            win.addEventListener("scroll", renderHeatmap);
            win.addEventListener("resize", renderHeatmap);

            renderHeatmap();

            } catch (err) {
            status.textContent =
                "Preview unavailable. Check same-origin frame settings.";
            }
        });

        $("load").addEventListener("click", loadHeatmap);
        pageSelect.addEventListener("change", loadHeatmap);

        loadPages().catch(() => {
            status.textContent =
            "Could not load page list. Check admin authentication.";
        });
        })();
</script>

</body>
</html>