<?php

function main(){
	$otp = $_POST['otpToken'];
   	$email = $_POST['email'];
    if (isset($email)) {
      $otpData = array();
      if ( $otpData[$email] == sha1($otp) ){
      echo "EXPERIA PAGE... ";
      echo "Welcome user: ",$email;
        return;
      }
        echo "Wrong otp, go back to the ";
        echo '<a href="index.php">login</a>';
        echo ".";
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
	echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/otp.html"));
}

?>