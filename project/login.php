<?php
//login.php Creates login to local hosted database, in this case, publications
//$host = 'localhost'; //connection string to IP
//$port = 8889;
//$data = 'publications';//database name
//$user = 'root'; //username
//$pass = 'root'; //password

//MAMP Website Method

  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'classicmodels');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

  //echo 'Connected successfully.<br>';

  $mysqli->close();


//book method, possibly outdated
//$chrs = 'utf8mb4'; //Character set, UTF-8 encoding
//$attr =  "mysql:host=$host:$port;dbname=$data;charset=$chrs";
//$opts = 
//[
//    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //PHP Data Object as options. A unified API to increase connection security
//    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//    PDO::ATTR_EMULATE_PREPARES   => false,
//];



//echo "<html><h1>Thank you for logging in.</h1></html>";
?>



