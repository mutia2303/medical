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
            <form action="<?php echo base_url('admin/Home/proses_tambah_transaksi') ?>" method="post" enctype="multipart/form-data" role="form">

              <div class="form-group">
                <label for="medis">Nama Pasien</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <select name="pasien" id="pasien" class="form-control form-control-sm">
                    <option value="">No Selected</option>
                    <?php foreach ($pasien as $row) { ?>
                      <option value="<?php echo $row->id_pasien; ?>" ><?php echo $row->nama_pasien; ?></option>
                    <?php } ?>
                  </select>
                </label>
              </div>

              <div class="form-group">
                <label for="medis">Nama Medis</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <select name="medis" id="medis" class="form-control form-control-sm">
                    <option value="">No Selected</option>
                    <?php foreach ($medis as $row) { ?>
                      <option value="<?php echo $row->id_medis; ?>" ><?php echo $row->nama_medis; ?></option>
                    <?php } ?>
                  </select>
                </label>
              </div>
       
              <div class="form-group">
                <label for="desk_gejala">Deskripsi Gejala</label>
                <textarea id="desk_gejala" name="desk_gejala" class="form-control form-control-sm" required="required"> </textarea>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="obat">Nama Obat 1</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="obat1" id="obat1" class="form-control  form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($obat1 as $row) { ?>
                        <option value="<?php echo $row->id_obat; ?>" ><?php echo $row->nama_obat; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="jumlah_obat_1">Jumlah Obat 1</label>
                  <input type="number" min="1" id="jumlah_obat_1" name="jumlah_obat_1" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="obat">Nama Obat 2</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="obat2" id="obat2" class="form-control form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($obat2 as $row) { ?>
                        <option value="<?php echo $row->id_obat; ?>" ><?php echo $row->nama_obat; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="jumlah_obat_2">Jumlah Obat 2</label>
                  <input type="number" min="1" id="jumlah_obat_2" name="jumlah_obat_2" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="obat">Nama Obat 3</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="obat3" id="obat3" class="form-control form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($obat3 as $row) { ?>
                        <option value="<?php echo $row->id_obat; ?>" ><?php echo $row->nama_obat; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="jumlah_obat_3">Jumlah Obat 3</label>
                  <input type="number" min="1" id="jumlah_obat_3" name="jumlah_obat_3" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="obat">Nama Obat 4</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="obat4" id="obat4" class="form-control form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($obat4 as $row) { ?>
                        <option value="<?php echo $row->id_obat; ?>" ><?php echo $row->nama_obat; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="jumlah_obat_4">Jumlah Obat 4</label>
                  <input type="number" min="1" id="jumlah_obat_4" name="jumlah_obat_4" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="obat">Nama Obat 5</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="obat5" id="obat5" class="form-control form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($obat5 as $row) { ?>
                        <option value="<?php echo $row->id_obat; ?>" ><?php echo $row->nama_obat; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="jumlah_obat_5">Jumlah Obat 5</label>
                  <input type="number" min="1" id="jumlah_obat_5" name="jumlah_obat_5" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="total_obat">Total Obat</label>
                <input type="number" min="1" id="total_obat" name="total_obat" class="form-control form-control-sm" required="required">
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="layanan">Nama Layanan 1</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="layanan1" id="layanan1" class="form-control form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($layanan1 as $row) { ?>
                        <option value="<?php echo $row->id_layanan; ?>" ><?php echo $row->nama_layanan; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="harga_layanan_1">Harga Layanan 1</label>
                  <input type="number" min="1" id="harga_layanan_1" name="harga_layanan_1" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="layanan">Nama Layanan 2</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <select name="layanan2" id="layanan2" class="form-control form-control-sm">
                      <option value="">No Selected</option>
                      <?php foreach ($layanan2 as $row) { ?>
                        <option value="<?php echo $row->id_layanan; ?>" ><?php echo $row->nama_layanan; ?></option>
                      <?php } ?>
                    </select>
                  </label>
                </div>

                <div class="form-group col-md-3">
                  <label for="harga_layanan_2">Harga Layanan 2</label>
                  <input type="number" min="1" id="harga_layanan_2" name="harga_layanan_2" class="form-control form-control-sm">
                </div>
              </div>

              <div class="form-group">
                <label for="harga_medis">Harga Medis</label>
                <input type="number" min="1" id="harga_medis" name="harga_medis" class="form-control form-control-sm" required="required">
              </div>

              <div class="form-group">
                <fieldset>
                  <label>Status Transaksi</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="status_transaksi" id="Diproses" value="Diproses">Diproses&nbsp; &nbsp; &nbsp;
                  <input type="radio" name="status_transaksi" id="Selesai" value="Selesai">Selesai
                </fieldset>
              </div> <br>

              <input class="btn btn-primary btn-sm" type="submit" value="Simpan">

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
