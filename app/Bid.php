<?php
session_start();
require_once '../database/DBManager.php';
$dbmng = new DBManager();

$product_id = $_POST['product_id'];
//現在価格を取得
$productArray = $dbmng->getProductListByProduc_id($product_id);
foreach ($productArray as $row) {
  $current_price= $row['current_price'];
}
//入札処理 
if(isset($_POST['BidBtn']==true)){
  if($_POST['amountBid']>$current_price){
    
    $sold_out=false; //売り切れフラグ
    $amount = $_POST['BidBtn'];  //入札金額
   
    $result=$dbmng->productBidDecide($amount,$sold_out,$_SESSION['id'],$product_id);
    if($result == true){
      header("Location: BidCompletion.php");
    }else{
      echo "<script> alert('入札できませんでした。');
      location.href='ProductList.php';</script>";
    }
  }else{
    echo "<script> alert('現在価格よりも大きな金額を入力してください。');</script>";
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
  <title>入札ページ</title>


    <style>
      /* .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      } */

      header {
          display: flex;
          width: 100%;
          height: 50px;
          background-color: #FFE27B;
          align-items: center;
          position: relative;
        }
        
      .title {
          /* margin: auto; */
          position: absolute;
          left: 47%;
        }
        
      .menu-item {
          list-style: none;
          display: inline-block;
          padding: 10px;
          position: absolute;
          right: 0;
          top: -22%;
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
        
        @media screen and (max-width: 600px) {
          #label{
            font-size: 1px;
          }

        }
    </style>

    
  </head>
  <body>

  <header>
    <h2 class="title">入札</h2>
    <nav class="nav">
      <ul>
        <li class="menu-item"><a href="#" style="text-decoration: none;"><h2>×</h2></a></li>
      </ul>
    </nav>
  </header>
    
  <!-- <div class="navbar navbar-dark bg-warning shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-auto">
        <strong><font color="black">入札</font></strong>
      </a>
      <a href="#" class="navbar-brand d-flex align-items-right">
        <strong><font color="black">×</font></strong>
      </a>
    </div>
  </div> -->

<main>
  <form method="post" action="" name="BidForm">
      <div style = "display:flex; align-items:center; ">
        <img src=./images/Logo.png width=100 class="mx-auto" vspace="50">
      </div>
      <div class="bg-ddd" style="width: auto; padding-top: 20px;">
          <div style="display:flex;">
            <label for="staticEmail" colFormLabelLg" class="" $_GET style="margin-left: 18%;"><p id="label">入札額</p></label>
              <input type="bid" class="form-control form-control-lg w-50" id="inputBid" name="amountBid">
              <label for="staticEmail" colFormLabelLg" class="" $_GET style="margin-right: 18%;"><h2>円</h2></label>
            </div>
          <p class="lead text-center" style="margin-top: 20px;">現在価格　<?php echo $current_price ?>：円</p>
      </div>

      <p>
      <div class="button_solid001" style="margin-top: 50px;">
        <input type="hidden" name="BidBtn">
        <a href="javascript:BidForm.submit()" style="text-decoration: none;">入札する</a>
      </div>
      </p>
  </form>      
</main>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>