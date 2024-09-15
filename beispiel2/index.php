<?php
/*
*Beispiel 2 - Algorythmus (beliebige Programmiersprache)

*Die Elfen schreiben abwechselnd die Anzahl der Kalorien auf, die die verschiedenen Mahlzeiten, Snacks, Rationen usw. enthalten, die sie mitgebracht haben, ein Element pro Zeile. Jeder Elf trennt sein eigenes Inventar vom Inventar des vorherigen Elfen (falls vorhanden) durch eine Leerzeile.

*Nehmen wir zum Beispiel an, die Elfen schreiben die Kalorien ihrer Gegenstände fertig und erhalten am Ende die folgende Liste:

> 1000
> 2000
> 3000

> 4000

> 5000
> 6000

> 7000
> 8000
> 9000

> 10000

* Diese Liste stellt die Kalorien des Essens dar, das von fünf Elfen getragen wird:
    Der erste Elf trägt Essen mit 1000, 2000 und 3000 Kalorien, insgesamt 6000 Kalorien.
    Der zweite Elf trägt ein Lebensmittel mit 4000 Kalorien.
    Der dritte Elf trägt Lebensmittel mit 5000 und 6000 Kalorien, insgesamt 11000 Kalorien.
    Der vierte Elf trägt Lebensmittel mit 7000, 8000 und 9000 Kalorien, insgesamt 24000 Kalorien.
    Der fünfte Elf trägt ein Lebensmittel mit 10000 Kalorien.

* Falls die Elfen hungrig werden und zusätzliche Snacks benötigen, müssen sie wissen, welchen Elf sie fragen sollen: Sie möchten wissen, wie viele Kalorien der Elf trägt, der die meisten Kalorien trägt. Im obigen Beispiel ist dies 24000 (getragen vom vierten Elf).

* Finde den Elfen mit den meisten Kalorien. Wie viele Kalorien trägt dieser Elf insgesamt?

* Testen Sie erst Ihr Programm mit den Beispieldaten von oben und dann mit den angehängten.
* Nennen Sie das Ergebnis gemeinsam mit der Lösung

*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beispeil 2</title>
</head>
<body>
    <?php
    $file = file("AoC22.txt");
    // print_r($file);
    $nrOfElves = 0;
    $currentElf = 0;
    $highestCalorie = 0;
    $currentCalories = 0;
    $nrOfEmptySpaces = 0;
    echo "<br>";
    foreach ($file as $key => $value) {
        // If key is empty then Add 1 Elf and count Calories for current Elf.
        if (trim($value) === "") {
            $nrOfElves = $nrOfElves + 1;
            $nrOfEmptySpaces = $nrOfEmptySpaces + 1;
            // If the current Elf Calories is the highest save it in a variable.
            if ($currentCalories > $highestCalorie) {
                $highestCalorie = $currentCalories;
                $currentElf = $nrOfElves;
            }
            // Reset Calories on empty space (Inventory separation)
            $currentCalories = 0;
        } elseif ((count($file)) - 1 == $key) {
            // This took me a bit of thinking as it can happen that last space is not a empty space.
            $nrOfElves = $nrOfElves + 1;
            $currentCalories = $currentCalories + intval($value);
            if ($currentCalories > $highestCalorie) {
                $highestCalorie = $currentCalories;
                $currentElf = $nrOfElves;
            }
        } else {
            $currentCalories = $currentCalories + intval($value);
            $nrOfEmptySpaces = 0;
        }
        // This didnt took to much time as most code was already done. It takes into account if there is more then 2 empty spaces separateing inventory.
        if ($nrOfEmptySpaces > 1 ) {
            $nrOfElves = $nrOfElves - 1;
        }
    }
    echo "Total Nr. of Elfs: " . $nrOfElves;
    echo "<br>";
    echo "Highest calorie Elf has: " . $highestCalorie;
    echo "<br>";
    echo "Elf Nr.: " . $currentElf;
    ?>
</body>
</html>