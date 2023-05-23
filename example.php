<?php


require "vendor/autoload.php";

// Load the data
$data = new \Phpml\Dataset\CsvDataset(filepath:"./data/datasetschoollow.csv", features:1, headingRow:true);
// preprocessing data
$dataset = new \Phpml\CrossValidation\RandomSplit($data, testSize:0.5, seed:156);
//$dataset->getTrainSamples();
//$dataset->getTrainLabels();
//$dataset->getTestSamples();
//$dataset->getTrainLabels();

//training
$regression = new \Phpml\Regression\LeastSquares();
$regression->train($dataset->getTrainSamples(), $dataset->getTrainLabels());

$predict = $regression->predict($dataset->getTestSamples());

//evaluating machine learning model

$score = \Phpml\Metric\Regression::r2score($dataset->getTestLabels(), $predict);
echo 'r2score is: '. $score;

//making predictions with trained model

//making predictions with trained model

