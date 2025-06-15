<h1 style="text-align: center;">Daftar Pembayaran</h1>

<?php if($this->session->flashdata('message')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
<?php endif; ?>

<table border="1" width="100%" style="border-collapse: collapse; text-align: center;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Servis</th>
            <th>Status</th>
            <th>Bukti</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($dtbayar) && count($dtbayar) > 0): ?>
            <?php $no = 1; foreach ($dtbayar as $bayar): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $bayar['nama_pelanggan']; ?></td>
                    <td><?= $bayar['jenis_servis']; ?></td>
                    <td><?= ucfirst($bayar['status']); ?></td>
                    <td>
                        <?php if (!empty($bayar['upload_file'])): ?>
                            <img src="<?= base_url('assets/uploads/' . $bayar['upload_file']); ?>" width="100" alt="Bukti">
                        <?php else: ?>
                            Belum ada
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Tombol Ubah Status -->
                        <?php if ($bayar['status'] === 'pending'): ?>
                            <form method="post" action="<?= base_url('dashboard/ubahstatus/' . $bayar['id_pembayaran']); ?>" style="display:inline-block;" onsubmit="return confirm('Ubah status jadi lunas?')">
                                <button type="submit" style="background-color:orange;color:white;border:none;padding:5px 10px;border-radius:5px;">Lunas</button>
                            </form>
                        <?php endif; ?>

                        <!-- Tombol Hapus -->
                        <form method="post" action="<?= base_url('dashboard/hapuspembayaran/'.$bayar['id_pembayaran']); ?>" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <button type="submit" style="background-color:red;color:white;border:none;padding:5px 10px;border-radius:5px;">Hapus</button>
                        </form>

                        <!-- Tombol Print -->
                        <?php if (!empty($bayar['upload_file'])): ?>
                            <button onclick="printBukti('<?= base_url('assets/uploads/' . $bayar['upload_file']); ?>')" style="background-color:#007bff;color:white;border:none;padding:5px 10px;border-radius:5px;">Print</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Tidak ada data pembayaran.</td></tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"><a href="<?= base_url('dashboard'); ?>">Kembali</a></td>
        </tr>
    </tfoot>
</table>

<script>
function printBukti(imageUrl) {
    var win = window.open('', '_blank');
    win.document.write('<html><head><title>Bukti Pembayaran</title></head><body>');
    win.document.write('<img src="' + imageUrl + '" style="width:100%;max-width:600px;">');
    win.document.write('<script>window.onload = function(){ window.print(); window.onafterprint = function(){ window.close(); }; };<\/script>');
    win.document.write('</body></html>');
    win.document.close();
}
</script>