<?php
session_start();
if( isset($_SESSION['user']) != "") {
	header("Location: home.php");
}
require_once "user_table/gr/getdb.php"
//require_once "kaiin_utils.php";
?>
<?php
if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password2 = $_POST['password2'];
        // クエリの実行
        $sql = "SELECT* FROM users WHERE user_email=:email";
        $stm = getDB()->prepare($sql);
    $stm->bindValue(':email', $email);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);


        foreach ($result as $row) {
            $db_hashed_pwd = $row['user_pass'];
            $user_id = $row['user_id'];
            $disp = $row['disp'];}

        $_SESSION['disp']=$disp;

        // データベースの切断
        //$result->close();
        $sql = null;
        $dsn = null;
        global $db_hashed_pwd, $user_id;
        // ハッシュ化されたパスワードがマッチするかどうかを確認
        if (password_verify($password2, $db_hashed_pwd)) {
            $_SESSION['user'] = $user_id;
            header("Location: home.php");
            exit;
        } else { ?>
            <div class="alert alert-danger" role="alert">メールアドレスとパスワードが一致しません。</div>
            <?php //print_r( $_SESSION['user']);print_r($result);
        }

} ?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ArroganciAのログインフォーム</title>
<link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="images/ico.ico">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">
</head>
<body>
    <div class="wrap" align="center" style="max-width: 1600px; margin:0 auto;">

<form method="post">
    <img src = "images/ico.ico" width = "200" height = "200">
	<h1>ArroganciAログインフォーム</h1>
	<div class="form-group"  style="width:60%;">
		<input type="email"  class="form-control" name="email" placeholder="メールアドレス" required />
	</div>
	<div class="form-group"  style="width:60%;">
		<input type="password" class="form-control" name="password2" placeholder="パスワード" required />
	</div>
    <button type="submit" class="btn btn-default" name="login"><b>ログインする</b></button>
    <button type="button" class="btn btn-default"  onclick="location.href='../index.php'">ゲストユーザーでつかう<button>
</form>

    <br><br><div style="background-color: #fff; padding:3%;margin:3%;border-radius: 30px"><h1 align="center">ArroganciAとは</h1><br><h2>
            超･リアルタイムな世界最速需要取得 webアプリケーション(!?)です。<br><br>アプリやwebサイト等を作りたいな、と思った時、何を作ればいいのかわからない。<br><br>
            そんな人はArroganciAを利用してみるのはいかがでしょうか？<br><br>ArroganciAを利用すれば現在進行形の流行に乗ることができ、<br><br>豊富にある組み込まれたリソースを駆使すれば需要のあるアプリ、webサイト、システム、サービス等の情報を入手し、管理することができます。
            </h2></div><br> <br>
        <table>
        <tr>
            <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
            <td><div>We don't adapt SSL yet,but We got PiiP.</div></td></tr></table>

    </div>
<!--<style>.tw{-->
<!--        width: 100px; height: 100px;-->
<!--        position: fixed;-->
<!--        z-index: 555;-->
<!--        right:50px;-->
<!--        top: 30px;-->
<!--    }-->
<!--</style>-->
<!--<div class="tw">-->
<!--    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>-->
<!--    <a class="twitter-timeline" data-tweet-limit="5" href="https://twitter.com/e72404356">Tweets by e72404356</a>-->
<!--</div>-->

</body>

</html>