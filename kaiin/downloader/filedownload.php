<?php
if (isset($_POST["dlbtn"])) {

    $str = "あいうえお" . "\r\n";
    $str .= "かきくけこ" . "\r\n";
    $str .= "さしすせそ" . "\r\n";

    //ファイル出力
    $fileName = "file.txt";
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename='.$fileName);
    echo mb_convert_encoding($str, "SJIS", "UTF-8");  //←UTF-8のままで良ければ不要です。
    exit;
}
?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>FileDownloadTest</title>
</head>
<body>
<form action="./filedownload.php" method="post">
    <input type="submit" name="dlbtn" value="ダウンロード" />
</form>
</body>
</html>
<?php
if (isset($_POST["dlbtn"])) {
foreach ($result as $row) {

    $str .= es($row['ツイート']) . "\r\n";
}

    //ファイル出力
    $fileName = "arrogancia_output.txt";
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename='.$fileName);
    echo mb_convert_encoding($str, "SJIS", "UTF-8");  //←UTF-8のままで良ければ不要です。
    exit;
}
?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>FileDownloadTest</title>
</head>
<body>
<form action="<?php echo $_SESSION['navi'] ?>" method="post">
    <input type="submit" class="dlbtn" name="dlbtn" value="ダウンロード" />
</form>
</body>
</html>
