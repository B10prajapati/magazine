<?php
  include $_SERVER['DOCUMENT_ROOT'].'config/init.php';

  $schema = new Schema();

  $table = array(
    'users' => "
      CREATE TABLE IF NOT EXISTS users
        (
          id int not null AUTO_INCREMENT PRIMARY KEY,
          username varchar(50),
          email varchar(150) UNIQUE KEY,
          password varchar(200),
          session_token text,
          activation_token text,
          password_reset_token text,
          role enum('Admin', 'Staff') default 'Staff',
          status enum('Active', 'Passive')  default 'Passive',
          added_by int,
          created_data datetime default current_timestamp,
          updated_date datetime on update current_timestamp
        )
    ",
    'superuser' => "
      INSERT into users SET
        username = 'Admin',
        email = 'admin@magazine.com',
        password = '".sha1('admin@magazine.comadmin123')."',
        role = 'Admin',
        status = 'Active'
    "
  );

  foreach ($table as $key => $sql) {
    try {
      $success = $schema->create($sql);
      if ($success) {
        echo "Query User Executed Successfully";
      } else {
        echo "Problem While Execution Query :".$key;
      }
    } catch(PDOException $e) {
      error_log(Date("M d, Y h:i:s a").' : (Get Data From Query) : '.$e->getMessage(), 3, ERROR_PATH.'error.log');
        return false;
    }
  }
?>