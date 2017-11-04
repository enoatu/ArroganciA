<?php
session_start();
$_SESSION['table_divide']="home";
if( !isset($_SESSION['user'])){
    header("Location: ../../index.php");
    exit();
}
$title="トレンド";
require_once("../../lib_es/util.php");
if($_SESSION['user']==32){
    require_once "../kaiin_util_guest.php";
}else{
    require_once "../kaiin_utils.php";}
require_once "trendsql.php";
?>
    <!DOCTYPE html>
    <?php require_once("../user_table/user_table_utils.php");

    createHeader($title);

    $user_id=$_SESSION['user'];

//    $_SESSION['from']="gl";

    $_SESSION['navi']=$_SESSION['table_divide'];

    $_SESSION['trendsql']=$_POST['kindofdisp'];
    ?>

    <body>
    <div id="top1"></div>
    <div align="center" id='wrap'>
        <br><br><br><br><br><br>
        <h1 id="h1"><?php echo $title;?></h1>
        <?php gronavi($_SESSION['table_divide']);?>

            <?php
            $h=$_POST['kindofdisp'];
            $now = date("Y-m-d H:i:s");
            if(mb_strpos($h,"a")!==false){
                $hna=str_replace("a","",$h);
                $getdateMin = date("Y-m-d H:i:s",strtotime("-$hna hour"));
                $getdateMax=$now;
            }else {
                switch ($h){
                    case "今日の朝":
                        $getdateMin = date("Y-m-d H:i:s",strtotime( "today 4:00:00" ));
                        $getdateMax = date("Y-m-d H:i:s",strtotime( "today 11:59:59" ));
                    break;
                    case "昨日":
                        $getdateMin = date("Y-m-d H:i:s",strtotime( "yesterday 00:00:00" ));
                        $getdateMax = date("Y-m-d H:i:s",strtotime( "yesterday 23:59:59" ));
                        break;
                    case "一週間":
                        $getdateMin = date("Y-m-d H:i:s",strtotime("-7 day"));
                        $getdateMax = date("Y-m-d H:i:s",strtotime( "yesterday 23:59:59" ));
                        break;

                }
            }


            try {

                $sql="SELECT ROUND(SUM(50/rank),1) AS '重要度',trend FROM trend_tb WHERE
        EXISTS (SELECT* FROM trend_tb t1,trend_tb t2 WHERE t1.trend=t2.trend )
        AND DATE_FORMAT(getdate, '%Y-%m-%d %H:%i:%s') BETWEEN :getdateMin AND :getdateMax
        GROUP BY trend
        ORDER BY SUM(50/rank) DESC
        LIMIT 0,100";
//                $sql="SELECT ROUND(SUM(50/rank),1) AS '重要度',trend FROM trend_tb WHERE
//        EXISTS (SELECT* FROM trend_tb t1,trend_tb t2 WHERE t1.trend=t2.trend
//        AND DATE_FORMAT(t1.getdate, '%Y-%m-%d %H:%i:%s') BETWEEN '2017-07-30 19:10:02' AND '2017-07-30 19:30:02')
//        GROUP BY trend
//        ORDER BY SUM(50/rank) DESC";
                    $stm = getDB()->prepare($sql);
                $stm->bindValue(":getdateMax",$getdateMax);
                $stm->bindValue(":getdateMin",$getdateMin);
                $stm->execute();
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                echo "<div style='position: relative; margin-right:4%'>";

                include ("trend_disp.php");

                echo "</div>";

            } catch (Exception $e) {
                echo '<span class="error">エラーがありました</span><br>';
                echo $e->getMessage();
                exit();
            }
            unset($_SESSION['sql_result'],$_SESSION['sunitized_search']);
            $_POST['check'];

            ?>

            <div><a href="#" id="returnz"><img src="../images/top.png"  width="40" height="40"  alt="top"></a></div>
            <div><a href="#botomn" id="botom"><img src="../images/botom.png" width="40" height="40"  alt="botom"></a></div>

    </div><div id="botomn"></div></body>
<?php createFooter();?>