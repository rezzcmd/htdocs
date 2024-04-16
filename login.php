<!-- php login -->
<?php 
    include "service/database.php";
    session_start();

    $login_message = "";

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash_password = hash('sha256', $password);

        $sql = "SELECT * FROM users WHERE
        username= '$username' AND password='$hash_password'";

        $result = $db->query($sql);

        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;

            header("location: index.php");
        }else {
            $login_message = "akun tidak ditemukan";
        }
        $db->close();
    }
?>

<!--akhir php login -->

<!-- modal login -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Ini Fontawesome -->
    <link rel="stylesheet" href="css/all.css">

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&family=Montserrat:wght@200;400;600&family=Inter:wght@100..900&display=swap"
        rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Pizza Clube</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <form class="" action="login.php" method="POST">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <div class="container d-flex justify-content-center">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/logo1.png" alt="Pizza_club">
                    </a>
                </div>
            </nav>
            <div class="container" style="padding-top: 80px;">
                <img src="img/modal/2.svg" alt="login">
                <h3 class="pt-5 pb-3 text-center">Masuk Ke Akun Anda</h3>
                <i>
                    <?= $login_message ?>
                </i>
                <div class="container">
                    <label for="username">Email</label> <br>
                    <input class="input-login" type="text" placeholder="Masukan email anda" name="username" required>
                    <br><br>
                    <label for="password">Password</label> <br>
                    <input class="input-login" type="password" placeholder="Masukan Password anda" name="password"
                        required>
                    <br><br><br>
                    <button type="submit" name="login" class="btn btn-warning button-login mb-4">Login</button>
                </div>
            </div>

        </form>

    </div>
    </div>

</body>

</html>





<!-- akhir modal login -->