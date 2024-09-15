<?php
use WIFI\JWE23\DataBanking\Model\Categories;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;
use WIFI\JWE23\DataBanking\Validate;
include "header.php";
$succes = false;

if (!empty($_POST)) {
    // Validate if Categorie Input is filled.
    $validate = new Validate();
    $validate->is_formular_filled($_POST["categorie"], "Categorie Name");

    if (!$validate->is_errors()) {
        $categorie = new Categorie(array(
            "id" => $_GET["id"],
            "categorie_name" => $_POST["categorie"]
        ));
        $categorie->save();
        $succes = true;
    }
}

if ($succes) {
    ?>
    </header>
    <main>
        <div class="wrapper-accent">
            <div class="wrapper">
                <h1 class="text-center pad-2">Categorie was Updated.</h1>
                <a class="home-link text-center pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
            </div>
        </div>
    </main>
    <?php 
} else {
    if ((!isset($_GET["id"]) || empty($_GET["id"])) || $_SESSION["admin"] == false ) {
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
        } else {
            $categorie = new Categorie($_GET["id"]);
            ?>
            </header>
            <main>
                <div class="wrapper-accent">
                    <div class="wrapper">
                        <div class="hero">
                            <h1>Update Categorie</h1>
                            <h3 class="text-center"><?php
                            if (!empty($validate)) {
                            echo $validate->error_html();
                            } ?></h3>
                            <form class="form-categorie" action="categoriesupdate.php?id=<?php echo $categorie->id; ?>" method="post">
                                <div class="form-categorie__boxes">
                                    <label class="form-job__label" for="categorie">Update Name:</label>
                                    <input class="form-job__input" type="text" name="categorie" id="categorie" autofocus value="<?php
                                    echo htmlspecialchars($categorie->categorie_name)
                                    ?>">
                                    <button class="btn btn-main form-categorie__btn" type="submit">Update Categorie</button>
                                </div>
                            </form>
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