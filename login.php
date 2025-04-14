<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username']; // ou 'email' si tu te connectes avec
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: chat.php");
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/opaltalk.ico" type="opaltalk/x-icon"> 
    <title>Connexion - OpalTalk</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background:#FAF7F4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            gap: 40px;
            align-items: center;
        }
        .login-box {
            background: linear-gradient(to bottom right, #a18cd1, #fbc2eb);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 300px;
        }
        .login-box h2 {
            margin-bottom: 20px;
            color: #000;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }
        .login-box button {
            width: 100%;
            background: #00c853;
            color: #fff;
            border: none;
            padding: 12px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }
        .login-box button:hover {
            background: #00b94d;
        }
        .top-right {
            position: absolute;
            top: 20px;
            right: 30px;
        }
        .top-right a {
            background-color: #00c853;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }
        .top-right a:hover {
            background-color: #00b94d;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="top-right">
    Pas encore de compte ? <a href="inscription.php">CRÉER UN COMPTE</a>
</div>
<div class="container">
    <img src="img/opal.jpg" alt="Login Image" style="height: 600px;">

    <form class="login-box" method="POST">
        <h2>LOGIN</h2>
        
        <label>Username</label>
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <label>Password</label>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <div style="margin-bottom: 10px;">
            <input type="checkbox" name="remember"> Remember me
        </div>
        <button type="submit">SE CONNECTER</button>
    </form>
</div>
</body>
</html>
