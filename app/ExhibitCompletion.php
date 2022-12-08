<?php
session_start();
require_once '../database/DBManager.php';
$dbmng = new DBManager();

$product_id = $_POST['product_id'];
//$product_id = $_GET['product_id'];
//即決価格を取得
$productArray = $dbmng->getProductListByProduc_id($product_id);
foreach ($productArray as $row) {
    $image = $row['image'];//画像
    $product_name = $row['product_name'];//商品名
}
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
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>出品商品完了画面</title>
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

        
        @media screen and (min-width:992px){
        #header{
            width:100%;
            position:fixed;
            top:0;
            left:0;
            z-index: 9999;
        }

        #title{
            background:#FFC10780;
            width:100%;
            height:47.78px;
            font-size: 36px;
            font-weight: bolder;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 75px;
            /* position:fixed; */
            /* top:73px;
            left:0;
            z-index: 9999; */
        }
        #shohinmei{
            /* margin-top: 200px; */
            font-size: 200%;
            font-weight: bold;
           
        }
        #back{
            width:  400px; 
            height: 400px; 
            background-color: blue; 
            margin-top: 50px;                               
            margin-left: 8%;  
        }
        #exhibit_img{
            width: 50%;
            height: 30%;

        }
        #imgposi{
            text-align:center;
            margin-right:20% ;
        }
        #end{
            width: 80%;
            margin-top:1%;
            margin-bottom: 1.5%;
            font-size: 230%;
            font-weight: bolder;
            text-align:center;
        }
        #button{
            width:80%;  
            margin-top: 1%;
            font-size: 200%;
            font-weight: bolder;
            text-align: center;
        }

        #bb{

        }
        #block{
            width:50%;
            margin-left:50%;
            margin-top: -418px;
        }

        html {
            height: 100%;
            width: 100%;
        }
    }
        


    @media screen and (max-width:991px) { 
        #header{
            width:100%;
            position:fixed;
            top:0;
            left:0;
            z-index: 9999;
        }
        #title{
            background:#FFC10780;
            width:100%;
            height:60px;
            font-size: 36px;
            font-weight: bolder;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 222px;
            /* position:fixed;
            top:210px;
            left:0;
            z-index: 9999; */
        }
        #shohinmei{
            /* margin-top: 20px; */
            font-size: 200%;
            /* text-align: left; */
            font-weight: bold;
            
        }
        #back{
            height: 390px;
            width:  390px; 
            background-color: blue; 
            margin-top: 300px;                               
            margin-left: auto;
            margin-right: auto;
             
        }
        .order{
            flex-direction: column-reverse;
            display: flex;
            margin-top: -270px;
        }
        .yoko{
           display: flex; 

        }
        #exhibit_img{
            width: 100%;
            height: 100%;
        }
        #imgposi{
            margin-top: 5%;
            margin-right: 2%;           
            width: 20%;
            height: 12%;
            margin-bottom: 5%;
            margin-left: 12%;
        }
        #end{
            margin-top: 8%;
            font-size: 180%;
            font-weight: bolder;

        }
        #bb{
            text-align: center;
        }
        #button{
            width:80%;  
            margin-top: 1%;
            font-size: 170%;
            font-weight: bolder;
            text-align: center;
        }

            html {
            height: 100%;
            width: 100%;
            }
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




                <div id="title">
                  出品完了
                </div>
                <div class="order">
                    <!-- <div id="shohinmei"> -->
                        
                    <!-- </div> -->
                    <div id="back">
                    <?php
                        $img = base64_encode($image);
                        echo '<img src='.'"data:image/jpg;'.'base64,'.$img.'"'.'class="bd-placeholder-img card-img-top" width="100%" height="100% xmlns="http://www.w3.org/2000/svg"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"'.'>';
                        ?>
                    </div>
                </div>
                <div id="block">
                    <div class="center">
                        <div class="yoko">
                        <div id="shohinmei">
                            <?php
                            echo "(商品名)　".$product_name ;
                            ?>
                        </div>
                            <div id="imgposi">
                                <img src="images/hannma-.png" alt="ハンマの写真" id="exhibit_img"/>
                            </div>
                            <div id="end">
                                出品が完了しました！
                            </div>
                        </div>
                    </div>
                   <div id="bb"> 
                      <button type="button" class="btn btn-primary btn-lg" id="button">出品した商品を確認する</button><br>
                      <button type="button" class="btn btn-secondary" id="button">続けて確認する</button><br>
                   </div> 
                </div>
                     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>