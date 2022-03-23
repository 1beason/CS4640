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
        $word = $this->genWord();
        $_SESSION["answer"] = $word;
        $_SESSION["numGuesses"] = 0;
        $_SESSION["correct"] = false;
        $_SESSION["guesses"] = array();

        $user = [
            "email" => $_SESSION["email"],
            "name" => $_SESSION["name"],
            "guesses" => $_SESSION["guesses"]
        ];

        if (isset($_POST["guess"]) && !empty($_POST["guess"])) {
            $guess = $_POST["guess"];
            array_push($_SESSION["guesses"], $guess);
            if (strtolower($guess) == strtolower($word)) {
                $_SESSION["correct"] = true;
                include('templates/gameOver.php');
                return;
            } else {
                $num_exactly_right = 0;
                $num_in_word = 0;
                $long = strlen($guess) > strlen($word) ? true : false;
                $idx = 0;
                foreach ($guess as $letter) {
                    if (strtolower($letter) == strtolower($word[$idx])) {
                        $num_exactly_right++;
                        $num_in_word++;
                    } else {
                        $jdx = 0;
                        foreach ($word as $ch) {
                            if (strtolower($letter) == strtolower($ch) && $jdx != $idx) {
                                $num_in_word++;
                                break;
                            }
                            $jdx++;
                        }
                    }
                    $idx++;
                }
                $_SESSION["num_exactly_right"] = $num_exactly_right;
                $_SESSION["num_in_word"] = $num_in_word;
                $_SESSION["long"] = $long;
                include('templates/play.php');
            }
        }
    }


    public function quit() {
        include('templates/gameOver.php');
    }
}