<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - OpalTalk</title>
    <link rel="icon" href="img/opaltalk.ico" type="opaltalk/x-icon"> 
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background:#FAF7F4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .left {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        .left img {
            width: 300px;
            height: auto;
        }
        .right {
            flex: 1;
            background: linear-gradient(to bottom right, #a18cd1, #fbc2eb);

            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            max-width: 400px;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
        }
        .top-link {
            text-align: right;
            margin-bottom: 10px;
        }
        .top-link a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            background-color: #00cc00;
            padding: 10px 15px;
            border-radius: 10px;
        }
        .checkbox {
            margin-top: 10px;
        }
        .checkbox input {
            margin-right: 5px;
        }
        .checkbox a {
            color: purple;
            text-decoration: underline;
        }
        button {
            background-color: #00cc00;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #00aa00;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="left"!>
        <img src="img/opal.jpg" alt="Login Illustration" style="height: 500px; width:600px" >
    </div>
    <div class="right">
        <div class="top-link">
            Déjà un compte ? <a href="login.php">Se Connecter</a>
        </div>
        <h2>Inscription</h2>
        <form action="intermediaire.php" method="post">
            <label>Email</label>
            <input type="email" name="email" placeholder="E-mail" required>

            <label>Nom d'utilisateur</label>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>

            <label>Mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe" required>

            <label>Confirmation</label>
            <input type="password" name="confirm" placeholder="Confirmation" required>

            <label>Téléphone</label>
            <input type="tel" name="telephone" placeholder="+228 90 00 00 00">

            <div class="checkbox">
                <input type="checkbox" required>
                <label>J'accepte les <a href="#">Conditions</a> et la <a href="#">Politique de confidentialité</a></label>
            </div>

            <button type="submit">CRÉER</button>
        </form>
    </div>
</div>
</body>
</html>
