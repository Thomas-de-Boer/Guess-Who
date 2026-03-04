<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();

    $current = "Bill";

    echo "{$current}: <br>";

    foreach ($characterDataset as $name => $data) {

        if ($name != $current) { continue; }

        foreach ($data as $cfv => $data2) {

            if ($cfv != "features") { continue; }

            foreach ($data2 as $key => $value) {

                echo "{$key}: ";
                if ($value == 1) { echo "yes"; }
                if ($value == 0) { echo "no"; }
                echo "<br>";

            }
        }
    }


    // Opdracht 2: Kies één personage en toon al zijn/haar kenmerken (features).
    // Tip: Haal eerst de features op en loop er doorheen.
    // Toon per feature of het 'JA' (true) of 'NEE' (false) is.
