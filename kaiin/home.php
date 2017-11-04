<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
if($_SESSION['user']==32){
    require_once "kaiin_util_guest.php";
    //alert();

}else{
require_once "kaiin_utils.php";}
if(isset($_SESSION['hmdon'])){
    ?><script>alert("設定が反映されました")</script><?php
unset($_SESSION['hmdon']);}
$user_id=$_SESSION['user'];
// クエリの実行
try{
    $sql = "SELECT* FROM users WHERE user_id=:user_id";
    $stm = getDB()->prepare($sql);
    $stm->bindParam(':user_id', $user_id, PDO::PARAM_STR);
//$result = $pdo->query($query);

    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row){
        $username = $row['user_name'];
        $email = $row['user_email'];}

} catch (Exception $e) {
    echo '<span class="error">エラーがありました</span><br>';
    echo $e->getMessage();
    exit();
}

global $username;
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <title>ArroganciAのマイページ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">


    <!-- Bootstrap読み込み（スタイリングのため） -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="images/ico.ico">
    <link href = 'user_table/user_table_style.css' rel = 'stylesheet'>

    <style>
        .bodyflex{
            display:flex;
            height:750px;
            width: 100%;

        }

        .flexboxtrend{
            flex:1;
            display:flex;
            justify-content: center;
            /*flex-flow: column nowrap;*/
            align-items: center;
            height: 250px;
            width: 50%;
            overflow:visible;

        }
        .flexboxtweet{
            flex:3;
            display:flex;
            flex-direction:column;

        }

        .flexbox{
            border-radius: 10% 0 0 10% ;

            display:flex;
            flex:1;
            justify-content: center;
            align-items: center;
            height: 250px;
            width: 100%;
        }
        .flexbox2{
            display:flex;
            flex:1;
            justify-content: center;
            align-items: center;
            height: 250px;
            width: 100%;
        }
        .container{
            display: flex;
            flex: 1;
            flex-direction:column;
            justify-content: space-around;
            width: 100%;
            height: 100%;
            background-color: #bab6bb;

        }

        .box{ cursor: pointer;

            background-color: #ff90db;
            box-shadow: 3px 3px 5px #444;
            width: 95%;
            /*margin-left: 4px;*/
            border-radius: 10px;
        }
        .box2{ cursor: pointer;
            background-color: #fff924;
            box-shadow: 3px 3px 5px #444;
            width: 95%;
            border-radius: 10px;


        }
        .box3{ cursor: pointer;
            background-color: #00ff00;
            box-shadow: 3px 3px 5px #333;
            width: 95%;
            border-radius: 10px;

        }

        .box4{ cursor: pointer;
            background-color: #c6d6ff;
            box-shadow: 3px 3px 5px #444;
            width: 95%;
            border-radius: 10px;

        }
        .c:active{
               position: relative;
               top:3px;
           }
        .box5{
            flex: 1.4;
            display:flex;
            height: 500px;
            width: 100%;
            padding: auto;
        }
        .table0{
            margin:0;
        }
    </style>
    <!-- Google Analytics -->
<!--    <script>-->
<!--        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){-->
<!--                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),-->
<!--            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)-->
<!--        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');-->
<!---->
<!--        ga('create', 'UA-XXXXX-Y', 'auto');-->
<!--        ga('send', 'pageview');-->
<!--    </script>-->
    <!-- End Google Analytics -->
</head>
<body><div id="wrap"><?php gronavi("home");?>
    <br><br><br><br><br>
    <?php if($_SESSION['user']==32)
        //echo "<div class='alert alert-danger' role='alert' style=''>ゲストユーザーです。無料登録をお願いします。</div>";?>
<div id="home_wrap" align="center" style="max-width: 1000px;min-width: 522px; margin:0 auto;">
    <h1 class="kojin"><?php echo $username; ?>のHOME</h1>

    <div class="bodyflex">
        <div class="flexboxtrend">
            <?php
                require_once("../lib_es/util.php");
            $sql="SELECT* FROM (SELECT* FROM trend_tb ORDER BY id DESC LIMIT 0,50) AS a
         ORDER BY id LIMIT 0,20";
            $howtodisp="HOME";
            try{
                $stm = getDB()->prepare($sql);
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                echo "<div style='position: relative; top:120%;padding:-3%;cursor:pointer; '>
<button  class=\"button\" style='width: 250px;height:40px;  border-radius: 10%;cursor:pointer;' onclick=\"location.href='trend/trendchoose.php'\">詳しく見る</button>";

                include ("trend/trend_disp.php");

                echo "</div>";

            } catch (Exception $e) {
                echo '<span class="error">エラーがありました</span><br>';
                echo $e->getMessage();
                exit();
            }
            // データベースの切断
            //$result->close();
            $sql =null;
            $dsn= null;?>
        </div>
        <div class="flexboxtweet">
            <div class="flexbox" align="center" style="background-color: cornflowerblue;">
                <div class="container" >
                    <div class="box c" onclick="document.location.href ='user_table/gr/gl_app.php';"><h2>アプリ</h2></div>
                    <div class="box2 c" onclick="document.location.href ='user_table/gr/gl_site.php';"><h2>webサイト</h2></div>
                    <div class="box3 c" onclick="document.location.href ='user_table/gr/gl_service.php';"><h2>サービス</h2></div>
                    <div class="box4 c" onclick="document.location.href ='user_table/gr/gl_system.php';"><h2>システム</h2></div>
                </div>
                <div class="box5">
                    <img src="images/gt2.svg" height="100%" width="100%">
                </div>
            </div>
        <hr>
            <div class="flexbox2" align="center" style="background-color:#ff863a;">
                <div class="container">
                    <div class="box c" onclick="document.location.href ='/ArroganciA/kaiin/user_table/lc/lo_app.php';" ><h2>アプリ</h2></div>
                    <div class="box2 c" onclick="document.location.href ='/ArroganciA/kaiin/user_table/lc/lo_site.php';"><h2>webサイト</h2></div>
                    <div class="box3 c" onclick="document.location.href ='/ArroganciA/kaiin/user_table/lc/lo_service.php';"><h2>サービス</h2></div>
                    <div class="box4 c" onclick="document.location.href ='/ArroganciA/kaiin/user_table/gr/gl_system.php';"><h2>システム</h2></div>
                </div>
                <div class="box5">
                    <img src="images/lot.svg" height="100%" width="100%">
                </div>
            </div>
        </div>
    </div>
<!--<div class="hensyu"><a href="homehensyu.php">プロフィールを編集する</a></div><br>-->
<br><br><table>
    <tr>
        <td><div class="kojin" style="margin-top:140px;"><img src="images/2018pPiiP.gif" ></div></td>
        <td><div>We don't adapt SSL yet,but We got PIIP.</div></td></tr></table>
<br>
</div></div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php if($user_id == 32)
    echo "<script type=\"text/javascript\" src=\"homejs.js\"></script>";
    ?>
<!--    http://codeseven.github.io/toastr/demo.html-->
</body>
</html>

