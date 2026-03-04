<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();

    echo "man die kaal is en bril heeft: <br>";

    foreach ($characterDataset as $name => $data) {
        if ($name == "_feature_order") { continue; }
        if ($data['features']['man'] === 1 && $data['features']['bald'] === 1 && $data['features']['glasses'] === 1) {
            echo "{$name} <br>";
        }
    }

    // Opdracht 4: Toon alle personages die een man zijn, kaal zijn en een bril hebben.
    // Tip: Combineer meerdere voorwaarden in je if-statement.
