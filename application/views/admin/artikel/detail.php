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
            <a href="<?php echo base_url('admin/Home/artikel') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">

            <div class="post">
              <h3>Detail Artikel</h3><hr><br>

              <?php foreach ($detail_artikel->result_array() as $detail ) { ?>

                <img src="<?php echo base_url('upload/artikel/').$detail['gambar']; ?>" class="mx-auto d-block" width="200" height="200"><br>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="penulis">Penulis</label>
                  <div class="col-sm-9">
                    <input type="text" id="penulis" name="penulis" class="form-control" value="<?php echo $detail['penulis']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="judul">Judul</label>
                  <div class="col-sm-9">
                    <input type="text" id="judul" name="judul" class="form-control" value="<?php echo $detail['judul']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="isi_artikel">Isi Artikel</label>
                  <textarea id="isi_artikel" name="isi_artikel" class="form-control" readonly><?php echo $detail['isi_artikel'] ?></textarea>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="tanggal">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php echo $detail['tanggal']; ?>" readonly>
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
