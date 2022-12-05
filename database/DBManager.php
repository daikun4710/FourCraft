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

    //新規登録
    public function setUser($mail,$pass){
      $pdo = $this->dbConnect();
      $sql ="INSERT INTO User (user_mail,user_password) VALUES (?,?)";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $mail, PDO::PARAM_STR);
      $ps->bindValue(2,password_hash($pass,PASSWORD_DEFAULT), PDO::PARAM_STR);
      $ps->execute();
      echo "setUsertest";
  }

    //ログイン
    public function LoginUser($mail,$pass){
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
          if(password_verify($pass,$row['user_password'])==true){
              return $selectdata;
          }else{
              throw new LogicException("パスワードが一致しません");
          }
      }
    }

    public function productExhibit($image, $product_name, $product_description, $buyout_price, $current_price, $sold_out, $category, $condition, $end_date, $start_date, $exhibit_user_id){
      $pdo = $this->dbConnect();
      $sql ="INSERT INTO Product (image, product_name, product_description, buyout_price, current_price, sold_out, category, end_date, start_date) VALUES (?,?,?,?,?,?,?,?,?,?)";
      $ps = $pdo->prepare($sql);
      //product_idはAutoincrement
      //↓画像は入力先でいろいろ書かなきゃだめ
      $ps->bindValue(1, $image,PDO::PARAM_STR);
      $ps->bindValue(2, $product_name, PDO::PARAM_STR);
      $ps->bindValue(3, $product_description, PDO::PARAM_STR);
      $ps->bindValue(4, $buyout_price, PDO::PARAM_INT);
      $ps->bindValue(5, $current_price, PDO::PARAM_INT);
      $ps->bindValue(6, $sold_out, PDO::PARAM_BOOL);
      $ps->bindValue(7, $category, PDO::PARAM_STR);
      $ps->bindValue(8, $condition, PDO::PARAM_STR);
      $ps->bindValue(9, $end_date, PDO::PARAM_STR);
      $ps->bindValue(10, $start_date, PDO::PARAM_STR);
      $ps->execute();
    }

    //SELECTでproduct_idもってきてINSERTすればいい？

    public function userExhibit($exhibit_user_id){
      $pdo = $this->dbConnect();
      $selectSQL = "SELECT product_id FROM Product";
      $product_id = $pdo->query($selectSQL);

      $sql ="INSERT INTO Exhibit (product_id, exhibit_user_id) VALUES (?,?)";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $product_id, PDO::PARAM_STR);
      //sessionIDで取得する↓
      $ps->bindValue(2, $exhibit_user_id, PDO::PARAM_STR);
      $ps->execute();
    }

  }
?>