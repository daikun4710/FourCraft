<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>マイページ</title>
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

        #user{
          margin-left: 0; 
          text-align: center;
          margin-top: 20px;
          }
        /* ヘッダー固定 */
   
         @media screen and (min-width:992px){
          #user{
            text-align: center;
            margin-left: 20%;
          }
          #userin{
            font-size: 200%;
            /* text-align: center; */
            /* width: 30%; */
            float: left;
          }
          #username{
            font-size: 150%;
          }
          #logout{
            font-size: 200%;
            padding: 5%;
            margin-bottom: 100px;
          }
         }
         .syuppin{
          background-color: #fc6d79;
          height: 50px;
          width: auto;
          margin-top: 20px;
          font-size: 30px;
          font-weight: bold;
          padding-left: 30px;
         }

  </style>
</head>
<body>

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
            <!-- 検索 -->
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="" method="POST"> 
            <input type="search" class="form-control form-control-dark" placeholder="検索..." aria-label="Search"
            name ="key">
            <input type="submit"  name="search" style="display:none;" /> 
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

  <div id="user">
    <div id="userin">
      <div id="icon">
        <img src="images/icon.png"width="150px"height="150px">
      </div>
      <p id="username">〇〇〇〇</p>
    </div>
      <div id="logout"><a href="Login.php">ログアウト</a></div>
  </div>

  <div class="syuppin">出品商品</div>

  <div class="album py-5 bg-light">
    <div class="container" style="margin-top: 50px;">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

      </div>
    </div>
  </div>

  <div class="syuppin">落札商品</div>
  <div class="album py-5 bg-light">
    <div class="container" style="margin-top: 50px;">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

      </div>
    </div>
  </div>

  <div class="syuppin">現在最高入札額の商品</div>

  <div class="album py-5 bg-light">
    <div class="container" style="margin-top: 50px;">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

        <div class="col">
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
        </div>

      </div>
    </div>
  </div>

  
</body>
</html>