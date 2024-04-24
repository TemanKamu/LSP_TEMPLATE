<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>

<body style="height: 100vh;">
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 25rem;">
            <div class="text-center">
                <img src="https://png.pngtree.com/template/20190630/ourmid/pngtree-furniture-store-logo-design-vector-image_224422.jpg" class="card-img-top w-75 " alt="...">
            </div>
            <div class="card-body">
                <h3 class="text-center">Selamat datang di Furniture</h3>
                <form action="login.php" class="mt-3" method="post">
                    <div class="mb-3 form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                    </div>
                    <button class="btn btn-dark w-100 mt-4" name="submit" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

<?php
session_start();
if (isset($_POST['submit'])) {
    $usernameUser = "userlsp";
    $passwordUser = "smkisfi";
    if ($usernameUser === $_POST['username'] && $passwordUser === $_POST["password"]) {
        $_SESSION['username'] = $usernameUser;
        $_SESSION['password'] = $passwordUser;
        header("Location: home.php");
    }
}
?>