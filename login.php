<?php
session_start();

//cek cookie
if( isset($_COOKIE["login"])){

}

if( isset($_SESSION["login"])){
    header('location: index.php');
    exit;
}
require 'includes/functions.php';

if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1 ){
        //cek password 
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            //cek remember me
            if( isset($_POST["remember"])){

                //set cookie
                setcookie('key', $row["id"], time() +60);
                setcookie('secret', hash('sha256', $row["username"]), time() +60);
            }
            header('location: index.php');
            exit;
        }
    } 
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family:  'Helvetica Neue', 'Open Sans', sans-serif;
            background: hsl(29, 100%, 98%);
            height: 100vh;
            overflow: hidden;
        }
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background-color: white;
            border-radius: 10px;

        }
        .center h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }
        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }
        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }
        .txt_field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background-color: none;
            outline: 0;
        }
        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }
        .txt_field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }
        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label{
            top: -5px;
            color: #2691d9;
        }
        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before{
            width: 100%;
        }
        .pass input{
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
            text-decoration: none;
        }
        .pass label{
            cursor: pointer;
            color: #666666;
        }
        button {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            outline: none;
            border: 0;
        }
        .signup_link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }
        .signup_link a {
            text-decoration: none;
            color: #2691d9;
        }
        .signup_link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Masuk</h1>
        <form action="" method="POST">
        <?php
    if( isset($error)) : ?>
<br><p style="color: red; font-style: italic;">Username/ password salah</p>
    <?php endif; ?>
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">
                <input type="checkbox" name="remember" id="check"> <label for="check">Ingat saya</label>
            </div>
            <button type="submit" name="login">Masuk</button>
            <div class="signup_link">
                Belum punya akun? <a href="registrasi.php">Daftar</a>
            </div>
        </form>
    </div>
</body>
</html>