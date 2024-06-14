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
                        <input type="tel" class="form-control" name="nohp" id="nohp" placeholder="Masukkan nomor HP Anda">
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-form-label label-edit">Alamat:</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat Anda"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="provinsi" class="col-form-label label-edit">Provinsi:</label>
                        <select class="form-control" name="provinsi" id="provinsi">
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
                    </div>

                    <div class="form-group">
                        <label for="kota" class="col-form-label label-edit">Kota:</label>
                        <select class="form-control" name="kota" id="kota">
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
                    </div>

                    <div class="form-group">
                        <label for="motor" class="col-form-label label-edit">Motor:</label>
                        <select class="form-control" name="motor" id="motor">
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
                    </div>

                    <div class="form-group">
                        <label for="jenis_servis" class="col-form-label label-edit">Jenis Servis:</label>
                        <input type="text" class="form-control" name="jenis_servis" id="jenis_servis" placeholder="Masukkan jenis servis yang diperlukan">
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