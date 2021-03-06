<?php
include_once './debugmode.php';
$contents = file_get_contents("http://localhost:9999/exam/startexam/4");
function get_data($url) {
    $ch = curl_init();
    $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$dataArray = json_decode($contents, true);

if ($contents) {
    echo json_encode($dataArray, true);
} else {
    echo 'exit';
}
