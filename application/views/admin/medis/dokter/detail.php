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
            <a href="<?php echo base_url('admin/Home/dokter') ?>">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>

          <div class="card-body">

            <div class="post">
              <h3>Detail Medis</h3><hr><br>

              <?php foreach ($detail_dokter->result_array() as $detail ) { ?>

                <img src="<?php echo base_url('upload/medis/foto/').$detail['foto']; ?>" class="rounded-circle mx-auto d-block" width="150" height="150"><br>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="bagian_tugas">Bagian Tugas</label>
                  <div class="col-sm-9">
                    <input type="text" id="bagian_tugas" name="bagian_tugas" class="form-control" value="<?php echo $detail['bagian_tugas']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="status_medis">
                  Status Medis</label>
                  <div class="col-sm-9">
                    <input type="text" id="status_medis" name="status_medis" class="form-control" value="<?php echo $detail['status_medis']; ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="status_verifikasi">Status Verifikasi</label>
                  <div class="col-sm-4">
                    <input type="text" id="status_verifikasi" name="status_verifikasi" class="form-control" value="<?php echo $detail['status_verifikasi']; ?>" readonly>
                  </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                  <?php if ($detail['status_verifikasi'] == 'Belum Terverifikasi') { ?>
                    <button data-toggle="modal" data-target="#verifikasi-medis<?php echo $detail['id_medis']; ?>" class="btn btn-primary btn-sm">Verifikasi Medis</button>
                  <?php } ?>
                </div> <hr>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="username">Username</label>
                  <div class="col-sm-9">
                    <input type="text" id="username" name="username" class="form-control" value="<?php echo $detail['username']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-2" for="nama_medis">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" id="nama_medis" name="nama_medis" class="form-control" value="<?php echo $detail['nama_medis']; ?>" readonly>
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
                    <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control" readonly><?php echo $detail['alamat_lengkap'] ?></textarea>                    
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
        
        <div class="card mb-3">

          <div class="card-body">

            <div class="post">
              <h3>Dokumen Medis</h3><hr><br>

              <?php foreach ($detail_dokter->result_array() as $detail ) { ?> 

                <h6><b>SIP (Surat Izin Praktik)</b></h6>
                <a href="<?php echo base_url(); ?>upload/medis/sip/<?php echo $detail['sip'];?>"><b><?php echo $detail['sip']; ?></b></a> <hr>

                <h6><b>STR (Surat Tanda Registrasi)</b></h6>
                <a href="<?php echo base_url(); ?>upload/medis/str/<?php echo $detail['str'];?>"><b><?php echo $detail['str']; ?></b></a> <hr>

                <h6><b>STB (Surat Tanda Bekerja)</b></h6>
                <a href="<?php echo base_url(); ?>upload/medis/stb/<?php echo $detail['stb'];?>"><b><?php echo $detail['stb']; ?></b></a> <hr>

                <h6><b>Ijazah</b></h6>
                <a href="<?php echo base_url(); ?>upload/medis/ijazah/<?php echo $detail['ijazah'];?>"><b><?php echo $detail['ijazah']; ?></b></a> <hr>

                <h6><b>KTP</b></h6>
                <a href="<?php echo base_url(); ?>upload/medis/ktp/<?php echo $detail['ktp'];?>"><b><?php echo $detail['ktp']; ?></b></a> <hr>

              <?php } ?>
            </div>
            
          </div>
          
        </div>
      </div>

      <?php foreach ($detail_dokter->result_array() as $detail) { ?> 
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="verifikasi-medis<?php echo $detail['id_medis'];?>" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Verifikasi Medis</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              </div>

              <form class="form-horizontal" action="<?php echo base_url('admin/Home/verifikasi_dokter')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-10 col-sm-2 control-label">Verifikasi Medis</label>
                    <div class="col-lg-10">
                      <input type="hidden" id="id_medis" name="id_medis" value="<?php echo $detail['id_medis']; ?>">
                      <div class="form-group">
                        <select name="status_verifikasi" class="form-control">
                          <option id="Belum Terverifikasi" value="Belum Terverifikasi" disabled="disabled">Belum Terverifikasi</option> 
                          <option id="Terverifikasi" value="Terverifikasi" selected="selected">Terverifikasi</option>
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
