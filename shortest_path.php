<?php
require "keke.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $maze = $_POST["maze"];
    $start = explode(",", $_POST["start"]);
    $end = explode(",", $_POST["end"]);

    $maze_array = array();
    $maze_rows = explode("\r\n", $maze);
    foreach ($maze_rows as $maze_row) {
        $maze_array[] = explode(",", $maze_row);
    }


    $result = findShortestPath($maze_array, $start, $end);

    echo "<p>Shortest distance: " . $result['distance'] . "</p>";
    echo "<p>Shortest path: ";
    foreach ($result['path'] as $point) {
        echo "(" . $point[0] . ", " . $point[1] . ") ";
    }
    echo "</p>";
}
?>