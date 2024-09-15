<?php
use WIFI\JWE23\DataBanking\Model\Row\Job;
use WIFI\JWE23\DataBanking\Model\Jobs;
include "header.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    // Something went wrong.
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
    $jobs = new Jobs();
    $all_jobs = $jobs->all_jobs_admin();
    foreach ($all_jobs as $job) {
        if ($job->id == $_GET["id"]) {
            $id_in_db = true;
        }
    }
    
    if ($id_in_db == false) {
        // Something went wrong.
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
    } elseif ($id_in_db == true) {
        $job = new Job($_GET["id"]);
        if ($job->user_id == $_SESSION["id"] || $_SESSION["admin"] == true) {
            // Ask user the question
            if(!isset($_GET["doit"])) {
            ?>
                </header>
                <main>
                    <div class="wrapper-accent">
                        <div class="wrapper">
                            <h1 class='text-center pad-2'>Are you sure you want to delete this Job?</h1>
                            <?php
                            $jobs = new Jobs;
                            $all_jobs = $jobs->all_jobs_admin();
                            foreach ($all_jobs as $jobs) 
                            {
                                if ($jobs->id == $_GET["id"]) 
                                {
                                    $created_on = $jobs->created_on;
                                    $display_created = date("d-m-Y", strtotime($created_on));
                                    $modified_on = $jobs->modified_on;
                                    $display_modified = date("d-m-Y", strtotime($modified_on));
                                    echo "<div class='cards-box'>";
                                        echo "<div class='card'>";
                                            echo "<h3 class='card__title'>{$jobs->job_title}</h3>";
                                            echo "<div>";
                                                echo "<ul class='card__ul'>";
                                                    echo "<li>Categorie: {$jobs->get_categorie()->categorie_name}</li>";
                                                    echo "<li>Qualification: {$jobs->get_qualification()->qualification_name}</li>";
                                                    echo "<li>Place of work: {$jobs->place_of_work}</li>";
                                                    echo "<li>Hours: {$jobs->hours}</li>";
                                                    echo "<li>Salary: {$jobs->salary} €</li>";
                                                    echo "<li>Created on: {$display_created}</li>";
                                                    echo "<li>Updated on: {$display_modified}</li>";
                                                echo "</ul>";
                                            echo "</div>";
                                            echo "<p class='card__description hide'>";
                                                echo nl2br($jobs->description);
                                            echo "</p>";
                                            echo "<button class='btn card__btn no-anchor-color btn-slide'>More info...</button>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>
                            <div class="btn-div-center bot-4">
                                <a class="btn btn-main no-anchor-color" href="jobsdelete.php?id=<?php echo $_GET["id"] ?>&doit=<?php echo "secretword"?>">Yes</a>
                                <a class='btn btn-secondary no-anchor-color' href="jobsadmin.php">No</a>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
            } elseif ($_GET["doit"] == "secretword") {
            $job->delete();
            ?>
                </header>
                <main>
                    <div class="wrapper-accent">
                        <div class="wrapper">
                            <h1 class="text-center top-bot-pad-2">Job was Deleted.</h1>
                            <a class="home-link text-center top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
                        </div>
                    </div>
                </main>
            <?php
            }
        } else {
            // Something went wrong.
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
        }
    }
}
include "footer.php"
?>