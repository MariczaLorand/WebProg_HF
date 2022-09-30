<?php

//1
//$array = [5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200'];
//foreach ($array as $item) {
//    if (is_numeric($item)) {
//        echo gettype($item) . " Igen" . "<br>";
//    } else {
//        echo gettype($item) . " Nem" . "<br>";
//    }
//}

//2
//$orszagok = array( " Magyarország "=>" Budapest", " Románia"=>" Bukarest", "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");
//array_walk($orszagok, function ($value, $key) {
//    echo "$value fővárosa $key <br>";
//});

//3
//$napokArray = array(
//    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
//    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
//    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
//);
//
//foreach ($napokArray as $orszag => $napok) {
//    echo "$orszag: ";
//    foreach ($napok as $nap) {
//        echo "$nap, ";
//    }
//    echo "<br>";
//}

//4
//$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');
//
//function atalakit($tomb, $tipus) {
//    array_walk($tomb, function (&$value) use ($tipus) {
//        if ($tipus == "kisbetus") {
//            $value = strtolower($value);
//        } else if ($tipus == "nagybetus") {
//            $value = strtoupper($value);
//        }
//    });
//}
//
//atalakit($szinek, "nagybetus");
//alakit($szinek, "kisbetus");
//print_r($szinek);

