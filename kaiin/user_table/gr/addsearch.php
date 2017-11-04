<?php
session_start();
require_once("../../../lib_es/util.php");
//not exception error
require_once("getdb.php");

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
if(isset($_SESSION['table_divide'])){

    if(isset($_POST['search'])) {

    //sunitizing
        $_SESSION['sunitized_search']=es($_POST['search']);// /%_escape
        $s=$_SESSION['sunitized_search'];
        //multiple
        //sent words (string)=>array
//        $arrayWords = str_split($_POST['search']);
//        foreach ($arrayWords as $a) {
//            //" ","  "=>","
//            if ($a == " " || $a == "　") {
//                $a = "OR";
//            }
//        }
//        $ImplodedStr = implode($arrayWords, "　OR　");
        //>space implode
        $user_id=$_SESSION['user'];

        switch ($_SESSION['table_divide']) {

            case "gl_app":
                $sql = "SELECT tw.ツイート,tw.ユーザー名,tw.アカウント名,tw.time,tw.tweet_id
                FROM app_tb2 AS tw
                LEFT OUTER JOIN app_iineT ON tw.tweet_id =app_iineT.tweet_id
                WHERE (user_id<>:user_id OR user_id IS NULL)
                AND tw.ツイート LIKE :search
                AND CHAR_LENGTH( tw.ツイート ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
                $stm = getDB()->prepare($sql);// AND id >(SELECT COUNT(id) FROM app_tb2) - (SELECT COUNT(id) FROM app_iineT WHERE user_id=:user_id) -150
                $stm->bindValue(':user_id', $user_id);
                $stm->bindValue(':user_id', $user_id);
               // $stm->bindValue(':worry',"%アプリ%");
                $stm->bindValue(':search',"%".$s."%");
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                //AND tw.ツイート LIKE :worry
                $_SESSION['sql_result']=$result;
                header("Location: gl_app.php");
                exit();
                break;

            case "gl_site":  $sql="SELECT site_tb2.ツイート,site_tb2.ユーザー名,site_tb2.アカウント名,site_tb2.time,site_tb2.tweet_id 
                FROM site_tb2
                LEFT OUTER JOIN site_iineT ON site_tb2.tweet_id =site_iineT.tweet_id
                WHERE (user_id<>:user_id OR user_id IS NULL)
                AND site_tb2.ツイート LIKE :search
                 ORDER BY site_tb2.tweet_id DESC
                  LIMIT 0,150";
                $stm = getDB()->prepare($sql); //AND id >(SELECT COUNT(id) FROM site_tb2) - (SELECT COUNT(id) FROM site_iineT WHERE user_id=:user_id) -150
                $stm->bindValue(':user_id', $user_id);
                $stm->bindValue(':user_id', $user_id);
//                $stm->bindValue(':worry','%サイト%');
                $stm->bindValue(':search',"%$s%");
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['sql_result']=$result;
                header("Location: gl_site.php");
                exit();
                break;

            case "gl_service":$sql="SELECT service_tb2.ツイート,service_tb2.ユーザー名,service_tb2.アカウント名,service_tb2.time,service_tb2.tweet_id 
                FROM service_tb2
                LEFT OUTER JOIN service_iineT ON service_tb2.tweet_id =service_iineT.tweet_id
                WHERE (user_id<>:user_id OR user_id IS NULL)
                AND service_tb2.ツイート LIKE :search
                 ORDER BY service_tb2.tweet_id DESC
                  LIMIT 0,150";
                $stm = getDB()->prepare($sql);//  AND id >(SELECT COUNT(id) FROM service_tb2) - (SELECT COUNT(id) FROM service_iineT WHERE user_id=:user_id) -150
                $stm->bindValue(':user_id', $user_id);
                $stm->bindValue(':user_id', $user_id);
//                $stm->bindValue(':worry','%サービス%');
                $stm->bindValue(':search',"%$s%");
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['sql_result']=$result;
                header("Location: gl_service.php");
                exit();
                break;

            case "gl_system": $sql="SELECT system_tb2.ツイート,system_tb2.ユーザー名,system_tb2.アカウント名,system_tb2.time,system_tb2.tweet_id 
                FROM system_tb2
                LEFT OUTER JOIN system_iineT ON system_tb2.tweet_id =system_iineT.tweet_id
                WHERE (user_id<>:user_id OR user_id IS NULL)
                AND system_tb2.ツイート LIKE :search
                ORDER BY system_tb2.tweet_id DESC
                 LIMIT 0,150";
                $stm = getDB()->prepare($sql); //AND id >(SELECT COUNT(id) FROM system_tb2) - (SELECT COUNT(id) FROM system_iineT WHERE user_id=:user_id) -150
                $stm->bindValue(':user_id', $user_id);
                $stm->bindValue(':user_id', $user_id);
//                $stm->bindValue(':worry','%システム%');
                $stm->bindValue(':search',"%$s%");
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['sql_result']=$result;
                header("Location: gl_system.php");
                exit();
                break;


        }

    }else{//add searching words is none exception
        switch (isset($_SESSION['table_divide'])){
       case "gl_app" :header("Location: gl_app.php");exit();break;
        case "gl_site" :header("Location: gl_site.php");exit();break;
        case "gl_service":header("Location: gl_service.php");exit();break;
        case "gl_system":header("Location: gl_system.php");exit();break;
        }}

}else{  //exception
    header("Location: ../../home.php");
    exit();
}

//redirect

/*post=>create $sql in here=>redirect=>gl_xxx.php */