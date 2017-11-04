<?php
/**
 * Created by PhpStorm.
 * User: adobe
 * Date: 2017/07/13
 * Time: 14:33
 */
function sql($table){
    switch ($table) {
       case "gl_app" :
            $sql = "SELECT tw.ツイート,tw.ユーザー名,tw.アカウント名,tw.time,tw.tweet_id
                FROM app_tb2 AS tw
                LEFT OUTER JOIN app_iineT ON tw.tweet_id =app_iineT.tweet_id
                WHERE tw.ツイート LIKE :worry
                AND (user_id<>:user_id OR user_id IS NULL)
                AND CHAR_LENGTH( tw.ツイート ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
        case "gl_site" :
            $sql = "SELECT tw.ツイート,tw.ユーザー名,tw.アカウント名,tw.time,tw.tweet_id
                FROM site_tb2 AS tw
                LEFT OUTER JOIN app_iineT ON tw.tweet_id =app_iineT.tweet_id
                WHERE tw.ツイート LIKE :worry
                AND (user_id<>:user_id OR user_id IS NULL)
                AND CHAR_LENGTH( tw.ツイート ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
        case "gl_service":
            $sql = "SELECT tw.ツイート,tw.ユーザー名,tw.アカウント名,tw.time,tw.tweet_id
                FROM service_tb2 AS tw
                LEFT OUTER JOIN app_iineT ON tw.tweet_id =app_iineT.tweet_id
                WHERE tw.ツイート LIKE :worry
                AND (user_id<>:user_id OR user_id IS NULL)
                AND CHAR_LENGTH( tw.ツイート ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
        case "gl_system":
            $sql = "SELECT tw.ツイート,tw.ユーザー名,tw.アカウント名,tw.time,tw.tweet_id
                FROM system_tb2 AS tw
                LEFT OUTER JOIN app_iineT ON tw.tweet_id =app_iineT.tweet_id
                WHERE tw.ツイート LIKE :worry
                AND (user_id<>:user_id OR user_id IS NULL)
                AND CHAR_LENGTH( tw.ツイート ) >=10
                ORDER BY tw.tweet_id DESC
                LIMIT 0,150";
            break;
    }
    return $sql;

}
//                 AND id >(SELECT COUNT(id) FROM system_tb2) - (SELECT COUNT(id) FROM system_iineT WHERE user_id=:user_id) -150
