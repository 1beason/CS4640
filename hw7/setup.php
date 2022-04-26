<?php 
    $height = $_GET['height'] ?? 0;
    $width = $_GET['width'] ?? 0;
    $coordinates = array();
    if ($height*$width > 0){
        for ($i = 1; $i <= $height; $i++){
            for ($j = 1; $j <= $width; $j++){
                $coordinates[] = [$i, $j];
            }
        }
        if (sizeof($coordinates) <= 5){
            header("Content-type: application/json");
            echo json_encode($coordinates, JSON_FORCE_OBJECT);
        }
        else{
            shuffle($coordinates);
            $shuffled = array_slice($coordinates, 0, 5, true);
            header("Content-type: application/json");
            echo json_encode($shuffled, JSON_FORCE_OBJECT);
        }
    }

    


