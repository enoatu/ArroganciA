<?php
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/07/02
 * Time: 21:55
 *　設定画面でcase文でｓｑｌをわけ、セレクトによって、
 * アカウント、IDの表示、非表示を変えることができる
 * スマホ版はツイートと日にちだけ
 *
 * ここまで読んだ機能
 */

session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
include __DIR__."/../../atsushi/gtd.php";
//require_once "kaiin_utils.php";
        if($_POST['taikai']=="Yes"){
           $user_id= $_SESSION["user"];
            $sql = "UPDATE users SET user_email=null WHERE user_id=:user_id ";
            $stm = getDB()->prepare($sql);
            $stm->bindValue(':user_id',$user_id);
            $stm->execute();
           echo "<meta http-equiv='refresh' content='5;URL=register.php'>";
            echo "<h2>退会が確認されました。今までのご利用ありがとうございました。<br>
                    5秒後にページが遷移します</h2>";

        }else{
            header("Location: account.php");
        }

        ?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>ご利用ありがとうございました</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">
    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="images/ico.ico">
</head>
<body>
<div id="wrap">

    <div id="home_wrap" align="center" style="max-width: 1600px; margin:0 auto;">

        <br><br>
        <h1>反映までに時間がかかることがあります。</h1>
        <table>
            <tr>
                <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
                <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
        <br>
    </div></div>
</body>
</html>


