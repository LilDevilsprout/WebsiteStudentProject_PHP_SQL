<?php
    require "connexion.php";
    try{
        if (isset($_POST["nom"]) && isset($_POST["rang"])){
            $requete = $pdo->prepare("INSERT INTO pokemons (nom, rang) VALUES (:nom, :rang)");

            $requete->execute([
                "nom"=> $_POST["nom"],
                "rang"=> $_POST["rang"],
            ]);

            header("Location: index.php");
        }
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout de la Pokécarte : " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <?php include 'includes/header.php'; ?>
<body>
    <?php include 'includes/bodyHeader.php'; ?>

    <main>
        <h1>Ajout d'une carte</h1>

        <div class="title">
        <form method="POST" action="create.php">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
            <br>
            <label for="rang">Rang</label>
            <textarea name="rang"></textarea>
            <button type="submit">Ajouter</button>
        </form>
        </div>
    </main>
        <?php include 'includes/footer.php'; ?>
    </body>
</html>

