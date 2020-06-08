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
            <a href="<?php echo base_url('admin/Home/transaksi') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">
            <?php echo form_open_multipart('admin/Home/proses_edit_transaksi'); ?>
                
            <?php 
              foreach ($data_transaksi->result_array() as $transaksi) { ?>
                
                <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi'] ?>">

                <div class="form-group">
                  <label for="desk_gejala">Deskripsi Gejala</label>
                  <input type="text" id="desk_gejala" name="desk_gejala" class="form-control form-control-sm" value="<?php echo $transaksi['desk_gejala'] ?>">
                </div> <hr>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_obat">Nama Obat 1</label>
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm" value="<?php echo $transaksi['nama_obat'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="jumlah_obat">Jumlah Obat 1</label>
                    <input type="number" min="1" id="jumlah_obat_1" name="jumlah_obat_1" class="form-control form-control-sm" value="<?php echo $transaksi['jumlah_obat_1'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($obat2->result_array() as $transaksi) { ?>
                
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_obat">Nama Obat 2</label>
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm" value="<?php echo $transaksi['nama_obat'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="jumlah_obat">Jumlah Obat 2</label>
                    <input type="number" min="1" id="jumlah_obat_2" name="jumlah_obat_2" class="form-control form-control-sm" value="<?php echo $transaksi['jumlah_obat_2'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($obat3->result_array() as $transaksi) { ?>
                
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_obat">Nama Obat 3</label>
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm" value="<?php echo $transaksi['nama_obat'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="jumlah_obat">Jumlah Obat 3</label>
                    <input type="number" min="1" id="jumlah_obat_3" name="jumlah_obat_3" class="form-control form-control-sm" value="<?php echo $transaksi['jumlah_obat_3'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($obat4->result_array() as $transaksi) { ?>
                
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_obat">Nama Obat 4</label>
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm" value="<?php echo $transaksi['nama_obat'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="jumlah_obat">Jumlah Obat 4</label>
                    <input type="number" min="1" id="jumlah_obat_4" name="jumlah_obat_4" class="form-control form-control-sm" value="<?php echo $transaksi['jumlah_obat_4'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($obat5->result_array() as $transaksi) { ?>
                
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_obat">Nama Obat 5</label>
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control form-control-sm" value="<?php echo $transaksi['nama_obat'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="jumlah_obat">Jumlah Obat 5</label>
                    <input type="number" min="1" id="jumlah_obat_5" name="jumlah_obat_5" class="form-control form-control-sm" value="<?php echo $transaksi['jumlah_obat_5'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($data_transaksi->result_array() as $transaksi) { ?>
                
                <div class="form-group">
                  <label for="total_obat">Total Obat</label>
                  <input type="number" min="1" id="total_obat" name="total_obat" class="form-control form-control-sm" value="<?php echo $transaksi['total_obat'] ?>">
                </div> <hr>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_layanan">Nama Layanan 1</label>
                    <input type="text" id="nama_layanan" name="nama_layanan" class="form-control form-control-sm" value="<?php echo $transaksi['nama_layanan'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="harga_layanan">Harga Layanan 1</label>
                    <input type="number" min="1" id="harga_layanan_1" name="harga_layanan_1" class="form-control form-control-sm" value="<?php echo $transaksi['harga_layanan_1'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($layanan2->result_array() as $transaksi) { ?>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nama_layanan">Nama Layanan 2</label>
                    <input type="text" id="nama_layanan" name="nama_layanan" class="form-control form-control-sm" value="<?php echo $transaksi['nama_layanan'] ?>" readonly>
                  </div>

                  <div class="col-md-2"></div>

                  <div class="form-group col-md-3">
                    <label for="harga_layanan">Harga Layanan 2</label>
                    <input type="number" min="1" id="harga_layanan_2" name="harga_layanan_2" class="form-control form-control-sm" value="<?php echo $transaksi['harga_layanan_2'] ?>">
                  </div>
                </div>

              <?php } ?>

              <?php 
              foreach ($data_transaksi->result_array() as $transaksi) { ?>
                
                <div class="form-group">
                  <label for="harga_medis">Harga Medis</label>
                  <input type="number" min="1" id="harga_medis" name="harga_medis" class="form-control form-control-sm" value="<?php echo $transaksi['harga_medis'] ?>">
                </div> <br>

              <?php } ?>

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

</body>

</html>
