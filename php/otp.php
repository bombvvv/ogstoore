<?php
$userDataFile = file_get_contents('data.txt');
$userData = array();

$userDataFile = explode("\n",$userDataFile);
foreach ( $userDataFile as $singleUser ){
	$splittedData = explode( ";", $singleUser );
	$userData[$splittedData[0]] = $splittedData[1];
}


function main(){
	$otp = $_POST['otpToken'];
   	$email = $_POST['email'];
    if (isset($email)) {
      $otpDataFile = file_get_contents('otpData.txt');
      $otpData = array();
      $otpDataFile = explode("\n",$otpDataFile);
      foreach ( $otpDataFile as $singleOtp ){
          $splittedData = explode( ";", $singleOtp );
          $otpData[$splittedData[0]] = $splittedData[1];
      }
      if ( $otpData[$email] == sha1($otp) ){
      echo "EXPERIA PAGE... ";
      echo "Welcome user: ",$email;
      /*
      	$target = "homepage.html";
		$linkname = "mylink";
		link($target, $linkname);
      */
        return;
      }
        echo "Wrong otp, go back to the ";
        echo '<a href="index.php">login</a>';
        echo ".";
     # echo str_replace("<!-- cssPos -->",file_get_contents("../css/main.css"),file_get_contents("../html/login.html"));;
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
	#echo str_replace("<!-- cssPos -->",file_get_contents("../css/main.css"),file_get_contents("../html/otp.html"));
}

?>