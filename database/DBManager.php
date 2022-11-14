<?php
  class DBManager {
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

    public function setUser($mail,$pass){//新規登録
      $pdo = $this->dbConnect();
      $sql ="INSERT INTO User (user_mail,user_password) VALUES (?,?)";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $mail, PDO::PARAM_STR);
      $ps->bindValue(2,password_hash($pass,PASSWORD_DEFAULT), PDO::PARAM_STR);
      $ps->execute();
  }

    public function LoginUser($mail,$pass){//ログイン
      $pdo = $this->dbConnect();
      $sql ="SELECT * FROM User WHERE user_mail = ?";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $mail, PDO::PARAM_STR);
      $ps->execute();
      $selectdata = $ps->fetchAll();
      if(count($selectdata)<1){
          throw new BadMethodCallException("メールアドレスが存在しません");
      }
      foreach($selectdata as $row){
          if(password_verify($pass,$row['user_password'])==true){+
              return $selectdata;
          }else{
              throw new LogicException("パスワードが一致しません");
          }
      }
    }


  }
?>