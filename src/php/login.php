<?php
session_start();
function main(){
	global $userData;
    $email = $_POST['email'];
    $classId = "5id";
    $pass = $_POST['pass'] . $classId;
    $pass = hash('SHA256',($pass));
    $hostname = "db";
    $username = "root";
    $password = "root";
    $db = "storage";
    
    if (isset($email)) {
      if (isset($pass)) {
        
        $dbconnect = mysqli_connect($hostname,$username,$password,$db);
        if ($dbconnect->connect_error) {
          die("Database connection failed: " . $dbconnect->connect_error);
        }
        $query = "SELECT * FROM users WHERE username='$email' and password='$pass'";
        $result = mysqli_query($dbconnect, $query);
        if (count($result)>0) {
          echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/site.html"));
        } else {
          echo "Wrong email or password, go back to the ";
          echo '<a href="login.php">login</a>';
          echo " or register your account in the ";
          echo '<a href="index.php">sign-in</a>';
          echo " page.";
        }
      }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
	echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/login.html"));
}

?>