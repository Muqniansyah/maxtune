<center>
    <h1>Daftar Pemesanan Servis</h1>

    <!-- Start flash data -->
    <?php if($this->session->flashdata('message')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>
    <!-- End flash data -->
    
    <?php $this->load->view("partial/v_newdata.php") ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Motor</th>
            <th>Jenis Servis</th>
            <th>Jadwal</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>
        <?php if(isset($list_form) && is_array($list_form) && count($list_form) > 0): ?>
            <?php foreach ($list_form as $user) : ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['nohp']; ?></td>
                    <td><?= $user['alamat']; ?></td>
                    <td><?= $user['provinsi']; ?></td>
                    <td><?= $user['kota']; ?></td>
                    <td><?= $user['motor']; ?></td>
                    <td><?= isset($user['nama_servis']) ? $user['nama_servis'] : 'Jenis servis tidak ditemukan'; ?></td>
                    <td><?= $user['jadwal']; ?></td>
                    <td><?= $user['jam']; ?></td>
                    <td class="action-dash">
                        <!-- Tombol Edit -->
                        <button type="button" class="edit-button" data-toggle="modal" data-target="#modalEdit"
                            data-id="<?= $user['id']; ?>"
                            data-nama="<?= $user['nama']; ?>"
                            data-email="<?= $user['email']; ?>"
                            data-nohp="<?= $user['nohp']; ?>"
                            data-alamat="<?= $user['alamat']; ?>"
                            data-provinsi="<?= $user['provinsi']; ?>"
                            data-kota="<?= $user['kota']; ?>"
                            data-motor="<?= $user['motor']; ?>"
                            data-jenis_servis="<?= $user['jenis_servis']; ?>"
                            data-jadwal="<?= $user['jadwal']; ?>"
                            data-jam="<?= $user['jam']; ?>">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Tombol Hapus -->
                        <form method="post" action="<?= base_url('dashboard/hapusform/'.$user['id']); ?>">
                            <button type="submit" class="hapus-button" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <!-- Tombol Print -->
                        <button type="button" class="print-button" data-toggle="modal" data-target="#exampleModal"
                            data-id="<?= $user['id']; ?>"
                            data-nama="<?= $user['nama']; ?>"
                            data-email="<?= $user['email']; ?>"
                            data-nohp="<?= $user['nohp']; ?>"
                            data-alamat="<?= $user['alamat']; ?>"
                            data-provinsi="<?= $user['provinsi']; ?>"
                            data-kota="<?= $user['kota']; ?>"
                            data-motor="<?= $user['motor']; ?>"
                            data-jenis_servis="<?= $user['nama_servis']; ?>"
                            data-jadwal="<?= $user['jadwal']; ?>"
                            data-jam="<?= $user['jam']; ?>">
                            <i class="fas fa-print"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="12">Tidak ada data layanan.</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="12" align="center">
                <a href="<?= base_url('dashboard'); ?>">Kembali</a>
            </td>
        </tr>
    </table>

    <!-- Modal Print Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Maxtune</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1><?php echo $judul ?></h1>
                    <p><strong>ID:</strong> <span id="modal-id"></span></p>
                    <p><strong>Nama:</strong> <span id="modal-nama"></span></p>
                    <p><strong>Email:</strong> <span id="modal-email"></span></p>
                    <p><strong>No HP:</strong> <span id="modal-nohp"></span></p>
                    <p><strong>Alamat:</strong> <span id="modal-alamat"></span></p>
                    <p><strong>Provinsi:</strong> <span id="modal-provinsi"></span></p>
                    <p><strong>Kota:</strong> <span id="modal-kota"></span></p>
                    <p><strong>Motor:</strong> <span id="modal-motor"></span></p>
                    <p><strong>Jenis Servis:</strong> <span id="modal-jenis_servis"></span></p>
                    <p><strong>Jadwal:</strong> <span id="modal-jadwal"></span></p>
                    <p><strong>Jam:</strong> <span id="modal-jam"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Print End -->

    <!-- Modal Edit Start -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Maxtune Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(). 'dashboard/updateform'; ?>" method="post">
                        <div class="form-group">
                            <label for="recipient-id" class="col-form-label label-edit">ID :</label>
                            <input type="text" class="form-control" id="recipient-id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="recipient-nama" class="col-form-label label-edit">Nama :</label>
                            <input type="text" class="form-control" id="recipient-nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label label-edit">Email :</label>
                            <input type="email" class="form-control" id="recipient-email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-nohp" class="col-form-label label-edit">No HP :</label>
                            <input type="text" class="form-control" id="recipient-nohp" name="nohp">
                        </div>
                        <div class="form-group">
                            <label for="recipient-alamat" class="col-form-label label-edit">Alamat :</label>
                            <input type="text" class="form-control" id="recipient-alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="col-form-label label-edit">Provinsi :</label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">Pilih Provinsi</option>
                                <option value="Dki Jakarta">Dki Jakarta</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kota" class="col-form-label label-edit">Kota :</label>
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
                        </div>
                        <div class="form-group">
                            <label for="motor" class="col-form-label label-edit">Motor :</label> 
                            <select class="form-control" name="motor" id="motor">
                                <option value="">Pilih Motor</option>
                                <option value="Motor Sport - Muqni">Motor Sport</option>
                                <option value="Motor Cruiser - Irawan">Motor Cruiser</option>
                                <option value="Motor Matic - Haikal">Motor Matic</option>
                                <option value="Motor Cub - Saiful">Motor Cub</option>
                                <option value="Motor EV - Fahri">Motor EV</option>
                                <!-- <option value="Motor Bigbike - Rois">Motor Bigbike</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_servis" class="col-form-label label-edit">Jenis Servis :</label>
                            <select name="jenis_servis" id="jenis_servis" class="form-control">
                                <option value="">Pilih Jenis Servis</option>
                                <option value="1">Ganti oli mesin</option>
                                <option value="2">Tune up</option>
                                <option value="3">Ganti oli gardan</option>
                                <option value="4">Ganti busi</option>
                                <option value="5">Ganti filter udara</option>
                                <option value="6">Ganti kampas rem</option>
                                <option value="7">Perawatan aki</option>
                                <option value="8">Bongkar pasang mesin</option>
                                <option value="9">Tambal ban</option>
                                <option value="10">Bore up</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-jadwal" class="col-form-label label-edit">Jadwal :</label>
                            <input type="date" class="form-control" id="recipient-jadwal" name="jadwal">
                        </div>
                        <div class="form-group">
                            <label for="recipient-jam" class="col-form-label label-edit">Jam :</label>
                            <input type="time" class="form-control" id="recipient-jam" name="jam">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit End -->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Modal Print
        document.querySelectorAll('.print-button').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('modal-id').textContent = this.dataset.id;
                document.getElementById('modal-nama').textContent = this.dataset.nama;
                document.getElementById('modal-email').textContent = this.dataset.email;
                document.getElementById('modal-nohp').textContent = this.dataset.nohp;
                document.getElementById('modal-alamat').textContent = this.dataset.alamat;
                document.getElementById('modal-provinsi').textContent = this.dataset.provinsi;
                document.getElementById('modal-kota').textContent = this.dataset.kota;
                document.getElementById('modal-motor').textContent = this.dataset.motor;
                document.getElementById('modal-jenis_servis').textContent = this.dataset.jenis_servis; // nama
                document.getElementById('modal-jadwal').textContent = this.dataset.jadwal;
                document.getElementById('modal-jam').textContent = this.dataset.jam;
            });
        });

        // Modal Edit
        document.querySelectorAll('.edit-button').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('recipient-id').value = this.dataset.id;
                document.getElementById('recipient-nama').value = this.dataset.nama;
                document.getElementById('recipient-email').value = this.dataset.email;
                document.getElementById('recipient-nohp').value = this.dataset.nohp;
                document.getElementById('recipient-alamat').value = this.dataset.alamat;
                document.getElementById('provinsi').value = this.dataset.provinsi;
                document.getElementById('kota').value = this.dataset.kota;
                document.getElementById('motor').value = this.dataset.motor;
                document.getElementById('jenis_servis').value = this.dataset.jenis_servis; // ID
                document.getElementById('recipient-jadwal').value = this.dataset.jadwal;
                document.getElementById('recipient-jam').value = this.dataset.jam;
            });
        });
    });
    </script>
</center>
