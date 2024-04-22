<?php
require 'Calculation.php';
require 'Distance.php';
require 'Request.php';

$rq = Request::fromGlobals($_GET, $_POST);
$first = $rq->get('first', 'unknown');
$second = $rq->get('second', 'unknown');

$path = 'http://maps.google.com/maps/api/geocode/json?address=';

$distance  = new Distance();
$calculation = new Calculation(Distance $distance, string $path);

$calculation->run(string $first, string $second);
?>



