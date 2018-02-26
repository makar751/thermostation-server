<html>
<head>
</head>
<body>


<?php

include 'db.php';

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    //throw new Exception('Request method must be POST!');
    echo("not post");
}
 
//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    //throw new Exception('Content type must be: application/json');
    echo("wrong content");
    echo($contentType);
}
$json_string = file_get_contents("php://input");

//$json_string='{"id":"room","hu":"30.50","it":"21.90","pr":"761.39","ot":"0.81"}';
$data=json_decode($json_string);
if (json_last_error() != JSON_ERROR_NONE){
    die;
}

$db_link = connect_to_DB();
if ($db_link == null){
    die;
}

if(!array_key_exists('id', $data)) {
    die;
}
if(array_key_exists('hu', $data)) {
    if(array_key_exists('it', $data)) {
        if(!AddInTempHum($db_link, $data->id, $data->it, $data->hu)){
            die;
        }
    }
}
if(array_key_exists('pr', $data)) {
    if(!AddOtTemp($db_link, $data->ot)){
        die;
    }
}
if(array_key_exists('ot', $data)) {
    if(!AddPress($db_link, $data->pr)){
        die;
    }
}
?>
</body>
</html>