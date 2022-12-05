<?php
session_start();
require_once '../database/DBManager.php';
$dbmng = new DBManager();

$product_id = $_POST['product_id'];
//即決価格を取得
$productArray = $dbmng->getProductListByProduc_id($product_id);
foreach ($productArray as $row) {
  $buyout_price= $row['buyout_price'];
}
//落札処理 
//！！！！！　$_POST['buyBtn']　は仮名！！！！
if(isset($_POST['buyBtn'])){
  $result=$dbmng->productBidDecide($buyout_price,true,$_SESSION['id'],$product_id);
  if($result == true){
    header("Location: DicideCompletion.php");
  }else{
    echo "<script> alert('落札できませんでした。');
    location.href='ProductList.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>即決画面</title>
</head>
<body>
  <!-- 仮のhtml
  <script>
    ask = ()=>{
      return confirm('落札しますか？');
    }
  </script>
  <form method='post' action="" onsubmit="return ask()">
    即決価格 <?php 
    //echo $buyout_price?>　
    円
    <input type="submit" name="buyBtn" value="落札">
  </form> -->
</body>
</html>