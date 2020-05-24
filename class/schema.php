<?php


  class Schema extends Database {
    function __contruct() {
      database::__contruct();
    }

    function create($sql) {
      return $this->runQuery($sql);
    }
  }
?>