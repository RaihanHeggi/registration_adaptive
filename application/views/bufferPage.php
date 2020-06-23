<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>/assets/css/style.css">

</head>
<body>

    <div class="main">
        <div class="container">
                <div>
                    <form enctype="multipart/form-data" method="POST" class="register-form" id="register-form" action="<?=site_url()?>"> 
                        <h2>Terimakasih Sudah Melakukan Registrasi Silahkan Melanjutkan Ke Menu Verifikasi Pembayaran</h2>
                        <div class="form-row">
                            <div>
                                <a class="btn btn-secondary btn-lg" href="<?= site_url('formPendaftaran/index') ?>" role="button">Back</a>  
                            </div>
                            <div>
                                <input class="btn btn-lg btn-primary" type="submit" value="Next Page" />
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

    <script src="<?php echo $this->config->item('base_url'); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $this->config->item('base_url'); ?>/assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>