<?php
session_start();
if (!isset($_SESSION["level"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat datang <?= $_SESSION["level"]; ?> </title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
</head>
<body>
    <div class="login-page">
        <div class="container">
            <div class="text-center">
                <h1 class="font-weight-bold">Selamat Datang dihalaman <?= $_SESSION["level"]; ?></h1>
                <span><a href="logout.php">logout</a></span>
            </div>
            <div class="mt-3 mb-3 text-center">
                <div class="container">
                    <h5><i>anda telah masuk kedalam web <?= $_SESSION["level"]; ?></i></h5>
                    <?php
                        if ($_SESSION["level"] == "admin") {
                            ?>
                            <h5><i>Anda berhak untuk mengakses segala fitur yang disini</i></h5>
                            <?php
                        } else {
                            ?>
                            <h5><i>Anda tidak berhak untuk mengakses segala fitur yang disini</i></h5>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>