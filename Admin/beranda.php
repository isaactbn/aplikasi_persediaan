<?php
session_start();

if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Aplikasi Persediaan Barang</title>

  <!-- Favicons -->
  <link href="img/logo_kgb.png" rel="icon">
  <link href="" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>

  
</head>

<body>
  <section id="container">
  <header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        
      </div>
      
      <!--logo start-->
      <a href="#" class="logo"><img src="../img/logo_kgb.png" style="width:60px"><b>  PT.<span>KGB</span></b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
        <li class="dropdown">

        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="../Admin/dataAdmin/images/<?php echo $_SESSION['profil'] ?>" style="width:30px;"><b>    <?php echo $_SESSION['nama_admin'] ?></b></a>
        <ul class="dropdown-menu">
          <li><a href="?hal=profil">Profile</a></li>
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </li>
        </ul>
      </div>

    </header>
   
    <aside>
      <div id="sidebar" class="nav-collapse ">
     
        <!-- sidebar menu start-->
        <div class="img bg-wrap text-center py-4" style="background-image: url(../img/2222.jpg);">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url();"></div>
	  			</div>
	  		</div>
        <ul class="sidebar-menu" id="nav-accordion">
          
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-home"></i>
              <span><u>Beranda</u></span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span><u>Master Data</u></span>
              </a>
            <ul class="sub">
              <li><a href="?hal=dataKategori"><i class="fa fa-tags"></i><span><u>Data Kategori</u></span></a></li>
              <li><a href="?hal=dataBarang"><i class="fa fa-tasks"></i><span><u>Data Barang</u></span></a></li>
              <li><a href="?hal=dataAdmin"><i class="fa fa-user"></i><span><u>Data Admin</u></span></a></li>
              <li><a href="?hal=dataStore"><i class="fa fa-building"></i><span><u>Data Store</u></span></a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span><u>Transaksi</u></span>
              </a>
            <ul class="sub">
                <li><a href="?hal=dataPenerimaan"><i class="fa fa-backward"></i><span><u>Penerimaan Barang</u></span></a></li>
                <li><a href="?hal=dataPengeluaran"><i class="fa fa-forward"></i><span><u>Pengeluaran Barang</u></span></a></li>
                <li><a href="?hal=stokBarang"><i class="fa fa-tasks"></i><span><u>Stok Barang</u></span></a></li>
              
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span><u>Laporan</u></span>
              </a>
            <ul class="sub">
                <li><a href="laporan/laporanBarang.php" target="_blank"><i class="fa fa-backward"></i><span><u>Master Barang</u></span></a></li>
                <li><a href="?hal=laporanTransaksi"><i class="fa fa-forward"></i><span><u>Transaksi Barang</u></span></a></li>
              
            </ul>
          </li>
</ul>

        <!-- sidebar menu end-->
      </div>
    </aside>
  
        <?php
            include "../koneksi.php";
            include "isi.php";

        ?>

  </section>
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>

  <script src="lib/chart-master/Chart.js"></script>
  <script src="lib/chartjs-conf.js"></script>
  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

       $('#file_gambar').change(function(){
         readURL(this);
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function readURL(input) {
   if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function (e) {
     $('#prev_foto').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
   }
  } 

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

</body>
</html>