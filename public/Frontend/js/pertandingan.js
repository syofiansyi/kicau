const pertandinganCarousel = document.getElementById('pertandingan-carousel');
const pertandinganBtnLeft = document.getElementById('pertandingan-scroll-left');
const pertandinganBtnRight = document.getElementById('pertandingan-scroll-right');

// Scroll with buttons
pertandinganBtnLeft.addEventListener('click', () => {
    pertandinganCarousel.scrollBy({
        left: -300,
        behavior: 'smooth'
    });
});

pertandinganBtnRight.addEventListener('click', () => {
    pertandinganCarousel.scrollBy({
        left: 300,
        behavior: 'smooth'
    });
});

// Drag scroll
let isDraggingPertandingan = false;
let startXPertandingan;
let scrollLeftPertandingan;

pertandinganCarousel.addEventListener('mousedown', (e) => {
    isDraggingPertandingan = true;
    pertandinganCarousel.classList.add('active');
    startXPertandingan = e.pageX - pertandinganCarousel.offsetLeft;
    scrollLeftPertandingan = pertandinganCarousel.scrollLeft;
});

pertandinganCarousel.addEventListener('mouseleave', () => {
    isDraggingPertandingan = false;
    pertandinganCarousel.classList.remove('active');
});

pertandinganCarousel.addEventListener('mouseup', () => {
    isDraggingPertandingan = false;
    pertandinganCarousel.classList.remove('active');
});

pertandinganCarousel.addEventListener('mousemove', (e) => {
    if (!isDraggingPertandingan) return;
    e.preventDefault();
    const x = e.pageX - pertandinganCarousel.offsetLeft;
    const walk = (x - startXPertandingan) * 2; // scroll speed
    pertandinganCarousel.scrollLeft = scrollLeftPertandingan - walk;
});
