<?php

$pdo = new PDO("mysql:host=localhost;dbname=pokecards", "root", "");
$sql = "SELECT * FROM collection";
$params = [];

?>

<!DOCTYPE html>
<html lang="fr">

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/bodyHeader.php'; ?>

    <main>
        <!-- HEADLINE -->
        <div>
            <div class="title">
                <h1 class="firstTitle"> Plus de 180 PokéCartes à collectionner ! </h1>
                <h2> <br/> Pour le moment il existe 65 cartes, mais ne vous inquiétez-pas, le reste arrive bientôt !</h2>
            </div>
        </div>

        <!-- FEATURED CARDS -->
        <div>
            <div class="title">
                <h1 class="titleSize"> Liste complète des PokéCartes disponibles :</h1>
            </div>

            <form method="GET" action="list.php">
                <label>Trier par :</label>
                <select name="sort">
                    <option value="id">Id</option>
                    <option value="name">Nom</option>
                    <option value="rank">Rang</option>
                </select>

                <label>Filtrer :</label>
                <select name="rank">
                    <option value="">Tous</option>
                    <option value="3">S</option>
                    <option value="2">A</option>
                    <option value="1">B</option>
                </select>

                <button type="submit">Appliquer</button>
            </form>

            <div class="cardsList">
                <?php
                $ranksAllowed = ["3", "2", "1"];
                $ranksConvertion = [
                        1 => 'B',
                        2 => 'A',
                        3 => 'S'
                    ];

                if (isset($_GET["rank"]) && in_array($_GET["rank"], $ranksAllowed)) {
                    $sql .= " WHERE `rank` =:rank";
                    $params["rank"] = $_GET["rank"];
                }

                $sortsAllowed = ["id", "name", "rank"];

                if (isset($_GET["sort"]) && in_array($_GET["sort"], $sortsAllowed)) {
                    if ($_GET["sort"] === "rank") {
                        $sql .= " ORDER BY `rank`";
                    }
                    else {
                        $sql .= " ORDER BY " . $_GET["sort"];
                    }
                }
                else {
                    $sql .= " ORDER BY id";
                }

                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($cards as $card) {
                    $image = "images/PokeCards/".$card['id'].".png";

                    $name = $card['name'];
                    if (!empty($card['outfit'])) {
                        $name = $name." ".$card['outfit'];
                    }
                    if ($card['shiny']) {
                        $name = $name." Shiny";
                    }

                    $rank = $ranksConvertion[$card['rank']];

                    $heart = '🤍';

                    echo "
                    <div class='cardsListName' data-card-id='{$card['id']}'>
                        <div class='favorite-btn'></div>
                        <a href='card.php?id={$card['id']}'>
                            <img class='cardBorder$rank animZoom' src='$image'>
                        </a>
                        <p> PokéCarte rang $rank <br/> <b>$name</b> </p>
                    </div>
                    ";
                }

                ?>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>

</html>