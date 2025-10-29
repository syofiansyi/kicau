const carousel = document.getElementById('carousel');
const btnLeft = document.getElementById('scroll-left');
const btnRight = document.getElementById('scroll-right');

// Scroll with buttons
btnLeft.addEventListener('click', () => {
    carousel.scrollBy({ left: -300, behavior: 'smooth' });
});

btnRight.addEventListener('click', () => {
    carousel.scrollBy({ left: 300, behavior: 'smooth' });
});

// Drag scroll
let isDown = false;
let startX;
let scrollLeft;

carousel.addEventListener('mousedown', (e) => {
    isDown = true;
    carousel.classList.add('active');
    startX = e.pageX - carousel.offsetLeft;
    scrollLeft = carousel.scrollLeft;
});

carousel.addEventListener('mouseleave', () => {
    isDown = false;
    carousel.classList.remove('active');
});

carousel.addEventListener('mouseup', () => {
    isDown = false;
    carousel.classList.remove('active');
});

carousel.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - carousel.offsetLeft;
    const walk = (x - startX) * 2; // scroll speed
    carousel.scrollLeft = scrollLeft - walk;
});






