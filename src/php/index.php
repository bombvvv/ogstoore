<?php

function showError($errorCode, $errorName, $errorDesc){
    $responseObj = new stdClass();
    http_response_code($errorCode);
    header('Content-Type: application/json; charset=utf-8');
    echo "{\"$errorName\":\"$errorDesc\"}";
}
function main(){
    echo "yo bro";

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    main();
  }else{
      echo str_replace("/*cssPos*/",file_get_contents("css/main.css"),file_get_contents("html/index.html"));
  }
?>