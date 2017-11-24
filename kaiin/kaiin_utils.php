<?php
session_start();
include __DIR__."/../../atsushi/gtd.php";


    $gg= <<<"EOD"
    <style>
    #table1 {
   /*ういてるやつ*/
    background-color: #ffffff;
        border-collapse: collapse;
        padding-top: 50px;
           min-width:773px;
           max-height: 450px;}
        
.td1 {
    font-weight:bold ;
    border: solid 2px #fff;
        padding: 0.5em;   
        text-align:center;
        background-color: #bab6bb;
        cursor :pointer;
        color:#fff;
        text-shadow: 0 0 5px #999;
        font-size: 25px;
    }
    .td1:hover{
    color:#00f;
    }
    #rogo{padding: 1em;
  cursor :pointer;    
    }
#globalNavi{
	width: 100%;
	/*background:#333;*/
	position:fixed;
	top:0;
	
}
#globalNavi ul li a{
	background:#666;
	width: 20%;
	float: left;
	padding:20px 0;
	text-align: center;
	color: #fff;
	text-decoration: none;
	border-right: 1px solid #777;
	box-sizing: border-box;
}
#globalNavi ul li a:hover{
	background:#333;
}
    .fixed {
    center;
    position: fixed;
    top: 0;
    margin-left: -48px;
    width: 100%;
    z-index: 10;
}
/* スクロールする場所：固定ナビゲーションの高さ＋余白をpadding-topに指定 */
#content {
    padding: 0 0 0 0;
}
#wrap{ 
position relative;
    /*width: 800px;*/
    padding :40px;
    margin: 0 auto; 
    /*右左が自動で↑*/   
}
#returnz{
/*position :fixed;*/
/*padding-left: 89%;*/
/*top: 80%;*/
   /*z-index: 10000;*/
margin:0;
margin-left:1%;
position :fixed;
left:93.5%;
top:20%;
    z-index: 1000;
    width: 0;
}
#botom{
margin:0;
margin-left:1%;
position :fixed;
left:94%;
bottom:20%;
z-index: 100;
}
.dlbtn{
/*margin:0;*/
/*margin-left:1%;*/
/*position :fixed;*/
/*left:91%;*/
/*bottom:10%;*/
/*z-index: 100;*/

}
#submit_btn{background: url(/ArroganciA/kaiin/images/hairu.svg);
visibility: hidden;margin:0;
margin-left:-1.7%;
position :fixed;
left:96%;
bottom:50%;
    border: 0;

width: 50px;
height: 50px;
 /*left top no-repeat;*/
}
#delete_btn{background: url(/ArroganciA/kaiin/images/kesu.svg);
visibility: hidden;
margin:0;
margin-left:-1.7%;
position :fixed;
left:96%;
bottom:50%;

    border: 0;
width: 50px;
height: 50px;

 /*left top no-repeat;*/
}
 #submit_btn:hover{
	cursor: pointer;
}
#delete_btn:hover{
	cursor: pointer;
}

.addsearch{
height: 100%;
width: 80%;
padding:2% 10%;
font-size:1.2em;
margin-left:18%;

}
.addsearchsubmit{
z-index: 555;
font-size: 1.3em;
}

        
.tds {
    font-weight:bold ;
    border: solid 2px;
        padding: 0;   
        text-align:center;
        cursor :pointer;
        color:#fff;
        text-shadow: 0 0 5px #999;
        font-size: 25px;
    }

    </style>    
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<!--<script type="text/javascript">-->
<!--jQuery(function($) {-->
	<!--var nav = $('#globalNavi'),-->
	<!--offset = nav.offset();-->
	<!--$(window).scroll(function () {-->
	  <!--if($(window).scrollTop() > offset.top) {-->
	    <!--nav.addClass('fixed');-->
	  <!--} else {-->
	    <!--nav.removeClass('fixed');-->
	  <!--}-->
	<!--});-->
<!--});-->
<!--</script>-->
  <script type="text/javascript">
$(function(){
    $("a[href^=#botom]").click(function(){
        $('html, body').animate({
          scrollTop: $(document).height()
        },1500);
        return false;
    });
});

function textareaResize(event) {
    try {
        elem_id = event.srcElement.id;
    } catch ( e ) {
        elem_id = event.target.id;
    }
    var keycode = event.keyCode;
    if (keycode == 13) {
        var m = document.getElementById(elem_id);
        var r = m.getAttribute("rows");
        m.setAttribute("rows", parseInt(r)+1);
    }
}






</script>
EOD;
    echo $gg;
function gronavi($table){
    switch ($table){
        case "home": $i=<<<"EOD"
    <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/usecase.php';" class = "td1" id = "globalt">
    ArroganciAの使い方</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/kyouyuu.php';" class = "td1" id = "localt">
    共有する</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/request.php'; " class = "td1" height = "35" id = "youbou">要望・リクエスト</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>    
    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr>
    <!--<tr><td  height = "20" onclick = "insertLocal();">ぶちこむ</td></tr>-->
    </table>
    </div>
EOD;
            echo $i;
            break;

        case "gl_app": $i=<<<"EOD"
    <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/rogorogo.svg" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_app.php';" class = "td1" id = "globalt">
    グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_app.php';" class = "td1" id = "localt">
    ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table><table width="100%">
    <tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><input type="text" class="addsearch" name="search"
    placeholder="           検        索"></td>
<td><input type="submit" value="検索"  alt="検索" class="addsearchsubmit"></td>  
</form></tr>
    
    </table>
    </div>
EOD;
            echo $i;
        break;

        case "gl_site" : $i=<<<"EOD"
 <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_site.php';" class = "td1" id = "globalt">
    グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_site.php';" class = "td1" id = "localt">
    ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table><table width="100%">
    <tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><input type="text" class="addsearch" name="search"
     placeholder="         検        索"></td>
<td><input type="submit" value="検索"  alt="検索" class="addsearchsubmit"></td>    
</form></tr>
    </table>
    </div>

EOD;
            echo $i;
            break;
        case "gl_service":$i=<<<"EOD"
        <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_service.php';" class = "td1" id = "globalt">
    グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_service.php';" class = "td1" id = "localt">
    ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table><table width="100%">
    <tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><input type="text" class="addsearch" name="search"
     placeholder="         検        索"></td>
<td><input type="submit" value="検索"  alt="検索" class="addsearchsubmit"></td>   
</form></tr>
  
    </table>
    </div>
EOD;
            echo $i;
        break;
        case "gl_system":$i=<<<"EOD"
        <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_system.php';" class = "td1" id = "globalt">
                グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_system.php';" class = "td1" id = "localt">
                ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table><table width="100%">
    <tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><input type="text" class="addsearch" name="search"
    placeholder="         検        索"></td>
<td><input type="submit" value="検索"  alt="検索" class="addsearchsubmit"></td>    
</form></tr>
    
    </table>
    </div>
EOD;
            echo $i;
            break;
        case "lo_app": $i=<<<"EOD"
    <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/rogorogo.svg" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_app.php';" class = "td1" id = "globalt">
    グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_app.php';" class = "td1" id = "localt">
    ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table>
    <!--<table width="100%">-->
    <!--<tr><td><form method="POST" action="/ArroganciA/kaiin/memo/addmemo.php"><textarea style="height: 100%;-->
<!--width: 80%;-->
<!--padding:2% 10%;-->
<!--font-size:1.3em;-->
<!--margin-left:18%;" name="memo"-->
    <!--rows="1" cols="50" onkeydown="textareaResize(event)" placeholder="         メモを残す"></textarea></td>-->
<!--<td><input type="submit" value="メモ保存"  alt="検索" class="addsearchsubmit"></td>    -->
<!--</form></tr>-->
    <!---->
    <!--</table>-->
    </div>
EOD;
            echo $i;
            break;

        case "lo_site" : $i=<<<"EOD"
 <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_site.php';" class = "td1" id = "globalt">
    グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_site.php';" class = "td1" id = "localt">
    ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table>
    <!--<table width="100%">-->
    <!--<tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><textarea rows="2" cols="50" onkeydown="textareaResize(event)"-->
     <!--class="memo" name="memo" placeholder="         メモを残す"></textarea></td>-->
<!--<td><input type="submit" value="メモ保存"  alt="検索" class="addsearchsubmit"></td>    -->
<!--</form></tr>-->
    <!--</table>-->
    </div>

EOD;
            echo $i;
            break;
        case "lo_service":$i=<<<"EOD"
        <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_service.php';" class = "td1" id = "globalt">
    グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_service.php';" class = "td1" id = "localt">
    ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    <!--</tr></table><table width="100%">-->
     <!--<tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><textarea class="memo" name="memo"-->
     <!--rows="2" cols="50" onkeydown="textareaResize(event)" placeholder="         メモを残す"></textarea></td>-->
<!--<td><input type="submit" value="メモ保存"  alt="検索" class="addsearchsubmit"></td>    -->
<!--</form></tr>-->
  <!---->
    <!--</table>-->
    </div>
EOD;
            echo $i;
            break;
        case "lo_system":$i=<<<"EOD"
        <div align = "center" id = "globalNavi" class="fixed">
    <table width = "100%" id = "table1">
    <tr>
    <th id = "rogo" rowspan = "2" onclick = "document.location.href = '/ArroganciA/kaiin/home.php';">
    <img src = "/ArroganciA/kaiin/images/mini.PNG" width = "89" height = "86"></th>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/gr/gl_system.php';" class = "td1" id = "globalt">
                グローバルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/user_table/lc/lo_system.php';" class = "td1" id = "localt">
                ローカルテーブル</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/account.php';" class = "td1" id = "acount">アカウント</td>
    </tr>
    <tr class = "tr0" >
    <!-- 上のセルが伸張してくるのでここのthはなし -->
    <td onclick = "document.location.href = '/ArroganciA/kaiin/home.php';" class = "td1" height = "35" >HOME</td>
    <td onclick = "document.location.href = '/ArroganciA/kaiin/config.php';" class = "td1" height = "35" id = "settei">設定</td>    <td onclick = "document.location.href = '/ArroganciA/kaiin/logout.php?logout'; " class = "td1" height = "35" id = "logoutt">ログアウト</td>
    </tr></table>
    <!--<table width="100%">-->
     <!--<tr><td><form method="POST" action="/ArroganciA/kaiin/user_table/gr/addsearch.php"><textarea class="memo" name="memo"-->
   <!--rows="2" cols="50" onkeydown="textareaResize(event)"  placeholder="         メモを残す"></textarea></td>-->
<!--<td><input type="submit" value="メモ保存"  alt="検索" class="addsearchsubmit"></td>    -->
<!--</form></tr>-->
    <!---->
    <!--</table>-->
    </div>
EOD;
            echo $i;
            break;


    }
}





