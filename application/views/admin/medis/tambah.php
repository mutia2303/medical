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
          <!-- <div class="card-header">
            
          </div> -->

          <div class="card-body">
            <form action="<?php echo base_url('admin/Home/proses_tambah_medis') ?>" method="post" enctype="multipart/form-data" role="form">

            <!-- <?php echo form_open_multipart('admin/Home/proses_tambah_medis'); ?> -->

            <!-- <div class="form-row">
              <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required="required">
              </div>
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required="required">
              </div>
            </div> -->

            <div class="form-group">
              <label for="nama_medis">Nama</label>
              <input type="text" id="nama_medis" name="nama_medis" class="form-control form-control-sm" required="required">
            </div>

            <div class="form-group">
              <fieldset>
                <label>Jenis Kelamin</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">Laki-laki&nbsp; &nbsp; &nbsp;
                <input type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan">Perempuan
              </fieldset>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control form-control-sm" required="required">
            </div>

            <div class="form-group">
              <label for="alamat_lengkap">Alamat Lengkap</label>
              <textarea id="alamat_lengkap" name="alamat_lengkap" class="form-control form-control-sm" required="required"></textarea>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="no_hp">No HP</label>
                <input type="tel" pattern="[0-9]{13}|[0-9]{12}|[0-9]{11}" id="no_hp" name="no_hp" class="form-control form-control-sm" required="required">
                <small class="text-muted">contoh: <b>081212345678</b></small>
              </div>

              <div class="form-group col-md-6">
                <label for="umur">Umur</label>
                <input type="number" min="1" max="100" id="umur" name="umur" class="form-control form-control-sm" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" id="foto" name="foto" class="form-control-file">
            </div>

            <div class="form-group">
              <fieldset>
                <label>Bagian Tugas</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="bagian_tugas" id="Rumah Sakit" value="Rumah Sakit">Rumah Sakit&nbsp; &nbsp; &nbsp;
                <input type="radio" name="bagian_tugas" id="Puskesmas" value="Puskesmas">Puskesmas&nbsp; &nbsp; &nbsp;
                <input type="radio" name="bagian_tugas" id="Klinik" value="Klinik">Klinik&nbsp; &nbsp; &nbsp;
                <input type="radio" name="bagian_tugas" id="Poliklinik" value="Poliklinik">Poliklinik
              </fieldset>
            </div>

            <div class="form-group">
              <fieldset>
                <label>Status Medis</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="radio" name="status_medis" id="Dokter" value="Dokter">Dokter&nbsp; &nbsp; &nbsp;
                <input type="radio" name="status_medis" id="Perawat" value="Perawat">Perawat&nbsp; &nbsp; &nbsp;
                <input type="radio" name="status_medis" id="Bidan" value="Bidan">Bidan
              </fieldset>
            </div> <hr>

            <div class="form-group">
              <label for="sip">SIP (Surat Izin Praktik)</label>
              <input type="file" id="sip" name="sip" class="form-control-file" required="required">
            </div>

            <div class="form-group">
              <label for="str">STR (Surat Tanda Registrasi)</label>
              <input type="file" id="str" name="str" class="form-control-file" required="required">
            </div>

            <div class="form-group">
              <label for="stb">STB (Surat Tanda Bekerja)</label>
              <input type="file" id="stb" name="stb" class="form-control-file" required="required">
            </div>

            <div class="form-group">
              <label for="ijazah">Ijazah</label>
              <input type="file" id="ijazah" name="ijazah" class="form-control-file" required="required">
            </div>

            <div class="form-group">
              <label for="ktp">KTP (Kartu Tanda Penduduk)</label>
              <input type="file" id="ktp" name="ktp" class="form-control-file" required="required">
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
