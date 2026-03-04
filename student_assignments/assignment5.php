<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();

    foreach ($characterDataset as $name => $data) {
        if ($name == "_feature_order") { continue; }
        echo "{$name}";

        echo "<img src='../images/{$name}.png' alt='{$name}'> <br>";
    }

    // Opdracht 5: Toon alle personages met hun afbeelding.
    // Tip: De images staan in de map '../images/' en hebben de naam van het personage + '.png'.
    // Gebruik HTML om de lijst en images weer te geven.
