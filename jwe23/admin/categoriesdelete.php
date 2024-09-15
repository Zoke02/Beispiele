<?php
use WIFI\JWE23\DataBanking\Model\Categories;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;
use WIFI\JWE23\DataBanking\Model\Jobs;
use WIFI\JWE23\DataBanking\Model\Row\Job;
include "header.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    // Something went wrong
    ?>
    </header>
    <main>
        <div class="wrapper-accent">
            <div class="wrapper side-pad-2">
                <h2 class="text-center top-bot-pad-2">Something went wrong.</h2>
                <a class="home-link text-center top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
            </div>
        </div>
    </main>
    <?php
} else {
    // 1-Check if id exists in DataBank.
    $id_in_db = false;
    $categories = new Categories();
    $all_categories = $categories->all_categories();
    foreach ($all_categories as $categorie) {

        if ($categorie->id == $_GET["id"]) {
            $id_in_db = true;
        }
    }
    // 1.5-Check if a job uses $_GET["id"].
    $cant_delete_id = false;
    $jobs = new Jobs;
    $all_jobs = $jobs->all_jobs_admin();
    foreach ($all_jobs as $job) {
        if($job->categorie_id == $_GET["id"]) {
            $cant_delete_id = true;
        }
    }
    // 2-If ID is not in DB then Something went wrong.
    if ($id_in_db == false) {
        // Something went wrong
        ?>
        </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper side-pad-2">
                    <h2 class="text-center top-bot-pad-2">Something went wrong.</h2>
                    <a class="home-link text-center top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
                </div>
            </div>
        </main>
        <?php
    } elseif ($cant_delete_id == true) {
        // 3-CANNOT DELETE because a job uses that categorie.
        // Get Categorie name for echo.
        $categorie = new Categorie($_GET["id"]);
        ?>
        </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper side-pad-2">
                    <h2 class="text-center top-bot-pad-2">CANNOT DELETE:<br><?php echo $categorie->categorie_name ?><br> A job uses this Categorie.</h2>
                    <a class="home-link text-center top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
                </div>
            </div>
        </main>
        <?php
    } else {
        // 4-If $_GET["doit"] is set and $_GET["doit"] is equal to "secret word" then DELETE.
        // Get Categorie name for echo.
        $categorie = new Categorie($_GET["id"]);
        if (isset($_GET["doit"]) && ($_GET["doit"] == "secretword")) {
            // DELETE Categories
            $categorie->delete();
            ?>
            </header>
            <main>
                <div class="wrapper-accent">
                    <div class="wrapper side-pad-2">
                        <h2 class="text-center top-bot-pad-2"><?php echo $categorie->categorie_name ?> was Deleted.</h2>
                        <a class="home-link text-center top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
                    </div>
                </div>
            </main>
            <?php
        } else {
            // 5-Prompt the user with a question if he realy wants to delete the Categorie.
            ?>
            </header>
            <main>
                <div class="wrapper-accent">
                    <div class="wrapper side-pad-2">
                        <h2 class='text-center top-bot-pad-2'>Are you sure you want to delete the Categorie: <br> <?php echo $categorie->categorie_name ?>?</h2>
                        <div class="btn-div-center">
                            <a class="btn btn-main no-anchor-color" href="categoriesdelete.php?id=<?php echo $_GET["id"] ?>&doit=<?php echo "secretword"?>">Yes</a>
                            <a class='btn btn-secondary no-anchor-color' href="categoriesadmin.php">No</a>
                        </div>
                    </div>
                </div>
            </main>
            <?php
        }
    }
}
include "footer.php";
?>