<?php

  $user = new User();
  if(isset($_SESSION['token']) && !empty($_SESSION['token'])) {
    $user_info = $user->getUserbySessionToken($_SESSION['token']);
    if(!isset($user_info[0]->session_token) || empty($user_info[0])) {
      redirect('logout');
    } 
  } else {
    redirect('login', 'error', 'You must log in ');
  }
?>