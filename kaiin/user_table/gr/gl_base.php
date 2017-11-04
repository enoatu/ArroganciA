<?php
$_SESSION['table_divide'];
if( !isset($_SESSION['user'])){
    header("Location: ../../index.php");
    exit();
}
require_once("../../../lib_es/util.php");
if($_SESSION['user']==32){
    require_once "../../kaiin_util_guest.php";
}else{
    require_once "../../kaiin_utils.php";}
require_once("gl_sql.php")
?>
    <!DOCTYPE html>
    <?php require_once("../../user_table/user_table_utils.php");

    createHeader($title);

    $user_id=$_SESSION['user'];

    $_SESSION['from']="gl";

    $_SESSION['navi']=$_SESSION['table_divide'];

    ?>

    <body>
<div id="top1"></div>
    <div align="center" id='wrap'>
        <br><br><br><br><br><br>
        <h1 id="h1"><?php echo $title;?></h1>
        <?php gronavi($_SESSION['table_divide']);?>
        <form name="f1" method="post" action="../redirect.php">

            <?php
            try {
                if(($_SESSION['sql_result']!=null)) {
                    $result=$_SESSION['sql_result'];
                    echo "<h2>\"".$_SESSION['sunitized_search']."\"で検索中</h2>";

                }else{
                    $sql=sql($_SESSION['table_divide']);

                    $stm = getDB()->prepare($sql);
                    switch ($_SESSION['table_divide']){
                    case "gl_app":$stm->bindValue(':worry','%アプリ%');break;
                    case "gl_site": $stm->bindValue(':worry','%サイト%');break;
                    case "gl_service":$stm->bindValue(':worry','%サービス%');break;
                    case "gl_system":$stm->bindValue(':worry','%システム%');break;}
                    $stm->bindValue(':user_id', $user_id);
                    $stm->bindValue(':user_id', $user_id);
                    $stm->execute();
                    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                }

                echo "<div style='position: relative; margin-right:4%'>";
                include ("../disp_table.php");
                echo "</div>";

            } catch (Exception $e) {
                echo '<span class="error">エラーがありました</span><br>';
                echo $e->getMessage();
                exit();
            }
            unset($_SESSION['sql_result'],$_SESSION['sunitized_search']);
            $_POST['check'];
            ?>

            <div><a href="#" id="returnz"><img src="../../images/top.png" width="40" height="40" alt="top"></a></div>
            <div><a href="#botomn" id="botom"><img src="../../images/botom.png" width="40" height="40" alt="botom"></a></div>
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
<!--        <script>function show(){-->
<!--                if(document.f1.elements['check[]'].checked = true){-->
<!--                    document.getElementById("submit_btn").style.visibility="visible";-->
<!--                } else {-->
<!--                    document.getElementById("submit_btn").style.visibility="hidden";-->
<!--                }}</script>-->
<!--        <script>function show(){-->
<!--                if(document.f1.elements['check[]'].checked =true){-->
<!--                    document.getElementById("submit_btn").style.width=50;-->
<!--                    document.getElementById("submit_btn").style.height=50;-->
<!---->
<!--                } else {-->
<!--                    document.getElementById("submit_btn").style.width=0;-->
<!--                    document.getElementById("submit_btn").style.height=0;-->
<!---->
<!--                }}</script>-->

    </div><div id="botomn"></div></body>
<?php createFooter();?>