<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();


    session_start();
    while ($_SESSION['secret_character'] == "_feature_order" or $_SESSION['secret_character'] == "")
    {
        $_SESSION['secret_character'] = array_rand($characterDataset);
    }


    // Opdracht 7: Bouw het "Wie is het?" spel.
    // 1. Kies een willekeurig personage en sla dit op in de sessie.//
    // 2. Maak een formulier waarmee de speler een feature kan kiezen om te vragen.
    // 3. Vergelijk de gekozen feature met die van het geheime personage.
    // 4. Geef antwoord ("Ja" of "Nee").
    // 5. Filter de lijst van overgebleven kandidaten op basis van het antwoord.
    // 6. Toon de overgebleven kandidaten.
    // 7. Voeg een reset-knop toe om een nieuw spel te starten.
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Guess Who – Board Game</title>
    <link rel="stylesheet" href="../css/assignment8.css">
</head>
<body>

    <div id="main_container">
        <div id="form_container">
            <div id="form_title">
                <label for="#form"><b>Guess Who</b></label>
            </div>
            <div id="questions">
                <form method="post" id="form">
                    <label for="form_radio" id="title"><b>Does Your Character have<br>/ Is Your Character</b></label><br>

                    <div id="scroll">
                    <input class="radio" name="attributes" type="radio" id="man"> <label for="man"><b>A Man?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="woman"> <label for="woman"><b>A Woman?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="blond"> <label for="blond"><b>Blond Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="brown"> <label for="brown"><b>Brown Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="black"> <label for="black"><b>Black Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="red"> <label for="red"><b>Red Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="white"> <label for="white"><b>White Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="bald"> <label for="bald"><b>Bald?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="mustache"> <label for="mustache"><b>A Mustache?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="beard"> <label for="beard"><b>A Beard?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="glasses"> <label for="glasses"><b>Glasses?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="hat"> <label for="hat"><b>A Hat?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="earings"> <label for="earings"><b>Earings?</b></label><br>
                    </div>

                    <input type="submit" value="Guess">
                </form>
            </div>
            <div id="form_answer">
                <b>Yes/No</b>
            </div>


        </div>
        <div id="people_container">

        </div>
    </div>

</body>
</html>
