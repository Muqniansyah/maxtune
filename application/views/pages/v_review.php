
    <!-- Your HTML content with testimonials section -->
    <section id="review" class="review">
        <div class="container">
            <h1>Customer Review</h1>
            <div class="border"></div>

            <div class="row">
                <div class="col">
                    <div class="testimonial">
                        <img src="<?php echo base_url() ?>assets/img/customer/p1.png" alt="">
                        <div class="name">Samsul Rinner</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p>
                        Bengkel ini menggunakan suku cadang berkualitas tinggi. 
                        Saya merasa yakin motor saya dalam kondisi prima setelah diperbaiki di sini.
                        </p>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    <div class="testimonial">
                        <img src="<?php echo base_url() ?>assets/img/customer/p2.png" alt="">
                        <div class="name">Nur Evandel</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>
                        Pemilik bengkel sangat ramah dan mengerti kebutuhan pelanggan. 
                        Mereka selalu siap memberikan solusi terbaik
                        </p>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    <div class="testimonial">
                        <img src="<?php echo base_url() ?>assets/img/customer/p3.png" alt="">
                        <div class="name">Emily</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>
                        Saya sangat merekomendasikan bengkel ini untuk perawatan berkala motor. 
                        Mereka benar-benar memahami bagaimana menjaga motor dalam kondisi terbaik
                        </p>
                    </div>
                </div>

                <!-- Add other testimonial cols here -->

            </div>
        </div>
    </section>

    <!-- JavaScript code or other HTML content -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cols = document.querySelectorAll('.col');
            const observerOptions = {
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fadeIn');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            cols.forEach(col => {
                observer.observe(col);
            });
        });
    </script>
