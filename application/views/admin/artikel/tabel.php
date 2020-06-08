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
            <a href="<?php echo base_url('admin/Home/tambah_artikel')?>" class="btn btn-primary btn-sm"> 
              <i class="fa fa-edit fa-sm"></i> 
              Tambah Data 
            </a>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              
              <table class="table table-hover table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead align="center">
                  <th width="15">No</th>
                  <th>Penulis</th>
                  <th>Judul</th>
                  <th>Gambar</th>
                  <th>Tanggal</th>
                  <th width="130">Aksi</th>
                </thead>
                <tbody>
                  <?php 
                    $no=+1;
                    foreach ($data_artikel as $artikel) { ?>
                      <tr>
                        <td align="center">
                          <?php echo $no; ?>
                        </td>
                        <td>
                          <?php echo $artikel->penulis; ?>
                        </td>
                        <td>
                          <?php echo $artikel->judul; ?>
                        </td>
                        <td>
                          <img src="<?php echo base_url('upload/artikel/'.$artikel->gambar) ?>" width="100" title="<?php echo $artikel->isi_artikel ?>" />
                        </td>
                        <td>
                          <?php echo $artikel->tanggal; ?>
                        </td>
                        <td align="center">
                          <a href="<?php echo base_url('admin/Home/edit_artikel/').$artikel->id_artikel; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit fa-sm"></i>
                          </a>
                          <a onclick="deleteConfirm('<?php echo base_url('admin/Home/hapus_artikel/').$artikel->id_artikel;?>')" href="#" class="btn btn-primary btn-sm">
                            <i class="fas fa-trash fa-sm"></i>
                          </a>
                          <a href="<?php echo base_url('admin/Home/detail_artikel/').$artikel->id_artikel; ?>" class="btn btn-primary btn-sm">
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
