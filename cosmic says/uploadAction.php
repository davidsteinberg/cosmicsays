<?php
//connectDB() needs to be replace for whenever the db host is set up
//CALL PROCEDURE needs to be replaced by the actual calls
//Form need to to give categories
//INSERT INTO image(FileName, Title, NumberOfViews) VALUES ('$filename, $titleofpost, 1')


  
$title = $_POST['title'];
$info = $_POST['info'];


if ($_FILES['upload'])
{
  if ($_POST['mediaType'] == 'img')
    $uploadDir = "C:\wamp\www\cosmic_says\assets\images";
  else if ($_POST['mediaType'] == 'meme')
    $uploadDir = "C:\wamp\www\cosmic_says\assets\memes";

  $uploadFilename = basename($_FILES['upload']['name']);
  $fileURI = $uploadDir . $uploadFilename;
  if (!($_FILES['upload']['error']))
    move_uploaded_file($_FILES['upload']['tmp_name'], $fileURI);
}

if ($_POST['mediaType'] == 'img')
{
  try
  {
    $mysqli = new mysqli("localhost", "root", "", "cosmicsays");
    if (!($mysqli->query("INSERT INTO images(FileName, Title, NumberOfViews, FileLocation, info) ".
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
  try
  {
    $mysqli = connectDB();
    if (!($mysqli->query("INSERT INTO images(FileName, Title, NumberOfViews, FileLocation, info) ".
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
  $url = $_POST['url'];
  try
  {
    $mysqli = connectDB();
    if (!($mysqli->query("INSERT INTO images(Link, Title, NumberOfViews, info) ".
	               "VALUES('$url', '$title', 0, '$info')")));
      echo "Failure: " . $mysqli->error;
  }
  catch (mysqli_sql_exception $e)
  {
    throw $e;
  }
}
  
$mysqli->close();

?>