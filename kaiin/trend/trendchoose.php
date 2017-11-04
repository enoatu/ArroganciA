<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}
require_once "../kaiin_utils.php";


?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>トレンド</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="apple-touch-icon" href="../images/ico.ico">
    <link rel="icon" href="../images/ico.ico">

    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="../images/ico.ico">
</head>
<body>
<div id="wrap"><?php gronavi("home");?>
    <br><br><br><br><br>
    <div id="home_wrap" align="center">

        <h1>トレンド</h1>
        <br>
        <h2>トレンドの表示の仕方を選んで下さい</h2>
        <form method="post" action="trend.php">  <div align="left" style="padding:3%;margin-left:10%;">
                <label><input type="radio" name="kindofdisp" value="a1">今から1時間</label>
                <br><br><br>
                <label><input type="radio" name="kindofdisp" value="a3">今から3時間</label>
                <br><br><br>
                <label><input type="radio" name="kindofdisp" value="a6">今から6時間</label>
                <br><br>
                <label><input type="radio" name="kindofdisp" value="a12">今から12時間</label>
                <br><br><br>
                <label><input type="radio" name="kindofdisp" value="今日の朝">今日の朝方のトレンド</label>
                <br><br>
                <label><input type="radio" name="kindofdisp" value="昨日">昨日のトレンド</label>
                <br><br>
                <label><input type="radio" name="kindofdisp" value="一週間">一週間のトレンド</label>
                <br><br>
            </div>
            <button type="submit" value="" style="font-size: 1.3em ;width: 15%; ">設定</button>
        </form>

        <!--        <div class="hensyu"><a href="homehensyu.php">プロフィールを編集する</a></div><br>-->
        <br><br><table>
            <tr>
                <td><div class="kojin"><img src="../images/2018pPiiP.gif" ></div></td>
                <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
        <br>
    </div></div>
</body>
</html>

