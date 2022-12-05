<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>即決画面</title>

  <style>
      header {
          display: flex;
          width: 100%;
          height: 50px;
          background-color: #FFE27B;
          align-items: center;
          position: relative;
        }
        
      .title {
          /* margin: auto; */
          position: absolute;
          left: 47%;
        }
        
      .menu-item {
          list-style: none;
          display: inline-block;
          padding: 10px;
          position: absolute;
          right: 0;
          top: -22%;
        }

      .bg-ddd{
          width:auto;
          height:150px;
          background-color:#f5f5f5;
        }

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
          font-weight: 600;
          background: #eee;
          filter: drop-shadow(0px 2px 4px #ccc);
          border-radius: 3px;
        }
      .button_solid001 a:hover {
          transform: translateY(-2px);
          box-shadow: 0 15px 30px -5px rgb(0 0 0 / 15%), 0 0 5px rgb(0 0 0 / 10%);
        }      
        
        @media screen and (max-width: 600px) {
          #label{
            font-size: 1px;
          }

        }
    </style>
</head>

<body>
<header>
    <h2 class="title">今すぐ落札</h2>
    <nav class="nav">
      <ul>
        <li class="menu-item"><a href="#" style="text-decoration: none;"><h2>×</h2></a></li>
      </ul>
    </nav>
  </header>

  <main>
      <div style = "display:flex; align-items:center; ">
        <img src=./images/Logo.png width=100 class="mx-auto" vspace="50">
      </div>
      <div class="bg-ddd" style="width: auto; padding-top: 20px;">
          <div style="display:flex;">

          <p class="lead text-center" style="margin-top: 20px;">即決価格　　　　　　：円</p>
      </div>

      <p>
      <div class="button_solid001" style="margin-top: 50px;">
        <a href="#" style="text-decoration: none;">落札する</a>
      </div>
      </p>

      <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</main>
  
</body>
</html>