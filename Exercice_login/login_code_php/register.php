<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=exercice_login", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la BDO : ". $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
            //Hacher le mdp
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            //Insérer les données dans la base de données
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (email, mot_de_passe) VALUES (:email, :mot_de_passe)");
            $stmt->execute([
                "email"=> $email,
                "mot_de_passe"=> $hashedPassword
            ]);

            echo "Inscription réussie !";
        } else {
            echo "Veuillez remplir tous les champs";
        }
}

?>