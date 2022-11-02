<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>入札完了画面</title>
  <style>
    body{
      text-align: center;
      margin: 0;
      padding: 0;
      font-size: 50px;
      font-weight: 600;
    }

    #title{
      background:gold;
      height: 100px;
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
      font-size:40px
    }
    
    @media only screen and (max-width: 450px){
      body{
      text-align: center;
      margin: 0;
      padding: 0;
      font-size: 30px;
      font-weight: 600;
    
    }

    #title{
      background:gold;
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

  <a href="ProductList.php">
    <button type="button" id="button">戻る</button>
  </a>
</body>
</html>