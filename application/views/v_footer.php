    <!-- Footer Start -->
    <div class="container-fluid bg-dark bg-img text-secondary" style="margin-top: 135px">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <h4 class="text-white text-uppercase mb-4">Hubungi lebih lanjut</h4>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-white me-2"></i>
                                <p class="mb-0 text-light">Jakarta, Indonesia</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-white me-2"></i>
                                <p class="mb-0 text-light">Maxtune.co.id</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-white me-2"></i>
                                <p class="mb-0 text-light">+62 812 3456 7890</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-lg btn-info btn-lg-square border-inner rounded-circle me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-info btn-lg-square border-inner rounded-circle me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-info btn-lg-square border-inner rounded-circle me-2" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white text-uppercase mb-4">Tautan Langsung</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="<?php echo base_url().'maxtune' ?>">Home</a>
                                <a class="text-light mb-2" href="<?php echo base_url().'maxtune/about' ?>">About Us</a>
                                <a class="text-light mb-2" href="<?php echo base_url().'maxtune/services' ?>">Our Services</a>
                                <!-- <a class="text-light mb-2" href="#">Meet The Team</a> -->
                                <a class="text-light mb-2" href="<?php echo base_url().'maxtune/berita' ?>">Latest Blog</a>
                                <a class="text-light" href="<?php echo base_url().'maxtune/contact' ?>">Contact Us</a>
                            </div>
                        </div>

                        <!-- subscribe -->
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <h4 class="text-white text-uppercase mb-4">Newsletter</h4>
                            <p class="text-light">Yuk jadi orang pertama yang mengetahui info.</p>
                            <form action="<?= base_url('maxtune/subscribee'); ?>" method="post">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control border-white p-1" placeholder="Your Email">
                                    <button class="btn btn-info">Subscribe</button>
                                </div>
                                <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
                            </form>
                            <!-- Message display -->
                            <?php if (isset($message)): ?>
                                <p style="color: white;"><?= $message ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-lg-n5">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-info border-inner p-4">
                        <a href="<?php echo base_url().'maxtune' ?>" class="navbar-brand">
                            <h1 class="m-0 text-uppercase text-white"><i class="fas fa-wrench"></i>Maxtune</h1>
                        </a>
                        <!-- <p class="mt-3">maps</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-secondary py-4" style="background: #111111;">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-white" href="<?php echo base_url().'maxtune' ?>">Maxtune</a> 2024.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-inner py-3 fs-4 scroll-to-top" id="scrollToTopBtn"><i class="bi bi-arrow-up"></i></a>

    <!-- my script -->
    <script src="<?php echo base_url() ?>assets/javascript/script.js"></script>
</body>
</html>