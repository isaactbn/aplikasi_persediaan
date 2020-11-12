<?php
include "../koneksi.php";
$today=date("Ymd");

$store = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpengeluaran LEFT JOIN tbdetail_pengeluaran ON tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar LEFT JOIN tbstore ON tbpengeluaran.kode_store = tbstore.kode_store GROUP BY nama_store");

$store1 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store GROUP BY nama_store");

$store2 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='Daniel Wellington'");

$store3 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='Olivia Burton'");

$store4 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='ADIDAS'");

$store5 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='D1 Milano'");

$store6 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='KOMONO'");

$store7 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='MVMT'");

$store8 = mysqli_query($sambungin, "SELECT nama_store, SUM(jumlah_barang) AS total FROM tbpenerimaan LEFT JOIN tbdetail_penerimaan ON tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima LEFT JOIN tbstore ON tbpenerimaan.kode_store = tbstore.kode_store WHERE nama_store='TIMEX'");

?>


<section id="main-content">
  <section class="wrapper">

  <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="border-head">
              <h3> GRAFIK PENERIMAAN BARANG </h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
              </ul>

              <?php
                while($data1 = mysqli_fetch_array($store1)) {
              ?>

              <div class="bar">
                <div class="title"><?php echo $data1['nama_store'] ?></div>
                <div class="value tooltips" data-original-title="<?php echo $data1['total'] ?>" data-toggle="tooltip" data-placement="top"><?php echo $data1['total'] ?></div>
              </div>
              <?php
                }
              ?>
              </div>

              <div class="border-head">
              <h3> GRAFIK PENGELUARAN BARANG </h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
              </ul>

              <?php
                while($data = mysqli_fetch_array($store)) {
              ?>

              <div class="bar">
                <div class="title2"><?php echo $data['nama_store'] ?></div>
                <div class="value tooltips" data-original-title="<?php echo $data['total'] ?>" data-toggle="tooltip" data-placement="top"><?php echo $data['total'] ?></div>
              </div>
              <?php
                }
              ?>
              </div>
              
          </div>


          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4>Persentase Data Penerimaan Barang</h4>
              <canvas id="newchart" height="130" width="130"></canvas>
              <script>
                var doughnutData = [{
                    <?php
                      $data2 = mysqli_fetch_array($store2);
                    ?>
                    value: <?php echo $data2['total'] ?>,
                    color: "#4ECDC4"
                  },
                  {
                    <?php
                      $data3 = mysqli_fetch_array($store3);
                    ?>
                    value: <?php echo $data3['total'] ?>,
                    color: "#fddb6f"
                  },
                  {
                    <?php
                      $data4 = mysqli_fetch_array($store4);
                    ?>
                    value: <?php echo $data4['total'] ?>,
                    color: "#a3fd6f"
                  },
                  {
                    <?php
                      $data5 = mysqli_fetch_array($store5);
                    ?>
                    value: <?php echo $data5['total'] ?>,
                    color: "#6f7dfd"
                  },
                  {
                    <?php
                      $data6 = mysqli_fetch_array($store6);
                    ?>
                    value: <?php echo $data6['total'] ?>,
                    color: "#b16ffd"
                  },
                  {
                    <?php
                      $data7 = mysqli_fetch_array($store7);
                    ?>
                    value: <?php echo $data7['total'] ?>,
                    color: "#fd6ff1"
                  },
                  {
                    <?php
                      $data8 = mysqli_fetch_array($store8);
                    ?>
                    value: <?php echo $data8['total'] ?>,
                    color: "#fd6f6f"
                  }
                  
                ];
                var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
              </script>
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
              <div class="panel-body">
                <div class="chart">
                  <div class="pull-left">
                    <span class="badge bg-theme" style="background:#4ECDC4">  </span>  <?php echo $data2['nama_store'] ?></div><br>
                    <div class="pull-left">
                    <span class="badge bg-theme" style="background:#fddb6f">  </span>  <?php echo $data3['nama_store'] ?></div><br>
                    <div class="pull-left">
                    <span class="badge bg-theme" style="background:#a3fd6f">  </span>  <?php echo $data4['nama_store'] ?></div><br>
                    <div class="pull-left">
                    <span class="badge bg-theme" style="background:#6f7dfd">  </span>  <?php echo $data5['nama_store'] ?></div><br>
                    <div class="pull-left">
                    <span class="badge bg-theme" style="background:#b16ffd">  </span>  <?php echo $data6['nama_store'] ?></div><br>
                    <div class="pull-left">
                    <span class="badge bg-theme" style="background:#fd6ff1">  </span>  <?php echo $data7['nama_store'] ?></div><br>
                    <div class="pull-left">
                    <span class="badge bg-theme" style="background:#fd6f6f">  </span>  <?php echo $data8['nama_store'] ?></div>
                    
                  <span></span>
                  
                </div>
              </div>
            </div>
            <!--new earning end-->
            
            <!-- CALENDAR-->
            <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>
            <!-- / calendar -->
          </div>
          <!-- /col-lg-3 -->

        </div>

        <br><br>
        
        <?php
          include "footer.php";
        ?>
                     
  </section>
</section>