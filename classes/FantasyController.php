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
        $top_scorers = $this->db->query("select name, position, team, fp from players order by fp desc, position limit 5");
        $teams = $this->db->query("select distinct team from players");
        $positions = $this->db->query("select distinct position from players");

        $pointsFilter = isset($_POST['pointsFilter']) ? 
                        $_POST['pointsFilter'] == 'Highest to Lowest' ? 'desc' : ''
                        : 'desc';
        $teamFilter = isset($_POST['teamFilter']) ? 
                    $_POST['teamFilter'] == 'All' ? false : $_POST['teamFilter']
                    : false;
        $positionFilter = isset($_POST['positionFilter']) ? 
                            $_POST['positionFilter'] == 'All' ? false : $_POST['positionFilter']
                            : false;
        
        if ($teamFilter && $positionFilter) {
            $players = $this->db->query("select name, position, team, fp from players where team = '$teamFilter' and position = '$positionFilter' order by fp $pointsFilter");
        } else if ($teamFilter) {
            $players = $this->db->query("select name, position, team, fp from players where team = '$teamFilter' order by fp $pointsFilter");
        } else if ($positionFilter) {
            $players = $this->db->query("select name, position, team, fp from players where position = '$positionFilter' order by fp $pointsFilter");
        } else {
            $players = $this->db->query("select name, position, team, fp from players order by fp $pointsFilter");
        }

        include('templates/fantasy.php');
    }

    public function leaderboard() {
        $this->prevCommand = "leaderboard";
        $data = $this->db->query("select name from teams");
        if ($data === false) {
            $error_msg = "Error checking for teams";
        } else if (!empty($data)) {
            $team_data = $data;
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