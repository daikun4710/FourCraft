<?php
session_start();
require_once '../database/DBManager.php';
$dbmng = new DBManager();
$loginFlag = false;
if(isset($_SESSION['id']) == true){
  //セッションあり
  $loginFlag =true;
}
if(isset($_POST['logoutBtn'])){
  //ログアウト
  session_destroy();
  header("Location: Login.php");
  exit();
}

if(isset($_POST['btn'])){
  if(is_uploaded_file( $_FILES['image']['tmp_name'])){
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $buyout_price = $_POST['buyout_price'];
    $current_price = $_POST['current_price'];
    $category = $_POST['category'];
    $condition = $_POST['condition'];
    $end_date = $_POST['end_date'];

    $dbmng->productExhibit($image, $product_name, $product_description, $buyout_price, $current_price, $category, $condition, $end_date);

    $who = $dbmng->getProductListByProduct_name($product_name);
    foreach ($who as $row) {
      $product_id = $row['product_id'];//商品ID
    }
    $dbmng->userExhibit($_SESSION['id'], $product_id);
    // $dbmng->test($_POST['category'],$_POST['condition']);
    header('Location: ExhibitCompletion.php?product_id='.$product_id);
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品出品画面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
                /* 992px以上の時に適用 */
        @media screen and (min-width:992px){
            #logo{
                margin-right: 3%;margin-left:-3%;
            }
            #headerBtn{
                margin-right:-4%;margin-left:1.5px
            }
            body{
              padding-top:75px;
            }
        }
        @media screen and (max-width:991px){
            body{
              padding-top:230px;
            }
        }
        /* ヘッダー固定 */
        #header{
            width:100%;
            position:fixed;
            top:0;
            left:0;
            z-index: 9999;
        }
        
    </style>
<header class="p-3 bg-dark text-white" id="header">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            
                <a href="./ProductList.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
                id="logo">
                <img src="./images/Logo.png" width="40" alt="ロゴ" class="ms-lg-0 me-3 me-lg-0">
                <use xlink:href="#bootstrap"></use>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ml-0">
                <li><a href="./ProductList.php" class="nav-link px-2 text-white">FourCraft</a></li>
                <?php
                  if($loginFlag == false){
                    //セッションがあれば
                    echo '<li><a href="./Login.php" class="nav-link px-2 text-white">商品を出品する</a></li>';
                  }else{
                    echo '<li><a href="./Exhibit.php" class="nav-link px-2 text-white">商品を出品する</a></li>';
                  }
                ?>
                
                </ul>
            
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="検索..." aria-label="Search">
            </form>
            
            <div class="text-end me-n5" id="headerBtn">
              
            <?php
              if($loginFlag == false){
                //セッションがあれば
                echo '<button type="button" onclick="location.href=' , "'./Login.php'" , '" 
                class="btn btn-outline-light me-2">ログイン</button>',
                '<button type="button" onclick="location.href=' ,"'./Register.php'" ,'" 
                class="btn btn-warning">新規登録</button>';
              }else{
                //ログアウトボタン
                echo '<form action="" method="post">';
                echo '<button type="submit" onclick="location.href=' , "'./MyPage.php'" , '"
                class="btn btn-outline-light me-2 me-lg-4" name="logoutBtn">　　ログアウト　　</button>';
                echo '</form>';
              }
            ?>
            
            </div>
            
        </div>
        </div>
    </header><!-- ↑ ヘッダー -->
</head>
  <body>
    <div class="container-fluid">
      <div class ="row">
        <div class="h1 col-12 themed-grid-col text-center
        bg-warning bg-opacity-50 mb-0">商品情報入力</div>
        <div class="h3 col-12 themed-grid-col
        bg-secondary bg-opacity-10">商品の情報</div>
      </div>
      <div class="row featurette">



      <div class="col-md-3">
          <div class="mb-3">

            <form action="" enctype="multipart/form-data" method="post">
            <label for="formFile" class="form-label">画像を登録</label>
            <input class="form-control" type="file" id="formFile" name="image">
            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit"
              class="btn btn-info btn-opacity-50 mt-1">アップロード</button>
            </div> -->
            <!-- </form> -->
          </div>
          <img src="" alt="" class="img-fluid" width="300px">
        </div>
        <div class="col-md-9">



        <div class="form-group mb-1" style="display: flex;">
            <label for="text1">商品名　　　</label>
            <input type="text" id="text1" class="form-control" name="product_name">
          </div>
          
          <div style="display: flex;" class="mb-1">
            <label for="country" class="form-label">カテゴリ　　　</label>
            <select class="form-select" id="country" required="" wtx-context="2680039D-EAD9-4146-A7F1-3D74F8918917" name="category">
              <option value="">選択...</option>
              <option value="服">服</option>
              <option value="靴">靴</option>
              <option value="アクセサリー">アクセサリー</option>
              <option value="グッズ">グッズ</option>
              <option value="その他">その他</option>
            </select>
            <div class="invalid-feedback">
              選択してください
            </div>
          </div>
          



        <div style="display: flex;" class="mb-1">
            <label for="country" class="form-label">商品の状態　</label>
            <select class="form-select" id="country" required="" wtx-context="2680039D-EAD9-4146-A7F1-3D74F8918917" name="condition">
              <option value="">選択...</option>
              <option value="新品">新品</option>
              <option value="使用感あり">使用感あり</option>
              <option value="傷あり">傷あり</option>
              <option value="ボロボロ">ボロボロ</option>
            </select>
            <div class="invalid-feedback">
              選択してください
            </div>
          </div>
          
      </div>



    <div class="col-1 mb-1">
        <p>価格</p>
      </div>
      <div class="col-md-5 col-11 mb-1">
            <div class="form-group" style="display: flex;">
              <input type="number" id="text1" class="form-control" name="current_price">
            </div>
      </div>
      
      <div class="col-1 mb-1">
        <p>即決価格</p>
      </div>
      <div class="col-md-5 col-11 mb-1">
        <div class="form-group" style="display: flex;">
          <input type="number" id="text1" class="form-control" name="buyout_price">
        </div>
      </div>



    <div class="col-1 mb-1">
        <p>終了日時</p>
      </div>
      <div class ="col-11 mb-1">
        <input type="date" name="end_date">
      </div>



    <div class="col-1 mb-1">
        <p>商品説明</p>
      </div>
      <div class ="col-11 mb-1">
        <div class="form-floating" style="display: flex;">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="product_description"></textarea>
        </div>
      </div>
      
      <div class="d-grid gap-2 col-3 mx-auto">
        <!-- <button class="btn btn-lg btn-info btn-opacity-50" type="button">出品する</button> -->
        <input type="submit" value="出品する" class="btn btn-lg btn-info btn-opacity-50" name="btn">
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  </body>
</html>