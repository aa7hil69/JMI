/**
 * Admin UI notifications — replaces browser alert() popups for DataTables
 * and provides showAdminToast() for custom in-page messages.
 */
(function () {
  function ensureHost() {
    var host = document.getElementById("admin-toast-host");
    if (host) return host;
    host = document.createElement("div");
    host.id = "admin-toast-host";
    host.style.cssText =
      "position:fixed;top:20px;right:20px;z-index:99999;max-width:420px;width:calc(100% - 40px);";
    document.body.appendChild(host);
    return host;
  }

  window.showAdminToast = function (message, type) {
    type = type || "warning";
    var map = {
      warning: "alert-warning",
      danger: "alert-danger",
      error: "alert-danger",
      success: "alert-success",
      info: "alert-info",
    };
    var cls = map[type] || "alert-warning";
    var host = ensureHost();
    var el = document.createElement("div");
    el.className = "alert " + cls + " alert-dismissible fade show shadow";
    el.setAttribute("role", "alert");
    el.style.marginBottom = "10px";
    // Keep message readable; strip noisy DataTables prefix when present
    var text = String(message || "")
      .replace(/^DataTables warning:\s*table id=[^\s-]+\s*-\s*/i, "")
      .trim();
    el.innerHTML =
      "<strong>Notice:</strong> " +
      text.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
      '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
    host.appendChild(el);
    setTimeout(function () {
      if (el.parentNode) el.parentNode.removeChild(el);
    }, 6000);
  };

  function installDataTablesErrorMode() {
    if (!window.jQuery || !jQuery.fn || !jQuery.fn.dataTable) return false;
    jQuery.fn.dataTable.ext.errMode = function (settings, helpPage, message) {
      window.showAdminToast(message, "warning");
    };
    return true;
  }

  // Install as soon as DataTables is available
  if (!installDataTablesErrorMode()) {
    var tries = 0;
    var timer = setInterval(function () {
      tries += 1;
      if (installDataTablesErrorMode() || tries > 40) clearInterval(timer);
    }, 50);
  }
})();
