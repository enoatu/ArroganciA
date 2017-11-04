<?php
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/06/11
 * Time: 13:47
 */

session_start();

// logout.php?logoutにアクセスしたユーザーをログアウトする
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    if(isset($_GET['register'])){
        header("Location: register.php");
        exit();
    }
    header("Location: index.php");
} else {
    header("Location: index.php");
}
