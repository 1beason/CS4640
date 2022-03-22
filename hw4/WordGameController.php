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
            setcookie("email", $_POST["email"], time() + 3600);
            setcookie("name", $_POST["name"], time() + 3600);
            setcookie("guesses", " ", time() + 3600);
            header("Location: ?command=play");
            return;
        }

        include('templates/login.php');
    }


    private function logout() {
        setcookie("email", "", time() - 3600);
        setcookie("name", "", time() - 3600);
        setcookie("guesses", "", time() - 3600);
        include('templates/login.php');
    }


    private function genWord() {
        $words = file("http://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt");
        $word = $words[rand(0, count($words) - 1)];
        return $word;
    }

    public function play() {
        $word = $this->genWord();
        setcookie("answer", $word, time() + 3600);

        $user = [
            "email" => $_COOKIE["email"],
            "name" => $_COOKIE["name"],
            "guesses" => $_COOKIE["guesses"]
        ];

        if (isset($_POST["guess"]) && !empty($_POST["guess"])) {
            $guess = $_POST["guess"];
            $_COOKIE["guesses"] .= $guess . " ";
            if (strtolower($guess) == strtolower($word)) {
                setcookie("guesses", $user["guesses"], time() + 3600);
                include('templates/gameOver.php');
                return;
            } else {
                setcookie("guesses", $user["guesses"], time() + 3600);
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
                setcookie("num_exactly_right", $num_exactly_right, time() + 3600);
                setcookie("num_in_word", $num_in_word, time() + 3600);
                setcookie("long", $long, time() + 3600);
                include('templates/play.php');
            }
        }
    }


    public function quit() {
        include('templates/gameOver.php');
    }
}