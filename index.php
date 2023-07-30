<?php
include('Circle.php');
include('Square.php');
include('Triangle.php');

function convertStringSidesToArray(string $sides)
{
    $resultSides = [];

    while (str_starts_with($sides, ',') or str_starts_with($sides, ' ')) {
        if (str_starts_with($sides, ','))
            $sides = ltrim($sides, ',');
        if (str_starts_with($sides, ' '))
            $sides = ltrim($sides, ' ');
    }

    $num = 0;
    $sides = str_split($sides);

    foreach ($sides as $side) {
        if ($side == " " || $side == ",") {
            array_push($resultSides, $num);
            $num = 0;
            continue;
        } else if (is_int($side)) {
            $num *= 10;
            $num += (int)$side;
        }
    }
    if ($num != 0) array_push($resultSides, $num);
    return $resultSides;
}

if (isset($_GET['submit'])) {
    $selectedOption = $_GET['shape'];
    $sides = convertStringSidesToArray($_GET['sides']);

    // foreach($sides as $side){
    // echo "<h2>{$side}</h2>";
    // }


    $instance = new $selectedOption($sides);
    $calculatedArea = $instance->calculate();
    echo "<h2>Result: {$calculatedArea} </h2>";
}