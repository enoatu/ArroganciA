<?php
session_start();

switch ($howtodisp) {
    case "HOME" :  //ツイート　チェック　ユーザ名　アカウント名　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";
        echo "<th>", "トレンド", "</th>";


        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {
            //            if(mb_strpos($row['trend'],"#")!==false){

            $row2['trend'] = str_ireplace("#", "%23", $row['trend']);
            $https = "https://twitter.com/search?q=".$row2['trend']."&src=typd&lang=ja";
            echo "<tr class='tr2'>";
            echo "<td onclick=\"window.open('$https')\" class='td32'>", es($row['trend']), "</td></label>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;
    default:
        //ツイート　チェック　ユーザ名　アカウント名　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";
        echo "<th style=''>", "テーブル", "</th>";
        echo "<th style='padding:0 10%; table-layout:fixed;'>", "メモ", "</th>";
        echo "<th>", "日時", "</th>";


        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {
            //            if(mb_strpos($row['trend'],"#")!==false){
            $val = $row['id'];
            echo "<tr class='tr2'>";
            echo "<label><td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['id']), "</td>";
            echo "<label><td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['memo']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['input_time']), "</td></label>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
}
?>
