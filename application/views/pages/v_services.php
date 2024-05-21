<section id="services" class="services">
    <h2>Layanan Booking</h2>
    <form action="<?= base_url('admin/cetak'); ?>" method="post" class="form-container">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="nohp">No. HP:</label>
            <input type="tel" name="nohp" id="nohp">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" cols="30" rows="2"></textarea>
        </div>

        <div class="form-group">
            <label for="provinsi">Provinsi:</label>
            <select name="provinsi" id="provinsi">
                <option value="">Pilih Provinsi</option>
                <!-- Pilihan provinsi -->
            </select>
        </div>

        <div class="form-group">
            <label for="kota">Kota:</label>
            <select name="kota" id="kota">
                <option value="">Pilih Kota</option>
                <!-- Pilihan kota -->
            </select>
        </div>

        <div class="form-group">
            <label for="motor">Motor:</label>
            <select name="motor" id="motor">
                <option value="">Pilih Motor</option>
                <!-- Pilihan motor -->
            </select>
        </div>

        <div class="form-group">
            <label for="jenis_servis">Jenis Servis:</label>
            <input type="text" name="jenis_servis" id="jenis_servis">
        </div>

        <div class="form-group">
            <label for="jadwal">Jadwal:</label>
            <input type="date" name="jadwal" id="jadwal">
        </div>

        <div class="form-group">
            <label for="jam">Jam:</label>
            <input type="time" name="jam" id="jam">
        </div>

        <div class="form-group">
            <input type="submit" value="Submit">
        </div>
    </form>
</section>