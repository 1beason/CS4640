<?php
include ("API.php");

class Database {
    private $mysqli;

    public function __construct() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->mysqli = new mysqli(Config::$db["host"], 
                Config::$db["user"], Config::$db["pass"], 
                Config::$db["database"]);
        
         // check if users table exists in the database
         try { 
            $this->query("SELECT * FROM users LIMIT 1");
         } catch (Exception $e){
            $this->query("CREATE TABLE users (
                id int not null auto_increment,
                name text not null,
                username text not null,
                password text not null,
                primary key (id)
            )");
         }

         try {
            $this->query("SELECT * FROM players LIMIT 1");
         } catch (Exception $e) {
            $this->query("CREATE TABLE players (
                id int not null auto_increment,
                name text not null,
                team text not null, 
                position text,
                ppg decimal(10,2) not null,
                apg decimal(10,2) not null,
                rpg decimal(10,2) not null,
                bpg decimal(10,2) not null,
                spg decimal(10,2) not null,
                fp decimal(10,2) not null,
                primary key (id)
            )");
         }

         try {
            $this->query("SELECT * FROM teams LIMIT 1");
         } catch (Exception $e) {
            $this->query("CREATE TABLE teams (
                id int not null,
                name text not null,
                city text not null,
                conference text not null,
                GB decimal(10,2) not null,
                primary key (id)
            )");
         }
         
         try {
            $last_update = $this->query("SELECT date FROM last_update LIMIT 1");

            // if last update was more than a day ago, update the tables
            if ($last_update[0]["date"] < date("Y-m-d", strtotime("-1 day"))) {
                $this->updatePlayers();
                $this->updateTeams();
                $this->updateLastUpdate();
            }
            // table exists
        } catch (Exception $e) {
            // table does not exist
            $this->query("CREATE TABLE last_update (
                id int not null,
                date text not null,
                primary key (id)
            )");

            // populate the newly created tables
            $this->insertPlayers();
            $this->insertTeams();
            $this->insertLastUpdate();


        }

       

    }

    
    // Taken from https://cs4640.cs.virginia.edu/lectures/examples/trivia-databases.html
    public function query($query, $bparam=null, ...$params) {
        $stmt = $this->mysqli->prepare($query);

        if ($bparam != null)
            $stmt->bind_param($bparam, ...$params);

        if (!$stmt->execute()) {
            return false;
        }

        if (($res = $stmt->get_result()) !== false) {
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        return true;
    }

    // parse the api response for player season stats and put relevant info into the database
    function insertPlayers() {
        $object = new API();
        $response = $object -> getPlayerSeasonStats();

        // iterate over response
        foreach ($response as $player) {
            $games = $player["Games"] > 0 ? $player["Games"] : 1;
            // get the player id
            $id = $player["PlayerID"];
            // get the player name
            $name = $player["Name"];
            // get the team name
            $team = $player["Team"];
            // get the position
            $position = $player["Position"];
            // get the ppg
            $ppg = $player["Points"] / $games;
            // get the apg
            $apg = $player["Assists"] / $games;
            // get the rpg
            $rpg = $player["Rebounds"] / $games;
            // get the bpg
            $bpg = $player["BlockedShots"] / $games;
            // get the spg
            $spg = $player["Steals"] / $games;
            // get the fantasy points
            $fp = $player["FantasyPoints"];

            // insert the player into the database
            $this->query("INSERT INTO players (id, name, team, position, ppg, apg, rpg, bpg, spg, fp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", "isssdddddd", $id, $name, $team, $position, $ppg, $apg, $rpg, $bpg, $spg, $fp);
        }
    }

    function updatePlayers() {
        $object = new API();
        $response = $object -> getPlayerSeasonStats();
        // iterate over response
        foreach ($response as $player) {
            $games = $player["Games"] > 0 ? $player["Games"] : 1;
            // get the player id
            $id = $player["PlayerID"];
            // get the player name
            $name = $player["Name"];
            // get the team name
            $team = $player["Team"];
            // get the position
            $position = $player["Position"];
            // get the ppg
            $ppg = $player["Points"] / $games;
            // get the apg
            $apg = $player["Assists"] / $games;
            // get the rpg
            $rpg = $player["Rebounds"] / $games;
            // get the bpg
            $bpg = $player["BlockedShots"] / $games;
            // get the spg
            $spg = $player["Steals"] / $games;
            // get the fantasy points
            $fp = $player["FantasyPoints"];

            // insert the player into the database
            $this->query("REPLACE INTO players (id, name, team, position, ppg, apg, rpg, bpg, spg, fp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", "isssdddddd", $id, $name, $team, $position, $ppg, $apg, $rpg, $bpg, $spg, $fp);
        }
    }


    function insertTeams() {
        $object = new API();
        $response = $object -> getTeamStandings();
        // iterate over response
        foreach ($response as $team) {
            // get the team id
            $id = $team["TeamID"];
            // get the team name
            $name = $team["Name"];
            // get the city
            $city = $team["City"];
            // get the conference
            $conference = $team["Conference"];
            // get the gb
            $gb = $team["GamesBack"];

            // insert the team into the database
            $this->query("INSERT INTO teams (id, name, city, conference, GB) VALUES (?, ?, ?, ?, ?)", "isssd", $id, $name, $city, $conference, $gb);
        }
    }

    function updateTeams() {
        $object = new API();
        $response = $object -> getTeamStandings();

        // iterate over response
        foreach ($response as $team) {
            // get the team id
            $id = $team["TeamID"];
            // get the team name
            $name = $team["Name"];
            // get the city
            $city = $team["City"];
            // get the conference
            $conference = $team["Conference"];
            // get the gb
            $gb = $team["GamesBack"];

            // insert the team into the database
            $this->query("REPLACE INTO teams (id, name, city, conference, GB) VALUES (?, ?, ?, ?, ?)", "isssd", $id, $name, $city, $conference, $gb);
        }
    }

    function insertLastUpdate() {
        $date = date("Y-m-d");

        // insert the team into the database
        $this->query("INSERT INTO last_update (id, date) VALUES (?, ?)", "is", 1, $date);
    }

    function updateLastUpdate() {
        $date = date("Y-m-d");

        // insert the team into the database
        $this->query("REPLACE INTO last_update (id, date) VALUES (?, ?)", "is", 1, $date);
    }
}