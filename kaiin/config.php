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
    <br><br><br><br><br>
    <div id="home_wrap" align="center" style="max-width: 1600px; margin:0 auto;">

        <h1>設定ページ</h1>
        <br>
        <h2>テーブルの表示の仕方を変える</h2>
      <form method="post" action="confirm.php">  <div align="left" style="padding:3%;margin-left:10%;">
            <label><input type="radio" name="kindofdisp" value=0 required>| ツイート | □ | ユーザ名 | アカウント名 | 日時 |</label>
            <br><br><br>
            <label><input type="radio" name="kindofdisp" value=1 required>| ツイート | □ | ユーザ名 | 日時 |</label>
            <br><br><br>
        <label><input type="radio" name="kindofdisp" value=2 required>| ツイート | □ | アカウント名 | 日時 |</label>
            <br><br><br>
              <label><input type="radio" name="kindofdisp" value=3 required>| ツイート | □ | 日時 |
                 <br> ↑☆<b>デフォルト☆</b></label>
            <br><br>
              <label><input type="radio" name="kindofdisp" value=4 required>| ツイート | □ |　　　　　　　　　
            <br>↑☆<b>スマートデバイス向け</b>☆</label>
              <br><br>
          </div>
            <button type="submit" value="" style="font-size: 1.3em ;width: 15%; ">設定</button>
        </form>

<!--        <div class="hensyu"><a href="homehensyu.php">プロフィールを編集する</a></div><br>-->
        <br><br><table>
            <tr>
                <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
                <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
        <br>
    </div></div>
</body>
</html>

