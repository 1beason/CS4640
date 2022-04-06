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
            case "topScorersRaw":
                $this->topScorersRaw();
                break;
            case "filterRaw":
                $this->filterRaw();
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
            $_SESSION['players'] = $this->db->query("select name, position, team, fp from players where team = '$teamFilter' and position = '$positionFilter' order by fp $pointsFilter");
        } else if ($teamFilter) {
            $_SESSION['players'] = $this->db->query("select name, position, team, fp from players where team = '$teamFilter' order by fp $pointsFilter");
        } else if ($positionFilter) {
            $_SESSION['players'] = $this->db->query("select name, position, team, fp from players where position = '$positionFilter' order by fp $pointsFilter");
        } else {
            $_SESSION['players'] = $this->db->query("select name, position, team, fp from players order by fp $pointsFilter");
        }

        include('templates/fantasy.php');
    }
    public function players() {
        $this->prevCommand = "players";
        include('templates/players.php');
    }

    public function topScorersRaw() {
        $top_scorers = $this->db->query("select name, position, team, fp from players order by fp desc, position limit 5");
        header('Content-Type: application/json');
        return print_r(json_encode($top_scorers, JSON_PRETTY_PRINT));
    }

    public function filterRaw() {
        header('Content-Type: application/json');
        return print_r(json_encode($_SESSION['players'], JSON_PRETTY_PRINT));
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
        $error_msg = "";
        if (isset($_POST["username"])) {
            $data = $this->db->query("select * from users where username = ?;", "s", $_POST["username"]);
            if ($data === false) {
                $error_msg = "Error checking for user";
            } else if (!empty($data)) {
                if (password_verify($_POST["password"], $data[0]["password"])) {
                    $_SESSION["name"] = $data[0]["name"];
                    $_SESSION['username'] = $data[0]["username"];
                    header("Location: ?command={$this->prevCommand}");
                } else {
                    $error_msg = "Wrong password";
                }
            } else { // empty, no user found
                // TODO: input validation
                // Note: never store clear-text passwords in the database
                //       PHP provides password_hash() and password_verify()
                //       to provide password verification
                $insert = $this->db->query("insert into users (name, username, password) values (?, ?, ?);", 
                        "sss", $_POST["name"], $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
                if ($insert === false) {
                    $error_msg = "Error inserting user";
                } else {
                    $_SESSION["name"] = $data[0]["name"];
                    $_SESSION['username'] = $data[0]["username"];
                    header("Location: ?command={$this->prevCommand}");
                }
            }
        }        include('templates/login.php');
    }


    private function logout() {
        // destroy the session
        session_destroy();
        header("Location: ?command={$this->prevCommand}");
    }
}