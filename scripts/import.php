<?php

$dbfile='../data/dbfile.db';
$csvfile='../data/countries.csv';

require('rb.php');
R::setup("sqlite:$dbfile");

foreach (array_map('str_getcsv', file($csvfile)) as $columns) {
	echo($columns[0].'|'.$columns[1]."\n");
	$country = R::dispense('country');
	$country->name = $columns[0];
	$country->code = $columns[1];
	R::store($country);
}
