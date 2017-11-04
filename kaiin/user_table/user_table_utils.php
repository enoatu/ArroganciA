<?php
/**
 * Created by PhpStorm.
 * User: enon51
 * Date: 2017/06/26
 * Time: 13:39
 *
 */
function createHeader($title){

    $header = <<< "EOD"
            <!DOCTYPE html>
            <html lang = "en">
            <head>
            <meta charset = "UTF-8">
           <link rel="apple-touch-icon" href="../../images/ico.ico">
    <link rel="icon" href=" ../../images/ico.ico">
    <!-- Bootstrap読み込み（スタイリングのため） -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">-->
    <link rel="shortcut icon" href="../../images/ico.ico">
            <link href = "/ArroganciA/kaiin/user_table/user_table_style.css" rel = "stylesheet">
           

            <title>{$title}</title>
            </head>
EOD;
    echo $header;
}


function createFooter(){
    $footer = <<<"EOD"
                </html>
EOD;

    echo $footer;
}
