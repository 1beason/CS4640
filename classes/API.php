<?php
include("Config.php");
class API {

    function getPlayerSeasonStats() {
        $url = "https://api.sportsdata.io/v3/nba/stats/json/PlayerSeasonStats/2021?key=8116d9aa0d8143d084d983401393dba0";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }

    function getTeamStandings() {
        $url = "https://api.sportsdata.io/v3/nba/scores/json/Standings/2021?key=8116d9aa0d8143d084d983401393dba0";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }
}
