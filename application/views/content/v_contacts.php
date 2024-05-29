<center>
    <h1>Daftar Contact</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
        </tr>
        <?php if(isset($dtkontak) && is_array($dtkontak)): ?>
            <?php foreach ($dtkontak as $contact) : ?>
                <tr>
                    <td><?= $contact['id_kontak']; ?></td>
                    <td><?= $contact['nama']; ?></td>
                    <td><?= $contact['email']; ?></td>
                    <td><?= $contact['pesan']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Tidak ada pesan contact yang dapat ditampilkan.</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="4" align="center">
                <a href="<?= base_url('dashboard'); ?>">Kembali</a>
            </td>
        </tr>
    </table>
</center>
