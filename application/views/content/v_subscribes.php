<center>
    <h1>Daftar Subscriber</h1>

    <!-- Start flash data -->
    <?php if($this->session->flashdata('message')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>
    <!-- End flash data -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($subs_list) && is_array($subs_list) && count($subs_list) > 0): ?>
                <?php foreach ($subs_list as $subs) : ?>
                    <tr>
                        <td><?= $subs['id']; ?></td>
                        <td><?= $subs['email']; ?></td>
                        <td class="action-dash">
                            <form method="post">
                                <button type="button" class="edit-button" data-toggle="modal" data-target="#modalEdit" data-id="<?= $subs['id']; ?>" data-email="<?= $subs['email']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <form method="post" action="<?php echo base_url('dashboard/hapussubscribe/'.$subs['id']); ?>">
                                <button type="submit" class="hapus-button" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            <form method="post">
                                <button type="button" class="print-button" data-id="<?= $subs['id']; ?>" data-email="<?= $subs['email']; ?>" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-print"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Tidak ada data subscriber.</td>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="3" align="center">
                    <a href="<?= base_url('dashboard'); ?>">Kembali</a>
                </td>
            </tr>
        </tbody>
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
                    <p>
                        <strong>ID:</strong>
                        <span id="modal-id"></span>
                    </p>
                    <p>
                        <strong>Email:</strong>
                        <span id="modal-email"></span>
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
                    <form action="<?php echo base_url(). 'dashboard/updatesubscribe'; ?>" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label label-edit">ID :</label>
                            <input type="text" class="form-control" id="recipient-name" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label label-edit">Email :</label>
                            <input type="email" class="form-control" id="email" name="email">
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
                    let email = this.getAttribute('data-email');
                    document.getElementById('modal-id').textContent = id;
                    document.getElementById('modal-email').textContent = email;
                });
            });

            let editButtons = document.querySelectorAll('.edit-button');
            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');
                    let email = this.getAttribute('data-email');
                    document.getElementById('recipient-name').value = id;
                    document.getElementById('email').value = email;
                });
            });
        });
    </script>
</center>
