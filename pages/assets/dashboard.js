(function () {
    const shell = document.querySelector('.dashboardShell');
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.querySelector('.sidebarToggle');
    const sidebarBackdrop = document.querySelector('.sidebarBackdrop');
    const search = document.getElementById('dashboardSearch');
    const todayDate = document.getElementById('todayDate');
    const stateKey = 'comfysci-sidebar-hidden';

    function setSidebarHidden(hidden) {
        if (hidden) {
            shell.classList.add('sidebar-collapsed');
            sidebarToggle.setAttribute('aria-expanded', 'false');
            sidebarToggle.setAttribute('aria-label', 'Show sidebar');
        } else {
            shell.classList.remove('sidebar-collapsed');
            sidebarToggle.setAttribute('aria-expanded', 'true');
            sidebarToggle.setAttribute('aria-label', 'Hide sidebar');
        }

        if (window.innerWidth > 760) {
            if (hidden) {
                localStorage.setItem(stateKey, '1');
            } else {
                localStorage.setItem(stateKey, '0');
            }
        }
    }

    const savedHidden = localStorage.getItem(stateKey) === '1';
    let initialHidden = true;
    if (window.innerWidth > 760) {
        initialHidden = savedHidden;
    }
    setSidebarHidden(initialHidden);

    sidebarToggle.addEventListener('click', function () {
        setSidebarHidden(!shell.classList.contains('sidebar-collapsed'));
    });

    sidebarBackdrop.addEventListener('click', function () {
        setSidebarHidden(true);
    });

    document.addEventListener('keydown', function (event) {
        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'b') {
            event.preventDefault();
            setSidebarHidden(!shell.classList.contains('sidebar-collapsed'));
        }
        if (event.key === 'Escape' && window.innerWidth <= 760) {
            setSidebarHidden(true);
        }
    });

    if (search) {
        search.addEventListener('input', function () {
            const query = search.value.trim().toLowerCase();
            const searchableItems = document.querySelectorAll('.searchable');
            searchableItems.forEach(function (item) {
                if (!query || item.textContent.toLowerCase().includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

    if (todayDate) {
        todayDate.textContent = new Intl.DateTimeFormat('en-PH', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        }).format(new Date());
    }

    const calendarGrid = document.getElementById('calendarGrid');
    if (calendarGrid) {
        const now = new Date();
        const year = now.getFullYear();
        const month = now.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        weekdays.forEach(function (weekday) {
            const label = document.createElement('span');
            label.className = 'dow';
            label.textContent = weekday;
            calendarGrid.appendChild(label);
        });

        for (let index = 0; index < firstDay; index += 1) {
            const blank = document.createElement('span');
            calendarGrid.appendChild(blank);
        }

        for (let day = 1; day <= daysInMonth; day += 1) {
            const date = document.createElement('span');
            date.textContent = day;
            if (day === now.getDate()) {
                date.style.background = '#ff6a00';
                date.style.color = '#fff';
                date.style.fontWeight = '700';
            }
            calendarGrid.appendChild(date);
        }
    }
}());
