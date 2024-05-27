<center>
    <h1>Daftar Subscriber</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
        </tr>
        <?php if(isset($subs_list) && is_array($subs_list)): ?>
            <?php foreach ($subs_list as $subs) : ?>
                <tr>
                    <td><?= $subs['id']; ?></td>
                    <td><?= $subs['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Tidak ada data subscriber.</td>
            </tr>
        <?php endif; ?>
        <tr>
            <td colspan="2" align="center">
                <a href="<?= base_url('dashboard'); ?>">Kembali</a>
            </td>
        </tr>
    </table>
</center>
