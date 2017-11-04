<?php
session_start();
if( !isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>ArroganciAの使い方</title>
    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="../images/ico.ico">
    <link rel="apple-touch-icon" href="../images/ico.ico">
    <script src="https://cdn.logrocket.com/LogRocket.min.js"></script>
    <script>window.LogRocket && window.LogRocket.init('w4dvrb/arroganciaa');</script>
    <link rel="icon" href="../images/ico.ico"></head>

<body>
<iframe align="center" src='https://scitacjp-my.sharepoint.com/personal/s3701_scit_ac_jp/_layouts/15/guestaccess.aspx?docid=14ea0c6be70654f61bcaa9e4b58b60f78&authkey=AQptQsev1vd9-R_pmaCP0fU&action=embedview&wdAr=1.7777777777777777'
        width='500px' height='350px' frameborder='0'></iframe>
</body>
</html>