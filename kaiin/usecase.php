<?php
session_start();
if( !isset($_SESSION['user'])){
    header("Location:index.php");
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
    <title>ArroganciAの使い方</title>
    <link rel="shortcut icon" href="images/ico.ico">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">
    <link rel="stylesheet" href="style.css">


    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
</head>

<body>
<div id="wrap" align="center">

    <?php gronavi("home");?>
    <br><br>
    <div class="wraph" style="max-width: 1100px; margin:5% auto;">
    <h1 class="kojin">ArroganciAの使い方～簡単な3ステップ～</h1>
<div align="center" style="width: 80% ">
    <h3 align="left">あなたが需要のあるアプリ/webサイト/システム/etc.を探したい時 </h3>

    <h2 align="left"><b>1</b> グローバルテーブルでそれを探します。</h2>

    <h2 align="left"><b>2</b> いいものがあったらそれらを選択して[入]ボタンをクリック。
    ローカルテーブルに追加されます</h2>

    <h2 align="left"><b>3</b> これでアイディアをいつでも見たい時に見れます。需要があり、人の役に立つものを制作しましょう。</h2><img src="images/hellowork_computer.png">
</div>

    <h1 class="kojin">くわしい使い方</h1><br>
        ＊PowerPointが小さく表示されてしまう場合はブラウザのウィンドウサイズを上下させてみてください。
    <div align="center" style="width: 100% ">

        <h2 align="center">あなたが需要のあるアプリ/webサイト/システムを探したい時</h2><br>
<!--        <iframe align="center" src='https://scitacjp-my.sharepoint.com/personal/s3701_scit_ac_jp/_layouts/15/guestaccess.aspx?docid=04ea0c6be70654f61bcaa9e4b58b60f78&authkey=AdjsmBXNmtnhMJYVK5DHKqE&action=embedview&wdAr=1.7777777777777777'-->
<!--                width='100%' height='60%' frameborder='0'></iframe>-->
        <iframe src="https://docs.google.com/presentation/d/114pri1tXzrA_OAQUF7ot8E8k4rjEb1rDAifGewlE0SM/embed?start=false&loop=false&delayms=60000"
                frameborder="0" width="90%" height="55%" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>    </div>

        <br><br>
        <iframe src="https://docs.google.com/presentation/d/1TAwyYnpl1b_AkaRGLmOjLMVQCmOA70uX4xfMWh9ovHk/embed?start=false&loop=false&delayms=60000"
                frameborder="0" width="90%" height="55%" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

    <table>
        <tr>
            <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
            <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
    <br>
</div>
</div>
</body>
</html>