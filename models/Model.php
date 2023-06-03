<?php 
class Model
{
      private static $pdo;

      private static function setBdd(){
        
        self::$pdo = new PDO("mysql:host=localhost;dbname=famille;charset=utf8","root","");
      
        return self::$pdo;
      }

      protected function getBdd(){
                if (self::$pdo === null){
                     self::setBdd();
                }
                return self::$pdo;
      }
}