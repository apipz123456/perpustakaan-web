<?php 
session_start();

require "../../config/config.php";

$admin = queryReadData("SELECT * FROM admin");
// Cek apakah tombol "Pinjam" telah ditekan
if(isset($_POST["pinjam"])) {
    // Tangkap data dari formulir
    $id_buku = $_POST["id_buku"];
    $no_induk = $_POST["no_induk"];
    $id_admin = $_POST["id_admin"];
    $tgl_peminjaman = $_POST["tgl_peminjaman"];
    $tgl_pengembalian = $_POST["tgl_pengembalian"];

    // Buat query untuk menyimpan data peminjaman ke dalam database
    $query = "INSERT INTO peminjaman (id_buku, no_induk, id_admin, tgl_peminjaman, tgl_pengembalian) 
              VALUES ('$id_buku', '$no_induk', '$id_admin', '$tgl_peminjaman', '$tgl_pengembalian')";

    // Eksekusi query
    $result = mysqli_query($connection, $query);

    // Periksa apakah query berhasil dieksekusi
    if($result) {
        echo "<script>
                alert('Buku berhasil dipinjam');
                window.location.href = 'peminjamanBuku.php'; // Redirect ke halaman daftar buku
              </script>";
    } else {
        echo "<script>
                alert('Buku gagal dipinjam!');
              </script>";
    }
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
    <title>Form pinjam Buku || Member</title>
</head>
<style>
.layout-card-custom {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
}
</style>

<body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
        <div class="container-fluid p-3">
            <a class="navbar-brand" href="#">
                <img src="/assets/logo (2).png" alt="logo" width="350px">
            </a>

            <a class="btn btn-tertiary" href="/DashboardMember/buku/daftarBuku.php">Dashboard</a>
        </div>
    </nav>

    <div class="card mt-4">
        <br>
        <br>
        <br>
        <br>
        <h5 class="card-header">Form Pinjam Buku</h5>
        <div class="card-body">

            <form action="" method="post">
                <!--Ambil data id buku-->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ID Buku</span>
                    <input type="text" name="id_buku" class="form-control" placeholder="Masukkan ID buku"
                        aria-label="ID Buku" aria-describedby="basic-addon1">
                </div>

                <!-- Ambil data no_induk user yang login-->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">No Induk</span>
                    <input type="number" name="no_induk" class="form-control" placeholder="no induk"
                        aria-label="no_induk" aria-describedby="basic-addon1"
                        value="<?= isset($_SESSION["anggota"]["no_induk"]) ? htmlentities($_SESSION["anggota"]["no_induk"]) : '' ?>">
                </div>

                <!--Ambil data id admin-->
                <select name="id_admin" class="form-select" aria-label="Default select example">
                    <option selected>Pilih id admin</option>
                    <?php foreach ($admin as $item) : ?>
                    <option><?= $item["id"]; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tanggal pinjam</span>
                    <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control"
                        placeholder="tgl_peminjaman" aria-label="tgl_peminjaman" aria-describedby="basic-addon1"
                        onchange="setReturnDate()" required>
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Tenggat Pengembalian</span>
                    <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control"
                        placeholder="tgl_pengembalian" aria-label="tgl_pengembalian" aria-describedby="basic-addon1"
                        readonly>
                </div>

                <a class="btn btn-danger" href="../buku/daftarBuku.php"> Batal</a>
                <button type="submit" class="btn btn-success" name="pinjam">Pinjam</button>
            </form>
            <div class="input-group mb-3 mt-3">
                <form action="cek_status.php" method="post">
                    <div class="mb-3">
                        <input placeholder="Cek Status no induk" type="text" class="form-control" id="no_induk"
                            name="no_induk" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Check Status</button>
                </form>
            </div>
        </div>

        <div class="alert alert-danger mt-4" role="alert"><span class="fw-bold">Catatan :</span> Teliti dalam
            menginputkan
            No Induk , karna sensitive.!</div>

        <footer class="shadow-lg bg-subtle p-3">
            <div class="container-fluid d-flex justify-content-center">
                <p style="text-align: center;">Created by <span class="text-primary">@fauzanafif</span> © 2024</p>
            </div>
        </footer>


        <!--JAVASCRIPT -->
        <script src="../../style/js/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>