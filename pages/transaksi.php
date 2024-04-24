<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
}

include("../datas.php");
$id = $_GET['id'];

$data = $datas[$id];
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
    <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body d-flex justify-content-center">
                    <div>
                        <h3 class="text-center">Transaksi Berhasil</h3>
                        <h3 class="text-center">Kembali ke Home</h3>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" onclick="window.location.href = './home.php'">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h3 class="float-md-start mb-0">Furniture</h3>

            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <div class="navbar-nav me-3">
                    <a class="nav-link text-black fw-bold fs-5" aria-current="page" href="#">Home</a>
                    <a class="nav-link text-black fw-bold fs-5" href="#">Features</a>
                </div>

                <form action="home.php" method="post">
                    <button class="navbar-text btn btn-danger" type="submit" name="logout">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="bg-secondary p-2 rounded mt-3">
            <form action="" class=" p-2 rounded bg-light" onsubmit="return hitungTotalHarga(event)">
                <div class="form-group">
                    <label for="" class="text-black">Nomor transaksi</label>
                    <input type="text" class="form-control" value="<?= random_int(10000, 40000) ?>" readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-black">Tanggal transaksi</label>
                    <input type="date" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>

                <div class="form-group mt-2">
                    <label for="" class="text-black">Nama customer</label>
                    <input type="text" class="form-control" value="<?= $_SESSION["username"] ?>">
                </div>

                <div class="form-group mt-2">
                    <label for="" class="text-black">Pilih produk</label>
                    <input type="text" class="form-control" value="<?= $data[0] ?>" readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="" class="text-black">Harga produk</label>
                    <input type="text" class="form-control" value="Rp, <?= number_format($data[2]) ?>" readonly>
                    <input type="text" class="form-control" value=" <?= $data[2] ?>" id="harga" hidden>
                </div>

                <div class="form-group mt-2">
                    <label for="" class="text-black">Jumlah barang</label>
                    <input type="number" class="form-control" value="1" id="jumlahBarang">
                </div>
                <button type="submit" class="btn btn-outline-secondary mt-3">Hitung total harga</button>
            </form>
            <div class="bg-light mt-3 rounded p-3 ">
                <div class="form-group w-25 d-flex align-items-center">
                    <label for="" class="w-50">Total harga</label>
                    <input type="text" class="form-control border border-dark" id="totalHarga" readonly>
                </div>
                <div class="form-group w-25 d-flex align-items-center mt-3">
                    <label for="" class="w-50">Pembayaran</label>
                    <input type="number" class="form-control border border-dark" id="pembayaran">
                    <!-- <input type="text" class="form-control border border-dark" id="inputPembayaran"> -->
                </div>
                <button type="button" class="btn btn-secondary mt-3" onclick="hitungKembalian()">Hitung Kembalian</button>
                <div class="form-group w-25 d-flex align-items-center mt-3 d-none" id="kembalianBox">
                    <label for="" class="w-50">Kembalian</label>
                    <input type="text" class="form-control border border-dark me-3" id="kembalianInput">
                    <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#notification">SIMPAN</button>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 bg-dark py-2 mt-5">
        <h2 class="text-center text-white">@ copyright</h2>
    </div>

    <script>
        let totalHarga;
        let hargaTopping = 0;

        function rupiah(number) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }


        function hitungTotalHarga(e) {
            e.preventDefault();
            const hitungTotalHarga = parseInt(document.getElementById("jumlahBarang").value) * parseInt(document.getElementById("harga").value) + parseInt(hargaTopping);
            totalHarga = hitungTotalHarga;

            document.getElementById("totalHarga").value = rupiah(totalHarga)
        }

        function hitungKembalian() {
            const kembalian = parseInt(document.getElementById("pembayaran").value) - totalHarga;
            if (kembalian < 0 || isNaN(kembalian) === true) {
                alert("Jumlah uang kurang !")
            } else {
                document.getElementById("kembalianBox").classList.remove("d-none")
                document.getElementById("kembalianInput").value = rupiah(kembalian);
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>