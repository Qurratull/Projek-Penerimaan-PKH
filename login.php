<?php
session_start();
include "koneksi.php";

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($query);

    if($cek > 0){

        $data = mysqli_fetch_array($query);

        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        header("Location: index.php");
        exit;

    }else{
        $error = "Username atau Password salah";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login PKH</title>

    <style>

        body{
            font-family: Arial;
            background:#f2f2f2;
        }

        .login{
            width:350px;
            margin:100px auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
        }

        button{
            width:100%;
            padding:10px;
            margin-top:15px;
            background:blue;
            color:white;
            border:none;
        }

        .error{
            color:red;
            margin-top:10px;
        }

    </style>
</head>
<body>

<div class="login">

<h2>LOGIN SISTEM PKH</h2>

<form method="POST">

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" name="login">LOGIN</button>

</form>

<p class="error"><?php echo $error; ?></p>

</div>

</body>
</html>
