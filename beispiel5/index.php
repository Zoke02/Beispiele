<?php

############################################### AUTO-LOADER ###############################################

spl_autoload_register(
    function (string $class) 
    {
        // ###### 1 ######
        // Project Specific Name.
        $prefix = "PICS\\JUNIOR\\";
        $lengthOfPrefix = strlen($prefix);
        // Current directory of the file.
        $directory = __DIR__ . "\\";

        // ###### 2 ######
        // If $class does not start from position 0 to $lengthOfPrefix with $prefix then dont load the class it is not for this project. (PICS\JUNIOR\)
        if (substr($class, 0, $lengthOfPrefix) != $prefix) {
            return;
        }

        // ###### 3 ######
        // We need the name of the class without the prefix. (from "use PICS\JUNIOR\WEIGHT"; we cut PICS\JUNIOR\ ?..? )
        // We get the name of the class.
        $classWithoutPrefix = substr($class, $lengthOfPrefix);
        // Create File Path
        $filePath = $directory . $classWithoutPrefix . ".php";
        // Change all "\" to "/" (example C:\File\File.php to C:/File/File.php)
        $filePath = str_replace("\\", "/", $filePath);
        // echo $filePath;

        // ###### 4 ######
        // If the Datei exists "file_exists()" include.
        if (file_exists($filePath)) {
            include $filePath;
        }
    }
);

############################################## //AUTO-LOADER ##############################################

use PICS\JUNIOR\WEIGHT;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEIGHT</title>
</head>
<body>
    <?php

    // QA - DEBUG - TESTING

    $weight = new WEIGHT;
    $weight->set(1, "t");

    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";
    $weight->convertTo("kg");
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";
    $weight->convertTo("g");
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";
    $weight->convertTo("mg");
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";


    $weight = new WEIGHT;
    $weight->set(1, "mg");

    echo "<br>";
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";
    $weight->convertTo("g");
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";
    $weight->convertTo("kg");
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";
    $weight->convertTo("t");
    echo $weight->getWeight() . " " . $weight->getType();
    echo "<br>";

    

    // print_r($weight);
    ?>
</body>
</html>