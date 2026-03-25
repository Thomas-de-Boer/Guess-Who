<?php
    require_once __DIR__ . '/../includes/load_data.php';
    $characterDataset = load_data();


    session_start();
    if (isset($_GET['reset'])) {
        session_unset();
        session_destroy();
        session_start();

        header("Location: assignment8.php");
    }

    if (!isset($_SESSION['secret_character']) || $_SESSION['secret_character'] == "_feature_order") {
        do {
            $_SESSION['secret_character'] = array_rand($characterDataset);
        } while ($_SESSION['secret_character'] == "_feature_order");
    }

    $mode = $_GET['mode'] ?? 'auto';
    if ($mode !== 'manual' && $mode !== 'auto') {
        $mode = 'auto';
    }

    $answer = "Yes/No";

    $counter = 0;

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

<div id="auto_switch">
    <a href="?mode=auto" class="<?= $mode === 'auto' ? 'active' : '' ?>">
        <b>Auto</b>
    </a>
    <a href="?mode=manual" class="<?= $mode === 'manual' ? 'active' : '' ?>">
        <b>Manual</b>
    </a>
</div>

<div id="reset"><a href="?reset=1"><b>Reset</b></a></div>

    <div id="main_container" data-auto="<?= $mode === 'auto' ? '1' : '0' ?>">
        <div id="form_container">
            <div id="form_title">
                <label for="#form"><b>Guess Who</b></label>
            </div>
            <div id="questions">
                <form method="post" id="form" action="assignment8.php">
                    <label for="form_radio" id="title"><b>Does Your Character have<br>/ Is Your Character</b></label><br>

                    <div id="scroll">
                    <input class="radio" name="attributes" type="radio" id="man" value="man"> <label for="man"><b>A Man?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="woman" value="woman"> <label for="woman"><b>A Woman?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="blond" value="hair_blond"> <label for="blond"><b>Blond Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="brown" value="hair_brown"> <label for="brown"><b>Brown Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="black" value="hair_black"> <label for="black"><b>Black Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="red" value="hair_red"> <label for="red"><b>Red Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="white" value="hair_white"> <label for="white"><b>White Hair?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="bald" value="bald"> <label for="bald"><b>Bald?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="mustache" value="mustache"> <label for="mustache"><b>A Mustache?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="beard" value="beard"> <label for="beard"><b>A Beard?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="glasses" value="glasses"> <label for="glasses"><b>Glasses?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="hat" value="hat"> <label for="hat"><b>A Hat?</b></label><br>
                    <input class="radio" name="attributes" type="radio" id="earrings" value="earrings"> <label for="earrings"><b>Earrings?</b></label><br>
                    </div>

                    <input type="submit" value="Guess" style="cursor: pointer" id="submit">
                </form>
            </div>
            <div id="form_answer"><b>Yes/No</b></div>


        </div>
        <div id="people_container">
            <div>
                <?php
                foreach ($characterDataset as $name => $data) {
                    $counter += 1;

                    if ($name == "_feature_order") {continue;}

                    echo "<div class='person'>
                    <img src='../images/{$name}.png' data-alt='../images/back.png' alt='{$name}'><br>
                    <b>{$name}</b>
                    </div>";

                    if ($counter == 9 || $counter == 17) {
                        echo "<br>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div id="popup" class="hidden">
        <div id="popup-content_win" class="hidden">
            <h2><b>You Won</b></h2>
            <p><b>The person was <?php echo $_SESSION['secret_character'] ?></b></p>
            <p id="guesses"><b>You guessed the right person in 2 guesses.</b></p>
            <p><b>Do you want to play again?</b></p>
            <button class="closePopup"><b>Play again</b></button>
        </div>

        <div id="popup-content_lose" class="hidden">
            <h2><b>You Lost</b></h2>
            <p><b>You guessed the wrong person.</b></p>
            <p><b>The correct person was <?php echo $_SESSION['secret_character'] ?></b></p>
            <p><b>Do you want to play again?</b></p>
            <button class="closePopup"><b>Play again</b></button>
        </div>
    </div>

    <script src="assignment8.js"></script>

</body>
</html>
