<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view("admin/layout/header.php") ?>

</head>

<body id="page-top">

  <?php $this->load->view("admin/layout/navbar.php") ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/layout/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php $this->load->view("admin/layout/breadcrumb.php") ?>

        <?php echo $this->session->flashdata('pesan');?>

        <div class="card mb-3">
    
          <div class="card-body">
            <?php echo form_open_multipart('admin/Home/proses_ubah_password'); ?>
            
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <div class="col-sm-7">
                    <input type="password" id="password" name="password" class="form-control form-control-sm" data-toggle="password" placeholder="Masukkan Password Baru" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password"> Konfirmasi Password</label>
                  <div class="col-sm-7">
                    <input type="password" id="konfirmasi_password" name="password" class="form-control form-control-sm" data-toggle="password" placeholder="Konfirmasi Password" required="required">
                    <span id="message"></span>
                  </div>
                </div> <br>

                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>

          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("admin/layout/footer.php") ?> 

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/layout/scrolltop.php") ?> 

  <!-- Logout Modal-->
  <?php $this->load->view("admin/layout/modal.php") ?> 
  
  <?php $this->load->view("admin/layout/js.php") ?>

  <script type="text/javascript">
    $('#password, #konfirmasi_password').on('keyup', function() {

      if ($('#password').val() == $('#konfirmasi_password').val()) {
        $('#message').html('Password Sama').css('color', 'blue');
      }
      else {
        $('#message').html('Password Tidak Sama').css('color', 'red');
      }

    });
  </script>

</body>

</html>
