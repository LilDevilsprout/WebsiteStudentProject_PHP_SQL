<?php
    require "connexion.php";

    try{
        if(isset($_GET["id"])){
            $requete = $pdo->prepare("SELECT * FROM pokemons WHERE id = :id");
            $requete->execute([
                "id" => $_GET["id"]
            ]);

            $pokemon = $requete->fetch(PDO::FETCH_ASSOC);
            //if pokemon not found -> redirect
            if (!$pokemon){
                header("Location: index.php");
            }
        }

        if (isset($_POST["nom"]) && isset($_POST["rang"]) && isset($_GET["id"])) {
            $modification = $pdo->prepare("UPDATE pokemons SET nom = :nom, rang = :rang WHERE id = :id");
            $modification->execute([
                "nom"=> $_POST["nom"],
                "rang"=> $_POST["rang"],
                "id"=> $_GET["id"]
            ]);

            header("Location: index.php");
        }
    } catch(PDOException $e){
        echo "Erreur lors de la modification de la Pokécarte" . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modification d'une Pokécarte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet"> <!-- NOTO FONT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <button class="dark-mode-toggle" onclick="toggleDarkMode()">Dark Mode</button>
        <button class="burger-btn" id="burgerBtn"> MENU </button>
        <!-- MENU -->
        <nav id="menu">
        <ul>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="subscribe.html">S'inscrire</a></li>
            <li><a href="index.php">Liste de souhaits</a></li>
            <li><a href="#concept">Concept</a></li>
            <li><a href="list.html">Collection</a></li>
            <li><a href="about.html">À propos de moi</a></li>
            <li><a href="about.html">Me contacter</a></li>
            <li><a href="faq.html">Faq</a></li>
            <li><a href="index-eng.html">
                <img class="flag" src="images/Others/ukFlag.jpg" alt="English">
            </a></li>
        </ul>
        </nav>
        <div class="overlay" id="overlay"></div>
    </header>

    <main>
        <h1>Modifier la Pokécarte</h1>
        
        <form method="POST" action="update.php?id=<?php echo $pokemon["id"]; ?>">
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php echo $pokemon["nom"]; ?>" required>
            <br>
            <label for="rang">Rang</label>
            <textarea name="rang" value="<?php echo $pokemon["rang"]; ?>"></textarea>
            <button type="submit">Modifier</button>
        </form>
    </main>

    <footer>
    <!-- FOOTER -->
    <div class="footer">
        <div class="divtitle">
            <div class="footerFlex">
                <p>Réseaux officiels de Pokémon :</p>
                <a href="https://www.instagram.com/pokemon/" target="_blank">
                    <img class="logo" src="images/Others/logoInsta.png" alt="Instagram">
                </a>
                <a href="https://www.youtube.com/user/pokemon" target="_blank">
                    <img class="logo" src="images/Others/logoYoutube.png" alt="Youtube">
                </a>
                <a href="https://x.com/pokemon" target="_blank">
                    <img class="logo" src="images/Others/logoX.png" alt="Twitter">
                </a>
                <p>Rappel: Toutes les images utilisées ici appartiennent à Pokémon. </p>
                <a target="_blank" href="https://cafemix.pokemon.com/en-us/">  Site officiel de Pokémon Café Remix </a>
            </div>
        </div>
    </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.14/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.14.1/dist/SplitText.min.js"></script>
    <script src="main.js"></script>
</body>

</html>