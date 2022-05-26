<?php
require_once 'settings.php';
/** @var TYPE_NAME $host */
/** @var TYPE_NAME $user */
/** @var TYPE_NAME $password */
/** @var TYPE_NAME $db */

$conn = new mysqli($host, $user, $password, $db);
$password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
$query = "Insert into Users values (' ','".$_POST['name']."',' ".$_POST['login']."','".$password."',2)";
$conn->query($query);
/*if(password_verify($_POST['pass'],$password))
    echo 'OK';
else
    echo 'neOK';*/
header('Location: ../pages/about.php');