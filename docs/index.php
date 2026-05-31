<!DOCTYPE html>
<html lang="fr">

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/bodyHeader.php'; ?>

    <main>
        <!-- HEADLINE -->
        <div>
            <div class="title">
                <h1 class="firstTitle animTitle"> Bienvenue dans le monde des PokéCartes ! </h1>
            </div>

            <div>
                <img class="background" src="images/Others/background.jpg" alt="cafe">
            </div>
        </div>

        <!-- FEATURED CARDS -->
        <div>
            <div class="title">
                <h1 class="titleSize"> PokéCartes en vedette </h1>

            <div class="cards">
                <div>
                <img class="cardBorderB animPulse" src="images/PokeCards/135-sylveon.png" alt="Nymphali">
                </div>

                <div>
                <img class="cardBorderS animPulse animPulse2" src="images/PokeCards/128-greninja-shiny.png" alt="Amphinobi">
                </div>

                <div>
                <img class="cardBorderB animPulse" src="images/PokeCards/94-lucario.png" alt="Lucario">
                </div>
            </div>

            <div class="cards">
                <p> PokéCarte rang A <b>Nymphali</b> </p>
                <p> PokéCarte rang S <b>Amphinobi</b> </p>
                <p> PokéCarte rang A <b>Lucario</b> </p>
            </div>
        </div>

        <!-- CONCEPT -->
        <div>
            <div class="title">
                <h1 id="concept" class="titleSize"> Concept </h1>
            </div>

            <div>
                <p> Vous êtes fan de Pokémon et collectionnez les cartes mais souhaitez trouver une alternative qui ne vous videra pas le portefeuille ?<br/>
                 Vous êtes au bon endroit !
                Place aux <b>PokéCartes</b>, des cartes non officielles à collectionner de l'univers de Pokémon Café ! <br/><br/>
                Retrouvez la même joie en découvrant des cartes de rareté différentes après ouverture de boosters : <br/>
                B pour les <b>communes</b>, A pour les <b>rares</b> et S pour les <b>super rares</b> !<br/><br/>
                Comment les reconnaître ? Les PokéCartes B ont un contour <b>vert</b>, les A en ont un <b>bleu</b> et les S ont une bordure <b>violette</b> ! </p>
            </div>

            <div class="cards gallery">
                <div>
                <a href="images/PokeCards/1.png" class="glightbox" data-gallery="pkmn">
                <img class="cardBorderB" src="images/PokeCards/1.png" alt="Bulbizarre">
                </a>
                </div>

                <div>
                <a href="images/PokeCards/1.png" class="glightbox" data-gallery="pkmn">
                <img class="cardBorderA" src="images/PokeCards/1.png" alt="Bulbizarre tenue Anniversaire">
                </a>
                </div>

                <div>
                <a href="images/PokeCards/1.png" class="glightbox" data-gallery="pkmn">
                <img class="cardBorderS" src="images/PokeCards/1.png" alt="Bulbizarre Shiny">
                </a>
                </div>
            </div>

            <div class="cards">
                <p> PokéCarte rang B <b>Bulbizarre</b> </p>
                <p> PokéCarte rang A <b>Bulbizarre tenue Anniversaire</b> </p>
                <p> PokéCarte rang S <b>Bulbizarre Shiny</b> </p>
            </div>

            <div>
                <p> Il y a plus de 180 PokéCartes à collectionner ! Qu'attendez-vous ? Que la chasse commence ! </p>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>