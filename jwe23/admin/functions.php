<?php

const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORD = "";
const MYSQL_DATABANK = "a2z";

session_start();

spl_autoload_register(
    function (string $class) {
        // Project Specific Name.
        $prefix = "WIFI\\JWE23\\";
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

        // If the Datei exists "file_exists()" include.
        if (file_exists($datei)) {
        include $datei;
        }
    }
);

// function check_if_id_in_database($sql_id, $sql_table) {
//     $id = "";
//     $db = Mysql::getInstanz();
//     $result = $db->query("SELECT id FROM $sql_table WHERE id = $sql_id");
//     while ($row = $result->fetch_assoc()) 
//     {   
//         if ($row = $sql_id) {
//             $id = $row;
//         }
//     }
//     return $id;
// }