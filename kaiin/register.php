<?php
session_start();
require_once "user_table/gr/getdb.php";
if( isset($_SESSION['user']) != "") {
    // ログイン済みの場合はリダイレクト
    header("Location: home.php");
}

    // signupがPOSTされたときに下記を実行
    if(isset($_POST['signup'])) {
    $username =$_POST['username'];
    $email = $_POST['email'];
        //$sql = "SELECT count(user_id) FROM users WHERE email= $email;
        //$stm = $pdo->prepare($sql);
        //$stm->execute();
        //
        //if()
    $password2 = $_POST['password2'];
  /*if($_POST['repassword']!==$_POST['password']){
       ?>
      <div class="alert alert-danger" role="alert">再入力されたパスワードが違います</div>
      <?php
  } */
//  echo $username;
  ?>
<?php
        $password2 = password_hash($password2, PASSWORD_DEFAULT);

    // POSTされた情報をDBに格納する
    $sql = "INSERT IGNORE users(user_name,user_email,user_pass) VALUES(:username,:email,:password)";
        $stm = getDB()->prepare($sql);
        //$stm = $pdo->prepare($sql);
        $stm->bindParam(':username', $username, PDO::PARAM_STR);
        $stm->bindParam(':email', $email, PDO::PARAM_STR);
        $stm->bindParam(':password', $password2, PDO::PARAM_STR);
        $stm->execute();

    if(getDB()->prepare($sql)) {  ?>
        <meta http-equiv="refresh" content="3;URL=index.php">
        <div class="alert alert-success" role="alert">登録しました。<h3><b>3秒後</b>にログイン画面に移動します。</h3></div>

<?php } else { ?>
    <div class="alert alert-danger" role="alert">エラーが発生しました。</div>
    <?php
}
}?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ArroganciA会員登録</title>

    <link rel="shortcut icon" href="images/ico.ico">
    <link rel="apple-touch-icon" href="images/ico.ico">
    <link rel="icon" href="images/ico.ico">


    <!-- Bootstrap読み込み（スタイリングのため） -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"></head>
<body>



    <div class="wrap" align="center">
        <img src = "/ArroganciA/kaiin/images/ico.ico" width = "200" height = "200">

    <form method="post">
        <h1>ArroganciA会員登録フォーム</h1>
        <div class="form-group" style="width:60%;">
            <input type="text" class="form-control" name="username" placeholder="ユーザー名" required />
        </div>
        <div class="form-group"  style="width:60%;">
            <input type="email"  class="form-control" name="email" placeholder="メールアドレス" required />
        </div>
        <div class="form-group" style="width:60%;">
            <input type="password" class="form-control" name="password2" placeholder="パスワード" required />
        </div>
        <!--<div class="form-group">
            <input type="password" class="form-control" name="repassword" placeholder="パスワード再入力" required />
        </div>-->
        <h2 align="center">利用規約</h2>
        <div align="left" style="width:80%;height:700px;overflow:auto;background:#fff;">


            <ul>

            この利用規約（以下，「本規約」といいます。）は，榎本敦士（以下製作者と称する）がこのウェブサイト上で提供するサービス（以下，「本サービス」といいます。）の利用条件を定めるものです。
            登録ユーザーの皆さま（以下，「ユーザー」といいます。）には，本規約に従って，本サービスをご利用いただきます。

                <li>第1条（適用）</li>

            本規約は，ユーザーと製作者との間の本サービスの利用に関わる一切の関係に適用されるものとします。

                <li>第2条（利用登録）</li>
            1.登録希望者が製作者の定める方法によって利用登録を申請し，製作者がこれを承認することによって，利用登録が完了するものとします。
            2.製作者は，利用登録の申請者に以下の事由があると判断した場合，利用登録の申請を承認しないことがあり，その理由については一切の開示義務を負わないものとします。
            （1）利用登録の申請に際して虚偽の事項を届け出た場合
            （2）本規約に違反したことがある者からの申請である場合
            （3）その他，製作者が利用登録を相当でないと判断した場合


                <li>第3条（ユーザーIDおよびパスワードの管理）</li>
            1.ユーザーは，自己の責任において，本サービスのユーザーIDおよびパスワードを管理するものとします。
            2.ユーザーは，いかなる場合にも，ユーザーIDおよびパスワードを第三者に譲渡または貸与することはできません。
            製作者は，ユーザーIDとパスワードの組み合わせが登録情報と一致してログインされた場合には，そのユーザーIDを登録しているユーザー自身による利用とみなします。

                <li>第4条（利用料金および支払方法）</li>
            1.ユーザーは，本サービス利用の対価として，製作者が別途定め，本ウェブサイトに表示する利用料金を，製作者が指定する方法により支払うものとします。
            2.ユーザーが利用料金の支払を遅滞した場合には，ユーザーは年１４．６％の割合による遅延損害金を支払うものとします。

                <li>第5条（禁止事項）</li>

            ユーザーは，本サービスの利用にあたり，以下の行為をしてはなりません。
            （1）法令または公序良俗に違反する行為
            （2）犯罪行為に関連する行為
            （3）製作者のサーバーまたはネットワークの機能を破壊したり，妨害したりする行為
            （4）製作者のサービスの運営を妨害するおそれのある行為
            （5）他のユーザーに関する個人情報等を収集または蓄積する行為
            （6）他のユーザーに成りすます行為
            （7）製作者のサービスに関連して，反社会的勢力に対して直接または間接に利益を供与する行為
            （8）ニンニクを食べた翌日に電車に乗る行為
            （9）その他，製作者が不適切と判断する行為

                <li>第6条（本サービスの提供の停止等）</li>
            1.製作者は，以下のいずれかの事由があると判断した場合，ユーザーに事前に通知することなく本サービスの全部または
            一部の提供を停止または中断することができるものとします。
            （1）本サービスにかかるコンピュータシステムの保守点検または更新を行う場合
            （2）地震，落雷，火災，停電または天災などの不可抗力により，本サービスの提供が困難となった場合
            （3）コンピュータまたは通信回線等が事故により停止した場合
            （4）その他，製作者が本サービスの提供が困難と判断した場合

            2.製作者は，本サービスの提供の停止または中断により，ユーザーまたは第三者が被ったいかなる不利益または損害について，
            理由を問わず一切の責任を負わないものとします。

                <li>第7条（利用制限および登録抹消）</li>
            1.製作者は，以下の場合には，事前の通知なく，ユーザーに対して，本サービスの全部もしくは一部の利用を制限し，
            またはユーザーとしての登録を抹消することができるものとします。 （1）本規約のいずれかの条項に違反した場合
            （2）登録事項に虚偽の事実があることが判明した場合
            （3）その他，製作者が本サービスの利用を適当でないと判断した場合

            2.製作者は，本条に基づき製作者が行った行為によりユーザーに生じた損害について，一切の責任を負いません。

                <li>第8条（免責事項）</li>
            1.製作者の債務不履行責任は，製作者の故意または重過失によらない場合には免責されるものとします。
            2.製作者は，何らかの理由によって責任を負う場合にも，通常生じうる損害の範囲内かつ有料サービスにおいては
            代金額（継続的サービスの場合には1か月分相当額）の範囲内においてのみ賠償の責任を負うものとします。
            3.製作者は，本サービスに関して，ユーザーと他のユーザーまたは第三者との間において生じた取引，
            連絡または紛争等について一切責任を負いません。

                <li>第9条（サービス内容の変更等）</li>

            製作者は，ユーザーに通知することなく，本サービスの内容を変更しまたは本サービスの提供を中止することができるものとし，
            これによってユーザーに生じた損害について一切の責任を負いません。

                <li>第10条（利用規約の変更）</li>

            製作者は，必要と判断した場合には，ユーザーに通知することなくいつでも本規約を変更することができるものとします。

                <li>第11条（通知または連絡）</li>

            ユーザーと製作者との間の通知または連絡は，製作者の定める方法によって行うものとします。

                <li>第12条（権利義務の譲渡の禁止）</li>

            ユーザーは，製作者の書面による事前の承諾なく，利用契約上の地位または本規約に基づく権利もしくは義務を第三者に譲渡し，
            または担保に供することはできません。

            <li>第13条（準拠法・裁判管轄）</li>
            1.本規約の解釈にあたっては，日本法を準拠法とします。
            2.本サービスに関して紛争が生じた場合には，製作者の本店所在地を管轄する裁判所を専属的合意管轄とします。

            以上
            </ul>
        </div>
        <button type="submit" class="btn btn-default" name="signup"><b>利用事項を理解した上で会員登録する</b></button>
        <button type="button" class="btn btn-default" onclick="location.href='index.php'">ログイン</button>
    </form>
    <br><br>
<!--    <h3>メールアドレスは現段階では”aaa＠aaa”など適当でも登録可能です。</h3>-->
    <br>
        <h3>パスワードは<a href="http://e-words.jp/w/%E3%83%8F%E3%83%83%E3%82%B7%E3%83%A5%E5%8C%96.html"><span style="background-color: #fff">ハッシュ化</span></a>
        されて保存されますので管理者には見えません。</h3>
    <br>    <br>    <br>
    <table>
        <tr>
            <td><div class="kojin"><img src="images/2018pPiiP.gif" ></div></td>
            <td><div>We don't adapt SSL yet,but We got PiiP.</div></td></tr></table>
    <br>
</div>

</body>



</html>
