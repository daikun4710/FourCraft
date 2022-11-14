!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>商品一覧ページ</title>
  <style>
  /* 992px以上の時に適用 */
        @media screen and (min-width:992px){
            #logo{
                margin-right: 3%;margin-left:-3%;
            }
            #headerBtn{
                margin-right:-4%;
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
</head>

<body>

<header class="p-3 bg-dark text-white" id="header">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
                id="logo">
                <img src="./images/Logo.png" width="40" alt="ロゴ" class="ms-lg-0 me-3 me-lg-0">
                <use xlink:href="#bootstrap"></use>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ml-0">
                <li><a href="./ProductList.php" class="nav-link px-2 text-white">FourCraft</a></li>
                <li><a href="./Login.php" class="nav-link px-2 text-white">商品を出品する</a></li>
                </ul>
            
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="検索..." aria-label="Search">
            </form>
            
            <div class="text-end me-n5" id="headerBtn">
            <button type="button" onclick="location.href='./Login.php'" 
            class="btn btn-outline-light me-2">ログイン</button>
            <button type="button" onclick="location.href='./Register.php'" 
            class="btn btn-warning">新規登録</button>
            </div>
            
        </div>
        </div>
    </header><!-- ↑ ヘッダー -->
    

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">商品一覧</h1>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <!-- <div class="col">
          <a href="ProductDetailUnconfirmed.php">
            <div class="card shadow-sm">
              <img src="../file/switch.jpg" class="bd-placeholder-img card-img-top" width="100%" height="300" xmlns="http://www.w3.org/2000/svg"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
            </rect></svg>

              <div class="card-body">
                <p class="card-text">商品名</p>
                <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">現在:<font color="#ff0000">○○円</font></small>
                </div>
              </div>
            </div>
          </a>
        </div> -->

        <?php
        require_once '../database/DBManager.php';
        $dbmng = new DBManeger();
      
        $searchArray = $dbmng->getProductList();

        foreach($searchArray as $row){
          // $img = base64_encode($row['image']);
          // echo "<img src="."data:image/jpg;"."base64,".$img.">"; 
          
          echo '<div class="col">';
          echo '<div class="card shadow-sm">';
          echo '<img src= '.'"data:image/jpg;"'.'"base64,"'.'"$img.">'; 
          echo '<div class="card-body">';
          // $name = $row['product_name'];
          // echo "<p class="."card-text"".$name"."></p>";
          // echo '<div class="d-flex" , "justify-content-between" , "align-items-center">';
          // echo '<small class="text-muted">'"現在:"'<font color=#ff0000>$row['current_price'],"円";,
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        ?>



      </div>
    </div>
  </div>

</main>



    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  

</body>


</html>