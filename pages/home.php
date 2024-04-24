<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <?php
    include("../datas.php");
    ?>
    <div class="d-flex text-center text-white bg-dark " style="height: 500px;">
        <div class="cover-container d-flex w-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <h3 class="float-md-start mb-0">Furniture</h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link text-white fw-bold fs-5"  aria-current="page" href="#">Home</a>
                        <a class="nav-link text-white fw-bold fs-5"  href="#">Features</a>
                        <form action="home.php" method="post">
                            <button class="navbar-text btn btn-danger" type="submit" name="logout">
                                Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </header>
            <main class="px-3" style="margin-bottom: 110px;">
                <h1>Selamat datang</h1>
                <p class="lead">Kami dengan senang hati menyambut Anda di Toko Furniture. Temukan beragam produk berkualitas tinggi dengan harga bersahabat, dari kebutuhan sehari-hari hingga hadiah istimewa. Layanan pelanggan kami siap membantu Anda. Selamat berbelanja!</p>
                <p class="lead">
                    <a href="#daftarProduk" class="btn btn-lg btn-secondary fw-bold border-white bg-white text-black">Let's shopping!</a>
                </p>
            </main>
        </div>
    </div>

    <div class="container-fluid" id="daftarProduk">
        <h2 class="my-4 fw-bold text-center">DAFTAR PRODUK FURNITURE</h2>
        <div class="d-flex justify-content-between">
            <?php foreach ($datas as $index => $item) { ?>
                <div class="card" style="width: 21rem;">
                    <img src="<?= $item[3] ?>" class="card-img-top" style="height: 300px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item[0] ?></h5>
                        <p class="card-text"><?= $item[1] ?></p>
                        <p>Rp. <?= number_format($item[2]) ?></p>
                    </div>
                    <button type="button" class="btn btn-primary m-2" onclick="window.location.href='transaksi.php?id=<?= $index ?>'" data-toggle="tooltip" data-placement="top" title="Pilih   ">
                        Pilih barang
                    </button>
                </div>

            <?php } ?>
        </div>
    </div>
    <div class="w-100 bg-secondary py-2 mt-5  bg-dark">
        <h2 class="text-center text-white">@ copyright</h2>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>