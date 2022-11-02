<?php
  class DBManeger {
    private function dbConnect(){
      // DB接続情報
      $dsn = 'mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1417814-fourcraft;charset=utf8mb4';
      $user = 'LAA1417814';
      $password = 'Pass0413';

      try{
      $dbh = new PDO($dsn, $user, $password);
      }catch (PDOException $e){
      print('Error:'.$e->getMessage());
      die();
      }

      return $dbh;
    }

    public function getProductList(){
      $pdo = $this->dbConnect();
      $sql = "SELECT * FROM Product";
      $selectdata = $pdo->query($sql);
      return $selectdata;
    }

  }
?>