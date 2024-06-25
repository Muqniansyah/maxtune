<form method="post" class="form-new">
    <button type="button" class="edit-button" data-toggle="modal" data-target="#modalAdd">
        <i class="fas fa-plus"></i> New Data
    </button>
</form>

<!-- Modal Tambah Start -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo base_url(). 'dashboard/cetak'; ?>" method="post">
                    <div class="form-group">
                        <label for="nama" class="col-form-label label-edit">Nama:</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama Anda">
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label label-edit">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email Anda">
                    </div>

                    <div class="form-group">
                        <label for="nohp" class="col-form-label label-edit">No. HP:</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Masukkan nomor HP Anda">
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat" class="col-form-label label-edit">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat Anda"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="provinsi" class="col-form-label label-edit">Provinsi:</label>
                        <select name="provinsi" id="provinsi" class="form-control">
                            <option value="">Pilih Provinsi</option>
                            <option value="Dki Jakarta">Dki Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                        </select>

                        <div class="error-text"  id="provinsi-error">
                            <?php echo form_error('provinsi'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kota" class="col-form-label label-edit">Kota:</label>
                        <select name="kota" id="kota" class="form-control">
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
                        <label for="motor" class="col-form-label label-edit">Motor:</label>
                        <select class="form-control" name="motor" id="motor">
                            <option value="">Pilih Motor</option>
                            <option value="Motor Sport - Muqni">Motor Sport</option>
                            <option value="Motor Cruiser - Rahman">Motor Cruiser</option>
                            <option value="Motor Matic - Rangga">Motor Matic</option>
                            <option value="Motor Cub - Calvin">Motor Cub</option>
                            <option value="Motor EV - Revanda">Motor EV</option>
                            <option value="Motor Bigbike - Rois">Motor Bigbike</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_servis" class="col-form-label label-edit">Jenis Servis:</label>
                        <select class="form-control" name="jenis_servis" id="jenis_servis">
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
                        <label for="jadwal" class="col-form-label label-edit">Jadwal:</label>
                        <input type="date" class="form-control" name="jadwal" id="jadwal">
                    </div>

                    <div class="form-group">
                        <label for="jam" class="col-form-label label-edit">Jam:</label>
                        <input type="time" class="form-control" name="jam" id="jam">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah End -->

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