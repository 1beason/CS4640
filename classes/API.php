<?php
class API {

    function getPlayerSeasonStats() {
        $url = Config::$api["playerSeasonStats"];
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }

    function getTeamStandings() {
        $url = Config::$api["teamStandings"];
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }
}
