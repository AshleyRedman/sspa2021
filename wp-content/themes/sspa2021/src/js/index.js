const scrolledNav = document.getElementById('scrollHeader');
const header = document.getElementById('header');
const offset = header.offsetHeight;
const formatedOffset = '-' + offset;

// adjust top position if wp admin bar is active
document.addEventListener('DOMContentLoaded', () => document.getElementById('wpadminbar') ? scrolledNav.style.top = 32 + 'px' : null);

// handle scrolled header on scroll event
document.addEventListener('scroll', () => {

    if (scrolledNav && header) {
        let distance = document.body.getBoundingClientRect().top;

        if (distance <= formatedOffset) {
            scrolledNav.classList.add('active');
        }

        if (distance > formatedOffset) {
            scrolledNav.classList.remove('active');
        }
    }
});
