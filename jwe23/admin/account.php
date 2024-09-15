<?php

include "header.php";

?>
        </header>

        <main>
            <div class="wrapper-accent">
                <div class="wrapper">
                    <h2 class="text-center top-pad-4 side-pad-2">Account</h2>
                    <div class="account">
                        <img class="account__image" src="icons/user-solid.svg" alt="">
                        <div class="account__block">
                            <p>First Name: <?php echo $_SESSION["first_name"]; ?> </p>
                            <p>Last Name: <?php echo $_SESSION["last_name"]; ?></p>
                            <p>E-Mail: <?php echo $_SESSION["email"]; ?></p>
                            <?php if (($_SESSION["admin"]) == 1){ ?>
                                <p>Status Website: <?php echo $_SESSION["firm"]; ?></p>
                            <?php } else { ?>
                                <p>Company: <?php echo $_SESSION["firm"]; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php
include "footer.php";
?>