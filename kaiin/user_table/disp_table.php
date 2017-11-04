<?php
switch ($_SESSION['disp']) {
    case 0:
//ツイート　チェック　ユーザ名　アカウント名　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";

        echo "<th style='padding:0 10%; table-layout:fixed;'>", "ツイート", "</th>";
        echo "<th>", "選択", "</th>";
        echo "<th>", "ユーザー名", "</th>";
        echo "<th>", "アカウント名", "</th>";
        echo "<th>", "time", "</th>";


        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {

            $val = $row['tweet_id'];
//            $url = 'https://twitter.com/' . $screen_name . '/status/' . $tweet_id;
            $url = 'https://twitter.com/' . es($row['アカウント名']) . '/status/' . es($row['tweet_id']);

            echo "<tr class='tr2'>";
            echo "<td onclick=\"window . open('$url')\" class='td32'>", es($row['ツイート']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i'  name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['ユーザー名']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['アカウント名']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['time']), "</td>";

            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;

    case 1:
        //ツイート　チェック　ユーザ名　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";

        echo "<th style='padding:0 10%; table-layout:fixed;'>", "ツイート", "</th>";
        echo "<th>", "選択", "</th>";
        echo "<th>", "ユーザー名", "</th>";
        echo "<th>", "time", "</th>";


        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {

            $val = $row['tweet_id'];
            $url = 'https://twitter.com/' . es($row['アカウント名']) . '/status/' . es($row['tweet_id']);

            echo "<tr class='tr2'>";
            echo "<td onclick=\"window . open('$url')\" class='td32'>", es($row['ツイート']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['ユーザー名']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['time']), "</td>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;

    case 2:
//ツイート　チェック　アカウント名　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";

        echo "<th style='padding:0 10%; table-layout:fixed;'>", "ツイート", "</th>";
        echo "<th>", "選択", "</th>";
        echo "<th>", "アカウント名", "</th>";
        echo "<th>", "time", "</th>";
        echo "</tr></thead>";
        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {
            $val = $row['tweet_id'];
            $url = 'https://twitter.com/' . es($row['アカウント名']) . '/status/' . es($row['tweet_id']);

            echo "<tr class='tr2'>";
            echo "<td onclick=\"window . open('$url')\" class='td32'>", es($row['ツイート']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['アカウント名']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['time']), "</td>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;
    case 3:
//ツイート　チェック　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";

        echo "<th style='padding:0 10%; table-layout:fixed;'>", "ツイート", "</th>";
        echo "<th>", "選択", "</th>";
        echo "<th>", "time", "</th>";
        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {

            $val = $row['tweet_id'];
            $url = 'https://twitter.com/' . es($row['アカウント名']) . '/status/' . es($row['tweet_id']);

            echo "<tr class='tr2'>";
            echo "<td onclick=\"window . open('$url')\" class='td32'>", es($row['ツイート']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['time']), "</td>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;

    case 4:
        //ツイート　チェック
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";

        echo "<th style='padding:0 10%; table-layout:fixed;'>", "ツイート", "</th>";
        echo "<th>", "選択", "</th>";
        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {

            $val = $row['tweet_id'];
            $url = 'https://twitter.com/' . es($row['アカウント名']) . '/status/' . es($row['tweet_id']);

            echo "<tr class='tr2'>";
            echo "<td onclick=\"window . open('$url')\" class='td32'>", es($row['ツイート']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;

    default:
        //ツイート　チェック　ユーザ名　日時
        echo "<table class='table0'>";
        echo "<thead class='thead1'><tr>";

        echo "<th style='padding:0 10%; table-layout:fixed;'>", "ツイート", "</th>";
        echo "<th>", "選択", "</th>";
        echo "<th>", "ユーザー名", "</th>";
        echo "<th>", "time", "</th>";


        echo "</tr></thead>";

        echo "<tbody class='ttt'>";
        $i = 0;
        foreach ($result as $row) {

            $val = $row['tweet_id'];
            $url = 'https://twitter.com/' . es($row['アカウント名']) . '/status/' . es($row['tweet_id']);

            echo "<tr class='tr2'>";
            echo "<td onclick=\"window . open('$url')\" class='td32'>", es($row['ツイート']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>",
            "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();show();\">", "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['ユーザー名']), "</td>";
            echo "<td onclick=\"getElementById('a+$i') . click();\" class='td32'>", es($row['time']), "</td>";
            echo "</tr>";

            $i++;
        }
        echo "</tbody>";
        echo "</table>";
        break;

}
?>
<!--<style>-->
<!--    .flexbody{-->
<!--        margin:2%;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .containerhead{-->
<!--        display: flex;-->
<!---->
<!---->
<!--    }-->
<!--    .boxtweet1{-->
<!--        flex:3 ;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxcheck1{-->
<!--        flex:1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxusername1{-->
<!--        flex: 1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxaccountname1{-->
<!--        flex: 1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxtime1{-->
<!--        flex: 1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .containerbody {-->
<!---->
<!--    }-->
<!--    .containerbodybody{-->
<!--        display: flex;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxtweet2{-->
<!--        flex:3 ;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxcheck2{-->
<!--        flex:1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxusername2{-->
<!--        flex: 1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxaccountname2{-->
<!--        flex: 1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--    .boxtime2{-->
<!--        flex: 1;-->
<!--        border: 1px solid #000;-->
<!---->
<!--    }-->
<!--</style>-->
<?php
//echo "<div class='flexbody'>";
//echo "<div class='containerhead'>";
////echo "<th>", "id", "</th>";
//echo "<div class='boxtweet1''>", "ツイート", "</div>";
//echo "<div class='boxcheck1'>","選択","</div>";
//echo "<div class='boxusername1'>", "ユーザー名", "</div>";
//echo "<div class='boxaccountname1'>", "アカウント名", "</div>";
////echo "<th>", "RT数", "</th>";
//echo "<div class='boxtime1'>", "time", "</div>";
//
//
//echo "</div>";
//
//echo "<div class='containerbody'>";
//$i=0;
//foreach ($result as $row) {
//
//    $val = $row['tweet_id'];
//
//    echo "<div class='containerbodybody'>";
//    //echo "<td onclick=\"getElementById('a+$i').click();\" class='td32'>", es($row['id']), "</td>";
//    echo "<div onclick=\"getElementById('a+$i') . click();\" class='boxtweet2'>", es($row['ツイート']), "</div>";
//    echo "<div onclick=\"getElementById('a+$i') . click();\" class='boxcheck2'>",
//    "<input type='checkbox' id='a+$i' name='check[]' value='$val' onclick=\"getElementById('a+$i') . click();\">","</div>";
////            "<input type='checkbox' id='a+$i' name='checkarr[]' value=''>","</label></td>";
//    echo "<div onclick=\"getElementById('a+$i') . click();\" class='boxusername2'>", es($row['ユーザー名']), "</div>";
//    echo "<div onclick=\"getElementById('a+$i') . click();\" class='boxaccountname2'>", es($row['アカウント名']), "</div>";
//
//    //echo "<td>", es($row['RT数']), "</td>";
//    echo "<div onclick=\"getElementById('a+$i') . click();\" class='boxtime2'>", es($row['time']), "</div>";
//
//    echo "</div>";
//
//    $i++;
//}
//echo "</div>";
//echo "</div>";
//?>
