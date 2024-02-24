<?php
require "../../config/config.php";

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['no_induk'])) {
    $no_induk = $_POST['no_induk'];

$query = "CALL cek_status($no_induk, @status)";
if (!mysqli_query($connection, $query)) {
    echo "Error menjalankan query: " . mysqli_error($connection);
    exit();
}

mysqli_next_result($connection);

if ($result = mysqli_query($connection, "SELECT @status AS p_status")) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['p_status'];

    echo "<script>alert('$status'); window.location.href = '/DashboardAdmin/peminjaman/pinjamBuku.php';</script>";

    mysqli_free_result($result);
} else {
    echo "Error saat mengambil hasil query: " . mysqli_error($connection);
}
}
?>