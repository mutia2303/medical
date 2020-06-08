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
            <a href="<?php echo base_url('admin/Home/layanan') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <?php echo form_open_multipart('admin/Home/proses_edit_layanan'); ?>
                
            <?php 
              foreach ($data_layanan->result_array() as $layanan) { ?>
                
                <input type="hidden" name="id_layanan" value="<?php echo $layanan['id_layanan'] ?>">

                <div class="form-group">
                  <label for="nama_layanan">Nama</label>
                  <input type="text" id="nama_layanan" name="nama_layanan" class="form-control form-control-sm" value="<?php echo $layanan['nama_layanan'] ?>">
                </div>

                <div class="form-group">
                  <fieldset>
                    <label>Kategori</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="kategori" id="Laboratorium" value="Laboratorium">Laboratorium&nbsp; &nbsp; &nbsp;
                    <input type="radio" name="kategori" id="Pengobatan" value="Pengobatan">Pengobatan&nbsp; &nbsp; &nbsp;
                    <input type="radio" name="kategori" id="Perawatan" value="Perawatan">Perawatan
                  </fieldset>
                </div><br>

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
