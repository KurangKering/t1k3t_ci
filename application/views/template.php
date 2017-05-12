<?php 
$isAdmin = $this->session->userdata('role_name') == 'admin' && $this->session->userdata('role_name') != 'manager';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Penjualan Tiket</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/toastr/toastr.min.css">
  <?php echo $css; ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/adminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/mycss.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav layout-boxed">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url('penjualan') ?>" class="navbar-brand"><b>Penjualan</b>TIKET</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <!-- <li class="active"><a href="<?php echo base_url() ?>dashboard">Dashboard <span class="sr-only">(current)</span></a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Penjualan <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                  <li><a href="<?php echo base_url() ?>penjualan">Lihat Penjualan</a></li>
                  <?php if ($isAdmin): ?>
                    <li><a href="<?php echo base_url() ?>penjualan/tambah_penjualan">Tambah Penjualan</a></li>
                  <?php endif ?>

                  <li><a href="<?php echo base_url() ?>penjualan/grafik_penjualan">Grafik Penjualan</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url() ?>laporan">Laporan Harian</a></li>
               <?php if ($isAdmin): ?>
              <li><a href="<?php echo base_url() ?>master">Data Master</a></li>
            <?php endif ?>
              <li><a href="<?php echo base_url() ?>konfigurasi">Konfigurasi</a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url() ?>auth/logout"><?php echo $this->session->userdata('username'); ?> <i class="fa fa-sign-out"></i> </a></li>
              <!-- User Account Menu -->
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo isset($header) ? $header : ''; ?>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <?php echo $content ?>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <strong>Sistem Informasi Penjualan Tiket 2017</strong> 
      </div>
      <!-- /.container -->
    </footer>
  </div>

  <!-- ./wrapper -->
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() ?>assets/js/jquery-3.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() ?>assets/template/adminLTE/bootstrap/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>assets/template/adminLTE/plugins/fastclick/fastclick.js"></script>
  <script src="<?php echo base_url() ?>assets/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url() ?>assets/jquerypriceformat/jquery.priceformat.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/formatuang.js"></script>
  <?php echo $js; ?>
  
  <?php echo $this->session->flashdata('pesan'); ?>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/template/adminLTE/dist/js/app.min.js"></script>
</body>
</html>
