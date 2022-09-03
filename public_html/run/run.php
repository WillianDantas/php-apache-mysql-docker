<?php
require_once 'JsonMapper.php';
require_once 'Contact.php';
require_once 'Address.php';

$json = json_decode(file_get_contents('single.json'));

$mapper = new JsonMapper();
$contact = $mapper->map($json, new Contact());

$coords = $contact->address->getGeoCoords();
echo $contact->address->street;
echo $contact->name . ' lives at coordinates '
    . $coords['lat'] . ',' . $coords['lon'] . "\n";
?>