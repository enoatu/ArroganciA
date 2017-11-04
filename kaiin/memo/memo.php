<?php
session_start();
$_SESSION['table_divide']="home";
if( !isset($_SESSION['user'])){
    header("Location: ../../index.php");
    exit();
}
require_once("../../lib_es/util.php");
require_once ("../kaiin_utils.php");

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
        <h1 id="h1"><?php echo "メモ！";?></h1>
        <?php gronavi($_SESSION['table_divide']);?>
        <form name="f1" method="post" action="memo_redirect.php">
        <?php
        try {

            $sql="SELECT* FROM users_memo WHERE user_id=:user_id ORDER BY id";
            $stm = getDB()->prepare($sql);
            $stm->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            echo "<div style='position: relative; margin-right:4%'>";

            include ("memo_disp.php");

            echo "</div>";

        } catch (Exception $e) {
            echo '<span class="error">エラーがありました</span><br>';
            echo $e->getMessage();
            exit();
        }


        ?>

        <div><a href="#" id="returnz"><img src="../images/top.png"  width="40" height="40"  alt="top"></a></div>
        <div><a href="#botomn" id="botom"><img src="../images/botom.png" width="40" height="40"  alt="botom"></a></div>
        <input type="submit" value="" id="submit_btn" >
        <!--<div align="center">-->
        <!--    <input type="button" onclick="href=">次へ-->
        </form>
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
                        document.getElementById("submit_btn").style.visibility = "visible";
                    } else {
                        document.getElementById("submit_btn").style.visibility = "hidden";
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
                        document.getElementById("submit_btn").style.visibility = "visible";
                    } else {
                        document.getElementById("submit_btn").style.visibility = "hidden";
                    }

                }
            }
        </script>
    </div><div id="botomn"></div></body>
<?php createFooter();?>