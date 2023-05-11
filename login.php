<?php
session_start();
if (isset($_SESSION["level"])) {
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <title>web seleksi</title>
</head>

<body>
    <div class="container">
        <div class="login-page">
            <div class="card">
                <div class="card-header">
                    <h3>Silahkan login</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <?php
                            require "koneksi.php";

                            if (isset($_POST["login"])) {
                                if (isset($_POST["email"]) && isset($_POST["pass"])) {
                                    $email = mysqli_escape_string(connect(), $_POST["email"]);
                                    $pass = mysqli_escape_string(connect(), $_POST["pass"]);

                                    $cek = mysqli_query(connect(), "SELECT * FROM user WHERE username = '$email'");
                                    if (mysqli_num_rows($cek) == 0) {
                                        ?>
                                        <div class="alert alert-danger">
                                            <strong>Maaf</strong> email yang anda masukan tidak terdaftar
                                        </div>
                                        <?php
                                    } else {
                                        $fetch = mysqli_fetch_assoc($cek);
                                        if (md5($pass) == $fetch["password"]) {
                                            $_SESSION["level"] = $fetch["level"];
                                            $_SESSION["iduser"] = $fetch["iduser"];

                                            // redirect home page
                                            ?>
                                            <script>
                                                location.href = "index.php";
                                            </script>
                                            <?php
                                            die();
                                        } else {
                                            ?>
                                            <div class="alert alert-danger">
                                                <strong>Maaf</strong> email/password yang anda masukan tidak terdaftar
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                        ?>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="email">Masukan email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="masukan email anda">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="pass">Masukan password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-text" id="clicked">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <input type="password" id="pass" name="pass" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-sm w-50 btn-submit" type="submit" name="login">submit</button>
                            </div>
                        </form>
                        <div class="mt-2 mb-2 text-center">
                            <small>
                                <a href="regis.php">registrasi</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var click = document.getElementById("clicked");
        var pass = document.getElementById("pass");
        click.addEventListener("click", () => {
            if (pass.type == "password") {
                pass.type = "text";
                click.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                pass.type = "password";
                click.innerHTML = '<i class="fas fa-eye"></i>';
            }
        })
    </script>
</body>

</html>