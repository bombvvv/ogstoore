<?php
$userData = array(
	"pippo@coso.com"=>"test",
);

function main(){
	global $userData;
    $email = $_POST['email'];
    $classId = "5id";
    $pass = $_POST['pass'] . $classId;
    $pass = hash('SHA256',($pass));
    $conn = mysqli_connect(storage, bombv, ciao76 , $dbname);
    if (isset($email)) {
      if (isset($pass)) {
        /*
        $fp = fopen('data.txt', 'a');//opens file in append mode.
        fwrite($fp, "\n".$email.';'.$pass.';');
        fclose($fp);
        */
        
		    echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/login.html"));
        return;
      }
    }
    echo var_dump($userData);
    echo " nop";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
echo str_replace("/*cssPos*/",file_get_contents("css/loginSignin.css"),file_get_contents("html/index.html"));
}

?>