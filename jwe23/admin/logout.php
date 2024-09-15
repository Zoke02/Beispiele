<?php 
session_start();
// I think this also clears cookies (Vernichtet die Session samt Cookies).
session_destroy();
include "header.php";
?>
        </header>
        <main>
            <div class="wrapper-accent">
                <div class="wrapper">
                    <div class="logout-box">
                        <h1 class="text-center top-bot-pad-2">You are logged out.</h1>
                        <a class="home-link top-bot-pad-2 no-anchor-color" href="index.php">Back to Homepage</a>
                    </div>
                </div>
            </div>
        </main>
<?php
include "footer.php"
?>