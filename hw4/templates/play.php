<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Matthew Condecido">
        <meta name="description" content="Game page for our word game">  
        <title>Game Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    </head>
    <style>
        h2{margin-bottom: 20px;}
    </style>
    <body>
        <div class="container" style="margin-top: 15px;">
            <div class="text-center">
                <div class="row col-xs-8">
                    <h1>CS4640 Word Game</h1>
                    <?php
                    echo "<p> <b>Name: </b> " . $_SESSION["name"] . " &emsp; <b>Email: </b>" . $_SESSION["email"] . " &emsp; <b>Guesses: </b>" . $_SESSION["numGuesses"] . " </p>";
                    ?>
                <p><b>Instructions:</b> You are given an infinite amount of attempts to try to guess the word that we have randomly selected. </p>
                <p>For each guess, we will
                list the number of unique characters, the number of correct characters in correct locations, and an approximation of the length for your guess in relation to the randomly-chosen word.</p>
                </div>
            <div class="row">
                <div class="col-xs-8 mx-auto">
                    <div class="h-3 p-3 bg-light border rounded-3">
                        <h2 class=".fix_margin">Past Guesses:</h2>
                        <?php
                            foreach($_SESSION["guesses"] as $guess_details){
                                echo "<p>" . $guess_details["guess"] . "</p>";
                                echo "<p> <b>Correct Characters:</b> " . $guess_details["num_in_word"] . "</p>"; 
                                echo "<p> <b>Correct Characters in Correct Locations </b>" . $guess_details["num_exactly_right"] .  " </p>";
                                echo "<p> <b>Length: </b>" . $guess_details["length"] . "</p> <br>";

                            }
                        ?>
                    </div>
                    <form action="?command=play" method="post">
                        <div class="h-10 p-5 mb-3">
                            <input type="text" class="form-control" id="guess" name="guess" pattern="[A-Za-z]*" placeholder="Type your answer here">
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="?command=quit" class="btn btn-danger">Quit Game</a>

                    </form>
                </div>
             </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html> 


