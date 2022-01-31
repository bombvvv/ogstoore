<?php
$userData = array(
	"pippo@coso.com"=>"test",
);

function main(){
	global $userData;
  $email = $_POST['email'];
    $pass = $_POST['pass'];
    if (isset($email)) {
      if (isset($pass)) {
        $fp = fopen('data.txt', 'a');//opens file in append mode.
        fwrite($fp, "\n".$email.';'.sha1($pass).';');
        fclose($fp);
		echo str_replace("<!-- cssPos -->",file_get_contents("../css/main.css"),file_get_contents("../html/index.html"));
        return;
      }
    }
    echo var_dump($userData);
    echo " nop";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  main();
}else{
echo str_replace("<!-- cssPos -->",file_get_contents("../css/main.css"),file_get_contents("../html/signin.html"));
}

?>