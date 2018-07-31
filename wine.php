<?php

require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Classification\MLPClassifier;

use Phpml\NeuralNetwork\ActivationFunction\PReLU;
use Phpml\NeuralNetwork\ActivationFunction\Sigmoid;
use Phpml\NeuralNetwork\Layer;
use Phpml\NeuralNetwork\Node\Neuron;


$lines = file("./wine.csv");

foreach($lines as $key => $line){
    $data[$key] = explode(',',$line);
}
//var_dump($data);
foreach($data as $key => $row){
    $samples[$key] = array_slice($row , 1);
    $samples[$key] = array_map('floatval', $samples[$key]);
}
$samples = array_slice($samples , 1);
foreach($data as $key => $row){
    $labels[$key] = $row[0];
}
$labels = array_slice($labels , 1);
//var_dump($labels);


$mlp = new MLPClassifier(13, [2], ['1', '2', '3']);

/*
$layer1 = new Layer(2, Neuron::class, new PReLU);
$layer2 = new Layer(2, Neuron::class, new Sigmoid);
$mlp = new MLPClassifier(13, [$layer1, $layer2], ['1', '2', '3']);
*/

$mlp->train(
    $samples=$samples,
    $tagerts = $labels
);

$result = $mlp->predict([1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ,11 ,12, 13]);

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
