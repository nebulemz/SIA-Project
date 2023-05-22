<?php
require "vendor/autoload.php";

use Phpml\Dataset\CsvDataset;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Regression\LeastSquares;
use Phpml\Metric\Regression;

$prediction = null;
$score = null;

// Reset variables on page refresh
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $prediction = null;
    $score = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Load the data
    $data = new CsvDataset("./data/dataschoollow.csv", 1, true);

    // Preprocessing data
    $dataset = new RandomSplit($data, 0.2, 156);

    // Training
    $regression = new LeastSquares();
    $regression->train($dataset->getTrainSamples(), $dataset->getTrainLabels());

    // Get user input
    $input1 = $_POST["input1"];
    $input = [$input1];

    // Make prediction
    $prediction = $regression->predict($input);

    // Evaluate the model
    $score = Regression::r2score($dataset->getTestLabels(), $regression->predict($dataset->getTestSamples()));
}
?>


<head>
    <title>Predictive Model Form</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="input1">Enter number of PC:</label>
        <input type="text" name="input1" id="input1" required><br><br>
        
        <input type="submit" value="Predict">
    </form>
    
    <?php
    // Display the results if form submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        echo 'Prediction: ' . $prediction . '<br>';
        echo 'R2 Score: ' . $score . '<br>';
    }
    ?>
</body>
</html>