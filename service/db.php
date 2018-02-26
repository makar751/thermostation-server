<?php
function connect_to_DB(){
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "Thermst";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        return null;
    } 
    return $conn;
}

function ExecQuery($db_link, $sql){
    if(mysqli_query($db_link, $sql)){
        return true;
    } else{
       return false;
    }
}

function AddInTempHum($db_link, $table_name, $temp, $hum){
    $sql = 'INSERT INTO '.$table_name.
    ' (DateTime, Temp, Hum) '.
    'VALUES ( CURRENT_TIMESTAMP,'.$temp.','.$hum.' )';
    return ExecQuery($db_link, $sql);
}

function AddOtTemp($db_link, $temp){
    $sql = 'INSERT INTO OutsideTemp (DateTime, Temp) '.
    'VALUES ( CURRENT_TIMESTAMP,'.$temp.' )';
    return ExecQuery($db_link, $sql);
}

function AddPress($db_link, $press){
    $sql = 'INSERT INTO Pressure (DateTime, Press) '.
    'VALUES ( CURRENT_TIMESTAMP,'.$press.' )';
    return ExecQuery($db_link, $sql);
}

function GetLastTemp($db_name){
    $db_link = connect_to_DB();
    $sql = 'SELECT Temp FROM '.$db_name.' WHERE DateTime >= ( SELECT MAX(DateTime) FROM '.$db_name.' )';
    $result = mysqli_query($db_link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return $row["Temp"];
        }
    } else {
        return "Ошибка";
    }
}

function GetLastHum($db_name){
    $db_link = connect_to_DB();
    $sql = 'SELECT Hum FROM '.$db_name.' WHERE DateTime >= ( SELECT MAX(DateTime) FROM '.$db_name.' )';
    $result = mysqli_query($db_link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return $row["Hum"];
        }
    } else {
        return "Ошибка";
    }
}

function GetLastPress($db_name){
    $db_link = connect_to_DB();
    $sql = 'SELECT Press FROM '.$db_name.' WHERE DateTime >= ( SELECT MAX(DateTime) FROM '.$db_name.' )';
    $result = mysqli_query($db_link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return $row["Press"];
        }
    } else {
        return "Ошибка";
    }
}

function GetLastDate(){
    $db_link = connect_to_DB();
    $sql = 'SELECT DateTime FROM OutsideTemp WHERE DateTime >= ( SELECT MAX(DateTime) FROM OutsideTemp )';
    $result = mysqli_query($db_link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            return $row["DateTime"];
        }
    } else {
        return "Ошибка";
    }
}
?>