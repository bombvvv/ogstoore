<?php
session_start();
$userData = array(
	"pippo@coso.com"=>"test",
);

function main(){
	global $userData;
  $email = $_POST['email'];
  $_SESSION["email"] = $_POST['email'];
  $classId = "5id";
  $pass = $_POST['pass'] . $classId;
  $pass = hash('SHA256',($pass));
  $hostname = "db";
  $username = "root";
  $password = "root";
  $db = "storage";
    
  if(is_user_logged_in() == true){
    echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/site.html")); 
  } else 
    if (isset($email)) {
      if (isset($pass)) { 
        $dbconnect = mysqli_connect($hostname,$username,$password,$db);
        if ($dbconnect->connect_error) {
          die("Database connection failed: " . $dbconnect->connect_error);
        }
        $query = "INSERT INTO users (username, password) VALUES ('$email', '$pass')";
        if (!mysqli_query($dbconnect, $query)) {
          die('An error occurred when submitting your form');
        } else {
          echo "New account created";
        } 
        $dbconnect->close();
        echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/login.html")); 
        return;
      }
    }
}

function is_user_logged_in(): bool
{
    // check the session
    if (isset($_SESSION['email'])) {
        return true;
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
  echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/signin.html"));
}

?>