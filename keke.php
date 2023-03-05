<?php

class Queue {
    private $queue;

    public function __construct() {
        $this->queue = array();
    }

    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    public function dequeue() {
        return array_shift($this->queue);
    }

    public function isEmpty() {
        return empty($this->queue);
    }
}



function findShortestPath($maze, $start, $end) 
{
    $rows = count($maze);
    $cols = count($maze[0]);

    $dist = array();
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $dist[$i][$j] = PHP_INT_MAX;
        }
    }

    $q = new Queue();
    $q->enqueue($start);
    $dist[$start[0]][$start[1]] = 0;

    while (!$q->isEmpty()) {
        $curr = $q->dequeue();

        if ($curr[0] == $end[0] && $curr[1] == $end[1]) {
            break;
        }

        $row = $curr[0];
        $col = $curr[1];

        $neighbors = array(array($row-1, $col), array($row, $col-1), array($row, $col+1), array($row+1, $col));
        foreach ($neighbors as $neighbor) {
            $nrow = $neighbor[0];
            $ncol = $neighbor[1];

            if ($nrow < 0 || $nrow >= $rows || $ncol < 0 || $ncol >= $cols) {
                continue;
            }

            if ($maze[$nrow][$ncol] == 0) {
                continue;
            }

            $alt = $dist[$row][$col] + $maze[$nrow][$ncol];
            if ($alt < $dist[$nrow][$ncol]) {
                $dist[$nrow][$ncol] = $alt;
                $q->enqueue(array($nrow, $ncol));
            }
        }
    }


    $path = array();
    $row = $end[0];
    $col = $end[1];
    while ($row != $start[0] || $col != $start[1]) {
        $path[] = array($row, $col);

        $neighbors = array(array($row-1, $col), array($row, $col-1), array($row, $col+1), array($row+1, $col));
        foreach ($neighbors as $neighbor) {
            $nrow = $neighbor[0];
            $ncol = $neighbor[1];

            if ($nrow < 0 || $nrow >= $rows || $ncol < 0 || $ncol >= $cols) {
                continue;
            }

            if ($dist[$nrow][$ncol] + $maze[$nrow][$ncol] == $dist[$row][$col]) {
                $row = $nrow;
                $col = $ncol;
                break;
            }
        }
    }

    $path[] = $start;
    
    $path = array_reverse($path);

    return array('distance' => $dist[$end[0]][$end[1]], 'path' => $path);
}
?>