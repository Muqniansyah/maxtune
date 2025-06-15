<!-- Contact -->
<section id="contact" class="contact">
    <h2>Form Kontak</h2>
    <h3>Jika ada pertanyaan, saran atau kritik anda bisa menghubungi kami dengan cara mengisi form dibawah ini.</h3>
    <!-- pesan error start -->
    <?php if ($this->session->flashdata('pesan_error_kontak')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('pesan_error_kontak'); ?>
        </div>
    <?php endif; ?>
    <!-- pesan error end -->
    <div class="container">
        <div class="contact-wrapper">
            <div class="form-container">
                <form action="<?= base_url('maxtune/cetakkontak');?>" method="post">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="masukkan nama">
                    <div class="error-text">
                        <?php echo form_error('nama'); ?>
                    </div>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="masukkan email">
                    <div class="error-text">
                        <?php echo form_error('email'); ?>
                    </div>
                    
                    <label for="pesan">Pesan:</label>
                    <textarea id="pesan" name="pesan" rows="4" cols="50" placeholder="isi pesan"></textarea>
                    <div class="error-text">
                        <?php echo form_error('pesan'); ?>
                    </div>
                    
                    <input type="submit" value="Kirim">
                </form>
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31736.58591622742!2d106.95764531083982!3d-6.120844499999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a21bce5534483%3A0x239243e4c2f437c5!2sBengkel%20motor%20A%26M!5e0!3m2!1sid!2sid!4v1716111762423!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- Start flash data -->
    <?php if($this->session->flashdata('pesan_kontak')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('pesan_kontak'); ?>
        </div>
    <?php endif; ?>
    <!-- End flash data -->
</section>
<!-- Akhir contact -->

<!-- WhatsApp CTA Floating -->
<a href="https://wa.me/6281220893249?" class="whatsapp-float" target="_blank">
    <img src="<?php echo base_url() ?>assets/img/cta/whatsapp.png" alt="whatsapp-logo">
</a>
