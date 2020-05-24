<?php  
  include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
  // redirect('cms/index');

  $user = new user();
  $data = array(
    'username' => 'Khwopa',
    'session_token'=>tokenize()
  );
  $user->deleteUserByEmail('khwopa@magazine.com');
  