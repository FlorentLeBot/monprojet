<?php

namespace Database;
use PDO;

class DBConnection {
    
  // Singleton
  private static $pdo = null;

  protected static function dbConnect() {
    
    if(isset(self::$pdo)) {
      return self::$pdo;
    } else {
      
      $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

      self::$pdo = 	
        new PDO(
          $path, 
          $_ENV['DB_USERNAME'], 
          $_ENV['DB_PASSWORD']
        );
	
      return self::$pdo;
    }
  }

}
