<?php

class Database {

  // Connection settings
  const HOST  = "localhost";
  const DBNAME = ""; // Your databse name
  const LOGIN = ""; // Your login
  const PWD = ""; // Your password

  // Function to connect to the databse
  static public function DB() {
    $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::DBNAME , self::LOGIN, self::PWD);
    return $db;
  }

}
