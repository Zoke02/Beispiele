<?php

use WIFI\JWE23\DataBanking\Validate;
use WIFI\JWE23\DataBanking\MySql;

include "header.php";
if (!empty($_SESSION["logged_in"]))
{
?>
    </header>

    <main>
    <div class="wrapper-border-main">
        <h2 class="text-center top-pad-4 side-pad-2">You are already logged in</h2>
    </div>
    </main>
<?php
} else 

{

if (!empty($_POST)) 
{
    // Validate Class
    $validate = new Validate();
    $validate->is_formular_filled($_POST["email"], "E-Mail");
    // $validate->is_mail($_POST["email"], "E-Mail");
    $validate->is_formular_filled($_POST["password"], "Password");
    // $validate->is_password($_POST["password"], "Password");

    // If no errors Validate with escape sequence 
    if (!$validate->is_errors()) {
        $db = Mysql::getInstanz();
        $sql_email = $db->escape($_POST["email"]);
        $sql_password = $db->escape($_POST["password"]);
        $result = $db->query("SELECT * FROM user WHERE email = '{$sql_email}'");
        $user = $result->fetch_assoc();

        if (empty($user) || !password_verify($sql_password, $user["password"]))
        {
            $validate->error_entry("E-Mail or Password is FALSE.");
        } else {
            $_SESSION["logged_in"] = true;
            $_SESSION["id"] = $user["id"];
            $_SESSION["first_name"] = $user["first_name"];
            $_SESSION["last_name"] = $user["last_name"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["firm"] = $user["firm"];
            $_SESSION["admin"] = $user["admin"];
            header("Location: index.php");
            exit;
        }
    }
}
    ?>
    </header>

    <main>
    <div class="wrapper-border-main">
        <div class="wrapper">
            <h2 class="text-center top-pad-4 side-pad-2">Login</h2>
            <h3 class="text-center"><?php
            if (!empty($validate)) {
            echo $validate->error_html();
            } ?></h3>
            <form class="form-login" action="login.php" method="post">
                <div class="form__div">
                    <label class="form__label" for="email"
                        >E-Mail:</label
                    >
                    <input
                        autocomplete="on"
                        id="email"
                        class="form__input"
                        type="text"
                        class="email"
                        name="email"
                        value="<?php             
                            if (!empty($_POST["email"])) 
                            {
                                echo htmlspecialchars($_POST["email"]);
                            } ?>"
                    />
                </div>
                <div class="form__div">
                    <label class="form__label" for="password"
                        >Password:</label
                    >
                    <input
                        id="password"
                        class="form__input"
                        type="password"
                        class="password"
                        name="password"
                    />
                </div>
                <div class="form__div">
                    <button class="btn btn-secondary" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    </main>
<?php
}

include "footer.php";
?>