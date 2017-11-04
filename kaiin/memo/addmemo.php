<?php
session_start();
require_once ("../kaiin_utils.php");
$whichtable=$_SESSION['navi'];

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
$user_id=$_SESSION['user'];
$memo=$_POST['memo'];
?>

<?php
if($_SESSION['from']=="lo"){
    insertMemo($user_id,$memo,$whichtable);
    header("Location: memo.php");
    exit();
}else if($_SESSION['from']=="memo"){
    deleteLocal($user_id,$memo);
    echo "<br><br><br><br><br><br><br><br><br><br><br>
    <h1 align='center'>ローカルテーブルからdeleteされました</h1>";
}

function insertMemo($user_id,$memo,$whichtable)
{

    try {
        $regiTime = date('Y/m/d H:i:s');
            //セッションからuserを取り出す
        $sql = "INSERT users_memo(user_id,memo,whichtable,input_time) VALUES(:user_id,:memo,:whichtable,:input_time)";
            $stm = getDB()->prepare($sql);

            $stm->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stm->bindParam(':memo', $memo, PDO::PARAM_STR);
            $stm->bindParam(':input_time', $regiTime, PDO::PARAM_STR);
            $stm->bindValue(':whichtable',$whichtable);
            $stm->execute();
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
                case "app":$sql = "DELETE FROM app_iineT WHERE user_id=:user_id AND tweet_id = :checkrow";
                    break;

                case "site":$sql = "DELETE FROM site_iineT WHERE user_id=:user_id AND tweet_id = :checkrow ";
                    break;
                case "service":$sql = "DELETE FROM service_iineT WHERE user_id=:user_id AND tweet_id = :checkrow ";
                    break;
                case "system":$sql = "DELETE FROM system_iineT WHERE user_id=:user_id  AND tweet_id = :checkrow";
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



</body>
</html>