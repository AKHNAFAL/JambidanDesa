const sidebar = document.querySelector("aside");
const maxSidebar = document.querySelector(".max")
const miniSidebar = document.querySelector(".mini")
const roundout = document.querySelector(".roundout")
const maxToolbar = document.querySelector(".max-toolbar")
const logo = document.querySelector('.logo')
const content = document.querySelector('.content')
const moon = document.querySelector(".moon")
const sun = document.querySelector(".sun")

const theme = localStorage.getItem('theme')

function setDark(val) {
    if (val === "dark") {
        document.documentElement.classList.add('dark')
        moon.classList.add("hidden")
        sun.classList.remove("hidden")
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark')
        sun.classList.add("hidden")
        moon.classList.remove("hidden")
        localStorage.setItem('theme', 'light');
    }
}

function openNav() {
    if (sidebar.classList.contains('-translate-x-48')) {
        // max sidebar 
        sidebar.classList.remove("-translate-x-48")
        sidebar.classList.add("translate-x-none")
        maxSidebar.classList.remove("hidden")
        maxSidebar.classList.add("flex")
        miniSidebar.classList.remove("flex")
        miniSidebar.classList.add("hidden")
        maxToolbar.classList.add("translate-x-0")
        maxToolbar.classList.remove("translate-x-24", "scale-x-0")
        logo.classList.remove("ml-12")
        content.classList.remove("ml-12")
        content.classList.add("ml-12", "md:ml-60")
        // localStorage.setItem('sidebarState', 'max');
    } else {
        // mini sidebar
        sidebar.classList.add("-translate-x-48")
        sidebar.classList.remove("translate-x-none")
        maxSidebar.classList.add("hidden")
        maxSidebar.classList.remove("flex")
        miniSidebar.classList.add("flex")
        miniSidebar.classList.remove("hidden")
        maxToolbar.classList.add("translate-x-24", "scale-x-0")
        maxToolbar.classList.remove("translate-x-0")
        logo.classList.add('ml-12')
        content.classList.remove("ml-12", "md:ml-60")
        content.classList.add("ml-12")
        // localStorage.setItem('sidebarState', 'mini');
    }
}

window.onload = function () {
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
        moon.classList.add("hidden")
        sun.classList.remove("hidden")
    }
    // if (localStorage.getItem('sidebarState') === 'max') {
    //     openNav();
    // }
}

// start: Popper
const popperInstance = {}
document.querySelectorAll('.dropdown').forEach(function(item, index) {
    const popperId = 'popper-' + index
    const toggle = item.querySelector('.dropdown-toggle')
    const menu = item.querySelector('.dropdown-menu')
    menu.dataset.popperId = popperId
    popperInstance[popperId] = Popper.createPopper(toggle, menu, {
        modifiers: [{
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            },
            {
                name: 'preventOverflow',
                options: {
                    padding: 24,
                },
            },
        ],
        placement: 'bottom-end'
    });
})

document.addEventListener('click', function(e) {
    const toggle = e.target.closest('.dropdown-toggle')
    const menu = e.target.closest('.dropdown-menu')
    if (toggle) {
        const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
        const popperId = menuEl.dataset.popperId
        if (menuEl.classList.contains('hidden')) {
            hideDropdown()
            menuEl.classList.remove('hidden')
            showPopper(popperId)
        } else {
            menuEl.classList.add('hidden')
            hidePopper(popperId)
        }
    } else if (!menu) {
        hideDropdown()
    }
})

function hideDropdown() {
    document.querySelectorAll('.dropdown-menu').forEach(function(item) {
        item.classList.add('hidden')
    })
}

function showPopper(popperId) {
    popperInstance[popperId].setOptions(function(options) {
        return {
            ...options,
            modifiers: [
                ...options.modifiers,
                {
                    name: 'eventListeners',
                    enabled: true
                },
            ],
        }
    });
    popperInstance[popperId].update();
}

function hidePopper(popperId) {
    popperInstance[popperId].setOptions(function(options) {
        return {
            ...options,
            modifiers: [
                ...options.modifiers,
                {
                    name: 'eventListeners',
                    enabled: false
                },
            ],
        }
    });
}
// end: Popper