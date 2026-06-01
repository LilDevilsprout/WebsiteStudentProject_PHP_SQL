<?php
session_start();

try {
    $pdo = new PDO("mysql:host=localhost;dbname=pokecards", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur lors de la connexion à la BDO : ". $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {

        // Vérifier si l'email existe déjà    
        $check = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $check->execute(["email" => $email]);

        if ($check->fetch()) {
            $_SESSION["erreur"] = "Cette adresse email est déjà utilisée.";

            header("Location: inscription.php");
            exit();
        }
        else {
            //Hacher le mdp
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            //Insérer les données dans la base de données
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->execute([
                "email"=> $email,
                "password"=> $hashedPassword
            ]);

            // echo "Inscription réussie !";

            $_SESSION["success"] = "Inscription réussie.";

            header("Location: index.php");
            exit();
        }
    } else {
        echo "Veuillez remplir tous les champs";
    }
}

?>