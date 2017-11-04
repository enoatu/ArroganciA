<?php
session_start();
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/07/29
 * Time: 21:59
 */

function trendsql ($ts)
{
    switch ($ts){
        case "lastnight" : $sql="";
        break;

        case "lastmorning" : $sql="";
        break;

        case "今から3時間": $sql="SELECT ROUND(SUM(50/rank),1) AS '重要度',trend FROM trend_tb WHERE 
        EXISTS (SELECT* FROM trend_tb t1,trend_tb t2 WHERE t1.trend=t2.trend) BETWEEN :getdated AND :getdate 
        GROUP BY trend 
        ORDER BY SUM(50/rank) DESC";
        break;
//        default :$sql="SELECT* FROM trend_tb";
//        break;

    }
    return $sql;
}