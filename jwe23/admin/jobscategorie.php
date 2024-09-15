<?php
use WIFI\JWE23\DataBanking\Model\Jobs;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;
include "header.php";

?>

    <?php
    if (!empty($_GET["id"]))
    {
    $jobs = new Jobs;
    $all_jobs = $jobs->all_jobs_from_categorie($_GET["id"]);
    $categorie = new Categorie($_GET["id"]);
    ?>
            <div class="wrapper-accent border-bottom">
                <div class="wrapper">
                    <div class="hero">
                        <h1>
                            Find your <br />
                            dream Job!
                        </h1>
                        <div class="hero__box">
                            <div class="search-field">
                                <img
                                    class="search-field__img"
                                    src="icons/search.svg"
                                    alt=""
                                />
                                <input
                                    class="search-field__input"
                                    type="text"
                                    id="search-field"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="wrapper-main">
                <div class="wrapper">
                    <div class="text-center pad-2">
                        <h2>Jobs in Categorie:</h2>
                        <h3 class="top-1"><?php if (!empty($categorie)) echo $categorie->get_name();?></h3>
                    </div>

                    <div class="cards-box">
                    
                    <?php
                    $jobs = new Jobs;
                    $all_jobs = $jobs->all_jobs_from_categorie($_GET["id"]);
                    if (!empty($all_jobs)) {
                        foreach ($all_jobs as $job) 
                        {
                            $created_on = $job->created_on;
                            $display_created = date("d-m-Y", strtotime($created_on));
                            $modified_on = $job->modified_on;
                            $display_modified = date("d-m-Y", strtotime($modified_on));
                            echo "<div class='card'>";
                                echo "<h3 class='card__title'>{$job->job_title}</h3>";
                                echo "<div>";
                                    echo "<ul class='card__ul'>";
                                        echo "<li class='card__categorie' >Categorie: {$job->get_categorie()->categorie_name}</li>";
                                        echo "<li>Qualification: {$job->get_qualification()->qualification_name}</li>";
                                        echo "<li>Place of work: {$job->place_of_work}</li>";
                                        echo "<li>Hours: {$job->hours}</li>";
                                        echo "<li>Salary: {$job->salary} €</li>";
                                        echo "<li>Created on: {$display_created}</li>";
                                        echo "<li>Updated on: {$display_modified}</li>";
                                    echo "</ul>";
                                echo "</div>";
                                echo "<p class='card__description hide'>";
                                    echo nl2br($job->description);
                                echo "</p>";
                                echo "<button class='btn card__btn no-anchor-color btn-slide'>More info...</button>";
                            echo "</div>";
                        }
                    echo "</div>";
                    } else {
                        echo "<h3 class='text-center top-bot-pad-2'>None yet..</h3>";
                    }
                    ?>

                </div>
            </div>
        </main>
    <?php
    } elseif (empty($_GET["id"]) || !isset($_GET["id"])) {
    ?>
        </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper">
                    <h2 class="text-center top-bot-pad-2">Something went wrong.</h2>
                    <h3 class="text-center top-bot-pad-2"><a class="no-anchor-color" href="index.php">Back to Homepage</a></h3>
                </div>
            </div>
        </main>
    <?php
    }
include "footer.php"
?>