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
if($_SESSION['user']==32){
    require_once "kaiin_util_guest.php";
}else{
    require_once "kaiin_utils.php";}
$message=$_POST['email']."というメールアドレスの".$_POST['name']."さんから、「".$_POST['request']."」";
   mb_send_mail("artisan1221@gmail.com", "ArroganciAのご要望",$message);


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
<div id="wrap"><?php gronavi("home");?>

    <div align="center" style="max-width: 1600px; margin:0 auto;">

        <br><br><br><br><br>
        <h1>送信完了</h1><br>
        <h2>ありがとうございます。サービス改善の参考にさせていただきます。</h2>
        <br><br><table>
            <tr>
                <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
                <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
        <br>
    </div></div>
</body>
</html>

