<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>商品詳細購入未確定ページ</title>
  <style>

      #ProductDetailUnconfirmed_syohinmei{
          width: auto;
          height: 55px;
          background-color: #D9D9D9;
          margin-top: 60px;
          margin-bottom: 10px;
      }

      #ProductDetailUnconfirmed_syohin{
          font-size: 25px;
          padding-top: 11px;
      }

        #ProductDetailUnconfirmed_syohinsestumei{
        height: 150px;
        width: 95%;
        background-color: #F5F5F5;
        margin-top: 20px;
        margin-bottom: 10px;
        font-size: 20px;
        margin-left: auto;
        margin-right: auto;
    }

    #ProductDetailUnconfirmed_syohingazou{
        height: 100%;
        width: auto;
        background-color: #D9D9D9;
        margin-top: 10px;
        font-size: 20px;
        margin-left: 10px;
        margin-right: 10px;
    }



.button{
    position : relative ;
    display : flex ;
    justify-content : center ;
    align-items : center ;
    width : 190px ;
    height : 40px ;
    border-radius : 32px ;
    background : #FFF ;
    overflow : hidden ;
    text-decoration : none ;
    box-sizing : border-box ;
    box-shadow : 0 0 24px rgba( 40 , 100 , 145 , .2 ) ;
    transition : all ease .7s ;
    border : solid 1px transparent ;
    margin-left: 14%;
    margin-right: 7px;
    margin-top: 5%;
}
.button__text{
    position : relative ;
    z-index : 2 ;
    display : inline-block ;
    padding : 4px 16px ;
    border-radius : 100px ;
    font-size : 14px ;
    font-weight : bold ;
    letter-spacing : 3px ;
    color : #000 ;
    background : rgba(255,255,255,.0) ;
    transition : all ease .4s ;
}
.materials{
    display : flex ;
    justify-content : center ;
    position : absolute ;
    z-index : 1 ;
    top : 0 ;
    left : -50% ;
    right : -50% ;
    bottom : 0 ;
    margin : auto ;
    width : 80% ;
    transform : rotate( 45deg ) ;
    aspect-ratio : 1/1 ;
}
.materials__bar{
    position : relative ;
    width : 20% ;
    height : 100% ;
}
.materials__bar::before,
.materials__bar::after{
    content : '' ;
    position : absolute ;
    border-radius : 100px ;
}
.materials__bar:nth-child(1)::before{
    z-index : 1 ;
    top : 30% ;
    left : 0 ;
    width : 60% ;
    height : 30% ;
    transition : all ease .5s ;
}
.materials__bar:nth-child(1)::after{
    z-index : 2 ;
    bottom : -50% ;
    right : 10% ;
    width : 40% ;
    height : 40% ;
    transition : all ease .7s ;
}
.materials__bar:nth-child(2)::before{
    z-index : 2 ;
    bottom : -40% ;
    left : 0 ;
    width : 60% ;
    height : 40% ;
    transition : all ease .4s ;
}
.materials__bar:nth-child(2)::after{
    z-index : 1 ;
    top : -10% ;
    right : 0 ;
    width : 60% ;
    height : 50% ;
    transition : all ease .5s ;
}
.materials__bar:nth-child(3)::before{
    z-index : 1 ;
    top : -20% ;
    left : 15% ;
    width : 40% ;
    height : 50% ;
    transition : all ease .6s ;
}
.materials__bar:nth-child(3)::after{
    z-index : 2 ;
    bottom : -20% ;
    right : 15% ;
    width : 40% ;
    height : 50% ;
    transition : all ease .5s ;
}
.materials__bar:nth-child(4)::before{
    z-index : 2 ;
    top : -60% ;
    right : 20% ;
    width : 40% ;
    height : 50% ;
    transition : all ease .7s ;
}
.materials__bar:nth-child(5)::before{
    z-index : 2 ;
    bottom : 0% ;
    left : 0 ;
    width : 40% ;
    height : 50% ;
    transition : all ease .6s ;
}
.materials__bar:nth-child(5)::after{
    z-index : 1 ;
    top : -60% ;
    right : 10% ;
    width : 60% ;
    height : 50% ;
    transition : all ease .4s ;
}
.button:hover .materials__bar:nth-child(1)::before{
    top : 60% ;
}
.button:hover .materials__bar:nth-child(1)::after{
    bottom : -20% ;
}
.button:hover .materials__bar:nth-child(2)::before{
    bottom : 35% ;
}
.button:hover .materials__bar:nth-child(2)::after{
    top : 30% ;
}
.button:hover .materials__bar:nth-child(3)::before{
    top : 60% ;
}
.button:hover .materials__bar:nth-child(3)::after{
    bottom : 0% ;
}
.button:hover .materials__bar:nth-child(4)::before{
    top : 30% ;
}
.button:hover .materials__bar:nth-child(5)::before{
    bottom : 45% ;
}
.button:hover .materials__bar:nth-child(5)::after{
    top : 15% ;
}
.materials__circle{
    position : absolute ;
    top : 0 ;
    width : 33.33% ;
    height : 100% ;
}
.materials__circle:nth-child(6){
    left : 0 ;
}
.materials__circle:nth-child(7){
    left : 0 ;
    right : 0 ;
    margin : 0 auto ;
}
.materials__circle:nth-child(8){
    right : 0 ;
}
.materials__circle::before,
.materials__circle::after{
    content : '' ;
    position : absolute ;
    aspect-ratio : 1/1 ;
    border-radius : 50% ;
}
.materials__circle:nth-child(6)::before{
    bottom : -30% ;
    right : -10% ;
    width : 40% ;
    transition : all ease .6s ;
}
.materials__circle:nth-child(7)::before{
    bottom : -10% ;
    left : 30% ;
    width : 25% ;
    transition : all ease .6s ;
}
.materials__circle:nth-child(7)::after{
    top : -30% ;
    right : 10% ;
    width : 40% ;
    transition : all ease .6s ;
}
.materials__circle:nth-child(8)::before{
    bottom : 0% ;
    left : 5% ;
    width : 25% ;
    transition : all ease .7s ;
}
.materials__circle:nth-child(8)::after{
    top : -30% ;
    right : -10% ;
    width : 40% ;
    transition : all ease .4s ;
}
.button:hover .materials__circle:nth-child(6)::before{
    bottom : 5% ;
}
.button:hover .materials__circle:nth-child(7)::before{
    bottom : 55% ;
}
.button:hover .materials__circle:nth-child(7)::after{
    top : 20% ;
}
.button:hover .materials__circle:nth-child(8)::before{
    bottom : 75% ;
}
.button:hover .materials__circle:nth-child(8)::after{
    top : 0% ;
}
.materials__bar:nth-child(1)::before,
.materials__bar:nth-child(5)::before,
.materials__circle:nth-child(8)::before,
.materials__circle:nth-child(6)::before{
    background : #74024a ;
}
.materials__bar:nth-child(1)::after,
.materials__bar:nth-child(3)::after,
.materials__bar:nth-child(5)::after{
    background : #f29f03 ;
}
.materials__bar:nth-child(3)::before,
.materials__circle:nth-child(7)::after{
    background : #f28705 ;
}
.materials__bar:nth-child(2)::before,
.materials__circle:nth-child(7)::before,
.materials__bar:nth-child(4)::before{
    background : #06c7f2 ; 
}
.materials__bar:nth-child(2)::after,
.materials__circle:nth-child(8)::after{
    background : #039dd9 ;
}
.button:hover{
    border : solid 1px #74024a ;
    box-shadow : 0 0 24px rgba( 40 , 100 , 145 , 0 ) ;
}
.button:hover .button__text{
    background : rgba(255,255,255,.6) ;
} 

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
        #ProductDetailUnconfirmed_genzaikakaku{
            font-size: 20px;
            margin-left:10%;
            margin-top:4%;
        }

        #ProductDetailUnconfirmed_sokketukakaku{
            font-size: 20px;
            margin-left:10%;
            margin-top:5%;
        }

        .bd-example{
            width:70%;
            margin-top:3.5%;
            margin-left:9%;
        }

        /* レスポンシブ対応 */
        @media screen and (max-width: 990px) {
        #ProductDetailUnconfirmed_syohinmei{
            margin-top: 210px;
        }
      }

      @media screen and (max-width: 990px) {
        #ProductDetailUnconfirmed_syohingazou{
            height: 250px;
            width: auto;
        }
      }

      @media screen and (max-width: 990px) {
        #ProductDetailUnconfirmed_genzaikakaku{
            margin-left:auto;
            margin-right:auto;
            margin-top: 5%;
        }
      }

      @media screen and (max-width: 990px) {
        #ProductDetailUnconfirmed_sokketukakaku{
            margin-left:auto;
            margin-right:auto;
            margin-top:4%;
        }
      }

      @media screen and (max-width: 990px) {
        .button{
            margin-left:auto;
            margin-right:auto;
            margin-top:4%;
        }
      }

      @media screen and (max-width: 990px) {
        .bd-example{
            margin-left:auto;
            margin-right:auto;
            width:70%;
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
                <li><a href="../ProductList.php" class="nav-link px-2 text-white">FourCraft</a></li>
                <li><a href="../Login.php" class="nav-link px-2 text-white">商品を出品する</a></li>
                </ul>
            
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="検索..." aria-label="Search">
            </form>
            
            <div class="text-end me-n5" id="headerBtn">
            <button type="button" onclick="location.href='../Login.php'" 
            class="btn btn-outline-light me-2">ログイン</button>
            <button type="button" onclick="location.href='../Register.php'" 
            class="btn btn-warning">新規登録</button>
            </div>
            
        </div>
        </div>
    </header>↑ ヘッダー

  <div class="containaer-fluid">
  <div id="ProductDetailUnconfirmed_syohinmei">
    <h1 id="ProductDetailUnconfirmed_syohin">商品名</h1>
  </div>
<div class="row">
  <div class="col-lg-5">
  <div id="ProductDetailUnconfirmed_syohingazou">商品画像</div>
  </div>

  <div class="col-lg-7">
    <div style="display: flex;">
        <div id="ProductDetailUnconfirmed_genzaikakaku">現在価格：
    </div>
        <u id="ProductDetailUnconfirmed_genzaikakaku">20000 円</u>
    </div>
    <div style="display: flex;">
        <div id="ProductDetailUnconfirmed_sokketukakaku">即決価格：</div>
        <u id="ProductDetailUnconfirmed_sokketukakaku">1億 円</u>
    </div>
        <div style="display:flex;">
        
        <a href="" class="button">
            <span class="button__text">入札</span>
            <div class="materials">
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__circle"></div>
                <div class="materials__circle"></div>
                <div class="materials__circle"></div>
            </div>
        </a>
        <a href="" class="button">
            <span class="button__text">今すぐ落札</span>
            <div class="materials">
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__bar"></div>
                <div class="materials__circle"></div>
                <div class="materials__circle"></div>
                <div class="materials__circle"></div>
            </div>
        </a>
        </div>

        <div class="bd-example">
  <table class="table table-bordered">
      <thead>
    <tr>
      <th width="30%">カテゴリ</th>
      <th width="70%">First</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>状態</th>
      <td>Mark</td>
    </tr>
  </tbody>

  </table>
</div>

  </div>
    <div id="ProductDetailUnconfirmed_syohinsestumei">商品説明</div>
    </div>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>