<?php
use WIFI\JWE23\DataBanking\Model\Row\Job;
use WIFI\JWE23\DataBanking\Model\Jobs;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;
use WIFI\JWE23\DataBanking\Model\Categories;
use WIFI\JWE23\DataBanking\Model\Qualifications;
use WIFI\JWE23\DataBanking\Validate;
include "header.php";

$success = false;

if (!empty($_POST))  {
    $validate = new Validate;
    $validate->is_formular_filled($_POST["job_title"], "Job Title");
    $validate->is_formular_filled($_POST["categorie"], "Categorie");
    $validate->is_formular_filled($_POST["qualification_id"], "Qualification");
    $validate->is_formular_filled($_POST["place_of_work"], "Place of Work");
    $validate->is_formular_filled($_POST["hours"], "Hours");
    $validate->is_formular_filled($_POST["salary"], "Salary");
    $validate->is_formular_filled($_POST["description"], "Description");

    if (!$validate->is_errors()) {

        $status = "Hidden";
        if (isset($_POST["status"])) {
            $status = "Visible";
        }

        if (!empty($_GET["id"])) 
        {
            $job = new Job(array(
                "id" => $_GET["id"] ?? null,
                "job_title" => $_POST["job_title"],
                "categorie_id" => $_POST["categorie"],
                "qualification_id" =>$_POST["qualification_id"],
                "place_of_work" => $_POST["place_of_work"],
                "hours" => $_POST["hours"],
                "salary" => $_POST["salary"],
                "description" => $_POST["description"],
                "status" => $status,
                "modified_on" => date("Y-m-d")
            ));
        }
        if (empty($_GET["id"])) 
        {
            $job = new Job(array(
                "id" => $_GET["id"] ?? null,
                "user_id" => $_SESSION["id"],
                "job_title" => $_POST["job_title"],
                "categorie_id" => $_POST["categorie"],
                "qualification_id" =>$_POST["qualification_id"],
                "place_of_work" => $_POST["place_of_work"],
                "hours" => $_POST["hours"],
                "salary" => $_POST["salary"],
                "description" => $_POST["description"],
                "status" => $status,
                "created_on" => date("Y-m-d")
            ));
        }   
        $job->save();
        $success = true;
    }
}

if ($success) 
{?>

        </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper">
                    <h1 class="text-center top-bot-pad-2"><?php
                    if (!empty($_GET["id"])) echo "Job was Updated";
                    if (empty($_GET["id"])) echo "Job was Created";
                    ?></h1>
                    <a class="home-link text-center top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
                </div>
            </div>
        </main>
        <?php 

} else {
    // 1 - If !isset($_GET["id"]) then Create new Job.
    if (!isset($_GET["id"])) {
        ?>
        </header>
        <main>
            <div class="wrapper-main">
                <div class="wrapper">
                    <h2 class="text-center pad-2">Create Job...</h2>
                    <h3 class="text-center bot-2 side-pad-2"><?php 
                        if (!empty($validate)) echo $validate->error_html(); ?>
                    </h3>
                    <form class="form-job" action="jobsnew.php" method="post">

                        <div class="form-job__boxes">
                            <label class="form-job__label" for="job_title">Job Title:</label>
                            <input class="form-job__input" type="text" name="job_title" id="job_title" value="<?php 
                            if (!empty($_POST["job_title"])) 
                            {
                                echo htmlspecialchars($_POST["job_title"]);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="categorie">Categorie:</label>
                            <select class="form-job__input form-job__select" name="categorie" id="categorie">
                                <option class="form-job__option" value=""><- Chose from List -></option>
                                <?php
                                $categories = new Categories;
                                $result = $categories->all_categories();
                                foreach ($result as $key => $categorie) {
                                    echo '<option value="';
                                    echo $categorie->id;
                                    echo '">';
                                    echo $categorie->categorie_name;
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="qualification_id">Qualification:</label>
                            <select class="form-job__input form-job__select" name="qualification_id" id="qualification_id">
                                

                                <option cöass="form-job__option" value=""><- Chose from List -></option>
                                
                                <?php
                                $qualifications = new Qualifications;
                                $result = $qualifications->all_qualifications();
                                foreach ($result as $key => $qualification) {
                                    echo '<option value="';
                                    echo $qualification->id;
                                    echo '">';
                                    echo $qualification->qualification_name;
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="place_of_work">Place of Work:</label>
                            <input class="form-job__input" type="text" name="place_of_work" id="place_of_work" value="<?php 
                            if (!empty($_POST["place_of_work"])) 
                            {
                                echo htmlspecialchars($_POST["place_of_work"]);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="hours">Hours:</label>
                            <input class="form-job__input" type="text" name="hours" id="hours" value="<?php 
                            if (!empty($_POST["hours"])) 
                            {
                                echo htmlspecialchars($_POST["hours"]);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="salary">Salary (Brutto):</label>
                            <input class="form-job__input" type="text" name="salary" id="salary" value="<?php 
                            if (!empty($_POST["salary"])) 
                            {
                                echo htmlspecialchars($_POST["salary"]);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="description">Description:</label>
                            <textarea class="form-job__textarea" id="description" name="description" rows="25" cols="50" ><?php 
                            if (!empty($_POST["description"])) 
                            {
                                echo htmlspecialchars($_POST["description"]);
                            }?></textarea>
                        </div>
                        <div class="form-job__checkbox middle">
                            <label class="form-job__label" for="status">Visibility</label>
                            <input  type="checkbox" id="status" name="status" <?php
                                $checked = "";
                                if (isset($_POST["status"]) && $_POST["status"] = "on") {
                                    $checked = "checked";
                                } else if (!isset($_POST["status"])) {
                                    $checked = "";
                                }
                                echo $checked;
                                ?> 
                            />
                        </div>
                        <button class="btn btn-main middle" type="submit">Create Job</button>
                    </form>
                </div>
            </div>
        </main>
        <?php
    // 2 - If isset($_GET["id"]) -> Start Update Job.
    } else {
        // If !empty($_GET["id"]) - Check if ($_GET["id"]) in DB.
        $id_in_db = false;
        if (!empty($_GET["id"])) {
            $jobs = new Jobs;
            $all_jobs = $jobs->all_jobs_admin();
            // 2.01 Check if ($_GET["id"]) in DB
            foreach ($all_jobs as $job) {
                if ($job->id == $_GET["id"])
                $id_in_db = true;
            }
            // 2.02 Set new Job to.
            $job = new Job($_GET["id"]);
        }
        // 2.1 - If ($_GET["id"]) in DB -> Update Job
        if ((!empty($_GET["id"]) && $id_in_db == true) && ($_SESSION["id"] == $job->user_id || $_SESSION["admin"] == true))
        {
        ?>
        </header>
        <main>
            <div class="wrapper-main">
                <div class="wrapper">
                    <h2 class="text-center top-bot-pad-2">Update Job...</h2>
                    <h3 class="text-center bot-2"><?php 
                        if (!empty($validate)) echo $validate->error_html(); ?>
                    </h3>

                    <form class="form-job" action="jobsnew.php<?php if (!empty($job)) echo "?id=" . $job->id; ?>" method="post">

                        <div class="form-job__boxes">
                            <label class="form-job__label" for="job_title">Job Title:</label>
                            <input class="form-job__input" type="text" name="job_title" id="job_title" value="<?php 
                            if (!empty($_POST["job_title"])) 
                            {
                                echo htmlspecialchars($_POST["job_title"]);
                            } else if (!empty($job)) {
                                echo htmlspecialchars($job->job_title);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="categorie">Categorie:</label>
                            <select class="form-job__input form-job__select" name="categorie" id="categorie">
                                <?php
                                $categories = new Categories;
                                $result = $categories->all_categories();
                                if (!empty($_POST["categorie"])) 
                                {   
                                    foreach ($result as $key => $categorie) {
                                        if ($categorie->id == $_POST["categorie"])
                                        {                                            
                                            echo '<option value="';
                                            echo $categorie->id;
                                            echo '">';
                                            echo $categorie->categorie_name;
                                            echo '</option>';
                                        }
                                    }
                                    foreach ($result as $key => $categorie) {
                                        if ($categorie->id != $_POST["categorie"])
                                        {                                            
                                            echo '<option value="';
                                            echo $categorie->id;
                                            echo '">';
                                            echo $categorie->categorie_name;
                                            echo '</option>';
                                        }
                                    }

                                } 
                                else if (!empty($job)) {
                                    foreach ($result as $key => $categorie) {
                                        if ($categorie->id == $job->categorie_id)
                                        {                                            
                                            echo '<option value="';
                                            echo $categorie->id;
                                            echo '">';
                                            echo $categorie->categorie_name;
                                            echo '</option>';
                                        }
                                    }  
                                    foreach ($result as $key => $categorie) {
                                        if ($categorie->id != $job->categorie_id)
                                        {                                            
                                            echo '<option value="';
                                            echo $categorie->id;
                                            echo '">';
                                            echo $categorie->categorie_name;
                                            echo '</option>';
                                        }
                                    }  
                                }
                                // foreach ($result as $key => $categorie) {
                                //     echo '<option value="';
                                //     echo $categorie->id;
                                //     echo '">';
                                //     echo $categorie->categorie_name;
                                //     echo '</option>';
                                // }
                                ?>
                            </select>
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="qualification_id">Qualification:</label>
                            <select class="form-job__input form-job__select" name="qualification_id" id="qualification_id">
                                <?php
                                $qualifications = new Qualifications;
                                $result = $qualifications->all_qualifications();
                                if (!empty($_POST["qualification_id"])) 
                                {   
                                    foreach ($result as $key => $qualification) {
                                        if ($qualification->id == $_POST["qualification_id"])
                                        {                                            
                                            echo '<option value="';
                                            echo $qualification->id;
                                            echo '">';
                                            echo $qualification->qualification_name;
                                            echo '</option>';
                                        }
                                    }                                    
                                    foreach ($result as $key => $qualification) {
                                        if ($qualification->id != $_POST["qualification_id"])
                                        {                                            
                                            echo '<option value="';
                                            echo $qualification->id;
                                            echo '">';
                                            echo $qualification->qualification_name;
                                            echo '</option>';
                                        }
                                    }                                    
                                } else if (!empty($job)) {
                                    foreach ($result as $key => $qualification) {
                                        if ($qualification->id == $job->qualification_id)
                                        {                                            
                                            echo '<option value="';
                                            echo $qualification->id;
                                            echo '">';
                                            echo $qualification->qualification_name;
                                            echo '</option>';
                                        }
                                    }  
                                    foreach ($result as $key => $qualification) {
                                        if ($qualification->id != $job->qualification_id)
                                        {                                            
                                            echo '<option value="';
                                            echo $qualification->id;
                                            echo '">';
                                            echo $qualification->qualification_name;
                                            echo '</option>';
                                        }
                                    }  
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="place_of_work">Place of Work:</label>
                            <input class="form-job__input" type="text" name="place_of_work" id="place_of_work" value="<?php 
                            if (!empty($_POST["place_of_work"])) 
                            {
                                echo htmlspecialchars($_POST["place_of_work"]);
                            } else if (!empty($job)) {
                                echo htmlspecialchars($job->place_of_work);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="hours">Hours:</label>
                            <input class="form-job__input" type="text" name="hours" id="hours" value="<?php 
                            if (!empty($_POST["hours"])) 
                            {
                                echo htmlspecialchars($_POST["hours"]);
                            } else if (!empty($job)) {
                                echo htmlspecialchars($job->hours);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="salary">Salary (Brutto):</label>
                            <input class="form-job__input" type="text" name="salary" id="salary" value="<?php 
                            if (!empty($_POST["salary"])) 
                            {
                                echo htmlspecialchars($_POST["salary"]);
                            } else if (!empty($job)) {
                                echo htmlspecialchars($job->salary);
                            }
                            ?>">
                        </div>
                        <div class="form-job__boxes">
                            <label class="form-job__label" for="description">Description:</label>
                            <textarea class="form-job__textarea" id="description" name="description" rows="25" cols="50" ><?php 
                            if (!empty($_POST["description"])) 
                            {
                                echo htmlspecialchars($_POST["description"]);
                            } else if (!empty($job)) {
                                echo htmlspecialchars($job->description);
                            }?></textarea>
                        </div>
                        <div class="form-job__checkbox middle">
                            <label class="form-job__label">Visibility</label>
                            <input  type="checkbox" id="status" name="status" <?php
                                if (!empty($_GET["id"]) && (!isset($_POST["status"])))
                                {
                                    if ($job->status == 'Visible') {
                                        echo "checked";
                                    } else if ($job->status == 'Hidden') {
                                        echo "";
                                    } 
                                } elseif (!empty($_GET["id"]) && (isset($_POST["status"]))) {
                                    if (isset($_POST["status"])) {
                                        echo "checked";
                                    } else if (!isset($_POST["status"])) {
                                        echo "";
                                    }
                                } elseif (empty($_GET["id"])) {
                                    if (isset($_POST["status"])) {
                                        echo "checked";
                                    } else if (!isset($_POST["status"])) {
                                        echo "";
                                    }
                                }?> 
                            />
                        </div>
                        <button class="btn btn-main middle" type="submit"><?php 
                            if (!empty($_GET["id"])) echo "Update Job"; 
                            if (empty($_GET["id"])) echo "Create Job";?>
                        </button>
                    </form>
                </div>
            </div>
        </main>
        <?php
        // 2.2 - $_GET["id"] is FALSE or EMPTY -> Wrong Page.
        } else {?>
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
include "footer.php";
?>