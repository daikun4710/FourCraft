<?php
session_start();
require_once '../database/DBManager.php';
$dbmng = new DBManager();

$product_id = 1;
//$product_id = $_GET['product_id'];
//即決価格を取得
$productArray = $dbmng->getProductListByProduc_id($product_id);
foreach ($productArray as $row) {
  $buyout_price= $row['buyout_price'];
}
//落札処理 
if(isset($_POST['buyBtn'])){
  $sold_out=1;
  $result=$dbmng->productBidDecide($buyout_price,$sold_out,$_SESSION['id'],$product_id);
  if($result == true){
    $_SESSION['amount'] =$buyout_price;//金額をセッションで次ページへ
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>即決画面</title>



    <style>
     

      header {
        position: absolute;
          display: flex;
          width: 100%;
          height: 50px;
          background-color: #FFE27B;
          align-items: center;
         
        }
        
      #title {
         
          background:#FFE27B;
          height: 50px;
          top: 50%;
          display: flex;
          justify-content: center; 
          align-items: center; 
        }
        
      .menu-item {
          list-style: none;
          display: inline-block;
          padding: 10px;
          position: absolute;
          right: 0;
          top: -20px;
          z-index: 9999;
          font-size: 40px;
        }

      .bg-ddd{
          width:auto;
          height:150px;
          background-color:#f5f5f5;
        }

      .button_solid001 a {
          position: relative;
          display: flex;
          justify-content: space-around;
          align-items: center;
          margin: 0 auto;
          max-width: 240px;
          padding: 5px 25px;
          color: #313131;
          transition: 0.3s ease-in-out;
          font-weight: 600;
          background: #eee;
          filter: drop-shadow(0px 2px 4px #ccc);
          border-radius: 3px;
        }
      .button_solid001 a:hover {
          transform: translateY(-2px);
          box-shadow: 0 15px 30px -5px rgb(0 0 0 / 15%), 0 0 5px rgb(0 0 0 / 10%);
        }      

        .lead{
          font-size:20px;
        }
        
        @media screen and (max-width: 600px) {
          #label{
            font-size: 1px;
          }

        }

        

        @media screen and (max-width: 700px) {
          .title{
            left:40%;
          }
        }
    </style>

    
  </head>
  <body>

    <div>
      <h2 id="title">今すぐ落札</h2>
      <a href="ProductDetailUnconfirmed.php" class="menu-item" style="text-decoration: none;">×</a>
    </div>

<main>
      <div style = "display:flex; align-items:center;">
        <img src=./images/Logo.png width=100 class="mx-auto" vspace="50">
      </div>
      <div class="bg-ddd" style="width: auto; padding-top: 20px;">
          <div style="display:flex;">
            </div>
            <p class="lead text-center" style="margin-top: 20px;">以下の金額で今すぐ落札できます。</p>
          <p class="lead text-center" style="margin-top: 20px;">即決価格<?php echo $buyout_price; ?>円</p>
      </div>

      <p>

      <form method="post" action="" name="BuyForm">
      <div class="button_solid001" style="margin-top: 50px;">
        <a href="#" style="text-decoration: none;">落札する</a>
      </div>
      </p>

      <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</main>
  
</body>
        <a href="DicideCompletion.php" style="text-decoration: none;">落札する</a>
        <input type="hidden" name="buyBtn">
        <a href="javascript:BuyForm.submit()" style="text-decoration: none;">落札する</a>
      </div>
      </form>
      </p>

</main>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>