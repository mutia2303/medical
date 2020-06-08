<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register Pasien</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/backend/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/backend/css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register Pasien</div>
      <?php echo form_open_multipart('Register_pasien/insert_pasien'); ?>
      
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required">
                  <label for="username">Username</label>
                </div>
              </div>
    
              <div class="col-md-6">  
                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="password">Password</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" placeholder="Nama Lengkap" required="required">
              <label for="nama_pasien">Nama Lengkap</label>
            </div>
          </div>

          <div class="form-group">
                <fieldset>

                    <label>Jenis Kelamin</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">Laki-laki&nbsp; &nbsp; &nbsp;
                    <input type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan">Perempuan

                </fieldset>
          </div>
          
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required">
              <label for="email">Email</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="alamat_lengkap" name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap" required="required">
              <label for="alamat_lengkap">Alamat Lengkap</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="tel" pattern="[0-9]{13}|[0-9]{12}|[0-9]{11}" id="no_hp" name="no_hp" class="form-control" placeholder="No HP" required="required">
                  <label for="no_hp">No HP</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" min="1" max="100" id="umur" name="umur" class="form-control" placeholder="Umur" required="required">
                  <label for="umur">Umur</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form_label_group">
              <label>Foto</label>
              <input type="file" id="foto" name="foto" class="form-control-file">
            </div>
          </div>
                    
          <button class="btn btn-primary btn-block">Register</button>
        </form>

        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('Login/index') ?>">Login</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/backend/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/backend/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

</body>

</html>
