<?php
require "../../config/config.php";
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM peminjaman_detail_view";
$result = mysqli_query($connection, $sql);


$dataPeminjam = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dataPeminjam[] = $row;
    }
} else {
    echo "Tidak ada data";
}

if (isset($_POST["hapus"])) {
    $id_peminjaman = $_POST["id_peminjaman"];
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id_peminjaman";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "<script>
                alert('Data peminjaman berhasil dihapus');
                window.location.href = 'peminjamanBuku.php'; // Redirect kembali ke halaman ini
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data peminjaman');
              </script>";
    }
}

mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Kelola peminjaman buku || admin</title>
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
    <br>

    <div class="p-4 mt-5">

        <div class="mt-5">
            <caption>List of Peminjaman</caption>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>

                            <th class="bg-primary text-light">Id Peminjaman</th>
                            <th class="bg-primary text-light">Id Buku</th>
                            <th class="bg-primary text-light">Judul Buku</th>
                            <th class="bg-primary text-light">No Induk</th>
                            <th class="bg-primary text-light">Nama siswa</th>
                            <th class="bg-primary text-light">Kelas</th>
                            <th class="bg-primary text-light">Jurusan</th>
                            <th class="bg-primary text-light">Id Admin</th>
                            <th class="bg-primary text-light">Tanggal Peminjaman</th>
                            <th class="bg-primary text-light">Tanggal Pengembalian</th>
                            <th class="bg-primary text-light">Action</th>

                        </tr>
                    </thead>
                    <?php foreach ($dataPeminjam as $item) : ?>
                    <tr>
                        <td><?= $item["id_peminjaman"]; ?></td>
                        <td><?= $item["id_buku"]; ?></td>
                        <td><?= $item["judul_buku"]; ?></td>
                        <td><?= $item["no_induk"]; ?></td>
                        <td><?= $item["nama"]; ?></td>
                        <td><?= $item["kelas"]; ?></td>
                        <td><?= $item["jurusan"]; ?></td>
                        <td><?= $item["id_admin"]; ?></td>
                        <td><?= $item["tgl_peminjaman"]; ?></td>
                        <td><?= $item["tgl_pengembalian"]; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_peminjaman" value="<?= $item["id_peminjaman"]; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" name="hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
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