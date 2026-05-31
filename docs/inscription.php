<?php
session_start();

$erreur = $_SESSION["erreur"] ?? "";
unset($_SESSION["erreur"]);
?>

<!DOCTYPE html>
<html>
    <head>
        <!--PARAMETERS AND RESOURCES (Fonts, CSS)-->
        <title> PokéCartes </title>
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
            <li><a href="index.php">Liste de souhaits</a></li>
            <li><a class="active" href="connexion.php">Se connecter</a></li>
            <li><a href="index.html">Concept</a></li>
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

        <div class="form-container animForm">
            <div>
            <h2 class="title">Inscrivez-vous !</h2>
            </div>

            <div class="message-error <?= !empty($erreur) ? 'visible' : '' ?>">
                <ul>
                    <?php if (!empty($erreur)) : ?>
                        <li><?=  htmlspecialchars($erreur) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="message-succes"></div>

            <div>
            <form action="register.php" method="POST">
            <!-- <form action="inscription.php" method="POST"> -->
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>

                <div>
                    <button type="button" onclick="window.location.href='connexion.php'">Se connecter</button>
                    <button type="submit">S'inscrire</button>
                </div>

                <div class="animLoader"></div>
            </form>
            </div>
        </div>

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