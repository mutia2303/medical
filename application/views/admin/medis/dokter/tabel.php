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
            <a href="<?php echo base_url('admin/Home/excel_dokter')?>" class="btn btn-primary btn-sm"> 
              <i class="fa fa-download fa-sm"></i> 
              Excel 
            </a> &nbsp;
            <a href="<?php echo base_url('admin/Home/pdf_dokter')?>" class="btn btn-primary btn-sm"> 
              <i class="fa fa-download fa-sm"></i> 
              PDF 
            </a>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              
              <table class="table table-hover table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <th width="10">No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Verifikasi</th>
                  <th>Status Login</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                    $no=+1;
                    foreach ($data_dokter->result_array() as $dokter) { ?>
                      <tr align="center">
                        <td>
                          <?php echo $no; ?>
                        </td>
                        <td>
                          <?php echo $dokter['nama_medis']; ?>
                        </td>
                        <td>
                          <?php echo $dokter['email']; ?>
                        </td>
                        <td>
                          <?php echo $dokter['no_hp']; ?>
                        </td>
                        <td>
                          <?php echo $dokter['status_verifikasi']; ?>
                        </td>
                        <td>
                          <?php switch ($dokter['status_login']) {
                            case '0':
                              echo '<div class="badge badge-danger badge-pill">Offline</div>';
                              break;
                            
                            case '1':
                              echo '<div class="badge badge-primary badge-pill">Online</div>';
                              break;
                          } ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('admin/Home/edit_dokter/').$dokter['id_medis']; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit fa-sm"></i>
                          </a>
                          <a onclick="deleteConfirm('<?php echo base_url('admin/Home/hapus_dokter/').$dokter['id_medis'];?>')" href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-trash fa-sm"></i>
                          </a>
                          <a href="<?php echo base_url('admin/Home/detail_dokter/').$dokter['id_medis']; ?>" class="btn btn-primary btn-sm">
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
