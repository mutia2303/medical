<ul class="sidebar navbar-nav">
      <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/Home') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user-md"></i>
          <span>Medis</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/tambah_medis') ?>"><i class="fas fa-fw fa-user-md"></i> Tambah Data</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/dokter') ?>"><i class="fas fa-fw fa-user-md"></i> Data Dokter</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/perawat') ?>"><i class="fas fa-fw fa-user-md"></i> Data Perawat</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/bidan') ?>"><i class="fas fa-fw fa-user-md"></i> Data Bidan</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/pasien') ?>">
          <i class="fas fa-fw fa-user-md"></i>
          <span>Pasien</span>
        </a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Barang</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/obat') ?>"><i class="fas fa-fw fa-medkit"></i> Data Obat</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/layanan') ?>"><i class="fas fa-fw fa-medkit"></i> Data Layanan</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/transaksi') ?>">
          <i class="fas fa-fw fa-user-md"></i>
          <span>Transaksi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/fasilitas') ?>">
          <i class="fas fa-fw fa-hospital"></i>
          <span>Fasilitas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/artikel') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Artikel</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/banner') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Banner</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/perusahaan') ?>">
          <i class="fas fa-fw fa-hospital"></i>
          <span>Perusahaan</span>
        </a>
      </li>
    
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/Home/ubah_password') ?>">
          <i class="fas fa-fw fa-lock" style="color: #1E90FF"></i>
          <span>Ubah Password</span>
        </a>
      </li> -->

    </ul>