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
      $sql = "SELECT * FROM Product ORDER BY product_id DESC";
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
    //キーワードで商品検索
    public function getProductListByKey($key){
      $pdo = $this->dbConnect();
      $sql = "SELECT * FROM Product WHERE product_name LIKE ? OR product_description LIKE ?";
      $ps= $pdo->prepare($sql);
      $ps -> bindValue(1,"%$key%",PDO::PARAM_STR);
      $ps -> bindValue(2,"%$key%",PDO::PARAM_STR);
      $ps -> execute();
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
      $sqlP ="UPDATE Product SET current_price=?, sold_out=?  WHERE product_id=? AND sold_out=?";

      $psP = $pdo->prepare($sqlP);

      $psP->bindValue(1,$current_price, PDO::PARAM_INT);
      $psP->bindValue(2,$sold_out, PDO::PARAM_INT);
      $psP->bindValue(3,$product_id, PDO::PARAM_INT);
      $psP->bindValue(4,0, PDO::PARAM_INT);
      
      $sthP = $psP->execute();

      $sqlB ="UPDATE Bid SET bit_user_id=? WHERE product_id =?";

      $psB = $pdo->prepare($sqlB);
      $psB->bindvalue(1,$user_id,PDO::PARAM_INT);
      $psB->bindvalue(2,$product_id,PDO::PARAM_INT);
      // $psP->bindValue(3,0, PDO::PARAM_INT);
      $sthB = $psB->execute();
      // 更新できたらtrue
      // if($sthP ->rowCount()==1&&$sthB ->rowCount()==1){
      //   return true;
      // }else{
      //   return false;
      // }
      return true;
  }
  //終了日時で売り切れフラグ更新
  public function updateSold_out(){
    $pdo = $this->dbConnect();
    $sql ="UPDATE Product SET sold_out=?  WHERE end_date <= ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,1, PDO::PARAM_INT);
    $ps->bindValue(2,date('Y-m-d'), PDO::PARAM_STR);
    $ps->execute();
  }

  //出品処理
  public function productExhibit($image, $product_name, $product_description, $buyout_price, $current_price, $category, $condition, $end_date){
    $pdo = $this->dbConnect();
    $sql ="INSERT INTO Product VALUES (0,?,?,?,?,?,?,?,?,?,?)";
    $ps = $pdo->prepare($sql);
    //product_idはAutoincrement
    //↓画像は入力先でいろいろ書かなきゃだめ
    $ps->bindValue(1, $image, PDO::PARAM_STR);
    $ps->bindValue(2, $product_name, PDO::PARAM_STR);
    $ps->bindValue(3, $product_description, PDO::PARAM_STR);
    $ps->bindValue(4, $buyout_price, PDO::PARAM_INT);
    $ps->bindValue(5, $current_price, PDO::PARAM_INT);
    $ps->bindValue(6, 0, PDO::PARAM_INT);
    $ps->bindValue(7, $category, PDO::PARAM_STR);
    $ps->bindValue(8, $condition, PDO::PARAM_STR);
    $ps->bindValue(9, $end_date, PDO::PARAM_STR);
    $ps->bindValue(10, date('Y-m-d'), PDO::PARAM_STR);
    $ps->execute();
  }

  //誰が出品したか
  public function userExhibit($exhibit_user_id, $product_id){
    $pdo = $this->dbConnect();
    $sql ="INSERT INTO Exhibit (product_id, exhibit_user_id) VALUES (?,?)";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $product_id, PDO::PARAM_INT);
    //sessionIDで取得する↓
    $ps->bindValue(2, $exhibit_user_id, PDO::PARAM_INT);
    $ps->execute();
  }
  //商品名前で商品検索
  public function getProductListByProduct_name($product_name){
    $pdo = $this->dbConnect();
    $sql ="SELECT * FROM Product WHERE product_name = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $product_name, PDO::PARAM_STR);
    $ps->execute();
    $selectdata = $ps->fetchAll();
    return $selectdata;
    

  }

      //テストインサート
    //   public function test($mail,$pass){
    //     $pdo = $this->dbConnect();
    //     $sql ="INSERT INTO Exhibit (product_id, exhibit_user_id) VALUES (?,?)";
    //     $ps = $pdo->prepare($sql);
    //     $ps->bindValue(1, $mail, PDO::PARAM_STR);
    //     $ps->bindValue(2,$pass, PDO::PARAM_STR);
    //     $ps->execute();
    // }

    public function exhibitMypage($user_id){
      $pdo = $this->dbConnect();
      $sql ="SELECT * FROM Product INNER JOIN Exhibit ON Product.product_id = Exhibit.product_id 
             WHERE Exhibit.exhibit_user_id = ?";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1, $user_id, PDO::PARAM_INT);
      $ps->execute();
      $selectdata = $ps->fetchAll();
      return $selectdata;



    }



}

?>