<?php 

use WIFI\JWE23\DataBanking\Validate;
use WIFI\JWE23\DataBanking\MySql;
use WIFI\JWE23\DataBanking\Model\Categories;
use WIFI\JWE23\DataBanking\Model\Jobs;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;
use WIFI\JWE23\DataBanking\Model\Row\Job;

include "header.php";

?>
            <div class="wrapper-accent border-bottom">
                <div class="wrapper">
                    <div class="hero">
                        <h1><?php
                            if ($_SESSION["admin"] == 1) {
                                echo "Search Jobs: <br> Administration";
                            } else {
                                echo "Search Jobs: <br>" . htmlspecialchars($_SESSION["firm"]);
                            } ?></h1>
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
                    <h2 class="text-center top-bot-pad-2"><?php
                    if ($_SESSION["admin"] == 1) {
                        echo htmlspecialchars("Jobs Administration");
                    } else {
                        echo htmlspecialchars($_SESSION["firm"] . " Administration");
                    } ?>
                    </h2>
                    <div class="cards-box">
                        <?php
                        if ($_SESSION["admin"]) 
                        {
                        $jobs = new Jobs;
                        $all_jobs = $jobs->all_jobs_admin();
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
                                echo "<div class='btn-div-start'>";
                                    echo "<a href='jobsnew.php?id={$job->id}' class='btn card__btn no-anchor-color no-cursor'>Update</a>";
                                    echo "<a href='jobsdelete.php?id={$job->id}' class='btn card__btn no-anchor-color no-cursor'>Delete</a>";
                                echo "</div>";
                            echo "</div>";
                            }
                        } elseif (empty($_SESSION["admin"])) 
                        
                        {    
                        $jobs = new Jobs;
                        $all_jobs = $jobs->all_jobs_from_user($_SESSION["id"]);
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
                                echo "<div class='btn-div-start'>";
                                    echo "<a href='jobsnew.php?id={$job->id}' class='btn card__btn no-anchor-color no-cursor'>Update</a>";
                                    echo "<a href='jobsdelete.php?id={$job->id}' class='btn card__btn no-anchor-color no-cursor'>Delete</a>";
                                echo "</div>";
                            echo "</div>";
                            }
                        } 
                        
                        ?>

                    </div>
                </div>
            </div>
        </main>
       
<?php
include "footer.php"
?>