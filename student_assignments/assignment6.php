<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();

    $random_character = array_rand($characterDataset);
    while ($random_character == "_feature_order") {
        $random_character = array_rand($characterDataset);
    }

    echo "<img src='../images/{$random_character}.png' alt='{$random_character}' height='100%'> <br>";

    // Opdracht 6: Kies een willekeurig personage en toon zijn/haar afbeelding.
    // Tip: Gebruik de array_rand() functie om een willekeurige key uit de array te halen.
