<?php

include "../classes/User.php";
$user = new User;

//index.phpのform、postメソッドでaction="~送信先ディレクトリ"に送信される。$_POSTがレシーバー
$user->store($_POST);

?>
