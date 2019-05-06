<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

require 'GetElementsGame.php';

$getData = new GetElementsGame();
var_dump($getData->getElements("http://mirrors.standaloneinstaller.com/video-sample/Panasonic_HDC_TM_700_P_50i.avi"));


?>