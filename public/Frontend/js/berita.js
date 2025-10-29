const newsCarousel = document.getElementById('news-carousel');
const newsBtnLeft = document.getElementById('news-scroll-left');
const newsBtnRight = document.getElementById('news-scroll-right');

// Scroll with buttons
newsBtnLeft.addEventListener('click', () => {
    newsCarousel.scrollBy({
        left: -300,
        behavior: 'smooth'
    });
});

newsBtnRight.addEventListener('click', () => {
    newsCarousel.scrollBy({
        left: 300,
        behavior: 'smooth'
    });
});

// Drag scroll
let isDraggingNews = false;
let startXNews;
let scrollLeftNews;

newsCarousel.addEventListener('mousedown', (e) => {
    isDraggingNews = true;
    newsCarousel.classList.add('active');
    startXNews = e.pageX - newsCarousel.offsetLeft;
    scrollLeftNews = newsCarousel.scrollLeft;
});

newsCarousel.addEventListener('mouseleave', () => {
    isDraggingNews = false;
    newsCarousel.classList.remove('active');
});

newsCarousel.addEventListener('mouseup', () => {
    isDraggingNews = false;
    newsCarousel.classList.remove('active');
});

newsCarousel.addEventListener('mousemove', (e) => {
    if (!isDraggingNews) return;
    e.preventDefault();
    const x = e.pageX - newsCarousel.offsetLeft;
    const walk = (x - startXNews) * 2; // scroll speed
    newsCarousel.scrollLeft = scrollLeftNews - walk;
});
