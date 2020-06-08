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
            <a href="<?php echo base_url('admin/Home/tambah_banner')?>" class="btn btn-primary btn-sm"> 
              <i class="fa fa-edit fa-sm"></i> 
              Tambah Data 
            </a>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              
              <table class="table table-hover table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <th width="10">No</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th width="90">Aksi</th>
                </thead>
                <tbody>
                  <?php 
                    $no=+1;
                    foreach ($data_banner->result_array() as $banner) { ?>
                      <tr>
                        <td align="center">
                          <?php echo $no; ?>
                        </td>
                        <td align="center">
                          <?php echo $banner['judul_banner']; ?>
                        </td>
                        <td>
                          <?php echo $banner['deskripsi']; ?>
                        </td>
                        <td align="center">
                          <a href="<?php echo base_url('admin/Home/edit_banner/').$banner['id_banner']; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit fa-sm"></i>
                          </a>
                          <a onclick="deleteConfirm('<?php echo base_url('admin/Home/hapus_banner/').$banner['id_banner'];?>')" href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-trash fa-sm"></i>
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
