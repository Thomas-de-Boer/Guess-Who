<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();

$current = "man";

echo "{$current}: <br>";

foreach ($characterDataset as $name => $data) {

    if ($name == "_feature_order") {continue;}

    foreach ($data as $cfv => $data2) {

        if ($cfv != "features") { continue; }

        foreach ($data2 as $key => $value) {

            if ($key == $current && $value == 1) { echo "{$name} <br>"; }

        }
    }
}


// Opdracht 3: Toon alle personages die een vrouw zijn.
    // Tip: Loop door alle personages en controleer de 'woman' feature.
