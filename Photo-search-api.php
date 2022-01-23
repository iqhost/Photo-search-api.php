<?php
error_reporting(0);
//An array of HTTP methods that
//we want to allow.

 header("Content-Type: application/json; charset=UTF-8");
$res       = $_GET['q'];

$headers    = [];
$headers[]  = 'Origin: https://unsplash.com';
$headers[]  = 'Referer: https://unsplash.com/';
$headers[]  = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36';

    $curl = curl_init();
    $Conact = [
    CURLOPT_URL            => "https://unsplash.com/s/photos/$res",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER     => $headers];
    curl_setopt_array($curl, $Conact);
    $response = curl_exec($curl);
    curl_close($curl);
preg_match_all('/<img class="YVj9w ht4YT" src="(.*?)"/',$response,$match);
   //  print_r($match);
$json = [];
$json[] = $match[1][0];
$json[] = $match[1][1];
$json[] = $match[1][2];
$json[] = $match[1][3];
$json[] = $match[1][4];
$json[] = $match[1][5];
$json[] = $match[1][6];
$json[] = $match[1][7];
$json[] = $match[1][8];
$json[] = $match[1][9];
$json[] = $match[1][10];
$json[] = $match[1][11];
$json[] = $match[1][12];
$json[] = $match[1][13];
$json[] = $match[1][14];
$json[] = $match[1][15];

echo json_encode(['result'=>$json],JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
