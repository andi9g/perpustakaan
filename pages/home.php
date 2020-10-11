<div class="card-header">
    <div class="row">
        <div class="col">
            <h4 style="text-transform: capitalize;font-weight: bold;"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;Data Bulanan</h4>
        </div>

        <div class="col text-right">
            <a href="laporan/laporanPeminjaman.php" target="__blank" class="btn <?php if($_SESSION['sidebarku']=='light'){?>btn-success<?php }else {echo 'btn-danger';}?> btn-sm">
                <i class="fa fa-print"> </i> Cetak Laporan Peminjaman
            </a>
        </div>
        
    </div>
    
</div>

<div class="card-body">
<!-- BAR CHART -->
<!-- BAR CHART -->
<div class="card  <?php if($_SESSION['sidebarku']=='dark'){?>card-danger chartku<?php }else{ echo "card-success";}?> ">
              <div class="card-header">
                <h3 class="card-title">Chart Peminjaman tahun <?php echo date('Y');?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 300px; height: 250px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>




            