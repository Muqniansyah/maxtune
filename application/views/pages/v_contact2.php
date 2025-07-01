<style>
    .social-media-embed {
        display: flex;
        flex-direction: column;
        gap: 40px;
        max-width: 900px;
        margin: auto;
    }

    .media-box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .media-box:hover {
        transform: translateY(-5px);
    }

    .media-title {
        margin-bottom: 20px;
        font-size: 1.6em;
        font-weight: bold;
        color: #222;
    }

    .responsive-video {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 10px;
    }

    .responsive-video iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .instagram-embed blockquote {
        max-width: 100%;
        width: 100%;
        margin: 0 auto;
    }

    @media (min-width: 768px) {
        .social-media-embed {
            flex-direction: row;
            justify-content: space-between;
        }

        .media-box {
            width: 48%;
        }
    }
</style>

<!-- Sosial Media Start -->
<section class="sosial-media-section">
    <h2 style="text-align: center; margin-bottom: 30px; margin-top: 130px;">Media Sosial</h2>

    <div class="social-media-embed">
        <!-- YouTube -->
        <div class="media-box">
            <h3 class="media-title">Tonton Kami di YouTube</h3>
            <div class="responsive-video">
                <iframe src="https://www.youtube.com/embed/MFaArTMyMRI"
                        title="Rahasia Jadi Mekanik Handal"
                        allowfullscreen>
                </iframe>
            </div>
        </div>

        <!-- Instagram -->
        <div class="media-box">
            <h3 class="media-title">Postingan Instagram Terbaru</h3>
            <div class="instagram-embed">
                <!--  data-instgrm-permalink : link_instagram -->
                <blockquote class="instagram-media" 
                    data-instgrm-permalink="https://www.instagram.com/p/C7u9e8qPzDP/" 
                    data-instgrm-version="14" 
                    style="background:#fff; border:0;">
                </blockquote>
            </div>
        </div>
    </div>
</section>
<!-- Sosial Media End -->

<!-- Instagram Embed Script -->
<script async defer src="//www.instagram.com/embed.js"></script>

<!-- memproses ulang embed Instagram secara manual setelah halaman selesai dimuat. -->
<script>
    window.addEventListener('load', function () {
        if (window.instgrm) {
            window.instgrm.Embeds.process();
        }
    });
</script>