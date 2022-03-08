<?php

function main(){
	global $userData;
    $email = $_POST['email'];
    $classId = "5id";
    $pass = $_POST['pass'].$classId;

    if (isset($email)) {
      if (isset($pass)) {
          if ( $userData[$email] == hash('SHA256',($pass))){
          echo  str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/site.html"));
          return;
          }
      }
    }
    echo "Wrong email or password, go back to the ";
    echo '<a href="login.php">login</a>';
    echo " or register your account in the ";
    echo '<a href="signin.php">sign-in</a>';
    echo " page.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
	echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/login.html"));
}

?>