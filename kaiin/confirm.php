<?php
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/07/16
 * Time: 20:02
 */
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
if($_SESSION['user']==32){
    require_once "kaiin_util_guest.php";
}else{
    require_once "kaiin_utils.php";}
$user_id=$_SESSION['user'];
$disp=$_POST['kindofdisp'];
try {
    $sql = "UPDATE users
      SET disp = :disp
      WHERE user_id=:user_id";

    $stm = getDB()->prepare($sql);
    $stm->bindValue(':disp',$disp, PDO::PARAM_INT);
    $stm->bindValue(':user_id',$user_id);

    $stm->execute();
}catch (Exception $e) {
    echo '<span class="error">エラーがありました</span><br>';
    echo $e->getMessage();
    exit();
}
$_SESSION['disp']=$disp;


?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>設定ページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">


    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="images/ico.ico">
</head>
<body>
<div id="wrap" style="max-width: 1600px; margin:0 auto;"><?php gronavi("home");?>
    <br><br> <br><br> <br>
    <h1 align="center">設定が反映されました</h1>
</div>

</body>
</html>

