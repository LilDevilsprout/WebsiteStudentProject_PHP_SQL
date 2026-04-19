<?php 
    require "connexion.php";

    $sql = "SELECT * FROM pokemons";

    $triAutorise = ["nom", "rang"];
    if (isset($_GET["tri"]) && in_array($_GET["tri"], $triAutorise)) {
        $tri = $_GET["tri"];
        $sql = $sql . " ORDER BY $tri ASC";
    } else {
        $tri = "nom";
    }

    $requete = $pdo->prepare($sql);
    $requete->execute();

    $pokemons = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Wishlist de Pokécartes</title>
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
            <li><a class="active" href="index.php">Liste de souhaits</a></li>
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
        <h1>Voici tes cartes dans ta liste de souhaits !</h1>

        <div class="title">
        <form method="GET" action="index.php">
            <label>Trier par : </label>
            <select name="tri" onchange="this.form.submit()">
                    <option value="nom" <?php echo $tri === "nom" ? "selected" : "";?>>Nom</option>
                    <option value="rang" <?php echo $tri === "rang" ? "selected" : "";?>>Rang</option>
            </select>
        </form>
        </div>

        <div>
        <ul>
        <?php
            foreach ($pokemons as $pokemon) {
                echo "<li>";
                echo $pokemon["nom"] . " - " . $pokemon["rang"];
                echo "<a href='delete.php?id=" . $pokemon["id"]. "' onclick=\"return confirm('Supprimer cette Pokécarte ?')\"> X </a>";
                echo "<a href='update.php?id=" . $pokemon["id"] . "'> Modifier </a>";
                echo "</li>";
            }
        ?>
        </ul>
        </div>

        <div class="title">
        <a href="create.php">Ajouter une nouvelle Pokécarte</a>
        </div>
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