<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/opaltalk.ico" type="opaltalk/x-icon"> 
    <title>Bienvenue sur OpalTalk</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .conteneur {
            text-align: center;
            color: white;
            font-size: 2em;
            font-weight: bold;
        }
        .animated-text {
            display: inline-block;
            animation: fadeIn 2s ease-in-out infinite alternate;
        }
        @keyframes fadeIn {
            from { opacity: 0.3; }
            to { opacity: 1; }
        }
        .boite {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .button {
            background: white;
            color: #4e54c8;
            border: none;
            width: 200px;
            height: 45px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
            border-radius: 10px;
            box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
            margin: 10px;
        }

        .button:hover {
            background: #4e54c8;
            color: white;
        }
        .footer{
            position: absolute;
            bottom: 10px;
            width: 100%; 
            text-align: center;
            color: white;
            font-size: 0.9em;"}
    </style>
</head>
<body>
    <div class="conteneur">
        <span class="animated-text"><h1>Bienvenue sur OpalTalk 💬✨</h1></span><br><br>
    </div><br><br>
    <div class="boite">
        <h2>Discutez en temps réel avec vos amis</h2>
        <p>Simple🫴. Rapide⚡. Sécurisé🔐. Rejoignez la communauté OpalTalk maintenant !</p>
        <button class="button" onclick="window.location.href='login.php';">Se Connecter</button>
        <button class="button" onclick="window.location.href='inscription.php';">Créer un compte</button>
    </div>
    <div class="footer" >
        © 2025 OpalTalk. Tous droits réservés.
    </div>
</body>
</html>
