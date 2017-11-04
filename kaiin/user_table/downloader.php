<?php ini_set( 'display_errors', 1 );
session_start();
require_once("../../lib_es/util.php");
/**
 * Created by PhpStorm.
 * User: enoti
 * Date: 2017/08/23
 * Time: 2:49
 */
//require_once "gr/getdb.php";
//require_once "lc/sql_lo.php";
//$_SESSION['from']="lo";
//$user_id=$_SESSION['user'];
//
//$sql=sql_lo( $_SESSION['navi']);
//
////     $sql = "SELECT ツイート,ユーザー名,アカウント名,time,tweet_id FROM app_tb2
////              WHERE id >(SELECT COUNT(id) FROM app_tb2) - 150 ORDER BY tweet_id DESC";
//
//$stm = getDB()->prepare($sql);
//$stm->bindValue(':user_id', $user_id);
//$stm->execute();
//$result = $stm->fetchAll(PDO::FETCH_ASSOC);
$result=$_SESSION['result'];
if (isset($_POST["dlbtn"])) {
    $str="";
    foreach ($result as $row) {

        $str .= es($row['ツイート']) . "\r\n";
    }

    //ファイル出力
    $fileName = "arrogancia_output.txt";
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename='.$fileName);
//    echo mb_convert_encoding($str, "SJIS", "UTF-8");  //←UTF-8のままで良ければ不要です。
    echo $str;
    exit;
}

?>
<!--<meta http-equiv="refresh" content="0;URL=--><?php //$_POST['navivi'] ?><!--">-->
