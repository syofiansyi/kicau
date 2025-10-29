const carouselJuara = document.getElementById('carousel-juara');
const btnLeftJuara = document.getElementById('scroll-left-juara');
const btnRightJuara = document.getElementById('scroll-right-juara');

// Scroll with buttons
btnLeftJuara.addEventListener('click', () => {
    carouselJuara.scrollBy({ left: -300, behavior: 'smooth' });
});

btnRightJuara.addEventListener('click', () => {
    carouselJuara.scrollBy({ left: 300, behavior: 'smooth' });
});

// Drag scroll
let isDownJuara = false;
let startXJuara;
let scrollLeftJuara;

carouselJuara.addEventListener('mousedown', (e) => {
    isDownJuara = true;
    carouselJuara.classList.add('active');
    startXJuara = e.pageX - carouselJuara.offsetLeft;
    scrollLeftJuara = carouselJuara.scrollLeft;
});

carouselJuara.addEventListener('mouseleave', () => {
    isDownJuara = false;
    carouselJuara.classList.remove('active');
});

carouselJuara.addEventListener('mouseup', () => {
    isDownJuara = false;
    carouselJuara.classList.remove('active');
});

carouselJuara.addEventListener('mousemove', (e) => {
    if (!isDownJuara) return;
    e.preventDefault();
    const x = e.pageX - carouselJuara.offsetLeft;
    const walk = (x - startXJuara) * 2; // scroll speed
    carouselJuara.scrollLeft = scrollLeftJuara - walk;
});
