<!DOCTYPE html>
<html lang="fr">

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/bodyHeader.php'; ?>

    <main>
        <div class="container">
        <h1>Questions Fréquentes</h1>
        
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Comment puis-je créer un compte ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Pour créer un compte, cliquez sur le bouton "S'inscrire" en haut de la page. Remplissez le formulaire avec vos informations et le tour est joué !</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Dois-je payer pour accéder à du contenu ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Absolument pas ! Ce projet est fait pour être accessible à tous, je n'ai aucune intention de le rendre payant.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Qu'est ce qu'une PokéCarte ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Les PokéCartes sont des cartes à collectionner non officielles inspirées de l'univers de Pokémon Café Remix. Elles offrent une alternative abordable aux cartes Pokémon officielles tout en conservant le plaisir de la collection.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Quels sont les différents rangs de rareté ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Il existe 3 rangs de rareté : le rang B (communes) avec bordure verte, le rang A (rares) avec bordure bleue, et le rang S (super rares) avec bordure violette.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Comment puis-je obtenir des PokéCartes ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Les PokéCartes sont disponibles en boosters, comme les vraies cartes Pokémon. Chaque ouverture vous réserve des surprises avec différentes raretés !</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Les PokéCartes sont-elles des cartes officielles Pokémon ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Non, les PokéCartes sont des créations de fan non officielles. Toutes les images appartiennent à The Pokémon Company et sont utilisées à des fins de collection personnelle.</p>
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                <h3>Comment voir toute la collection disponible ?</h3>
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                <p>Vous pouvez consulter l'intégralité de la collection en visitant la page "Collection" accessible depuis le menu de navigation.</p>
            </div>
        </div>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>