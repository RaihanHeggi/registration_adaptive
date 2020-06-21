<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran</title>

    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="assets/images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="<?=site_url('formPendaftaran/insert_data')?>"> 
                        <h2>Form Registrasi</h2>
                        <div class="form-group">
                            <label for="name">Nama Lengkap </label>
                            <input type="text" name="name" id="name" required/>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="Birth">Tanggal Lahir </label>
                                <input type="date" name="birthdate" id="birthdate" required/>
                            </div>
                            <div class="form-group">
                                <label for="placeBirth">Tempat Lahir </label>
                                <input type="text" name="placeBirth" id="placeBirth" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="status">Pendidikan Saat Ini </label>
                                <div class="form-select">
                                    <select name="status" id="status">
                                        <option value="Mahasiswa/i" selected>Mahasiswa/i</option>
                                        <option value="Siswa/i">Siswa/i</option>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="namaInstitusi">Nama Institusi</label>
                                <input type="text" name="namaInstitusi" id="namaInstitusi" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomorHP">Nomor HP</label>
                            <input type="text" name="nomorHP" id="nomorHP">
                        </div>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-group">
                            <label for="pictValidation">Foto Scan Kartu Pelajar</label>
                            <input type="file" name="pictValidation" id="pictValidation" />
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>