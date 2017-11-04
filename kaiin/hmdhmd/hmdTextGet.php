<?php
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/07/02
 * Time: 21:55
 *　設定画面でcase文でｓｑｌをわけ、セレクトによって、
 * アカウント、IDの表示、非表示を変えることができる
 * スマホ版はツイートと日にちだけ
 *表示、入力　ツイートを
 *
 *
 */
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
require_once "hmdUtils.php";
//DBにあるものをもってくる
// クエリの実行
$sql = "SELECT* FROM hmdTextGet WHERE user_id=:user_id";
$stm = getDB()->prepare($sql);
$stm->bindValue(':user_id', $_SESSION['user']);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
$hmdId=$row['id'];
$hmdTextGroup=$row['textGroup'];
$text=$row['text'];
$hmdRegTime =$row['regTime'];
}
//つくる
$text="&&&&";
$exploded=explode($text,"&");
if(!isset($hmdTextGroup)){
    $hmdTextGroup="";

}
if(!isset($hmdText)){
    for($i=1;$i>6;$i++){
    $hmdText[$i]="";
    }
}else{
        $hmdText=[];
    }

?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>RIG（real time infomation get)を利用する</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="apple-touch-icon" href="../images/ico.ico">
    <link rel="icon" href="../images/ico.ico">


    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="../images/ico.ico">
<!--    <style>-->
<!--        textarea,#meado,#namae,#su{-->
<!--            /*基本のスタイル*/-->
<!--            display: block;-->
<!--            border-radius: 5px;-->
<!--            /*テキスト入力のエリアを調整*/-->
<!--            padding: 5%;-->
<!--            /* このプロパティを変更*/-->
<!--            border: solid 2px #ccc;-->
<!--            /*このプロパティを変更*/-->
<!--            box-shadow: none;-->
<!--            /*フォーカスしたときのトランジション設定 すべてのプロパティが0.5秒で切り替わる*/-->
<!--            transition: all 0.5s;-->
<!--        }textarea:focus {-->
<!--             /*フォーカスした時に影をつける*/-->
<!--             box-shadow: 0 5px 8px 0 rgba(0,0,0,0.4);-->
<!--             /*フォーカスした時に枠線を太く濃く*/-->
<!--             border: solid 2px #666;-->
<!--         }input:focus {-->
<!--              /*フォーカスした時に影をつける*/-->
<!--              box-shadow: 0 5px 8px 0 rgba(0,0,0,0.4);-->
<!--              /*フォーカスした時に枠線を太く濃く*/-->
<!--              border: solid 2px #666;-->
<!--          }</style>-->
</head>
<body>
<div id="wrap">
<!--    --><?php //gronavi("home");?>

    <div align="center" style="max-width: 1600px; margin:0 auto;">

        <br><br><br><br><br>

        <h1>hmdhmdを利用する</h1>
        <form method="post" action="setFinished.php">

            <input type="text" style="width: 50%;font-size:1.2em;" name="TextGroup" id="textGroup" placeholder="<?php echo $hmdTextGroup;?>" required><br>
            <input type="hidden" name="hmdon" value="Y">
            <input type="text" name="hmdText1" placeholder="<?php echo $hmdText[1]?>">
            <input type="text" name="hmdText2" placeholder="<?php echo $hmdText[2]?>">
            <input type="text" name="hmdText3" placeholder="<?php echo $hmdText[3]?>">
            <input type="text" name="hmdText4" placeholder="<?php echo $hmdText[4]?>">
            <input type="text" name="hmdText5" placeholder="<?php echo $hmdText[5]?>">


            <input type="submit" size="100%" id="su" style="font-size:1.3em;"  value="設定を確定する">

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

