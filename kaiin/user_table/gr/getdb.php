<?php
function getDB()
{
    $host = "localhost";
    $user = "user2";
    $password = "pass";
    $dbName = "user2db";
    $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

    $pdo = new PDO($dsn, $user, $password);
//プリペアドステートメントのエミュレーションを無効化
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//例外がスローされる設定にする
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}