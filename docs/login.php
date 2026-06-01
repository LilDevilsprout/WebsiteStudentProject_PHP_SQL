<?php
session_start();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=pokecards", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la BDO : ". $e->getMessage());
}

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

//Requête pour vérifier si l'utilisateur existe en base
$stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = :email");
$stmt->execute([
    "email" => $email
    ]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$userHashedPassword = $user["password"];

if ($user && password_verify($password, $userHashedPassword)) {
    echo "Connexion réussie !";
    //Enregistrer les informations dans la session
    $_SESSION["utilisateur_id"] = $user["id"];
    $_SESSION["email"] = $user["email"];

    // Redirection vers la page d'accueil
    header("Location: index.php");
    exit();
} else {
    echo "Email ou mot de passe incorrect.";
    $erreur = "Email ou mot de passe incorrect.";
    $_SESSION["erreur"] = "Email ou mot de passe incorrect.";

    header("Location: connexion.php");
    exit();
}

?>