<?php
require 'includes/functions.php';


if( isset($_POST["register"])){
    if( registrasi($_POST) > 0) {
        echo "
        <script>
        alert('user baru berhasil ditambahkan')
        </script>
        ";
    }else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
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
        .pass a{
            display: inline-block;
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
            text-decoration: none;
        }
        .pass a:hover{
            text-decoration: underline;
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
        <h1>Daftar</h1>
        <form action="" method="POST">
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
            <div class="txt_field">
                <input type="password" name="password2" required>
                <span></span>
                <label>Konfirmasi Password</label>
            </div>
            
            <button type="submit" name="register">Daftar</button>
            <div class="signup_link">
                Sudah punya akun? <a href="login.php">Masuk</a>
            </div>
        </form>
    </div>
</body>
</html>