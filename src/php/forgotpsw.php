<?php

$userData = array();

$userDataFile = explode("\n",$userDataFile);
foreach ( $userDataFile as $singleUser ){
	$splittedData = explode( ";", $singleUser );
	$userData[$splittedData[0]] = $splittedData[1];
}
function main(){
    global $userData;
    $email = $_POST['email'];
    if (isset($email)) {

        //sends an email with the otp
        $totp = sprintf("%'.06d", rand(0, 999999));    
        $subject = 'otp';
        $message = 'otp:'.$totp;
        $headers = 'From: noReply@ogstore.com';
        mail($email, $subject, $message, $headers);

        $fp = fopen('otpData.txt', 'w');//opens file in append mode.
        fwrite($fp, $email.';'.sha1($totp).';'.time().";");
        fclose($fp);

        echo  str_replace("/*mailHere*/","<input type=\"hidden\" name=\"email\" value=".$email.">", str_replace("<!-- cssPos -->",file_get_contents("css/loginSignin.css"),file_get_contents("html/otp.html")));
        return;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    main();
    }else{
        echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/forgotpsw.html"));
    }

?>