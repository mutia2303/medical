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
            <a href="<?php echo base_url('admin/Home/artikel') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <form action="<?php base_url('admin/Home/edit_artikel') ?>" method="post" enctype="multipart/form-data" role="form">
            <!-- <?php echo form_open_multipart('admin/Home/proses_edit_artikel'); ?> -->
                
                <input type="hidden" name="id_artikel" value="<?php echo $artikel->id_artikel ?>">

                <div class="form-group">
                  <label for="penulis">Penulis</label>
                  <input type="text" id="penulis" name="penulis" class="form-control form-control-sm" value="<?php echo $artikel->penulis ?>">
                </div>

                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" id="judul" name="judul" class="form-control form-control-sm" value="<?php echo $artikel->judul ?>">
                </div>

                <div class="form-group">
                  <label for="isi_artikel">Isi Artikel</label>
                  <textarea id="isi_artikel" name="isi_artikel" class="form-control form-control-sm"><?php echo $artikel->isi_artikel ?></textarea>
                </div>

                <div class="form-group">
                  <label for="gambar">Gambar</label>
                  <input type="file" id="gambar" name="gambar" class="form-control form-control-sm" value="<?php echo $artikel->gambar ?>">
                  <input type="hidden" id="old_image" name="old_image" value="<?php echo $artikel->gambar ?>">
                </div> <br>

                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            </form>
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
