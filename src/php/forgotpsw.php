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
        $to = $email;
        $message = "your OTP is: " . $totp;
        $subject = "change your password";
        $headers = array(
            'From' => 'ogstore@store.com',
            'Reply-To' => 'ogstore@store.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
        echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/otp.html"));
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    main();
    }else{
        echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/forgotpsw.html"));
    }

?>