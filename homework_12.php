<?php
$graph = array(
    'A' => array('B', 'C'),
    'B' => array('A', 'D', 'E'),
    'C' => array('A', 'F'),
    'D' => array('B'),
    'E' => array('B', 'F'),
    'F' => array('C', 'E')
);

function bfs($graph, $start) {
    $visited = array();
    $queue = array();

    $visited[$start] = true;
    array_push($queue, $start);

    while (!empty($queue)) {
        $node = array_shift($queue);
        echo $node . " ";

        foreach ($graph[$node] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $visited[$neighbor] = true;
                array_push($queue, $neighbor);
            }
        }
    }
}

$startNode = 'A';

echo "BFS traversal starting from node " . $startNode . ": ";
bfs($graph, $startNode);
?>
