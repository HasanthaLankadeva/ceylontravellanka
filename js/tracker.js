(() => {
  "use strict";

  var _host = window.location.host;
  var _base_path = (_host == 'localhost') ? 'http://localhost/ceylontravellanka/' : 'https://ceylontravellanka.com/';

  const endpoint = _base_path + "heatmap/collect";
  let lastClickAt = 0;

  function deviceType() {
    const w = window.innerWidth;
    if (w < 768) return "mobile";
    if (w < 1024) return "tablet";
    return "desktop";
  }

  document.addEventListener("click", event => {
    if (!(event.target instanceof Element)) return;

    // Exclude fields and any element marked as private.
    if (event.target.closest(
      "input, textarea, select, [data-heatmap-ignore]"
    )) return;

    // Don't record clicks in the admin panel.
    if (document.documentElement.dataset.heatmapAdmin === "true") {
      return;
    }

    // Basic client-side throttle; server must also rate-limit.
    const now = Date.now();
    if (now - lastClickAt < 100) return;
    lastClickAt = now;

    const width = window.innerWidth;
    const height = window.innerHeight;

    if (!width || !height) return;

    const eventData = {
      page: window.location.pathname,
      x: event.clientX / width,
      docY: Math.round(event.clientY + window.scrollY),
      width,
      height,
      device: deviceType()
    };

    fetch(endpoint, {
      method: "POST",
      credentials: "same-origin",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(eventData),
      keepalive: true
    }).catch(() => {
      // Analytics must not disrupt normal site behavior.
    });
  }, { passive: true });
})();