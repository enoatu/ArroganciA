<?php
session_start();
require_once("../kaiin_utils.php");
$hoge=$_SESSION['navi'];
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/06/29
 * Time: 0:43
 */
$user_id=$_SESSION['user'];
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>設定ページ</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="apple-touch-icon" href="../images/ico.ico">
    <link rel="icon" href="../images/ico.ico">


    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="../images/ico.ico">
</head>
<body>

<div id="wrap"><?php gronavi($hoge);?>
</div>

<?php
if($_SESSION['from']=="gl"){
    insertLocal($user_id,$hoge);
    echo "<br><br><br><br><br><br><br><br><br><br><br>
    <h1 align='center'>ローカルテーブルにinsertされました</h1>";
}else if($_SESSION['from']=="lo"){
    deleteLocal($user_id,$hoge);
    echo "<br><br><br><br><br><br><br><br><br><br><br>
    <h1 align='center'>ローカルテーブルからdeleteされました</h1>";
}

function insertLocal($user_id,$hoge)
{

    $checkarr = $_POST['check'];
    try {
        foreach ($checkarr as $checkrow) {
            //セッションからuserを取り出す
            $regiTime = date('Y/m/d H:i');
            switch ($hoge) {
                case "gl_app":
                    $sql = "INSERT app_iineT(user_id,tweet_id,regiTime) VALUES(:user_id,:tweet_id,:regiTime)";
                    break;
                case "gl_site":
                    $sql = "INSERT site_iineT(user_id,tweet_id,regiTime) VALUES(:user_id,:tweet_id,:regiTime)";
                    break;
                case "gl_service":
                    $sql = "INSERT service_iineT(user_id,tweet_id,regiTime) VALUES(:user_id,:tweet_id,:regiTime)";
                    break;
                case "gl_system":
                    $sql = "INSERT system_iineT(user_id,tweet_id,regiTime) VALUES(:user_id,:tweet_id,:regiTime)";
                    break;
            }

            $stm = getDB()->prepare($sql);

            $stm->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stm->bindParam(':tweet_id', $checkrow, PDO::PARAM_STR);
            $stm->bindParam(':regiTime', $regiTime, PDO::PARAM_STR);
            $stm->execute();
        }
    } catch (Exception $e) {
        echo '<span class="error">insertエラーがありました</span><br>';
        echo $e->getMessage();
        exit();
    }
}



function deleteLocal($user_id,$hoge){
    $checkarr = $_POST['check'];
    try {
        foreach ($checkarr as $checkrow) {
            //セッションからuserを取り出す
          switch ($hoge){
              case "lo_app":$sql = "DELETE FROM app_iineT WHERE user_id=:user_id AND tweet_id = :checkrow";
          break;

          case "lo_site":$sql = "DELETE FROM site_iineT WHERE user_id=:user_id AND tweet_id = :checkrow ";
          break;
          case "lo_service":$sql = "DELETE FROM service_iineT WHERE user_id=:user_id AND tweet_id = :checkrow ";
          break;
          case "lo_system":$sql = "DELETE FROM system_iineT WHERE user_id=:user_id  AND tweet_id = :checkrow";
          break;}
          $stm = getDB()->prepare($sql);
            $stm->bindValue(':user_id', $user_id);
            $stm->bindValue(':checkrow', $checkrow);
            $stm->execute();
        }
    } catch (Exception $e) {
        echo '<span class="error">deleteエラーがありました</span><br>';
        echo $e->getMessage();
        exit();
    }
};

    ?>
    <style>body{
            background: url(/ArroganciA/kaiin/images/arro1.png);
        }</style>



</body>
</html>