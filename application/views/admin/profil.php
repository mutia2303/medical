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

            <div class="post">
              <h3>Profil Admin</h3><hr><br>

              <?php foreach ($profil_admin->result_array() as $admin) { ?>
                
                <?php echo form_open_multipart('admin/Home/edit_profil'); ?>

              <!-- <form action="<?php base_url('admin/Home/edit_profil') ?>" method="post" enctype="multipart/form-data" role="form"> -->

                <input type="hidden" id="id_admin" name="id_admin" value="<?php echo $admin['id_admin']; ?>">

                <img src="<?php echo base_url('upload/admin/').$admin['foto']; ?>" class="rounded-circle mx-auto d-block" width="150" height="150"> <br>

                <div class="form-group">
                  <div class="col-sm-6">
                    <input type="file" id="foto" name="foto" class="form-control form-control-sm" value="<?php echo $admin['foto']; ?>">
                    <input type="hidden" id="old_image" name="old_image" value="<?php echo $admin['foto']; ?>">
                  </div>
                </div> <hr><br> 

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="username" >Username</label>
                  <div class="col-sm-9">
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo $admin['username']; ?>">
                  </div>
                </div>

                <input type="hidden" id="password" name="password" value="<?php echo $admin['password']; ?>">

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_admin">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_admin" name="nama_admin" class="form-control" value="<?php echo $admin['nama_admin']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="<?php echo $admin['jenis_kelamin']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="email">Email</label>
                  <div class="col-sm-9">
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $admin['email']; ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="alamat">Alamat</label>
                  <div class="col-sm-9">
                    <textarea id="alamat" name="alamat" class="form-control"><?php echo $admin['alamat']; ?>
                  </textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="no_hp">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?php echo $admin['no_hp']; ?>">
                  </div>
                </div> <br>

                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>

              <!-- </form> -->
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
