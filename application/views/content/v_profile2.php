<center>
    <h1>Data Pelanggan</h1>

    <!-- Begin Page Content -->
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-lg-8">
            <?= $this->session->flashdata('pesan'); ?>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($customer as $c) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $c['nama_lengkap']; ?></td>
                            <td><?= $c['username']; ?></td>
                            <td><?= $c['email']; ?></td>
                            <td><?= $c['no_telepon']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</center>