<div class="footer py-10 d-flex align-items-center border-top bg-white" id="kt_footer">
    <div class="container-fluid d-flex justify-content-center align-items-center position-relative">
        <div class="text-dark">
            <span class="text-muted fw-bold me-1">2025©</span>
            <a href="#" class="text-gray-800 text-hover-primary fw-bolder" style="text-decoration: none;">Kopdar
                LoveBird Indonesia</a>
        </div>

        <div class="position-absolute end-0 me-4">
            <button class="btn btn-icon btn-light-primary rounded-circle shadow-sm" id="shareBtn"
                style="width: 45px; height: 45px;">
                <i class="bi bi-share-fill"></i>
            </button>
        </div>
    </div>
</div>

<div id="shareOverlay" class="share-overlay">
    <div class="share-card shadow-lg">
        <div class="share-header">
            <h5 class="mb-0">Bagikan Ke</h5>
            <button type="button" class="btn-close" id="closeOverlay"></button>
        </div>

        <div class="share-grid">
            <a href="#" target="_blank" class="share-item" onclick="shareWhatsApp(event)">

                <div class="icon-wrapper bg-whatsapp">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" aria-hidden="true">
                        <!-- Background -->
                        <path fill="#25D366" d="M20.52 3.48A11.91 11.91 0 0 0 12.02 0
                C5.39 0 .02 5.37.02 12
                c0 2.11.55 4.17 1.6 5.98L0 24
                l6.18-1.62a11.94 11.94 0 0 0 5.84 1.49h.01
                c6.63 0 12-5.37 12-12
                0-3.2-1.25-6.2-3.5-8.39z" />
                        <!-- Phone -->
                        <path fill="#FFFFFF" d="M17.47 14.38c-.27-.14-1.6-.79-1.85-.88
                -.25-.09-.43-.14-.61.14
                -.18.27-.7.88-.86 1.06
                -.16.18-.32.2-.59.07
                -.27-.14-1.14-.42-2.17-1.34
                -.8-.72-1.34-1.61-1.5-1.88
                -.16-.27-.02-.42.12-.56
                .13-.13.27-.32.41-.48
                .14-.16.18-.27.27-.45
                .09-.18.05-.34-.02-.48
                -.07-.14-.61-1.48-.84-2.03
                -.22-.53-.45-.46-.61-.47
                -.16-.01-.34-.01-.52-.01
                -.18 0-.48.07-.73.34
                -.25.27-.96.94-.96 2.29
                0 1.35.98 2.65 1.12 2.83
                .14.18 1.93 2.95 4.67 4.14
                .65.28 1.15.45 1.54.58
                .65.21 1.24.18 1.71.11
                .52-.08 1.6-.65 1.83-1.28
                .23-.63.23-1.17.16-1.28
                -.07-.11-.25-.18-.52-.32z" />
                    </svg>
                </div>
                <span>WhatsApp</span>
            </a>

            <a href="#" target="_blank" class="share-item" onclick="shareTwitter(event)">
                <div class="icon-wrapper bg-twitter">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="#000000"
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                    </svg>
                </div>
                <span>Twitter</span>
            </a>
            <a href="#" target="_blank" class="share-item" onclick="shareFb(event)">
                <div class="icon-wrapper bg-facebook">
                    <!-- Icon Facebook -->
                    <svg class="w-8 h-8" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="#1877F2"
                            d="M22.675 0h-21.35C.597 0 0 .597 0 1.325v21.351C0 23.404.597 24 1.325 24h11.495V14.708h-3.13v-3.622h3.13V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.464.098 2.794.143v3.24l-1.922.001c-1.505 0-1.796.716-1.796 1.767v2.317h3.588l-.467 3.622h-3.121V24h6.116c.727 0 1.324-.596 1.324-1.324V1.324C24 .597 23.403 0 22.675 0z" />
                    </svg>
                </div>
                <span>Facebook</span>
            </a>

            <button class="share-item border-0 bg-transparent" id="copyLinkBtn">
                <div class="icon-wrapper bg-secondary"><i class="bi bi-link-45deg"></i></div>
                <span>Salin Link</span>
            </button>
        </div>
    </div>
</div>

<style>
    /* Overlay Background dengan Blur */
    .share-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(4px);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 2000;
        transition: all 0.3s ease;
    }

    /* Kartu Share */
    .share-card {
        background: white;
        width: 90%;
        max-width: 400px;
        border-radius: 20px;
        padding: 20px;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .share-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f0f0f0;
    }

    /* Grid Ikon */
    .share-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }

    .share-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: #333;
        font-size: 12px;
        font-weight: 500;
        transition: transform 0.2s ease;
    }

    .share-item:hover {
        transform: scale(1.1);
        color: #000;
    }

    /* Desain Ikon Lingkaran */
    .icon-wrapper {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 24px;
        margin-bottom: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Warna Brand */
    .bg-whatsapp {
        background: #25D366;
    }

    .bg-tiktok {
        background: #eeebeb;
    }

    .bg-youtube {
        background: #FF0000;
    }

    .bg-facebook {
        background: #b3cdf0;
    }

    .bg-instagram {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }

    /* Animasi Masuk */
    .share-overlay.active {
        display: flex;
    }

    .share-overlay.active .share-card {
        transform: translateY(0);
    }
</style>

<script>
    const shareBtn = document.getElementById('shareBtn');
    const closeOverlay = document.getElementById('closeOverlay');
    const shareOverlay = document.getElementById('shareOverlay');
    const copyLinkBtn = document.getElementById('copyLinkBtn');

    // Buka Overlay
    shareBtn.addEventListener('click', () => {
        shareOverlay.classList.add('active');
    });

    // Tutup Overlay (Tombol Close atau Klik Luar)
    const closeFn = () => shareOverlay.classList.remove('active');
    closeOverlay.addEventListener('click', closeFn);
    shareOverlay.addEventListener('click', (e) => {
        if (e.target === shareOverlay) closeFn();
    });

    // Copy Link dengan Feedback yang lebih manis
    copyLinkBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const span = copyLinkBtn.querySelector('span');
            const originalText = span.innerText;
            span.innerText = 'Tersalin!';
            span.style.color = '#28a745';
            setTimeout(() => {
                span.innerText = originalText;
                span.style.color = '#333';
                closeFn();
            }, 1500);
        });
    });
</script>

<script>
    function shareWhatsApp(e) {
        e.preventDefault();
        const url = encodeURIComponent(window.location.href);
        window.open(`https://wa.me/?text=${url}`, '_blank');
    }
</script>

<script>
    function shareFb(e) {
        e.preventDefault();
        const url = encodeURIComponent(window.location.href);
        console.log(url)
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
    }
</script>

<script>
    function shareTwitter(event) {
        event.preventDefault();
        const url = encodeURIComponent(window.location.href); // Mengambil URL halaman aktif

        window.open(
            `https://twitter.com/intent/tweet?url=${url}`,
            'share-twitter',
            'width=550,height=450'
        );
    }
</script>
