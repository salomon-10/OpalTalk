<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=opaltalk', 'root', '');
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());
}

// Vérification de la confirmation du mot de passe
if ($_POST['password'] !== $_POST['confirm']) {
    die('Les mots de passe ne correspondent pas.');
}

// Requête préparée pour insérer un nouvel utilisateur
$req = $bdd->prepare('INSERT INTO users (email, username,password,telephone) VALUES (?, ?, ?, ?)');
$success = $req->execute(array(
    $_POST['email'],
    $_POST['username'],
    password_hash($_POST['password'], PASSWORD_DEFAULT), // sécurisation du mot de passe
    $_POST['telephone']
));

// Redirection si l'insertion est réussie
if ($success) {
    header('Location: login.php');
    exit();
} else {
    echo "Erreur lors de l'inscription. / Ce compte existe deja.";
}
?>
