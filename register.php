<?php 
    include "service/database.php";

    $register_message = "";

 if(isset($_POST["register"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hash_password = hash("sha256", $password);

    try {
        $sql = "INSERT INTO users (username, password) VALUES
       ('$username', '$hash_password')";

       if($db->query($sql)) {
            $register_message = "daftar akun berhasil, silahkan login";
       }else {
            $register_message = "daftar akun gagal,silahkan coba lagi";
       }
    }catch (mysqli_sql_exception) {
        $register_message = "username sudah digunakan";
       }
       $db->close();

    
}
?>

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
        <form class="" action="register.php" method="POST">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <div class="container d-flex justify-content-center">
                    <a class="navbar-brand" href="index.php">
                        <img src="img/logo1.png" alt="Pizza_club">
                    </a>
                </div>
            </nav>
            <div class="container" style="padding-top: 80px;">
                <img src="img/modal/2.svg" alt="register">
                <h3 class="pt-5 pb-3 text-center">Buat Akun Anda</h3>
                <i>
                    <?= $register_message ?>
                </i>
                <div class="container">
                    <label for="username">Email</label> <br>
                    <input class="input-register" type="text" placeholder="Masukan email anda" name="username" required>
                    <br><br>
                    <label for="password">Password</label> <br>
                    <input class="input-register" type="password" placeholder="Masukan Password anda" name="password"
                        required>
                    <br><br><br>
                    <button type="submit" name="register" class="btn btn-primary button-login mb-4">Register</button>
                </div>
            </div>

        </form>

    </div>
    </div>

</body>

</html>

