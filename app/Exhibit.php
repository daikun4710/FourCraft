<?php
session_start();
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
              padding-top:4.8%;
            }
        }
        @media screen and (max-width:991px){
            body{
              padding-top:55%;
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
          
              <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
              id ="logo">
              <img src="images/Logo.png" width="40" alt="ロゴ" class="ms-lg-0 me-3 me-lg-0">
              <use xlink:href="#bootstrap"></use>
              </a>

              <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ml-0">
              <li><a href="../ProductList.php" class="nav-link px-2 text-white">FourCraft</a></li>
              <li><a href="../Exhibit.php" class="nav-link px-2 text-white">商品を出品する</a></li>
              </ul>
          
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 ">
          <input type="search" class="form-control form-control-dark" placeholder="検索..." aria-label="Search">
          </form>
          
          <div class="text-end me-n5" id="headerBtn">
          <button type="button" onclick="location.href='../MyPage.php'"
            class="btn btn-outline-light me-2 me-lg-4">　　マイページ　　</button>
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
          <!-- <form action="" enctype="multipart/form-data" method="post"> -->
          <label for="formFile" class="form-label">画像を登録</label>
          <input class="form-control" type="file" id="formFile" name="productImg">
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
          <input type="text" id="text1" class="form-control">
        </div>
        
        <div style="display: flex;" class="mb-1">
          <label for="country" class="form-label">カテゴリ　　　</label>
          <select class="form-select" id="country" required="" wtx-context="2680039D-EAD9-4146-A7F1-3D74F8918917">
            <option value="">選択...</option>
            <option>服</option>
            <option>靴</option> 
            <option value="">アクセサリー</option>
            <option value="">グッズ</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        

        <div style="display: flex;" class="mb-1">
          <label for="country" class="form-label">商品の状態　</label>
          <select class="form-select" id="country" required="" wtx-context="2680039D-EAD9-4146-A7F1-3D74F8918917">
            <option value="">選択...</option>
            <option>新品</option>
            <option>使用感あり</option> 
            <option value="">傷あり</option>
            <option value="">ボロボロ</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        
    </div>

    <div class="col-1 mb-1">
      <p>価格</p>
    </div>
    <div class="col-md-5 col-11 mb-1">
          <div class="form-group" style="display: flex;">
            <input type="number" id="text1" class="form-control">
          </div>
    </div>
    
    <div class="col-1 mb-1">
      <p>即決価格</p>
    </div>
    <div class="col-md-5 col-11 mb-1">
      <div class="form-group" style="display: flex;">
        <input type="number" id="text1" class="form-control">
      </div>
    </div>

    <div class="col-1 mb-1">
      <p>終了日時</p>
    </div>
    <div class ="col-11 mb-1">
      <input type="date">
    </div>

    <div class="col-1 mb-1">
      <p>商品説明</p>
    </div>
    <div class ="col-11 mb-1">
      <div class="form-floating" style="display: flex;">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
      </div>
    </div>
    
    <div class="d-grid gap-2 col-3 mx-auto">
      <button class="btn btn-lg btn-info btn-opacity-50" type="button">出品する</button>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>