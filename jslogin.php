<?php

session_start();

require_once('loginconfig.php');



$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM patients WHERE patient_email = ? AND password = ?  LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
    $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
    if($stmtselect->rowCount() > 0){
        $_SESSION['userlogin'] = $user;
        echo'Success';
    }else{
        echo'There is no user for that combo';
    }

}else{
    echo 'There were errors while connecting to database.';
}

