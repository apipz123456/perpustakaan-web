<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Cek Status Peminjaman</h1>
        <form action="cek_status.php" method="post">
            <div class="mb-3">
                <label for="no_induk" class="form-label">Nomor Induk:</label>
                <input type="text" class="form-control" id="no_induk" name="no_induk" required>
            </div>
            <button type="submit" class="btn btn-primary">Check Status</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <div>
        <h1>
            <label for=""> coba inputkan kembali</label>
            <div>
                <form action="" method="post"></form>
            </div>
        </h1>
    </div>
</body>

</html>