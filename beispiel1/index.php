<?php
/*
*Beispiel 1 - Bücherverwaltung

*Erstellen Sie eine Verwaltung für Bücher PHP zur Speicherung folgender Daten:
    Buchtitel
    Autor
    Genre
    ISBN-Nummer

*Erstellen Sie eine Datenbank für die Daten und befüllen Sie diese mit einigen Datensätze

*Erstellen Sie ein Script zur Ausgabe einer Bücherliste sowie ein Formular zum Anlegen eines neuen Buches.

*Für das Design reicht einfaches HTML, kein CSS erforderlich.

*/


// Use all the necesary Classes for this Page
use PICS\BEISPIEL\DataBanking\Model\Row\Book;
use PICS\BEISPIEL\DataBanking\Model\Authors;
use PICS\BEISPIEL\DataBanking\Model\Books;
use PICS\BEISPIEL\DataBanking\Model\Genres;
use PICS\BEISPIEL\DataBanking\Validate;

include "functions.php";
// With $success if all fields have been validated and $_POST method is send.
$success = false;

if (!empty($_POST))  {
    // Validate if fields are filled.
    $validate = new Validate;
    $validate->is_formular_filled($_POST["title"], "Book Title");
    $validate->is_formular_filled($_POST["author"], "Author");
    $validate->is_formular_filled($_POST["genre"], "Genre");
    $validate->is_formular_filled($_POST["isbnnr"], "ISBN Nr.");

    // If there is not errors save the book in DB and $success is true for refrash page message.
    if (!$validate->is_errors()) {

        $book = new Book(array(
            "title" => $_POST["title"],
            "author_id" => $_POST["author"],
            "genre_id" =>$_POST["genre"],
            "isbnnr" => $_POST["isbnnr"],
            ));
        $book->save();
        $success = true;
    }
}
// Normaly i would include Header/Footer
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Beispiel 1 - PHP + Datenbank</title>
	</head>
	<body>
        <main>

            <h1>Beispiel 1 - PHP + Datenbank</h1>
            <h2>List of all Books</h2>

            <?php
            // Variable $books becomes a class and with the function all_books() i can get all books from my DB
            $books = new Books;
            $all_books = $books->all_books();
            $number = 0;
            // Simple Print all books on screan.
            foreach ($all_books as $book)
                {
                $number += 1;
                echo "<div>";
                    echo "<h3>Book {$number}</h3>";
                    echo "<div>";
                        echo "<ul>";
                        echo "<li>Title: " . htmlspecialchars($book->title) . "</li>";
                        echo "<li>Author: " . htmlspecialchars($book->get_author()->name) . "</li>";
                        echo "<li>Genre: " . htmlspecialchars($book->get_genre()->name) . "</li>";
                        echo "<li>ISBN-Nr.: " . htmlspecialchars($book->isbnnr) . "</li>";
                        echo "</ul>";
                    echo "</div>";
                echo "</div>";
                } 
            ?>

            <div>
                <h2>Add a new book</h2>
                <h3><?php
                    // If ther is a field empty print a error with the class Validate.
                    if (!empty($validate)) echo $validate->error_html(); ?>
                </h3>
                <?php
                // If $success then a simple refresh page. I would normaly use JavaScript to function for this.
                if ($success) 
                {?>
                    <main>
                        <div>
                            <h1>Book was Added</h1>
                            <a href="index.php">Refresh Page</a>
                        </div>
                    </main>
                    <?php 

                } else {
                // If not $success then show on screen the form to add a book.
                ?>
                    <form action="index.php" method="post">
                        <div>
                            <label for="title">Book Title:</label>
                            <input type="text" name="title" id="title" value="<?php 
                            if (!empty($_POST["title"])) 
                            {
                                echo htmlspecialchars($_POST["title"]);
                            }
                            ?>">
                        </div>
                        <div">
                            <label for="author">Author:</label>
                            <select name="author" id="author">
                                <option value=""><- Chose from List -></option>
                                <?php
                                $authors = new Authors;
                                $result = $authors->all_authors();
                                foreach ($result as $key => $author) {
                                    echo '<option value="';
                                    echo $author->id;
                                    echo '">';
                                    echo $author->name;
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div">
                            <label for="genre">Genre:</label>
                            <select name="genre" id="genre">
                                <option value=""><- Chose from List -></option>
                                <?php
                                $genres = new Genres;
                                $result = $genres->all_genres();
                                foreach ($result as $key => $genre) {
                                    echo '<option value="';
                                    echo $genre->id;
                                    echo '">';
                                    echo $genre->name;
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="isbnnr">ISBN Nr.:</label>
                            <input type="text" name="isbnnr" id="isbnnr" value="<?php 
                            if (!empty($_POST["isbnnr"])) 
                            {
                                echo htmlspecialchars($_POST["isbnnr"]);
                            }
                            ?>">
                        </div>
                        <button type="submit">Add Book.</button>
                    </form>
                <?php
                }
                ?>
            </div>
        </main>
	</body>
</html>