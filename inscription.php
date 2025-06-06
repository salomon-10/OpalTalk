<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - OpalTalk</title>
    <link rel="icon" href="img/opaltalk.ico" type="opaltalk/x-icon"> 
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to top, #6c4ab6, #d891ef);
            background-image: url('img/opal.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            color: rgba(0,0,0,0.37);
        }
        .transp {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            width: 360px;
            text-align: center;
            height: 460px;
        }
        h2 {
            text-align: center;
            color: #d5aee4;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            color: black;
            background: rgba(255, 255, 255, 0.27);
        }
        input::placeholder {
            color: rgb(0, 0, 0);
        }
        .connecte {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 14px;
        }
        .connecte a {
            background: rgb(205, 158, 224);
            padding: 10px 18px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            transition: background 0.3s;
        }
        .connecte a:hover {
            background: rgb(205, 158, 224);
        }
        .checkbox input {
            margin-right: 5px;
        }
        .checkbox a {
            color: rgb(205, 158, 224);
            text-decoration: underline;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background-color: rgb(205, 158, 224);
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: rgb(205, 158, 224);
        }
        label {
            color: #333;
        }
        .socials {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 60px;
        }
        .socials img {
            width: 28px;
            height: 28px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .socials img:hover {
            transform: scale(1.1);
        }

        /* Loader circulaire - style Uiverse.io */
        #page {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        #container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        #h3 {
            color: white;
        }

        #ring {
            width: 190px;
            height: 190px;
            border: 1px solid transparent;
            border-radius: 50%;
            position: absolute;
        }

        #ring:nth-child(1) {
            border-bottom: 8px solid rgb(255, 141, 249);
            animation: rotate1 2s linear infinite;
        }
        @keyframes rotate1 {
            from { transform: rotateX(50deg) rotateZ(110deg); }
            to { transform: rotateX(50deg) rotateZ(470deg); }
        }

        #ring:nth-child(2) {
            border-bottom: 8px solid rgb(255, 65, 106);
            animation: rotate2 2s linear infinite;
        }
        @keyframes rotate2 {
            from { transform: rotateX(20deg) rotateY(50deg) rotateZ(20deg); }
            to { transform: rotateX(20deg) rotateY(50deg) rotateZ(380deg); }
        }

        #ring:nth-child(3) {
            border-bottom: 8px solid rgb(0, 255, 255);
            animation: rotate3 2s linear infinite;
        }
        @keyframes rotate3 {
            from { transform: rotateX(40deg) rotateY(130deg) rotateZ(450deg); }
            to { transform: rotateX(40deg) rotateY(130deg) rotateZ(90deg); }
        }

        #ring:nth-child(4) {
            border-bottom: 8px solid rgb(252, 183, 55);
            animation: rotate4 2s linear infinite;
        }
        @keyframes rotate4 {
            from { transform: rotateX(70deg) rotateZ(270deg); }
            to { transform: rotateX(70deg) rotateZ(630deg); }
        }
    </style>
</head>
<body>
    <div class="connecte">
        Déjà un compte ? <a href="login.php">Se Connecter</a>
    </div>

    <div class="transp">
        <h2>Register</h2>
        <form action="intermediaire.php" method="post" id="registerForm">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="password" name="confirm" placeholder="Confirmation du Mot de passe" required>
            <input type="tel" name="telephone" placeholder="Téléphone" required>

            <div class="checkbox">
                <input type="checkbox" required>
                <label>J'accepte les <a href="#">Conditions</a> et la <a href="#">Politique de confidentialité</a></label>
            </div>
            <button type="submit">CRÉER</button>

            <div class="socials">
                <img src="img/Google-icon.png" alt="Google" onclick="window.location.href='https://www.google.com'">
                <img src="img/Facebook-icon.png" alt="Facebook" onclick="window.location.href='https://www.facebook.com'">
                <img src="img/X-icon.png" alt="X" onclick="window.location.href='https://www.x.com'">
                <img src="img/Github-icon.png" alt="Github" onclick="window.location.href='https://www.github.com'">
            </div>
        </form>
    </div>

    <!-- Loader circulaire -->
    <div id="page">
        <div id="container">
            <div id="ring"></div>
            <div id="ring"></div>
            <div id="ring"></div>
            <div id="ring"></div>
            <div id="h3">Chargement...</div>
        </div>
    </div>

    
    <script>
        const form = document.getElementById("registerForm");
        const loaderPage = document.getElementById("page");

        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Empêche la soumission immédiate
            loaderPage.style.display = "flex"; // Affiche le loader
            window.scrollTo(0, 0); // Remonte en haut

            setTimeout(() => {
                form.submit(); // Envoie réel après 2s
            }, 2000);
        });
    </script>
</body>
</html>
