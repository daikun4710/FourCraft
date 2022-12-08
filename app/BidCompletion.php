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
  <title>入札完了画面</title>
  <style>
    body{
      text-align: center;
      margin: 0;
      padding: 0;
      font-size: 30px;
      font-weight: 600;
    }

    #title{
      background:#FFE27B;
      height: 50px;
      top: 50%;
      display: flex;
      justify-content: center; 
      align-items: center; 
      
    }
    #message{
      background: #f5f5f5;
      
      width: auto;
      height: 250px;
      display: flex;
      justify-content: center; 
      align-items: center; 
    }
    /* #button{
      width: 300px;
      height: 60px;
      font-size:40px
    } */
    

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
          font-weight: 450;
          background: #eee;
          filter: drop-shadow(0px 2px 4px #ccc);
          border-radius: 3px;
        }

    @media screen and (max-width: 450px){
      body{
      text-align: center;
      margin: 0;
      padding: 0;
      font-size: 30px;
      font-weight: 600;
    
    }

    #title{
      background:#FFE27B;
      height: 50px;
      top: 50%;
      display: flex;
      justify-content: center; 
      align-items: center; 
      
    }
    #message{
      background: #f5f5f5;
      
      width: auto;
      height: 250px;
      display: flex;
      justify-content: center; 
      align-items: center; 
    }
    #button{
      width: 300px;
      height: 60px;
      font-size:30px;
    }
  }
  
    
  </style>
</head>
<body>
  <div id="title">
      入札完了
  </div>
  
  <div id="message">
        入札が完了しました
  </div>

  <p>
    合計　<span id="kin"></span>円
  </p>

  <!-- <a href="ProductList.php">
    <button type="button" id="button">戻る</button>
  </a> -->

  <p>
      <div class="button_solid001" style="margin-top: 50px;">
        <a href="ProductList.php" style="text-decoration: none; font-size: 20px;">戻る</a>
      </div>
      </p>


  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>