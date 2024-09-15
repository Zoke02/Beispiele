<?php

use WIFI\JWE23\DataBanking\Model\Categories;

include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>A2Z Jobs</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css" />
        <script defer src="js/jquery-3.7.1.min.js"></script>
        <script defer src="js/main.js"></script>
    </head>
    <body class="main-color">
        <header>
            <div class="wrapper-main border-bottom">
                <div class="wrapper">
                    <div class="nav-bar">
                        <div class="nav-bar__box">
                            <img
                                id="menu-categories"
                                class="menu"
                                src="icons/bars-solid.svg"
                                alt=""
                            />
                            <a class="logo" href="index.php">A2Z</a>
                        </div>
                        <div class="nav-bar__box">
                            <a class="logo logo-invert" href="<?php
                                if (isset(($_SESSION["logged_in"]))) {
                                    echo "account.php";
                                } else {
                                    echo "login.php";
                                } ?>"><?php
                                if (isset(($_SESSION["logged_in"])) && $_SESSION["logged_in"] == true) 
                                {
                                    echo substr($_SESSION["first_name"], 0, 1) . "|" . substr($_SESSION["last_name"], 0, 1);
                                } else {
                                    echo "Jobs";
                                }
                            ?></a>

                            <?php 
                            if (!isset(($_SESSION["logged_in"]))) {?>
                            <a href="login.php">
                                <img class="menu" src="icons/user-solid.svg" alt="">
                            </a>
                            <?php } else { ?>
                            <div class="menu">
                                <img
                                    id="menu-user"
                                    class="menu"
                                    src="<?php
                                    if (!isset(($_SESSION["logged_in"]))) {
                                        echo "icons/user-solid.svg";
                                    } elseif (isset(($_SESSION["logged_in"])) && ($_SESSION["admin"] == 1)) {
                                        echo "icons/user-admin-solid.svg";
                                    } elseif (isset(($_SESSION["logged_in"])) && ($_SESSION["admin"] != 1)){
                                        echo "icons/user-firma-solid.svg";
                                    }
                                    ?>"
                                    alt=""
                                />
                            </div>
                                
                            <?php } ?>


                        </div>
                    </div>
                    <div class="default-hide-categories">
                        <div class="menu-list">
                            <?php
                            $categories = new Categories;
                            $all_categories = $categories->all_categories();
                            foreach ($all_categories as $categorie)
                            {
                                echo '<a href="jobscategorie.php?id='. $categorie->id . '" class="menu-user__line">' . $categorie->categorie_name . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php if (isset($_SESSION["logged_in"])) { ?>
                        <div class="default-hide-user">
                            <div class="menu-list">
                                <a class="menu-user__line" href="account.php">My Account</a>
                                <a class="menu-user__line" href="jobsnew.php">Create New Job</a>
                                <?php if (isset($_SESSION["admin"])){ ?>
                                <a class="menu-user__line" href="jobsadmin.php">Jobs: Administration</a>
                                <?php } else { ?>
                                <a class="menu-user__line" href="jobsadmin.php">Jobs: <?php echo $_SESSION["firm"] ?></a>
                                <?php } ?>
                                <?php if (isset($_SESSION["admin"])){ ?>
                                <a class="menu-user__line" href="categoriesadmin.php">Categories: Administration</a>
                                <?php } ?>
                                <a class="menu-user__line" href="jobsall.php">List of All-Jobs</a>
                                <a class="menu-user__line" href="logout.php">Logout</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>