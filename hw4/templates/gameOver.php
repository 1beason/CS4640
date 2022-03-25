<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Brooks Eason">
        <meta name="description" content="Game over page for our word game">  
        <title>Game Over</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>
    <body>
    <div class="container" style="margin-top: 15px;">
            <div class="text-center">
                <h1>Game Over</h1>
                <?php
                    if ($_SESSION["correct"] == "true") {
                        echo "<h1>You won!</h1>";
                        echo "<h2>Congratulations! You guessed correctly!<h2>";
                        echo "<p>It took you " . $_SESSION["numGuesses"] . " guesses to guess the word " . $_SESSION["word"] . "</p>";
                    } else {
                        echo "<h1>You quit!</h1>";
                        echo "<p>Sorry, you didn't guess correctly.  The correct word was: " . $_SESSION["word"] . "</p>";
                    }
                ?>
            </div>
            <div class="row">
                <div class="text-center">
                    <?php
                    $_SESSION["numGuesses"] = 0;
                        $_SESSION["guesses"] = array();
                        $word = $this->genWord();
                        if ($word == null) {
                            die("The word list is not available");
                        }
                        $_SESSION["word"] = $word;
                        $_SESSION["correct"] = false;
                    ?>
                    <a href="?command=play" class="btn btn-primary">Play Again</a>
                    <a href="?command=logout" class="btn btn-danger">Log Out</a>
                </div>

            </div>
