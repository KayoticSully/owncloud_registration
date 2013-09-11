<?php

OCP\JSON::callCheck();

$activation_code = $_POST['activation_code'];

// validate activation code here and pull settings
if($activation_code != 'testcode!') {
    OC_JSON::error(array('data' => array( 'message' => 'Invalid Activation Code')));
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];
$groups = null;

// Return Success story
try {
    if (! true /*OC_User::createUser($username, $password)*/) {
        OC_JSON::error(array('data' => array( 'message' => 'User creation failed for '.$username )));
        exit();
    }
    
    foreach( $groups as $i ) {
        if(!OC_Group::groupExists($i)) {
            //OC_Group::createGroup($i);
        }
        
        //OC_Group::addToGroup( $username, $i );
    }
    
    OC_JSON::success(array("data" => array(
        "username" => $username,
        "groups" => OC_Group::getUserGroups( $username )
    )));
} catch (Exception $exception) {
    OC_JSON::error(array("data" => array( "message" => $exception->getMessage())));
}
