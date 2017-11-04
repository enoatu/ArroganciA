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

$title="要望・リクエストページ";
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">


    <!-- Bootstrap読み込み（スタイリングのため） -->
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="images/ico.ico"><style>
        textarea,#meado,#namae,#su{
            /*基本のスタイル*/
            display: block;
            border-radius: 5px;
            /*テキスト入力のエリアを調整*/
            padding: 5%;
            /* このプロパティを変更*/
            border: solid 2px #ccc;
            /*このプロパティを変更*/
            box-shadow: none;
            /*フォーカスしたときのトランジション設定 すべてのプロパティが0.5秒で切り替わる*/
            transition: all 0.5s;
        }textarea:focus {
             /*フォーカスした時に影をつける*/
             box-shadow: 0 5px 8px 0 rgba(0,0,0,0.4);
             /*フォーカスした時に枠線を太く濃く*/
             border: solid 2px #666;
         }input:focus {
              /*フォーカスした時に影をつける*/
              box-shadow: 0 5px 8px 0 rgba(0,0,0,0.4);
              /*フォーカスした時に枠線を太く濃く*/
              border: solid 2px #666;
          }</style>
</head>
<body>
<div id="wrap"><?php gronavi("home");?>

    <div align="center" style="max-width: 1600px; margin:0 auto;">

        <br><br><br><br><br>

       <h1>要望・リクエスト</h1>
      <form method="post" action="request2.php">

        <input type="text" style="width: 50%;font-size:1.2em;" name="name" id="namae" placeholder="お名前" required><br>

        <input type="email" style="width: 50%;font-size:1.2em;" name="email" id="meado" placeholder="メールアドレス" required />
            <br>
            <textarea style="height:40%;width: 50%; font-size:1.5em;" placeholder="ご要望等がございましたらこちらにご記入ください" name="request" required></textarea><br><br>
                <input type="submit" size="100%" id="su" style="font-size:1.3em;"  value="送信する">
        </form>


        <!--        <div class="hensyu"><a href="homehensyu.php">プロフィールを編集する</a></div><br>-->
        <br><br><table>
            <tr>
                <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
                <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
        <br>
    </div>
</body>
</html>

