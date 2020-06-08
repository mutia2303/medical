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

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo base_url('admin/Home/perusahaan') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <?php echo form_open_multipart('admin/Home/proses_edit_perusahaan'); ?>
                
            <?php 
              foreach ($data_perusahaan->result_array() as $perusahaan) { ?>
                
                <input type="hidden" name="id_perusahaan" value="<?php echo $perusahaan['id_perusahaan'] ?>">

                <div class="form-group">
                  <label for="nama_perusahaan">Nama Perusahaan</label>
                  <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control form-control-sm" value="<?php echo $perusahaan['nama_perusahaan'] ?>">
                </div>

                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea id="deskripsi" name="deskripsi" class="form-control form-control-sm"><?php echo $perusahaan['deskripsi'] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="jadwal">Jadwal</label>
                  <input type="text" id="jadwal" name="jadwal" class="form-control form-control-sm" value="<?php echo $perusahaan['jadwal'] ?>">
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="no_hp">No HP</label>
                    <input type="tel" pattern="[0-9]{13}|[0-9]{12}|[0-9]{11}" id="no_hp" name="no_hp" class="form-control form-control-sm" value="<?php echo $perusahaan['no_hp'] ?>">
                    <small class="text-muted">contoh: <b>081212345678</b></small>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-sm" value="<?php echo $perusahaan['email'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea id="alamat" name="alamat" class="form-control form-control-sm"><?php echo $perusahaan['alamat'] ?></textarea>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="twitter">Twitter</label>
                    <input type="text" id="twitter" name="twitter" class="form-control form-control-sm" value="<?php echo $perusahaan['twitter'] ?>">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="facebook">Facebook</label>
                    <input type="text" id="facebook" name="facebook" class="form-control form-control-sm" value="<?php echo $perusahaan['facebook'] ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="instagram">Instagram</label>
                    <input type="text" id="instagram" name="instagram" class="form-control form-control-sm" value="<?php echo $perusahaan['instagram'] ?>">
                  </div>
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

</body>

</html>
