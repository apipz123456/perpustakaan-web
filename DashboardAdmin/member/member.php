<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$anggota = queryReadData("SELECT * FROM anggota");

if(isset($_POST["search"]) ) {
  $anggota = searchMember($_POST["keyword"]);
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
    <title>Anggota terdaftar</title>
</head>

<body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
        <div class="container-fluid p-3">
            <a class="navbar-brand" href="#">
                <img src="/assets/logo (2).png" alt="logo" width="250px">
            </a>

            <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
        </div>
    </nav>



    <div class="p-4 mt-5">
        <!--search engine --->
        <form action="" method="post" class="mt-5">
            <div class="input-group d-flex justify-content-end mb-3">
                <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword"
                    placeholder="cari data member...">
                <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>


        <button type="button" class="btn btn-success" onclick="tambahAnggota()"
            href='/DashboardMember/buku/daftarBuku.php'>Tambah
            Anggota</button>

        <script>
        function tambahAnggota() {
            // Di sini Anda dapat menambahkan logika untuk menangani tindakan tambah anggota, seperti membuka formulir tambah anggota atau mengarahkan pengguna ke halaman tambah anggota.
            alert('Anda memilih untuk menambah anggota!');
            window.location.href = '/sign/member/tambah_anggota.php';
        }
        </script>




        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <th class="bg-primary text-light">id_anggota</th>
                        <th class="bg-primary text-light">no_induk</th>
                        <th class="bg-primary text-light">Nama</th>
                        <th class="bg-primary text-light">Jenis Kelamin</th>
                        <th class="bg-primary text-light">Kelas</th>
                        <th class="bg-primary text-light">Jurusan</th>
                        <th class="bg-primary text-light">No Telepon</th>
                        <th class="bg-primary text-light">Pendaftaran</th>
                        <th class="bg-primary text-light">Delete</th>
                    </tr>
                </thead>
                <?php foreach($anggota as $item) : ?>
                <tr>
                    <td><?=$item["id_anggota"];?></td>
                    <td><?=$item["no_induk"];?></td>
                    <td><?=$item["nama"];?></td>
                    <td><?=$item["jenis_kelamin"];?></td>
                    <td><?=$item["kelas"];?></td>
                    <td><?=$item["jurusan"];?></td>
                    <td><?=$item["no_tlp"];?></td>
                    <td><?=$item["tgl_pendaftaran"];?></td>
                    <td>
                        <div class="action">
                            <a href="deleteMember.php?id=<?= $item["no_induk"]; ?>" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus data member ?');"><i
                                    class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
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