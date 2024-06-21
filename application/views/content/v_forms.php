<center>
    <h1>Daftar Layanan Service</h1>

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
                    <td class="action-dash">
                        <form method="post">
                            <button type="button" class="edit-button" data-toggle="modal" data-target="#modalEdit" data-id="<?= $user['id']; ?>" data-nama="<?= $user['nama']; ?>" data-email="<?= $user['email']; ?>" data-nohp="<?= $user['nohp']; ?>" data-alamat="<?= $user['alamat']; ?>" data-provinsi="<?= $user['provinsi']; ?>" data-kota="<?= $user['kota']; ?>" data-motor="<?= $user['motor']; ?>" data-jenis_servis="<?= $user['jenis_servis']; ?>" data-jadwal="<?= $user['jadwal']; ?>" data-jam="<?= $user['jam']; ?>">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>

                        <form method="post" action="<?php echo base_url('dashboard/hapusform/'.$user['id']); ?>">
                            <button type="submit" class="hapus-button" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        
                        <form method="post">
                            <button type="button" class="print-button" data-id="<?= $user['id']; ?>" data-nama="<?= $user['nama']; ?>" data-email="<?= $user['email']; ?>" data-nohp="<?= $user['nohp']; ?>" data-alamat="<?= $user['alamat']; ?>" data-provinsi="<?= $user['provinsi']; ?>" data-kota="<?= $user['kota']; ?>" data-motor="<?= $user['motor']; ?>" data-jenis_servis="<?= $user['jenis_servis']; ?>" data-jadwal="<?= $user['jadwal']; ?>" data-jam="<?= $user['jam']; ?>" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-print"></i>
                            </button>
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
                            <label for="jenis_servis" class="col-form-label label-edit">Jenis Servis :</label>
                            <select name="jenis_servis" id="jenis_servis" class="form-control">
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
