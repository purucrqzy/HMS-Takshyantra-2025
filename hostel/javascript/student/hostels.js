function toggleTray(trayId) {
    const tray = document.getElementById(trayId);
    tray.classList.toggle("open");
}

function navigateToPage(url) {
    window.location.href = url;
}
