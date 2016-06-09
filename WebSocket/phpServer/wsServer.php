<?php
header("Content-Type:text/html; charset=utf-8");
require './WebSocket.class.php';

$address = 'localhost';
$port = 8888;
$ws = new WebSocket($address, $port);
$ws->run();






