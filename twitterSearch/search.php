<?php
/* 
 * Requires:
 *
 * 
*/

require_once ('codebird.php');
Codebird::setConsumerKey('6RTW6g2IIVj0OsOqFn6sJQ', 'lHjdl5CvaxRuDouJhnSxDjCrfqbMGvCA0oa5nd5c');
$cb = Codebird::getInstance();
$cb->setToken('923132923-HgVXI4FkO6xiZYxJYEqN1WFC258nis0AA7vs9nFd', 'Isfw5gfz82OGj5rjF98qeMyoBcZ4A8tRbhhVIM2IV4');

//Codebird::setBearerToken('923132923-HgVXI4FkO6xiZYxJYEqN1WFC258nis0AA7vs9nFd');


$term = 'lol';
$terms = Array(
	0 => "mercury",
	1 => "venus",
	2 => "earth",
	3 => "mars",
	4 => "jupiter",
	5 => "saturn",
	6 => "uranus",
	7 => "neptune",
	8 => "pluto"
	);


//	$response = $cb->search_tweets('q=%23' . 'lol' . '&count=1', true);
// entities hashtags[]
// entities user_mentions

//var_dump($response);
$tweet = Array();
foreach ($terms as $t){
	$response = $cb->search_tweets('q=%23' . $t . '&count=5', false);
	// tweet text (up to 140 characters)

/*
	foreach ($response->statuses as $tweet){
		foreach ($response->statuses[0]->{'entities'}->user_mentions as $mentioned){
			echo $mentioned->screen_name . ', ';
			echo PHP_EOL;
		}
	}
*/
	echo $response->statuses[0]->{'user'}->screen_name;
	echo PHP_EOL;
	echo $response->statuses[0]->text;
	echo PHP_EOL;
	//$response->statuses[0]->{'entities'}->hashtags[0]->text;
	foreach ($response->statuses[0]->{'entities'}->hashtags as $hashtag){
		echo $hashtag->text . ', ';
	}
	echo PHP_EOL;
	foreach ($response->statuses[0]->{'entities'}->user_mentions as $mentioned){
		echo $mentioned->screen_name . ', ';
	}
	echo PHP_EOL . PHP_EOL;
	//	$tweet[] =  

}
//echo $response;






/*
	// fetch current categories list from database
$sqldb = "mysql";
$dbhost = "host.url";
$dbname = "databaseName";
//require 'creditials.php'; //$dbuser, $dbpass

try {
	// database handle
	$dbh = new PDO("$sqldb:host=$dbhost;dbname=$dbname", 
		"$dbuser", "$dbpass");

	// fetch current categories list from database
	$sql = "SELECT Name 
			FROM category"; 
	$statement = $dbh->query($sql);

	// array response
	$terms = Array();
	$terms = $statement->fetchAll();


	// if data does not contain a url use json_encode
	echo json_encode($data);
	// if it does maybe use CURL?
	// or echo raw json string
	//echo '{"key":"' . $value . '"}';

	// close connection
	$dbh = NULL;

} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";

	// close connection
	$dbh = NULL;

	//die();
}
*/

?>


