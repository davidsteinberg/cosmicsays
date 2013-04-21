<?php
$sqldb = "mysql";
$dbhost = "databaseHostName";
$dbname = "databaseName";
//$dbuser = "userName"; $dbpass = "password";

// parameters
if($_POST['medium']){
	$pMedium = $_POST['medium'];
} else if($_GET['medium']){
	$pMedium = $_GET['medium'];
} else {
	$pMedium = "meme";
}


// Connect to MySQL Server
try {

	// database handle
	$dbh = new PDO("$sqldb:host=$dbhost;dbname=$dbname", 
		"$dbuser", "$dbpass");

	// query
	$sql = "SELECT Title, NumberOfViews, FileLocation, FileName, info
			FROM image
			ORDERBY NumberOfViews DESC";

	// statement handle
$sth = $dbh->prepare($sql, Array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	//$sth->execute(Array(':categories' => $pMedium));
	$sth->execute();
	$data = Array();
	$data = $sth->fetchAll();

//var_dump($data);
	// output results as JSON
	$rowCount = count($data);
	echo "[" . PHP_EOL;
	for ($i = 0; $i < $rowCount - 1; $i++){
		echo '{"Title":"' . $data[$i]['Title'] . '", ',
			'{"NumberOfViews":"' . $data[$i]['NumberOfViews'] . '", ',
			'{"FileLocation":"' . $data[$i]['FileLocation'] . '", ',
			'{"FileName":"' . $data[$i]['FileName'] . '", ',
			'"info":"' . $data[$i]['info'] . '"},' . PHP_EOL;
	}
	echo '{"Title":"' . $data[$i]['Title'] . '", ',
		'{"NumberOfViews":"' . $data[$i]['NumberOfViews'] . '", ',
		'{"FileLocation":"' . $data[$i]['FileLocation'] . '", ',
		'{"FileName":"' . $data[$i]['FileName'] . '", ',
		'"info":"' . $data[$i]['info'] . '"},' . PHP_EOL;
	echo ']' . PHP_EOL;

	// close connection
	$dbh = NULL;

} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	//die();
}




//var_dump($data[0]);
//var_dump(htmlentities($data[0][0]));
//var_dump(htmlspecialchars($data[0][0]));
//var_dump(urlencode($data[0][0]));
//var_dump(rawurlencode($data[0][0]));

//	echo json_encode($data);





/*
// create query statement
$statement = $dbh->query("SELECT DISTINCT category AS categories FROM video");
// run query
$row = $statement->fetch(PDO::FETCH_ASSOC);
//echo htmlentities($row['categories']);
echo json_encode($row);
*/


// use the prepare and execute model when the statement is built instead of
// explicitly written. (instead of making a query and fetching results.)
//===============================================================
/* Execute a prepared statement by passing an array of values */
/*
$sql = 'SELECT name, colour, calories
    FROM fruit
	WHERE calories < :calories AND colour = :colour';
// statement handle
$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':calories' => 150, ':colour' => 'red'));
$red = $sth->fetchAll();
$sth->execute(array(':calories' => 175, ':colour' => 'yellow'));
$yellow = $sth->fetchAll();


	foreach($dbh->query('SELECT * from FOO') as $row) {
		print_r($row);
	}


PDO::exec() - Execute an SQL statement and return the number of affected rows
PDO::query() - Executes an SQL statement, returning a result set as a PDOStatement object
PDOStatement::execute() - Executes a prepared statement
*/

//===============================================================
/* Connection examples */
/* PDO object oriented database API
$pdo = new PDO('mysql:host=example.com;dbname=database', 'user', 'password');
$statement = $pdo->query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo htmlentities($row['_message']);
*/

?>

