<?php
use WIFI\JWE23\DataBanking\Model\Categories;
use WIFI\JWE23\DataBanking\Model\Row\Categorie;
use WIFI\JWE23\DataBanking\Validate;
include "header.php";
$succes = false;
// First check if form has been submited.
if (!empty($_POST)) {
    // Validate if Categorie Input is filled.
    $validate = new Validate();
    $validate->is_formular_filled($_POST["categorie"], "Categorie Name");
    // Check if Categorie already exists.
    if (!empty($_POST["categorie"])) {
        $categorie_exists;
        $categories = new Categories;
        $all_categories = $categories->all_categories();
        foreach ($all_categories as $categories) {
            if (strtolower($categories->categorie_name) == strtolower($_POST["categorie"])) {
                $categorie_exists = "A Categorie with the name <br> \"" . $categories->categorie_name . "\" <br> already exists.";
            } else {
                // If Categorie does not exist then Succes!
                $succes = true;
            }
        }
    }
}
// If Categorie DOES already exists promt the user with a message.
if (!empty($categorie_exists)) {
?>
            </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper">
                    <h2 class="text-center top-bot-pad-2"><?php echo $categorie_exists; ?></h2>
                    <a class="home-link text-center top-bot-pad-2 no-anchor-color no-cursor" href="categoriesadmin.php">Back to Categories: <br> Administration</a>
                </div>
            </div>
        </main>
<?php
// If Categorie DOES NOT already exist save it as a new Categorie.
} elseif ($succes) {
        $categorie = new Categorie(array(
            "id" => null,
            "categorie_name" => $_POST["categorie"]
        ));
        $categorie->save();
?>
            </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper">
                    <h2 class="text-center top-bot-pad-2"><?php echo $categorie->categorie_name . " <br> was Created"; ?></h2>
                    <a class="home-link text-center top-bot-pad-2 no-anchor-color no-cursor" href="categoriesadmin.php">Back to Categories: <br> Administration</a>
                </div>
            </div>
        </main>
<?php
// Categories: Administration befor form submit.
} else {
?>
            <div class="wrapper-accent border-bottom">
                <div class="wrapper">
                    <div class="hero">
                        <h1>Create Categorie</h1>
                        <h3 class="text-center"><?php
                        if (!empty($validate)) {
                        echo $validate->error_html();
                        } ?></h3>
                        <form class="form-categorie" action="categoriesadmin.php" method="post">
                            <div class="form-categorie__boxes">
                                <label class="form-job__label" for="categorie">Categorie Name:</label>
                                <input class="form-job__input" type="text" name="categorie" id="categorie" value="<?php 
                                if (!empty($_POST["categorie"])) 
                                {
                                    echo htmlspecialchars($_POST["categorie"]);
                                }?>">
                                <button class="btn btn-main form-categorie__btn" type="submit">Create Categorie</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="wrapper-main">
                <div class="wrapper">
                    <h2 class="text-center top-bot-pad-2">List all Categories</h2>
                    <div class="categories-box">
                        <?php
                        $categories = new Categories;
                        $all_categories = $categories->all_categories();
                        foreach ($all_categories as $categorie)
                        {
                        echo '<div class="categories-box__card">';
                            echo '<h3 class="categories-box__name">';
                            echo $categorie->categorie_name;
                            echo '</h3>';
                            echo "<div class='btn-div-start'>";
                                echo "<a class='btn btn-secondary no-anchor-color no-cursor' href='categoriesupdate.php?id={$categorie->id}'>Update</a>";
                                echo "<a class='btn btn-secondary no-anchor-color no-cursor' href='categoriesdelete.php?id={$categorie->id}'>Delete</a>";
                            echo "</div>";
                        echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
<?php
}
include "footer.php";
?>