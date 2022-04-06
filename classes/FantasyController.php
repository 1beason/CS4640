<?php

class FantasyController {
    private $command;
    private $prevCommand;
    private $db;

    public function __construct($command) {
        $this->command = $command;
        $this->db = new Database();

       
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
            case "leaderboard":
                $this->leaderboard();
                break;
            case "players":
                $this -> players();
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
    public function players() {
        $this->prevCommand = "players";
        include('templates/players.php');
    }

    public function leaderboard() {
        $this->prevCommand = "leaderboard";
        $data1 = $this->db->query("select * from teams where conference = 'Eastern' order by percent desc;");
        if ($data1 === false) {
            $error_msg = "Error checking for teams";
        } else if (!empty($data1)) {
            $east_data = $data1;
        }
        else{
            $east_data = array();
        }
        $data2 = $this->db->query("select * from teams where conference = 'Western' order by gb;");
        if ($data2 === false) {
            $error_msg = "Error checking for teams";
        } else if (!empty($data2)) {
            $west_data = $data2;
        }
        else{
            $west_data = array();
        }



        include('templates/leaderboard.php');
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