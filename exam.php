<?php
include_once './debugmode.php';
$contents = file_get_contents('http://202.83.47.165:9999/exam/');
$dataArray = json_decode($contents, true);
if ($contents) {
    echo json_encode($dataArray, true);
} else {
    echo 'exit';
}
