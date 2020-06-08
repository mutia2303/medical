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

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo base_url('admin/Home/perawat') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <?php echo form_open_multipart('admin/Home/proses_edit_perawat'); ?>
                
            <?php 
              foreach ($data_perawat->result_array() as $perawat) { ?>
                
                <input type="hidden" name="id_medis" value="<?php echo $perawat['id_medis'] ?>">

                <div class="form-group">
                  <label for="nama_medis">Nama</label>
                  <input type="text" id="nama_medis" name="nama_medis" class="form-control form-control-sm" value="<?php echo $perawat['nama_medis'] ?>">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?php echo $perawat['email'] ?>">
                </div>

                <div class="form-group">
                  <label for="alamat_lengkap">Alamat Lengkap</label>
                  <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control form-control-sm"><?php echo $perawat['alamat_lengkap'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="no_hp">No HP</label>
                  <input type="tel" pattern="[0-9]{13}|[0-9]{12}|[0-9]{11}" id="no_hp" name="no_hp" class="form-control form-control-sm" value="<?php echo $perawat['no_hp'] ?>">
                  <small class="text-muted">contoh: <b>081212345678</b></small>
                </div>

                <div class="form-group">
                  <label for="umur">Umur</label>
                  <input type="number" min="1" max="100" id="umur" name="umur" class="form-control form-control-sm" value="<?php echo $perawat['umur'] ?>">
                </div> <br>

                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>

            <?php } ?>
            

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

  <!-- <script>
    // Self-executing function
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script> -->

</body>

</html>
