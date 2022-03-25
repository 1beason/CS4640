<?php

class WordGameController {
    private $command;

    public function __construct($command) {
        $this->command = $command;
    }

    public function run() {
        switch ($this->command) {
            case "login":
                $this->login();
                break;
            case "logout":
                $this->logout();
                break;
            case "play":
                $this->play();
                break;
            case "quit":
                $this->quit();
                break;
            default:
                $this->login();
                break;
        }
    }


    public function login() {
        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            // set the email in the session
            $_SESSION["email"] = $_POST["email"];
            // set the name in the session
            $_SESSION["name"] = $_POST["name"];
            // redirect to the play page
            $_SESSION["numGuesses"] = 0;
            $_SESSION["guesses"] = array();
            $word = $this->genWord();
            if ($word == null) {
                die("The word list is not available");
            }
            $_SESSION["word"] = $word;
            $_SESSION["correct"] = false;

            header("Location: ?command=play");
            return;
        }

        include('templates/login.php');
    }


    private function logout() {
        // destroy the session
        session_destroy();
        include('templates/login.php');
    }


    private function genWord() {
        $words = file("http://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt");
        $word = $words[rand(0, count($words) - 1)];
        return $word;
    }

    public function play() {
        $word = $_SESSION["word"];
        $word = str_replace(array("\n", "\r"), '', $word);
        $user = [
            "email" => $_SESSION["email"],
            "name" => $_SESSION["name"],
            "numGuesses" => $_SESSION["numGuesses"],
            "guesses" => $_SESSION["guesses"]
        ];

        if (isset($_POST["guess"]) && !empty($_POST["guess"])) {
            $_SESSION["numGuesses"] += 1;  
            $guess = $_POST["guess"];
            if (strtolower($guess) == strtolower($word)) {
                $_SESSION["correct"] = true;
                include('templates/gameOver.php');
                return;
            } else {
                $num_exactly_right = 0;
                $guess_length = strlen($guess);
                $word_length = strlen($word);
                $length = "";
                $letters = array();
                if ($guess_length <= $word_length){
                    for($i = 0; $i < $guess_length; $i++){
                        if (strtolower($guess[$i]) == strtolower($word[$i])) {
                            $num_exactly_right++;
                            array_push($letters, $guess[$i]);
                        }
                        for ($j = 0; $j < $word_length; $j++){
                            if (strtolower($guess[$i]) == strtolower($word[$j])) {
                                array_push($letters, $guess[$i]);
                                break;
                            }
                        }
                    }
                } 
                else {
                    for($i = 0; $i < $word_length; $i++){
                        if (strtolower($guess[$i]) == strtolower($word[$i])) {
                            $num_exactly_right++;
                            array_push($letters, $guess[$i]);
                        }
                        for ($j = 0; $j < $word_length; $j++){
                            if (strtolower($guess[$i]) == strtolower($word[$j])) {
                                array_push($letters, $guess[$i]);
                                break;
                            }
                        }
                    }
                }
                $unique_letters = array_unique($letters);
                $num_in_word = count($unique_letters);
                if ($guess_length < $word_length){
                    $length = "Too Short";
                }          
                elseif ($guess_length == $word_length){
                    $length = "Correct Length";
                }
                else{
                    $length = "Too Long";
                }


                $new_array["guess"] = $guess;
                $new_array["num_in_word"] = $num_in_word;
                $new_array["num_exactly_right"] = $num_exactly_right;
                $new_array["length"] = $length;
                array_push($_SESSION["guesses"], $new_array);
            }
        }
        include('templates/play.php');
    }


    public function quit() {
        include('templates/gameOver.php');
    }
}