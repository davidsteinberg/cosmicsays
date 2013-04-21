<?php
//connectDB() needs to be replace for whenever the db host is set up
//CALL PROCEDURE needs to be replaced by the actual calls
//Form need to to give categories
//INSERT INTO image(FileName, Title, NumberOfViews) VALUES ('$filename, $titleofpost, 1')


  
$title = $_POST['title'];
$info = $_POST['info'];

if ($_POST['mediaType'] == 'img' || $_POST['mediaType'] == 'meme')
{
  if ($_POST['mediaType'] == 'img')
  {
    $uploadDir = "C:\wamp\www\cosmic_says\assets\images\\";
    $dirName = "/assets/images/";
  }
  else if ($_POST['mediaType'] == 'meme')
  {
    $uploadDir = "C:\wamp\www\cosmic_says\assets\memes\\";
    $dirName = "/assets/memes/";
  }
  
  $uploadFilename = basename($_FILES['upload']['name']);
  $fileURI = $uploadDir . $uploadFilename;
  if (!($_FILES['upload']['error']))
    move_uploaded_file($_FILES['upload']['tmp_name'], $fileURI);
	
  //reusing this variable to store the unix path in the db
  $fileURI = $dirName . $uploadFilename;
}


if ($_POST['mediaType'] == 'img')
{
  $forward = "images.html";
  try
  {
    $mysqli = new mysqli("localhost", "root", "", "cosmicsays");
    if (!($mysqli->query("INSERT INTO image(FileName, Title, NumberOfViews, FileLocation, info) ".
	               "VALUES('$uploadFilename', '$title', 0, '$fileURI', '$info')")))
	  echo "Failure: " . $mysqli->error;
  }
  catch (mysqli_sql_exception $e)
  {
    throw $e;
  } 
}
else if ($_POST['mediaType'] == 'meme')
{
  $forward = "meme.html";
  try
  {
    $mysqli = new mysqli("localhost", "root", "", "cosmicsays");
    if (!($mysqli->query("INSERT INTO meme(FileName, Title, NumberOfViews, FileLocation, info) ".
	               "VALUES('$uploadFilename', '$title', 0, '$fileURI', '$info')")))
	  echo "Failure: " . $mysqli->error;
  }
  catch (mysqli_sql_exception $e)
  {
    throw $e;
  }  
}
else if ($_POST['mediaType'] == 'vid')
{
  $forward = "video.html";
  $url = $_POST['url'];
  try
  {
    $mysqli = new mysqli("localhost", "root", "", "cosmicsays");
    if (!($mysqli->query("INSERT INTO video(Link, Title, NumberOfViews, info) ".
	               "VALUES('$url', '$title', 0, '$info')")))
      echo "Failure: " . $mysqli->error;
  }
  catch (mysqli_sql_exception $e)
  {
    throw $e;
  }
}

$mysqli->close();
header("Location: " . $_SERVER['SERVER_NAME'] . "/cosmic%20says/" . $forward);
?>