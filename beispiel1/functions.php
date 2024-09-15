<?php

// Name of my DataBank
const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORD = "";
const MYSQL_DATABANK = "beispiel1";

// Auto-Loader for my classes.
spl_autoload_register(
    function (string $class) {
        // Project Specific Name.
        $prefix = "PICS\\BEISPIEL\\";
        $length = strlen($prefix);

        // Basicdirectory for the Project.
        $basis = __DIR__ . "/";

        // If the class does not use the prefix, abort
        // (We are not responsible for loading data from other projects)
        if (substr($class, 0, $length) != $prefix) {
            return;
        }
        // Class without Prefix
        $class_without_prefix = substr($class, $length);

        // Create File Path
        $datei = $basis . $class_without_prefix . ".php";
        $datei = str_replace("\\", "/", $datei);

        // If the File exists "file_exists()" include.
        if (file_exists($datei)) {
        include $datei;
        }
    }
);