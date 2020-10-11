<?php 
session_start();

if($_SESSION['posisi']=='admin'){

include_once('proses/proses.php');
$db = new perpustakaan;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Perpustakaan</title>

  <?php if($_SESSION['sidebarku']=='dark'){?>
      <style type="text/css">
          select[name='example1_length']{
              background-color: rgb(124, 124, 124) !important;
              border: 1px grey;
              color: white;
          }

          input[type="search"]  {
              background-color: rgb(124, 124, 124) !important;
              border: 1px grey;
          }
          
          ul[class='pagination'] li[class=next]{
              background-color: rgb(124, 124, 124) !important;
          }
          
          li[id='example1_previous'] a{
            background-color: rgb(124, 124, 124) !important;
            border: 2px blue !important ;
            color:white !important;
          }

          li[id='example1_next'] a{
            background-color: rgb(124, 124, 124) !important;
            border: 2px blue !important ;
            color:white !important;
          }

          li[class='paginate_button page-item active'] a {
            color:white !important;
            background-color:  rgb(243, 38, 55) !important;
            border: none !important;
          }

          span[class='select2-selection select2-selection--single']{
            background-color: rgb(90, 134, 228) !important;
            border:none !important;
            color: white !important;
            
          }

          span[class='select2-selection__rendered']{
            color:black !important;
            font-size: 17px !important;
            font-weight: normal !important;
            
          }

          .inputku{
            background-color: rgb(124, 124, 124) !important;
            border: none !important;
            color: black !important;
            
          }

          ul[class='select2-results__options']{
            background-color: rgb(124, 124, 124) !important;
            color: black !important;
            font-size: 17px !important;
          }
          ul[class='select2-results__options'] li[aria-selected='true']{
            background-color: #4b4b4b !important;
            color: black !important;
            border: none !important;
            
            
          }
          ul[class='select2-results__options'] li[aria-selected='true']:hover{
            color: black !important;
          }
          .inputku3{
            background-color: rgb(133, 233, 133) !important;
            border: none !important;
            color: black !important;
            font-size: 20px !important;
            
          }
          .colorku {
            color:black !important;
          }
      </style>
    <?php };?>

    
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  
   <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="styleku.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper " style="background-color: black !important;">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">  
        <input style="font-weight: bold;" class="form-control form-control-navbar text-center text-white" type="text" value="ADMIN" aria-label="Search" disabled>
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <i class="fa fa-moon-o pt-2 px-2 text-white"></i>
      </li>
      <li class="nav-item dropdown">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                <form action="darklight.php<?php if(!isset($_GET['pages'])){}else{?>?pages=<?php echo $_GET['pages'];}?>" method="post" class="mt-1">
                    
                    <input type="checkbox" onClick="submit();" name="darklight" <?php if($_SESSION['sidebarku']=='dark'){?><?php }else {?>checked<?php }?> class="custom-control-input" id="tampilan" style="height:100px;" value="bayu"> 
                    <label class="custom-control-label" for="tampilan"></label>
                    
                </form>
            </div>
      </li>

      <li class="nav-item dropdown">
        <i class="fa fa-sun-o pt-2  text-white"></i>
      </li>

      <li class="nav-item">
        <a href="?pages=logout" class="text-warning"><i class="fa fa-power-off fa-lg mt-2 ml-3"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link brandku">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Perpustakaan Web</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar <?php if($_SESSION['sidebarku']=='dark'){?>sidebarkuDark<?php }else {?>sidebarku<?php }?>">
      <?php 
        include_once("menu.php");
      ?>
    </div>
  </aside>

  
  <div class="content-wrapper <?php if($_SESSION['sidebarku']=='dark'){?>bodykuDark<?php }else {?>bodyku<?php }?>">
    <!-- Content Header (Page header) -->

    <div class="container">
      <section class="content-header">
        <div class="container-fluid">
          <?php include_once("breadcrumb.php")?>
        </div><!-- /.container-fluid -->
      </section>





      
      <section class="content-header">
        <div class="container-fluid <?php if($_SESSION['sidebarku']=='dark'){?>breadcrumbColor<?php }else{ echo "breadcrumbku";}?>" style="border-radius: 5px;">
                  <?php
                      $pages = $_GET['pages'];
                      $aksi = $_GET['aksi'];
                      if($pages=='data_buku'){
                        if($aksi == 'tambah_buku'){
                          include_once("pages/tambah_buku.php");
                        }else if($aksi=='ubah_buku'){
                          include_once("pages/ubah_buku.php");
                        }else if($aksi == ''){
                          include_once("pages/data_buku.php");
                        }
                      }else if($pages=='data_siswa'){
                        if($aksi==''){
                          include_once('pages/data_siswa.php');
                        } else if($aksi=='tambah_siswa'){
                          include_once('pages/tambah_siswa.php');
                        }else if($aksi=='ubah_siswa'){
                          include_once('pages/ubah_siswa.php');
                        }
                      }else if($pages=='pinjam_buku'){
                        if($aksi==''){
                          include_once('pages/pinjam_buku.php');
                        }
                      }else if($pages=='data_peminjaman'){
                        if($aksi==''){
                          include_once('pages/data_peminjaman.php');
                        }
                      }else if($pages=='pengembalian_buku'){
                          if($aksi==''){
                            include_once('pages/data_pengembalian.php');
                          }
                      }else if($pages == 'logout'){
                          include_once('pages/logout.php');
                      }
                      else {
                        include_once('pages/home.php');
                      }
                      
                      
                  
                  ?>
        </div>

      </section>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>




<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->




<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>

<script>
var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL','AGU','SEP','OKT,','NOV','DES'],
        datasets: [
        {
          backgroundColor: '#007bff',
          label:'Total Peminjaman',
          borderColor: '#007bff',
          data: <?php $db->chart(date('Y'))?>
        }
      ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    suggestedMax: 100
                }
            }]
        }
    }
});
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>



<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



</body>
</html>

<?php }else {
  header('location:login.php');
}

?>