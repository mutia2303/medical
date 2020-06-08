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
            <a href="<?php echo base_url('admin/Home/tambah_transaksi')?>" class="btn btn-primary btn-sm"> 
              <i class="fa fa-edit fa-sm"></i> 
              Tambah Data 
            </a> <br>
          </div>

          <div class="card-header">
            <form method="get" action="<?php echo base_url("admin/Home/cari_transaksi/") ?>">
              <label>Status Transaksi</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <label>
                <select class="form-control" name="status_transaksi">
                  <option value="">Tampilkan Semua</option>
                  <option value="Diproses">Diproses</option>
                  <option value="Selesai">Selesai</option>
                </select>
              </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

              <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-search fa-sm"></i> 
                Cari
              </button> &nbsp;
              <a href="<?php echo base_url('admin/Home/transaksi')?>" class="btn btn-primary btn-sm">
                <i class="fa fa-spinner fa-spin fa-sm"></i> Refresh 
              </a>
            </form>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              
              <table class="table table-hover table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <th width="20">No</th>
                  <th width="150">Tanggal</th>
                  <th>Nama Pasien</th>
                  <th>Nama Medis</th>
                  <th>Deskripsi Gejala</th>
                  <th>Status Transaksi</th>
                  <th width="130">Aksi</th>
                </thead>
                <tbody>
                  <?php 
                    $no=+1;
                    foreach ($data_transaksi as $transaksi) { ?>
                      <tr>
                        <td align="center">
                          <?php echo $no; ?>
                        </td>
                        <td>
                          <?php echo $transaksi->tanggal; ?>
                        </td>
                        <td>
                          <?php echo $transaksi->nama_pasien; ?>
                        </td>
                        <td>
                          <?php echo $transaksi->nama_medis; ?>
                        </td>
                        <td>
                          <?php echo $transaksi->desk_gejala; ?>
                        </td>
                        <td align="center">
                          <?php switch ($transaksi->status_transaksi) {
                            case 'Diproses':
                              echo '<div class="badge badge-danger badge-pill">Diproses</div>';
                              break;
                            
                            case 'Selesai':
                              echo '<div class="badge badge-primary badge-pill">Selesai</div>';
                              break;
                          } ?>
                        </td>
                        <td align="center">
                          <?php if ($transaksi->status_transaksi == 'Diproses') { ?>
                            <a href="<?php echo base_url('admin/Home/edit_transaksi/').$transaksi->id_transaksi; ?>" class="btn btn-primary btn-sm">
                              <i class="fas fa-edit fa-sm"></i>
                            </a>
                          <?php } ?>
                          
                          <a onclick="deleteConfirm('<?php echo base_url('admin/Home/hapus_transaksi/').$transaksi->id_transaksi;?>')" href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-trash fa-sm"></i>
                          </a>
                          <a href="<?php echo base_url('admin/Home/detail_transaksi/').$transaksi->id_transaksi; ?>" class="btn btn-primary btn-sm">
                            Detail
                          </a>
                        </td>
                     </tr>

                    <?php $no++; } ?>
                  
                </tbody>
              </table>
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

  <script>
    function deleteConfirm(url) {
      $('#btn-delete').attr('href',url);
      $('#deleteModal').modal();
    }
  </script>

</body>

</html>
