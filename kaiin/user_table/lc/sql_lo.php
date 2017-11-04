<?php
function sql_lo($a){
    switch ($a){
        case "lo_app" :$sql="SELECT app_tb2.ツイート,app_tb2.ユーザー名,app_tb2.アカウント名,app_tb2.time,app_tb2.tweet_id 
                FROM app_tb2
                LEFT OUTER JOIN app_iineT ON app_tb2.tweet_id =app_iineT.tweet_id
                WHERE user_id=:user_id
                ORDER BY app_iineT.tweet_id DESC";
        break;
        case "lo_site":$sql="SELECT site_tb2.ツイート,site_tb2.ユーザー名,site_tb2.アカウント名,site_tb2.time,site_tb2.tweet_id 
                FROM site_tb2
                LEFT OUTER JOIN site_iineT ON site_tb2.tweet_id =site_iineT.tweet_id
                WHERE user_id=:user_id
                ORDER BY site_iineT.tweet_id DESC";
        break;
        case "lo_service":$sql="SELECT service_tb2.ツイート,service_tb2.ユーザー名,service_tb2.アカウント名,service_tb2.time,service_tb2.tweet_id 
                FROM service_tb2
                LEFT OUTER JOIN service_iineT ON service_tb2.tweet_id =service_iineT.tweet_id
                WHERE user_id=:user_id
                ORDER BY service_iineT.tweet_id DESC";
        break;
        case "lo_system":$sql="SELECT system_tb2.ツイート,system_tb2.ユーザー名,system_tb2.アカウント名,system_tb2.time,system_tb2.tweet_id 
                FROM system_tb2
                LEFT OUTER JOIN system_iineT ON system_tb2.tweet_id =system_iineT.tweet_id
                WHERE user_id=:user_id
                ORDER BY system_iineT.tweet_id DESC";
            break;

    }
    return $sql;

}