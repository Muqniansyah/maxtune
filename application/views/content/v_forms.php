<center>
    <h1>Daftar Layanan Service</h1>

    <!-- Start flash data -->
    <?php if($this->session->flashdata('message')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>
    <!-- End flash data -->
    
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
            <th>Action</th>
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
                    <td><?= $user['jenis_servis']; ?></td>
                    <td><?= $user['jadwal']; ?></td>
                    <td><?= $user['jam']; ?></td>
                    <td class="action-dash-form">
                        <form method="post">
                            <button type="button" class="edit-button" data-toggle="modal" data-target="#modalEdit" data-id="<?= $user['id']; ?>" data-nama="<?= $user['nama']; ?>" data-email="<?= $user['email']; ?>" data-nohp="<?= $user['nohp']; ?>" data-alamat="<?= $user['alamat']; ?>" data-provinsi="<?= $user['provinsi']; ?>" data-kota="<?= $user['kota']; ?>" data-motor="<?= $user['motor']; ?>" data-jenis_servis="<?= $user['jenis_servis']; ?>" data-jadwal="<?= $user['jadwal']; ?>" data-jam="<?= $user['jam']; ?>">Edit</button>
                        </form>

                        <form method="post" action="<?php echo base_url('dashboard/hapusform/'.$user['id']); ?>">
                            <input type="submit" value="Hapus" class="hapus-button" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                        </form>
                        
                        <form method="post">
                            <button type="button" class="print-button" data-id="<?= $user['id']; ?>" data-nama="<?= $user['nama']; ?>" data-email="<?= $user['email']; ?>" data-nohp="<?= $user['nohp']; ?>" data-alamat="<?= $user['alamat']; ?>" data-provinsi="<?= $user['provinsi']; ?>" data-kota="<?= $user['kota']; ?>" data-motor="<?= $user['motor']; ?>" data-jenis_servis="<?= $user['jenis_servis']; ?>" data-jadwal="<?= $user['jadwal']; ?>" data-jam="<?= $user['jam']; ?>" data-toggle="modal" data-target="#exampleModal">Cetak</button>
                        </form>
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
                            <label for="recipient-id" class="col-form-label">ID :</label>
                            <input type="text" class="form-control" id="recipient-id" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="recipient-nama" class="col-form-label">Nama :</label>
                            <input type="text" class="form-control" id="recipient-nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Email :</label>
                            <input type="email" class="form-control" id="recipient-email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="recipient-nohp" class="col-form-label">No HP :</label>
                            <input type="text" class="form-control" id="recipient-nohp" name="nohp">
                        </div>
                        <div class="form-group">
                            <label for="recipient-alamat" class="col-form-label">Alamat :</label>
                            <input type="text" class="form-control" id="recipient-alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="recipient-provinsi" class="col-form-label">Provinsi :</label>
                            <input type="text" class="form-control" id="recipient-provinsi" name="provinsi">
                        </div>
                        <div class="form-group">
                            <label for="recipient-kota" class="col-form-label">Kota :</label>
                            <input type="text" class="form-control" id="recipient-kota" name="kota">
                        </div>
                        <div class="form-group">
                            <label for="recipient-motor" class="col-form-label">Motor :</label>
                            <input type="text" class="form-control" id="recipient-motor" name="motor">
                        </div>
                        <div class="form-group">
                            <label for="recipient-jenis_servis" class="col-form-label">Jenis Servis :</label>
                            <input type="text" class="form-control" id="recipient-jenis_servis" name="jenis_servis">
                        </div>
                        <div class="form-group">
                            <label for="recipient-jadwal" class="col-form-label">Jadwal :</label>
                            <input type="date" class="form-control" id="recipient-jadwal" name="jadwal">
                        </div>
                        <div class="form-group">
                            <label for="recipient-jam" class="col-form-label">Jam :</label>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Untuk modal print
            let printButtons = document.querySelectorAll('.print-button');
            printButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    let nama = this.getAttribute('data-nama');
                    let email = this.getAttribute('data-email');
                    let nohp = this.getAttribute('data-nohp');
                    let alamat = this.getAttribute('data-alamat');
                    let provinsi = this.getAttribute('data-provinsi');
                    let kota = this.getAttribute('data-kota');
                    let motor = this.getAttribute('data-motor');
                    let jenis_servis = this.getAttribute('data-jenis_servis');
                    let jadwal = this.getAttribute('data-jadwal');
                    let jam = this.getAttribute('data-jam');
                    document.getElementById('modal-id').textContent = id;
                    document.getElementById('modal-nama').textContent = nama;
                    document.getElementById('modal-email').textContent = email;
                    document.getElementById('modal-nohp').textContent = nohp;
                    document.getElementById('modal-alamat').textContent = alamat;
                    document.getElementById('modal-provinsi').textContent = provinsi;
                    document.getElementById('modal-kota').textContent = kota;
                    document.getElementById('modal-motor').textContent = motor;
                    document.getElementById('modal-jenis_servis').textContent = jenis_servis;
                    document.getElementById('modal-jadwal').textContent = jadwal;
                    document.getElementById('modal-jam').textContent = jam;
                });
            });

            // Untuk modal edit
            $('#modalEdit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nama = button.data('nama');
                var email = button.data('email');
                var nohp = button.data('nohp');
                var alamat = button.data('alamat');
                var provinsi = button.data('provinsi');
                var kota = button.data('kota');
                var motor = button.data('motor');
                var jenis_servis = button.data('jenis_servis');
                var jadwal = button.data('jadwal');
                var jam = button.data('jam');

                var modal = $(this);
                modal.find('.modal-body #recipient-id').val(id);
                modal.find('.modal-body #recipient-nama').val(nama);
                modal.find('.modal-body #recipient-email').val(email);
                modal.find('.modal-body #recipient-nohp').val(nohp);
                modal.find('.modal-body #recipient-alamat').val(alamat);
                modal.find('.modal-body #recipient-provinsi').val(provinsi);
                modal.find('.modal-body #recipient-kota').val(kota);
                modal.find('.modal-body #recipient-motor').val(motor);
                modal.find('.modal-body #recipient-jenis_servis').val(jenis_servis);
                modal.find('.modal-body #recipient-jadwal').val(jadwal);
                modal.find('.modal-body #recipient-jam').val(jam);
            });
        });
    </script>
</center>
