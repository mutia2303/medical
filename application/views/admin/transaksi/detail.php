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
            <a href="<?php echo base_url('admin/Home/transaksi') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">

            <div class="post">
              <h3>Detail Transaksi</h3><hr><br>

              <?php foreach ($detail_transaksi->result_array() as $detail) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="tanggal">Tanggal</label>
                  <div class="col-sm-9">
                    <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?php echo $detail['tanggal']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_pasien">Nama Pasien</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_pasien" name="nama_pasien" class="form-control" value="<?php echo $detail['nama_pasien']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_medis">Nama Medis</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_medis" name="nama_medis" class="form-control" value="<?php echo $detail['nama_medis']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="status_medis">Status Medis</label>
                  <div class="col-sm-9">
                    <input type="text" id="status_medis" name="status_medis" class="form-control" value="<?php echo $detail['status_medis']; ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="status_transaksi">Status Transaksi</label>
                  <div class="col-sm-4">
                    <input type="text" id="status_transaksi" name="status_transaksi" class="form-control"
                    value="<?php echo $detail['status_transaksi']; ?>" readonly>
                  </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                  <?php if ($detail['status_transaksi'] == 'Diproses') { ?>
                    <button data-toggle="modal" data-target="#status-transaksi<?php echo $detail['id_transaksi']; ?>" class="btn btn-primary btn-sm">Status Transaksi</button>    
                  <?php } ?>
                </div><hr>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_obat">Obat 1</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="<?php echo $detail['nama_obat']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="jumlah_obat_1">Jumlah Obat 1</label>
                  <div class="col-sm-3">
                    <input type="text" id="jumlah_obat_1" name="jumlah_obat_1" class="form-control" value="<?php echo $detail['jumlah_obat_1']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>  

              <?php foreach ($obat2->result_array() as $detail) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_obat">Obat 2</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="<?php echo $detail['nama_obat']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="jumlah_obat_1">Jumlah Obat 2</label>
                  <div class="col-sm-3">
                    <input type="text" id="jumlah_obat_2" name="jumlah_obat_2" class="form-control" value="<?php echo $detail['jumlah_obat_2']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>  

              <?php foreach ($obat3->result_array() as $detail) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_obat">Obat 3</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="<?php echo $detail['nama_obat']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="jumlah_obat_1">Jumlah Obat 3</label>
                  <div class="col-sm-3">
                    <input type="text" id="jumlah_obat_3" name="jumlah_obat_3" class="form-control" value="<?php echo $detail['jumlah_obat_3']; ?>" readonly>
                  </div>
                </div>

              <?php } ?> 

              <?php foreach ($obat4->result_array() as $detail) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_obat">Obat 4</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="<?php echo $detail['nama_obat']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="jumlah_obat_1">Jumlah Obat 4</label>
                  <div class="col-sm-3">
                    <input type="text" id="jumlah_obat_4" name="jumlah_obat_4" class="form-control" value="<?php echo $detail['jumlah_obat_4']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>   

              <?php foreach ($obat5->result_array() as $detail) { ?>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_obat">Obat 5</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_obat" name="nama_obat" class="form-control" value="<?php echo $detail['nama_obat']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="jumlah_obat_1">Jumlah Obat 5</label>
                  <div class="col-sm-3">
                    <input type="text" id="jumlah_obat_5" name="jumlah_obat_5" class="form-control" value="<?php echo $detail['jumlah_obat_5']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>  

              <?php foreach ($detail_transaksi->result_array() as $detail) { ?>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="total_obat">Total obat</label>
                  <div class="col-sm-9">
                    <input type="text" id="total_obat" name="total_obat" class="form-control" value="Rp. <?php echo $detail['total_obat']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_layanan">Layanan 1</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_layanan" name="nama_layanan" class="form-control" value="<?php echo $detail['nama_layanan']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="harga_layanan_1">Harga Layanan 1</label>
                  <div class="col-sm-3">
                    <input type="text" id="harga_layanan_1" name="harga_layanan_1" class="form-control" value="Rp. <?php echo $detail['harga_layanan_1']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>  

              <?php foreach ($layanan2->result_array() as $detail) { ?>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_layanan">Layanan 2</label>
                  <div class="col-sm-3">
                    <input type="text" id="nama_layanan" name="nama_layanan" class="form-control" value="<?php echo $detail['nama_layanan']; ?>" readonly>
                  </div>

                  <div class="col-sm-1"></div>

                  <label class="col-form-label col-sm-2" for="harga_layanan_1">Harga Layanan 1</label>
                  <div class="col-sm-3">
                    <input type="text" id="harga_layanan_2" name="harga_layanan_2" class="form-control" value="Rp. <?php echo $detail['harga_layanan_2']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>

              <?php foreach ($detail_transaksi->result_array() as $detail) { ?>
                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="total_layanan">Total Layanan</label>
                  <div class="col-sm-9">
                    <input type="text" id="total_layanan" name="total_layanan" class="form-control" value="Rp. <?php echo $detail['total_layanan']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="harga_medis">Harga Medis</label>
                  <div class="col-sm-9">
                    <input type="text" id="harga_medis" name="harga_medis" class="form-control" value="Rp. <?php echo $detail['harga_medis']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="total_bayar">Total Bayar</label>
                  <div class="col-sm-9">
                    <input type="text" id="total_bayar" name="total_bayar" class="form-control" value="Rp. <?php echo $detail['total_bayar']; ?>" readonly>
                  </div>
                </div>

              <?php } ?>

              
            </div>
            
          </div>
          
        </div>
        
      </div>

      <?php foreach ($detail_transaksi->result_array() as $detail) { ?> 
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="status-transaksi<?php echo $detail['id_transaksi'];?>" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Status Transaksi</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              </div>

              <form class="form-horizontal" action="<?php echo base_url('admin/Home/status_transaksi')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-10 col-sm-2 control-label">Status Transaksi</label>
                    <div class="col-lg-10">
                      <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?php echo $detail['id_transaksi']; ?>">
                      <div class="form-group">
                        <select name="status_transaksi" class="form-control">
                          <option id="Diproses" value="Diproses" disabled="disabled" selected="selected">Diproses</option> 
                          <option id="Selesai" value="Selesai" selected="selected">Selesai</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times fa-sm"></i> Batal</button>&nbsp; 
                  <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-check fa-sm"></i> Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
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
