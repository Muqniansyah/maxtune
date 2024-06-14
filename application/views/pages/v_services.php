<section id="services" class="services">
    <h2>Layanan Booking Service</h2>
    <h3>Pesan layanan anda dengan mudah melalui platform pemesanan online Maxtune untuk kenyamanan anda.</h3>
    <form action="<?= base_url('maxtune/cetakform'); ?>" method="post" class="form-container">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" placeholder="masukkan nama">
            <div class="error-text">
                    <?php echo form_error('nama'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="masukkan email">
            <div class="error-text">
                    <?php echo form_error('email'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="nohp">No. HP:</label>
            <input type="tel" name="nohp" id="nohp" placeholder="masukkan no hp">
            <div class="error-text">
                    <?php echo form_error('nohp'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" cols="30" rows="2" placeholder="masukkan alamat"></textarea>
            <div class="error-text">
                    <?php echo form_error('alamat'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="provinsi">Provinsi:</label>
            <select name="provinsi" id="provinsi">
                <option value="">Pilih Provinsi</option>
                <option value="Aceh">Aceh</option>
                <option value="Bali">Bali</option>
                <option value="Banten">Banten</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="DI Yogyakarta">DI Yogyakarta</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Jambi">Jambi</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>
                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Lampung">Lampung</option>
                <option value="Maluku">Maluku</option>
                <option value="Maluku Utara">Maluku Utara</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                <option value="Papua">Papua</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Riau">Riau</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sumatera Barat">Sumatera Barat</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Sumatera Utara">Sumatera Utara</option>
            </select>
            <div class="error-text">
                    <?php echo form_error('provinsi'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="kota">Kota:</label>
            <select name="kota" id="kota">
                <option value="">Pilih Kota</option>
                <option value="Jakarta">Jakarta</option>
                <option value="Bandung">Bandung</option>
                <option value="Surabaya">Surabaya</option>
                <option value="Medan">Medan</option>
                <option value="Semarang">Semarang</option>
                <option value="Makassar">Makassar</option>
                <option value="Palembang">Palembang</option>
                <option value="Denpasar">Denpasar</option>
                <option value="Yogyakarta">Yogyakarta</option>
                <option value="Malang">Malang</option>
                <option value="Bekasi">Bekasi</option>
                <option value="Depok">Depok</option>
                <option value="Tangerang">Tangerang</option>
                <option value="Bogor">Bogor</option>
                <option value="Batam">Batam</option>
                <option value="Pekanbaru">Pekanbaru</option>
                <option value="Banda Aceh">Banda Aceh</option>
                <option value="Pontianak">Pontianak</option>
                <option value="Balikpapan">Balikpapan</option>
                <option value="Manado">Manado</option>
                <option value="Jayapura">Jayapura</option>
            </select>
            <div class="error-text">
                    <?php echo form_error('kota'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="motor">Motor:</label>
            <select name="motor" id="motor">
                <option value="">Pilih Motor</option>
                <option value="Honda Beat">Honda Beat</option>
                <option value="Honda Vario">Honda Vario</option>
                <option value="Honda PCX">Honda PCX</option>
                <option value="Yamaha NMAX">Yamaha NMAX</option>
                <option value="Yamaha Aerox">Yamaha Aerox</option>
                <option value="Yamaha Mio">Yamaha Mio</option>
                <option value="Suzuki Satria">Suzuki Satria</option>
                <option value="Suzuki Nex">Suzuki Nex</option>
                <option value="Kawasaki Ninja">Kawasaki Ninja</option>
                <option value="Kawasaki KLX">Kawasaki KLX</option>
            </select>
            <div class="error-text">
                    <?php echo form_error('motor'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="jenis_servis">Jenis Servis:</label>
            <input type="text" name="jenis_servis" id="jenis_servis">
            <div class="error-text">
                    <?php echo form_error('jenis_servis'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="jadwal">Jadwal:</label>
            <input type="date" name="jadwal" id="jadwal">
            <div class="error-text">
                    <?php echo form_error('jadwal'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="jam">Jam:</label>
            <input type="time" name="jam" id="jam">
            <div class="error-text">
                    <?php echo form_error('jam'); ?>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" value="Submit">
        </div>
    </form>
</section>