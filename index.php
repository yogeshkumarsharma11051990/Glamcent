<?php

    require('vendor/autoload.php'); 
    use OpenTok\OpenTok;
    use OpenTok\Session;
    use OpenTok\Role; 
    use OpenTok\MediaMode;
    
try{

    $API_KEY = '47190794';
    $API_SECRET = '749b45cf5576d90b0f1e76a0d0ac3097a07f5789';

    //echo "1";
    //die();

    $apiObj = new OpenTok($API_KEY, $API_SECRET);
    $session = $apiObj->createSession(array('mediaMode' => MediaMode::ROUTED));
    echo $session->getSessionId();

}catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }



?>