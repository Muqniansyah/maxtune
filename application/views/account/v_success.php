<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>  
<head>
    <meta charset="UTF-8">
    <title> Notifikasi </title>
    <!-- my style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style2.css">
</head>
<body>
    <!-- notif ketika berhasil register -->
    <h3><?php echo $message; ?></h3>
    <p><?php echo anchor('beranda','Kembali ke beranda'); ?></p>
</body>
</html>
