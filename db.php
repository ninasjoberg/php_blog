<?php

class Database{

  public function connection() {

  return new PDO(
    "mysql:host=localhost;dbname=nmnBlog;charset=utf8",
    "root",
    "root", [ 
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false
    ]);
  }
} 


   



