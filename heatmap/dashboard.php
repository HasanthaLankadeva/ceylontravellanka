<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>ceylontravellanka.com — Click heatmaps</title>

<style>
body {
  font-family: Arial, sans-serif;
  margin: 24px;
  color: #222;
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
<body>

<header>
  <h1>Click heatmaps</h1>
  <a href="/ceylontravellanka/heatmap/logout">Log out</a>
</header>

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

<!-- Pinned release of heatmap.js -->
<script src="https://cdn.jsdelivr.net/npm/heatmap.js@2.0.5/build/heatmap.min.js"></script>

<script>
(() => {
  "use strict";

  var _host = window.location.host;
  var _base_path = (_host == 'localhost') ? '/ceylontravellanka/' : '';

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