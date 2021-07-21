<?php include 'config/function.php';?>
<?php include 'config/database.php';?>
<?php include 'config/Table.php';?>

<?php include 'layout/header.php';?>

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="asset/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <?php include 'layout/menu.php';?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">


<?php

$page = 'page/' . @$_GET['page'] . '.php';
if (is_null(@$_GET['page'])) {
	$page = 'page/home.php';
}

if (!file_exists($page)) {
	echo ('halaman belum dibuat ,buat halaman di page !');
}

include $page;
?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'layout/footer.php';?>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/demo.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">

  $('#tableku').on('click', '.btn-delete[data-remote]', function(e) {
    e.preventDefault();



    var url = $(this).data('remote');
    var TRClose = $(this).closest("tr");

    TRClose.css("background-color", "#FF3700");
     Swal.fire({
            title: "Apa Anda Yakin ?",
            text: "Menghapus data ini !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya , Hapus !",
            cancelButtonText: "Tidak ",
          }).then(function (data) {
            if (data.isConfirmed) {

                TRClose.fadeOut(1000,
                    function() {
                        TRClose.remove();
                    });

            $.get(url)
              .done(function( data ) {
                   Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      );
                 });

            } else {
                TRClose.css("background-color", "transparent");
            }
        });

});


  function hapus(link) {

    Swal.fire({
                title: 'Konfirmasi ',
                text: "Apakah ingin hapus data ?",
                type: 'warning',
                confirmButtonText:'Ya, Hapus',
                cancelButtonText:'Tidak',
                showCancelButton: true,
            }).then(function (data) {
                 if(data.isConfirmed)
                 {
                  $.get(link)
              .done(function( data ) {
                   Swal.fire(
                        'Info!',
                        'Data Anda berhasil dihapus.',
                        'success'
                      );
              });
                 }
            });

  }
</script>
</body>
</html>
