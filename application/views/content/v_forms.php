<center>
        <h1>Daftar Layanan Service</h1>
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
            </tr>
            <?php if(isset($list_form) && is_array($list_form)): ?>
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
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11">Tidak ada data layanan.</td>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="11" align="center">
                    <a href="<?= base_url('dashboard'); ?>">Kembali</a>
                </td>
            </tr>
        </table>
    </center>