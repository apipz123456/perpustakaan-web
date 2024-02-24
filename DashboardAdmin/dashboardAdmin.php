<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../sign/admin/sign_in.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>

<body>

    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
        <div class="container-fluid p-3">
            <a class="navbar-brand" href="#">
                <img src="/assets/logo (2).png" alt="logo" width="250px">
            </a>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="/assets/oj (2).png" alt="adminLogo" width="60px">
                </button>
                <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
                    <li>
                        <a class="dropdown-item text-center" href="#">
                            <img src="/assets/oj (2).png" alt="adminLogo" width="30px">
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-center text-secondary" href="#"> <span
                                class="text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></a>
                        </span>
                    </li>
                    <hr>
                    <li>
                        <a class="dropdown-item text-center mb-2" href="#">Akun Terverifikasi <span
                                class="text-primary"><i class="fa-solid fa-circle-check"></i></span></a>
                    </li>
                    <li>
                        <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">Sign
                            Out <i class="fa-solid fa-right-to-bracket"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="mt-5 p-4">
        <!-- // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik) -->
        <?php
      $date = date('Y-m-d H:i:s'); 
      $day = date('l');
      $dayOfMonth = date('d');
      $month = date('F');
      $year = date('Y');
      ?>

        <h1 class="mt-5 fw-bold">ADMIN 🤯 - <span class="fs-4 text-secondary">
                <?php echo $day. " ". $dayOfMonth." ". " ". $month. " ". $year; ?> </span></h1>

        <div class="alert alert-success" role="alert">Selamat datang <span
                class="fw-bold text-capitalize"><?php echo $_SESSION['admin']['nama_admin']; ?></span> di Dashboard
            Perpustakaan SMK Citra</div>

        <div class="mt-4 p-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="cardImg">
                        <a href="member/member.php">
                            <img src="/assets/dashBoardCardMember/member.png" alt="daftar buku" class="img-fluid"
                                style="max-width: 600px;" width="500px">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cardImg">
                        <a href="buku/daftarBuku.php">
                            <img src="/assets/dashBoardCardMember/bukuAdmin.png" alt="daftar buku" class="img-fluid"
                                style="max-width: 600px;" width="500px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="cardImg">
                        <a href="peminjaman/peminjamanBuku.php">
                            <img src="/assets/dashBoardCardMember/peminjaman.png" alt="daftar buku" class="img-fluid"
                                style="max-width: 600px;" width="500px">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cardImg">
                        <a href="peminjaman/pinjamBuku.php">
                            <img src="/assets/dashBoardCardMember/pinjam.png" alt="daftar buku" class="img-fluid"
                                style="max-width: 600px;" width="500px">
                        </a>
                    </div>
                </div>
            </div>
        </div>



    </div>

    </div>

    </div>

    <footer class="shadow-lg bg-subtle p-3">
        <div class="container-fluid d-flex justify-content-center">
            <p style="text-align: center;">Created by <span class="text-primary">@fauzanafif</span> © 2024</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>