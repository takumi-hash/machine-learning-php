<?php

require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;

$lines = file("./wine.csv");

//var_dump($lines);

foreach($lines as $key => $line){
    $data[$key] = explode(',',$line);
}
//var_dump($data);
foreach($data as $key => $row){
    $samples[$key] = array_slice($row , 1);
}
$samples = array_slice($samples , 1);
foreach($data as $key => $row){
    $labels[$key] = $row[0];
}

//var_dump($samples);
/*var_dump($labels);

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);


$result = $classifier->predict([1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ,11 ,12, 13]);
*/



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wine判別分析</title>
    </head>
    <body>
        <h1>Wine判別分析</h1>
        その成分のワインはタイプ
        <?php echo $result; ?>
        です。
    </body>
</html>
