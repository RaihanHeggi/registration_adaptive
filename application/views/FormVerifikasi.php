<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Verifikasi</title>
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/css/style.css">

</head>
<body>

    <div class="main">
        <div class="container">
            <div>
                <form enctype="multipart/form-data" method="POST" class="register-form" id="register-form" action="<?=site_url('FormVerifikasi/insert_data')?>"> 
                        <h2>Form Verifikasi</h2>
                        <div class="form-group">
                            <?php echo $this->session->flashdata('error_messages'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap </label>
                            <input type="text" name="name" id="name" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-group">
                            <label for="nomorHP">Nomor HP</label>
                            <input type="text" name="nomorHP" id="nomorHP">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="namaRekening">Nama Pemegang Rekening </label>
                                <input type="text" name="namaRekening" id="namaRekening">
                            </div>
                            <div class="form-group">
                                <label for="jumlahTransfer">Jumlah Transfer</label>
                                <input type="number" name="jumlahTransfer" id="jumlahTransfer" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pictValidation">Foto Bukti Transfer</label>
                            <input type="file" name="pictValidation" id="pictValidation" />
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                </form>
            </div>
        </div>

    </div>

    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>