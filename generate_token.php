<?php

require('vendor/autoload.php'); 
use OpenTok\OpenTok;
use OpenTok\Session;
use OpenTok\Role; 
use OpenTok\MediaMode;

$API_KEY = '47190794';
$API_SECRET = '749b45cf5576d90b0f1e76a0d0ac3097a07f5789';
$apiObj = new OpenTok($API_KEY, $API_SECRET);

$sessionMain = $apiObj->createSession(array('mediaMode' => MediaMode::ROUTED));

$sessionId = $sessionMain->getSessionId();

$token = $apiObj->generateToken($sessionId);
// Generate a Token by calling the method on the Session (returned from createSession)
$token = $sessionMain->generateToken();

// Set some options in a token
$token = $sessionMain->generateToken(array(
    'role'       => Role::MODERATOR,
    'expireTime' => time()+(7 * 24 * 60 * 60), // in one week
    'data'       => 'name=Johnny',
    'initialLayoutClassList' => array('focus')
));

$resultArray = array("session_id"=>$sessionId, "token_id" => $token);

echo json_encode($resultArray);


?>