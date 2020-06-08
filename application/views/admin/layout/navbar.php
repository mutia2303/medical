<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <font color="#FFFFFF">

      <?php
        $hari = date('l');

        if ($hari == "Sunday") {
          echo "Minggu";
        }
        else if ($hari == "Monday") {
          echo "Senin";
        }
        else if ($hari == "Tuesday") {
          echo "Selasa";
        }
        else if ($hari == "Wednesday") {
          echo "Rabu";
        }
        else if ($hari == "Thursday") {
          echo "Kamis";
        }
        else if ($hari == "Friday") {
          echo "Jum'at";
        }
        else if ($hari == "Saturday") {
          echo "Sabtu";
        } 
      ?>, 

      <?php
        $tgl = date('d');
        echo $tgl; 
        $bulan = date('F');

        if ($bulan == "January") {
          echo " Januari ";
        } 
        else if ($bulan == "February") {
          echo " Februari ";
        } 
        else if ($bulan == "March") {
          echo " Maret "; 
        }
        else if ($bulan == "April") {
          echo " April ";
        }
        else if ($bulan == "May") {
          echo " Mei ";
        } 
        else if ($bulan == "June") {
          echo " Juni "; 
        }
        else if ($bulan == "July") {
          echo " Juli ";
        }
        else if ($bulan == "August") {
          echo " Agustus ";
        } 
        else if ($bulan == "September") {
          echo " September "; 
        }
        else if ($bulan == "October") {
          echo " Oktober ";
        }
        else if ($bulan == "November") {
          echo " November ";
        } 
        else if ($bulan == "December") {
          echo " Desember "; 
        }

        $tahun = date('Y');
        echo $tahun;
      ?> | 

      <script type="text/javascript">
        function tampilkanwaktu() {
          var waktu = new Date();
          var sh = waktu.getHours() + "";
          var sm = waktu.getMinutes() + "";
          var ss = waktu.getSeconds() + "";

          document.getElementById("clock").innerHTML = (sh.length == 1?"0"+sh:sh) + ":" + (sm.length == 1?"0"+sm:sm) + ":" + (ss.length == 1?"0"+ss:ss);
        }
      </script>
      <b>
        <span id="clock">
          <body onload="tampilkanwaktu(); setInterval('tampilkanwaktu()', 1000);"></body>
        </span>
      </b>

    </font>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i> Admin
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/profil') ?>">Profil</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/Home/ubah_password') ?>">Ubah Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>