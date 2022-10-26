<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ヘッダー_PCログイン</title>
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
        }
    </style>
</head>
<body>    
    <header class="p-3 bg-dark text-white">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"
                id ="logo">
                <img src="../images/Logo.png" width="40" alt="ロゴ" class="ms-lg-0 me-3 me-lg-0">
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
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>