<?php
//connectDB() needs to be replace for whenever the db host is set up
//CALL PROCEDURE needs to be replaced by the actual calls

$date = getdate();
$datetime = $date[year]."-".$date[mon]."-".$date[mday]." ".
            $date[hours].":".$date[minutes].":".$date[seconds];

$title = $_POST['title'];
$url = $_POST['url'];

if ($_FILES['upload'])
{
  $uploadDir = "";
  $uploadFilename = $uploadDir . basename($_FILES['userfile']['name']);
  if (!($_FILES['upload']['error']))
    move_uploaded_file($_FILES['upload']['tmp_name'], $uploadFile);
}

if ($_POST['mediaType'] == 'img')
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
  finally
  {
    $mysqli->close();
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
  finally
  {
    $mysqli->close();
  }  
}
else if ($_POST['mediaType'] == 'vid')
{
  try
  {
    $mysqli = connectDB();
    $mysqli->query("CALL PROCEDURE('$title', '$url', '$datetime')");
  }
  catch (mysqli_sql_exception $e)
  {
    throw $e;
  }
  finally
  {
    $mysqli->close();
  }
}
  
$mysqli->close();

?>