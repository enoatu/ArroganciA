<?php

if( !isset($_SESSION['user'])){
    header("Location: ../../index.php");
    exit();
}
require_once("../../../lib_es/util.php");
if($_SESSION['user']==32){
    require_once "../../kaiin_util_guest.php";
}else{
    require_once "../../kaiin_utils.php";}

?>
    <!DOCTYPE html>
    <?php require_once("../../user_table/user_table_utils.php");

    createHeader($title);

    $_SESSION['from']="lo";
    $user_id=$_SESSION['user'];
//    $_SESSION['user']=$user_id;


    ?>

    <body>
    <div align="center" id='wrap'> <?php gronavi($_SESSION['navi']);?>
        <br><br><br><br><form action="../downloader.php" method="post">
            <input type="hidden" name="navivi" value="<?php echo $_SESSION['navi'].".php" ?>">
            <p style="width:250px;padding:10px;background-color: #fff;">
                <span style="size: 2em;">表示中のツイートを <input type="submit"
                                                                                class="dlbtn" name="dlbtn" value="ダウンロード" />
                </span></p>
        <h1 id="h1"><?php echo $title; ?></h1>

        <form name="f1" method="post" action="../redirect.php">

            <?php
            try {

                // echo "データベース{$dbName}に接続しました。", "<br>";
                require_once "sql_lo.php";
                $sql=sql_lo( $_SESSION['navi']);

//     $sql = "SELECT ツイート,ユーザー名,アカウント名,time,tweet_id FROM app_tb2
//              WHERE id >(SELECT COUNT(id) FROM app_tb2) - 150 ORDER BY tweet_id DESC";

                $stm = getDB()->prepare($sql);
                $stm->bindValue(':user_id', $user_id);
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['result']=$result;

                echo "<div style='position: relative; margin-right:4%'>";
                include ("../disp_table.php");
                echo "</div>";


            } catch (Exception $e) {
                echo '<span class="error">エラーがありました</span><br>';
                echo $e->getMessage();
                exit();
            }

            $_POST['check'];

            ?>
            <div id="returnz"><a href="#"><img src="../../images/top.png" width="40" height="40"  alt="top"></a></div>
            <div><a href="#botomn" id="botom"><img src="../../images/botom.png" width="40" height="40"  alt="botom"></a></div>
            <input type="submit" value="" class="delete_btn"  id="delete_btn">
        </form>
        </form>
<!--        <script> var flag;-->
<!--            var obj = document.f1.elements['check[]'];-->
<!--            var len = obj.length;-->
<!--            function show() {-->
<!--                if (!len) {-->
<!--                    // checkboxが一つしかないときはこちらの処理-->
<!--                    // 有効なcheckboxだけチェックする-->
<!--                    if(obj.checked === true){-->
<!--                        flag = true;-->
<!--                    }else{flag=false;}-->
<!---->
<!---->
<!---->
<!--                    if (flag === true) {-->
<!--                        document.getElementById("delete_btn").style.visibility = "visible";-->
<!--                    } else {-->
<!--                        document.getElementById("delete_btn").style.visibility = "hidden";-->
<!--                    }-->
<!--                }-->
<!--                else {-->
<!--                    // checkboxが複数あるときはこちらの処理-->
<!--                    for (i = 0; i < len; i++) {-->
<!--                        if (obj[i].checked === true) {-->
<!--                            flag = true;-->
<!--                            break;-->
<!--                        }else{flag=false;}-->
<!---->
<!--                    }-->
<!--                    if (flag === true) {-->
<!--                        document.getElementById("delete_btn").style.visibility = "visible";-->
<!--                    } else {-->
<!--                        document.getElementById("delete_btn").style.visibility = "hidden";-->
<!--                    }-->
<!---->
<!--                }-->
<!--            }-->
<!--        </script>-->
        <script> var flag;
            var obj = document.f1.elements['check[]'];
            var len = obj.length;
            function show() {
                if (!len) {
                    // checkboxが一つしかないときはこちらの処理
                    // 有効なcheckboxだけチェックする
                    if(obj.checked === true){
                        flag = true;
                    }else{flag=false;}



                    if (flag === true) {
                        document.getElementById("delete_btn").style.visibility = "visible";
                    } else {
                        document.getElementById("delete_btn").style.visibility = "hidden";
                    }
                }
                else {
                    // checkboxが複数あるときはこちらの処理
                    for (i = 0; i < len; i++) {
                        if (obj[i].checked === true) {
                            flag = true;
                            break;
                        }else{flag=false;}

                    }
                    if (flag === true) {
                        document.getElementById("delete_btn").style.visibility = "visible";
                    } else {
                        document.getElementById("delete_btn").style.visibility = "hidden";
                    }

                }
            }
        </script>
    </div><div id="botomn"></div></body>
<?php createFooter();?>