<?php
require "vendor/autoload.php";

use Phpml\Dataset\CsvDataset;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Regression\LeastSquares;
use Phpml\Metric\Regression;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Load the data
    $data = new CsvDataset("./data/datasetschoollow.csv", 1, true);

    // Preprocessing data
    $dataset = new RandomSplit($data, 0.1, 156);

    // Training
    $regression = new LeastSquares();
    $regression->train($dataset->getTrainSamples(), $dataset->getTrainLabels());

    // Get user input
    $input = $_POST["input"];

    // Make prediction
    $prediction = $regression->predict([$input]);

    // Evaluate the model
    $score = Regression::r2score($dataset->getTestLabels(), $regression->predict($dataset->getTestSamples()));

    // Display the results
    echo 'Prediction: ' . $prediction . '<br>';
    echo 'R2 Score: ' . $score . '<br>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Predictive Model Form</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="input">Input:</label>
        <input type="text" name="input" id="input" required>
        <input type="submit" value="Predict">
    </form>
</body>
</html>