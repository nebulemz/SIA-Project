<?php
require "vendor/autoload.php";

use Phpml\Dataset\CsvDataset;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Regression\LeastSquares;
use Phpml\Metric\Regression;

$prediction = null;
$score = null;
$printResult = false;
$errors = [];

// Reset variables on page refresh
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $prediction = null;
    $score = null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Load the data
    $data = new CsvDataset("./data/dataschoollow.csv", 2, true);

    // Preprocessing data
    $dataset = new RandomSplit($data, 0.2, 200);

    // Training
    $regression = new LeastSquares();
    $regression->train($dataset->getTrainSamples(), $dataset->getTrainLabels());

    // Get user input
    $input1 = $_POST["input1"];
    $input2 = $_POST["input2"];
    $input = [$input1, $input2];

    // Check condition for suitable number of computers
    $validComputers = isValidComputers($input1, $input2);
    if ($validComputers) {
        // Make prediction
        $prediction = $regression->predict($input);

        // Evaluate the model
        $score = Regression::r2score($dataset->getTestLabels(), $regression->predict($dataset->getTestSamples()));

        // Set the flag to true for printing the result
        $printResult = true;
    } else {
        if ($input1 < 5 || $input1 > 57) {
            $errors[] = "Invalid number of computers.";
        }
        if ($input2 < 10 || $input2 > 110) {
            $errors[] = "Invalid room size.";
        }
    }
}

/**
 * Function to check if the number of computers is valid for the given room size.
 *
 * @param int $computers
 * @param int $roomSize
 * @return bool
 */
function isValidComputers($computers, $roomSize)
{
    // Implement your validation logic here
    // Return true if the number of computers is valid for the room size, otherwise return false
    // You can define your own conditions based on your requirements
    // For example, you can compare the number of computers and room size, check if they are within a certain range, etc.
    // Modify this function as per your specific validation criteria

    if ($roomSize >= 54 && $roomSize <= 110) {
        return true;
    } elseif ($roomSize = 54 && $computers >= 5 && $computers <= 31) {
        return true;
    } elseif ($roomSize >54 && $roomSize <= 66 && $computers >=5 && $computers <= 35) {
        return true;
    } elseif ($roomSize >66 && $roomSize <= 71 && $computers >=5 && $computers <= 39) {
        return true;
    } elseif ($roomSize >72 && $roomSize <= 80 && $computers >=5 && $computers <= 51) {
        return true;
    } elseif ($roomSize >81 && $roomSize <= 88 && $computers >=5 && $computers <= 57) {
        return true;
    } elseif ($roomSize >89 && $roomSize <= 90 && $computers >=5 && $computers <= 59) {
        return true;
    } elseif ($roomSize >91 && $roomSize <=100 && $computers >=5 && $computers <= 66) {
        return true;
    } elseif ($roomSize >101 && $roomSize <=110 && $computers >=5 && $computers <= 74) {
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Predictive Model Form</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="input1">Enter number of Computers in the Room:</label>
        <input type="text" name="input1" id="input1" required><br><br>

        <label for="input2">Enter Room Size in Square Meters:</label>
        <input type="text" name="input2" id="input2" required><br><br>

        <input type="submit" value="Predict">
    </form>

    <?php
    // Display the error messages if they exist
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }

    // Display the results if form submitted and condition met
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $printResult) {
        echo 'Predicted Cost: ' . $prediction . '<br>';
        echo 'R2 Score: ' . $score . '<br>';
    }
    ?>
</body>
</html>