<?php
require '../proses.php';

//ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan idnya
$mhs = query("SELECT * FROM tb_mahasiswa WHERE nim_mhs = $id")[0];

//cek apakah tombol submit dah ditekan apa belum
if ( isset($_POST["submit"])){

    //cek feedback
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href ='../mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href ='../mahasiswa.php';
            </script>
        ";
    }   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistem Informasi Akademik</title>
    <link rel="icon" type="image/png" href="https://4.bp.blogspot.com/-0Di443_-PQk/XgrNwo6xTQI/AAAAAAAAh0k/5h4_XFF9RO02DbDIlSfL8-CA4oPS5Ek1QCK4BGAYYCw/s1600/logo-baru-uty-putih.png" widS>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .gambar {
            width: 60px;
            height: 60px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="gambar"src="https://4.bp.blogspot.com/-0Di443_-PQk/XgrNwo6xTQI/AAAAAAAAh0k/5h4_XFF9RO02DbDIlSfL8-CA4oPS5Ek1QCK4BGAYYCw/s1600/logo-baru-uty-putih.png" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SISTEM INFORMASI AKADEMIK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider mt-2 mb-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="mahasiswa.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Data Mahasiswa</span></a>
            </li>         
            <li class="nav-item">
                <a class="nav-link" href="krs.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>KRS</span></a>
            </li>   

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <form class="form-inline">
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">



                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Muhammad Rifqi</span>
                                <img class="img-profile rounded-circle"
                                src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Edit Data Barang</h1>
                <p class="mb-4">Masukkan data yang sesuai dengan ketentuan.</p>

                <form class="user" method="POST" action="">
                    <input type="hidden" name="id" value = "<?= $mhs["nim_mhs"]; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" 
                        placeholder="NIM" name="nim_mhs" required value="<?= $mhs["nim_mhs"]; ?>">
                    </div><div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="Nama Mahasiswa" name="nama_mahasiswa" required value="<?= $mhs["nama_mahasiswa"]; ?>">
                    </div><div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="Program Studi" name="program_studi" required value="<?= $mhs["program_studi"]; ?>">
                    </div><div class="form-group">
                        <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                        placeholder="Fakultas" name="fakultas" required value="<?= $mhs["fakultas"]; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fas fa-save"></i> Simpan Data</button>    
                </form>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; SIA UTY <?php echo date('Y')?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>