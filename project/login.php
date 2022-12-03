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
  DEFINE('DB_HOST', 'localhost:8889');
  DEFINE('DB_DATABASE', 'classicmodels');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

  if(get_included_files()[0] == __FILE__){//similar to python if __name__=__main__ to hid login in confirmation on another pages using login.php
  echo "Connected successfully
          <br><a href='AddRemoveEmployee.php'>Click here to change alter employees!</a>
          <br> file is ".basename(__FILE__);
  }


  $mysqli->close();

?>

