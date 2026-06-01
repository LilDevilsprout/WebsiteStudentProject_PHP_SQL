<?php

$id = $_GET["id"] ?? 1;

$pdo = new PDO("mysql:host=localhost;dbname=pokecards", "root", "");
$stmt = $pdo->prepare("SELECT * FROM collection WHERE id = :id");

$stmt->execute(["id" => $id]);

$card = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $card['name'];
$image = "images/PokeCards/".$card['id'].".png";

$ranksConvertion = [
    1 => 'B',
    2 => 'A',
    3 => 'S'
];
$rank = $ranksConvertion[$card['rank']];

$subName = "";
if (!empty($card['outfit'])) {
    $subName = $subName." ".$card['outfit'];
}
if ($card['shiny']) {
    $subName = $subName." Shiny";
}

$species = json_decode(
    file_get_contents("https://pokeapi.co/api/v2/pokemon-species/".$card['api_name']), true
);

$description = "";
foreach ($species["flavor_text_entries"] as $entry) {
    if ($entry["language"]["name"] === "fr") {
        $description = $entry["flavor_text"];
        break;
    }
}

$pokemon = json_decode(
    file_get_contents("https://pokeapi.co/api/v2/pokemon/".$card['api_name']), true
);

$height = $pokemon["height"] / 10;
$weight = $pokemon["weight"] / 10;

$types = [];
foreach ($pokemon["types"] as $type) {
    
    $typeData = json_decode(
        file_get_contents($type["type"]["url"]), true
    );

    foreach ($typeData["names"] as $typeName) {
        if ($typeName["language"]["name"] === "fr") {
            $types[] = $typeName["name"];
            break;
        }
    }
}
$types = implode(" / ", $types);

?>

<!DOCTYPE html>
<html lang="fr">

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/bodyHeader.php'; ?>

    <main>
        <div>
            <div class="title">
                <h1 class="firstTitle"> <?= htmlspecialchars($name) ?> </h1>
            </div>

            <img class='cardBorder<?= htmlspecialchars($rank) ?>' src=<?= htmlspecialchars($image) ?>>

            <p> PokéCarte rang <?= htmlspecialchars($rank) ?> <br/> <b><?= htmlspecialchars($subName) ?></b> </p>
        </div>

        <br></br>

        <div>
            <h2>Informations :</h2>
            <p>Description : <?= htmlspecialchars($description) ?></p>
            <p>Taille : <?= htmlspecialchars($height) ?>m; Poids : <?= htmlspecialchars($weight) ?>kg</p>
            <p>Type : <?= htmlspecialchars($types) ?></p>
        </div>
    </main>

     <?php include 'includes/footer.php'; ?>
</body>

</html>