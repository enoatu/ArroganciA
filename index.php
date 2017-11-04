<?php
/**
 * Created by PhpStorm.
 * User: s3701
 * Date: 2017/09/12
 * Time: 13:04
 */
//header("Location: kaiin/index.php");
session_start();
if(isset($_SESSION['user'])) {
    header("Location: http://enoatu.com/ArroganciA/kaiin/index.php");
    exit();
}else{
    $user_id=32;
    $_SESSION['user']=$user_id;
    header("Location: http://enoatu.com/ArroganciA/kaiin/index.php");
    exit();
}

