<?php
session_start();
require_once __DIR__ . '/../includes/load_data.php';

$characterDataset = load_data();

ini_set('display_errors', '0');

header('Content-Type: application/json');

$answer = "No";
$must_click = [];

if (isset($_POST["attributes"])) {
    foreach ($characterDataset[$_SESSION['secret_character']]['features'] as $attribute => $value) {
        if ($_POST["attributes"] == $attribute && $value === 1) {
            $answer = "Yes";
        }
    }
    foreach ($characterDataset as $name => $data) {
        if ($name === "_feature_order") continue;

        if (($answer === "Yes" && $data['features'][$_POST["attributes"]] === 0) ||
            ($answer === "No" && $data['features'][$_POST["attributes"]] === 1)) {
            $must_click[] = $name;
        }
    }
    echo json_encode([
        'answer' => $answer,
        'must_click' => $must_click
    ]);
}


if (isset($_POST["name"])) {
    if ($_POST["name"] == $_SESSION['secret_character']) {
        echo "correct";
    }
    else {
        echo "incorrect";
    }
}