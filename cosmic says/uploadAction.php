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
    $uploadDir = "/assets/images/";
  else if ($_POST['mediaType'] == 'img')
    $uploadDir = "/assets/memes/";

  $uploadFile = $uploadDir . basename($_FILES['upload']['name']);
  if (!($_FILES['upload']['error']))
    move_uploaded_file($_FILES['upload']['tmp_name'], $uploadFile);
}

if ($_POST['mediaType'] == 'img')
{
  try
  {
    $mysqli = new mysqli("localhost", "root", "", "cosmicsays");
    $mysqli->query("CALL PROCEDURE('$title', '$uploadFile', )");
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
    $mysqli->query("CALL PROCEDURE('$title', '$uploadFilename', '$datetime')");
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
    $mysqli->query("CALL PROCEDURE('$title', '$url', '$datetime')");
  }
  catch (mysqli_sql_exception $e)
  {
    throw $e;
  }
}
  
$mysqli->close();

?>