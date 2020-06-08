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

        <div class="card mb-3">

          <div class="card-header">
            <a href="<?php echo base_url('admin/Home/pasien') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">

            <div class="post">
              <h3>Detail Pasien</h3><hr><br>

              <?php foreach ($detail_pasien->result_array() as $detail ) { ?>

                <img src="<?php echo base_url('upload/pasien/').$detail['foto']; ?>" class="rounded-circle mx-auto d-block" width="150" height="150"><br>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="username" >Username</label>
                  <div class="col-sm-9">
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo $detail['username']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_pasien">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" value="<?php echo $detail['nama_pasien']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?php echo $detail['jenis_kelamin']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="email">Email</label>
                  <div class="col-sm-9">
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $detail['email']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="alamat_lengkap">Alamat Lengkap</label>
                  <div class="col-sm-9">
                    <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" readonly><?php echo $detail['alamat_lengkap'] ?>
                  </textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="no_hp">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $detail['no_hp']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="umur">Umur</label>
                  <div class="col-sm-9">
                    <input type="text" id="umur" name="umur" class="form-control" value="<?php echo $detail['umur']; ?> tahun" readonly>
                  </div>
                </div>

              <?php } ?>
            </div>
            
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

</body>

</html>
