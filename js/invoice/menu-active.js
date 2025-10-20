document.addEventListener('DOMContentLoaded', function () {
    // Get current page filename (strip query/hash)
    let path = window.location.pathname.split('/').pop();
    if (!path || path === '') path = 'index.html'; // Default home page

    // Loop through all .menu-link elements
    document.querySelectorAll('#layout-menu .menu-link').forEach(function(link) {
        // Match by href (ignore a query, hash)
        let href = link.getAttribute('href');
        if (!href || href === 'javascript:void(0);') return;
        let hrefFile = href.split('/').pop().split('?')[0].split('#')[0];
        if (hrefFile === path) {
            // 1. Mark this <li> as active
            let menuItem = link.closest('.menu-item');
            if (menuItem) menuItem.classList.add('active');

            // 2. If inside a submenu, open parent <li> too
            let parentMenu = menuItem.closest('.menu-sub');
            if (parentMenu) {
                let parentLi = parentMenu.closest('.menu-item');
                if (parentLi) parentLi.classList.add('active', 'open');
            }
        } else {
            // Remove active class if not matching (for soft page transitions, SPA, etc.)
            let menuItem = link.closest('.menu-item');
            if (menuItem) menuItem.classList.remove('active');
            // Remove open from parents (optional, for SPA-like behavior)
            let parentMenu = menuItem.closest('.menu-sub');
            if (parentMenu) {
                let parentLi = parentMenu.closest('.menu-item');
                if (parentLi) parentLi.classList.remove('open');
            }
        }
    });
});