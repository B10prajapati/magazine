<?php

  include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
  $user = new User();
  $datas = array('session_token' => "");
  $user->updateUserByEmail($datas, $_SESSION['user_email']);
  session_unset();
  redirect('login');
?>