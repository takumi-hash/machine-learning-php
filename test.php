<?php
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Classification\MLPClassifier;

$mlp = new MLPClassifier(3, [2], ['a', 'b', 'c']);
$mlp->train(
    $samples = [[1, 0, 0, 0], [1, 1, 1, 1], [0, 0, 0, 1]],
    $targets = ['a', 'b', 'c']
);
$ingredients = [0.8, 0.2, 0.1, 0.001];
$result = $mlp->predict($ingredients);
// return ['b'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Neural Network test</title>
    </head>
    <body>
        <h1>Neural Network Test</h1>
        成分<?php print_r($ingredients);?>のワインは<br>
        タイプ<?php print_r($result); ?>です。
    </body>
</html>