<center>
    <h1>Daftar Contact</h1>

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
            <th>Pesan</th>
            <th>Action</th>
        </tr>
        <?php if(isset($dtkontak) && is_array($dtkontak) && count($dtkontak) > 0): ?>
            <?php foreach ($dtkontak as $contact) : ?>
                <tr>
                    <td><?= $contact['id']; ?></td>
                    <td><?= $contact['nama']; ?></td>
                    <td><?= $contact['email']; ?></td>
                    <td><?= $contact['pesan']; ?></td>
                    <td class="action-dash">
                        <form method="post">
                            <button type="button" class="edit-button" data-toggle="modal" data-target="#modalEdit" data-id="<?= $contact['id']; ?>" data-nama="<?= $contact['nama']; ?>" data-email="<?= $contact['email']; ?>" data-pesan="<?= $contact['pesan']; ?>">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>

                        <form method="post" action="<?php echo base_url('dashboard/hapuskontak/'.$contact['id']); ?>">
                            <button type="submit" class="hapus-button" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>

                        <form method="post">
                            <button type="button" class="print-button" data-id="<?= $contact['id']; ?>" data-nama="<?= $contact['nama']; ?>" data-email="<?= $contact['email']; ?>" data-pesan="<?= $contact['pesan']; ?>" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-print"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada pesan contact yang dapat ditampilkan.</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="5" align="center">
                <a href="<?= base_url('dashboard'); ?>">Kembali</a>
            </td>
        </tr>
    </table>

    <!-- Modal Print Start-->
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
                    <p>
                        <strong>ID:</strong>
                        <span id="modal-id"></span>
                    </p>
                    <p>
                        <strong>Nama:</strong>
                        <span id="modal-nama"></span>
                    </p>
                    <p>
                        <strong>Email:</strong>
                        <span id="modal-email"></span>
                    </p>
                    <p>
                        <strong>Pesan:</strong>
                        <span id="modal-pesan"></span>
                    </p>
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
                    <form action="<?php echo base_url(). 'dashboard/updatekontak'; ?>" method="post">
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
                            <label for="recipient-pesan" class="col-form-label label-edit">Pesan :</label>
                            <textarea class="form-control" id="recipient-pesan" name="pesan"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let printButtons = document.querySelectorAll('.print-button');
            printButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    let nama = this.getAttribute('data-nama');
                    let email = this.getAttribute('data-email');
                    let pesan = this.getAttribute('data-pesan');
                    document.getElementById('modal-id').textContent = id;
                    document.getElementById('modal-nama').textContent = nama;
                    document.getElementById('modal-email').textContent = email;
                    document.getElementById('modal-pesan').textContent = pesan;
                });
            });

            let editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    let nama = this.getAttribute('data-nama');
                    let email = this.getAttribute('data-email');
                    let pesan = this.getAttribute('data-pesan');
                    document.getElementById('recipient-id').value = id;
                    document.getElementById('recipient-nama').value = nama;
                    document.getElementById('recipient-email').value = email;
                    document.getElementById('recipient-pesan').value = pesan;
                });
            });
        });
    </script>
</center>
