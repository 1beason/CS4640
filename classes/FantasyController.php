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