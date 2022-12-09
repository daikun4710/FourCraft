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
        /* ヘッダー固定 */
   
         @media screen and (min-width:992px){
          .userin{
            font-size: 200%;
            text-align: center;
            width: 30%;
          }
          #username{
            font-size: 150%;
            margin-bottom: 5%;
          }
         }

  </style>
</head>
<body>
  <div class="userin">
    <div id="icon">
      <img src="images/icon.png"width="150px"height="150px">
    </div>
    <p id="username">〇〇〇〇</p>
    <p><a href="">出品商品</a></p><br>
    <p><a href="">落札商品</a></p><br>
    <p><a href="">ログアウト</a></p>
  </div>
</body>
</html>