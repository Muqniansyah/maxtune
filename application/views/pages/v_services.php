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
            <input type="text" name="nohp" id="nohp" placeholder="masukkan no hp">
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
                <option value="Dki Jakarta">Dki Jakarta</option>
                <option value="Jawa Barat">Jawa Barat</option>
            </select>

            <div class="error-text"  id="provinsi-error">
                <?php echo form_error('provinsi'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="kota">Kota:</label>
            <select name="kota" id="kota">
                <option value="">Pilih Kota</option>
                <option value="Bandung">Bandung</option>
                <option value="Banjar">Banjar</option>
                <option value="Bekasi">Bekasi</option>
                <option value="Bogor">Bogor</option>
                <option value="Cimahi">Cimahi</option>
                <option value="Cirebon">Cirebon</option>
                <option value="Depok">Depok</option>
                <option value="Sukabumi">Sukabumi</option>
                <option value="Tasikmalaya">Tasikmalaya</option>
                <option value="Jakarta Barat">Jakarta Barat</option>
                <option value="Jakarta Pusat">Jakarta Pusat</option>
                <option value="Jakarta Selatan">Jakarta Selatan</option>
                <option value="Jakarta Timur">Jakarta Timur</option>
                <option value="Jakarta Utara">Jakarta Utara</option>
            </select>

            <div class="error-text" id="kota-error">
                <?php echo form_error('kota'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="motor">Motor:</label>
            <select name="motor" id="motor">
                <option value="">Pilih Motor</option>
                <option value="Motor Sport - Muqni">Motor Sport</option>
                <option value="Motor Cruiser - Rahman">Motor Cruiser</option>
                <option value="Motor Matic - Rangga">Motor Matic</option>
                <option value="Motor Cub - Calvin">Motor Cub</option>
                <option value="Motor EV - Revanda">Motor EV</option>
                <option value="Motor Bigbike - Rois">Motor Bigbike</option>
            </select>
            <div class="error-text">
                    <?php echo form_error('motor'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="jenis_servis">Jenis Servis:</label>
            <select name="jenis_servis" id="jenis_servis">
                <option value="">Pilih Jenis Servis</option>
                <option value="Ganti oli mesin - 50k">Ganti oli mesin - 50k</option>
                <option value="Tune up - 70k">Tune up - 70k</option>
                <option value="Ganti oli gardan - 15k">Ganti oli gardan - 15k</option>
                <option value="Ganti busi - 50k">Ganti busi - 50k</option>
                <option value="Ganti filter udara - 60k">Ganti filter udara - 60k</option>
                <option value="Ganti kampas rem - 60k">Ganti kampas rem - 60k</option>
                <option value="Perawatan aki - 150k">Perawatan aki - 150k</option>
                <option value="Bongkar pasang mesin - 500k">Bongkar pasang mesin - 500k</option>
                <option value="Tambal ban - 15k">Tambal ban - 15k</option>
                <option value="Bore up - 700k">Bore up - 700k</option>
            </select>
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

<!-- script untukk provinsi dan kota -->
<script>
    // Ambil elemen-elemen yang diperlukan
    const provinsiSelect = document.getElementById('provinsi');
    const kotaSelect = document.getElementById('kota');
    const kotaOptions = {
        'Dki Jakarta': ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Utara'],
        'Jawa Barat': ['Bandung', 'Banjar', 'Bekasi', 'Bogor', 'Cimahi', 'Cirebon', 'Depok', 'Sukabumi', 'Tasikmalaya']
    };

    // Event listener untuk perubahan pada select provinsi
    provinsiSelect.addEventListener('change', function() {
        const selectedProvinsi = this.value;
        // Kosongkan terlebih dahulu pilihan kota
        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
        // Tambahkan kota-kota sesuai dengan provinsi yang dipilih
        if (selectedProvinsi in kotaOptions) {
            kotaOptions[selectedProvinsi].forEach(function(kota) {
                const option = document.createElement('option');
                option.value = kota;
                option.textContent = kota;
                kotaSelect.appendChild(option);
            });
        }
    });

    // Initial setup (menampilkan pilihan kota sesuai provinsi awal jika ada)
    if (provinsiSelect.value === 'Dki Jakarta') {
        kotaOptions['Dki Jakarta'].forEach(function(kota) {
            const option = document.createElement('option');
            option.value = kota;
            option.textContent = kota;
            kotaSelect.appendChild(option);
        });
    }
</script>