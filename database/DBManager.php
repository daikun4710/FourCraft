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
    //商品IDで商品検索
    public function getProductListByProduc_id($product_id){
      $pdo = $this->dbConnect();
      $sql ="SELECT * FROM Product WHERE product_id = ?";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $product_id, PDO::PARAM_INT);
      $ps->execute();
      $selectdata = $ps->fetchAll();
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
    //入札、即決 (現在価格、売り切れフラグ、入札者IDを更新)
    public function productBidDecide($current_price,$sold_out,$user_id,$product_id){
      $pdo = $this->dbConnect();
      $sqlP ="UPDATE Product SET current_price=? ,sold_out=? WHERE product_id=? AND sold_out=false";
      $sqlB ="UPDATE Bid AS B 
      INNER JOIN Product AS P
      ON B.product_id = P.product_id 
      SET B.bit_user_id=? WHERE B.product_id =? AND P.sold_out=false";
      $psP = $pdo->prepare($sqlP);
      $psB = $pdo->prepare($sqlB);
      $psP->bindValue(1,$current_price, PDO::PARAM_INT);
      $psP->bindValue(2,$sold_out, PDO::PARAM_STR);
      $psP->bindValue(3,$user_id, PDO::PARAM_INT);
      $psB->bindvalue(1,$user_id,PDO::PARAM_INT);
      $psB->bindvalue(2,$product_id,PDO::PARAM_INT);
      $sthP = $psP->execute();
      $sthB = $psB->execute();
      // 更新できたらtrue
      if($sthP ->rowCount()==1&&$sthB ->rowCount()==1){
        return true;
      }else{
        return false;
      }
  }

    // public function productExhibit($product_id, $image, $product_name, $product_description, $){
    //   $pdo = $this->dbConnect();
    //   $sql ="INSERT INTO User (user_mail,user_password) VALUES (?,?)";
    //   $ps = $pdo->prepare($sql);
    //   $ps->bindValue(1, $mail, PDO::PARAM_STR);
    //   $ps->bindValue(2,password_hash($pass,PASSWORD_DEFAULT), PDO::PARAM_STR);
    //   $ps->execute();
    // }


  }
?>