<?php

class WordGameController {
    private $command;
    private $prevCommand;
    private $db;

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
            case "fantasy":
                $this->fantasy();
                break;
            case "home":
                $this->home();
                break;
            default:
                $this->home();
                break;
        }
    }

    public function home() {
        $this->prevCommand = "home";
        include('templates/home.php');
    }

    public function fantasy() {
        $this->prevCommand = "fantasy";
        include('templates/fantasy.php');
    }


    public function login() {
        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            // set the email in the session
            $_SESSION["email"] = $_POST["email"];
            // set the name in the session
            $_SESSION["name"] = $_POST["name"];
            // redirect to the play page

            header("Location: ?command={$this->prevCommand}");
            return;
        }

        include('templates/login.php');
    }


    private function logout() {
        // destroy the session
        session_destroy();
        include('templates/login.php');
    }
}