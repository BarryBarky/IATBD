const expandSidebar = (icon, el) => {
    if (el.classList.contains('sidebar-hidden')) {
        el.style.top = `${icon.parentElement.getBoundingClientRect().bottom}px`
        icon.classList.remove('fa-chevron-right')
        icon.classList.add('fa-chevron-left')
        el.classList.remove('sidebar-hidden')
        el.classList.add('sidebar-active')
    } else if (el.classList.contains('sidebar-active')) {
        icon.classList.remove('fa-chevron-left')
        icon.classList.add('fa-chevron-right')
        el.classList.remove('sidebar-active')
        el.classList.add('sidebar-hidden')
    }
}
