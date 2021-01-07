const scrolledNav = document.getElementById('scrollHeader');
const header = document.getElementById('header');
const offset = header.offsetHeight;
const formatedOffset = '-' + offset;

document.addEventListener('scroll', function() {

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
