<?php
session_start();
require_once '../database/DBManager.php';
$dbmng = new DBManager();
if(
  isset($_SESSION["id"]) == true ){
//セッションがすでにあれば
  header('Locaion: ProductList.php');
}

if($_SERVER['REQUEST_METHOD']==='POST'){
  try {
    $userArray = $dbmng->LoginUser($_POST['mail'],$_POST['pass']);
    foreach($userArray as  $row){//セッション作成
      $_SESSION['id'] = $row['user_id'];
    }
    //遷移しない
    header('Location: ProductList.php');
    // exit();
    echo 'Loginのテスト4';
  } catch (BadMethodCallException $bex) {
      $msg='メールアドレスが存在しません。';
      echo '<script> console.log('.json_encode( $msg ).')</script>';
      // header('Location: Login.php');
  }catch(LogicException $lex){
      $msg ='パスワードが一致しません';
      echo '<script> console.log('.json_encode( $msg ).')</script>';
      // header('Location: Login.php');
  }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録画面</title>
  <style>
  </style>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  </head>
  <body>
    <a href="ProductList.php">
      <h1>FOURCRAFT</h1>
    </a>

  <div class="text-center">   
    <main class="form-signin m-auto w-100">
    <form action="" method="post">
      <img class="mb-4" src="images/register.png" alt="" width="150" height="150">
    
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto">          
            <div class="form-floating">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"width=100
              name="mail">
              <label for="floatingInput">メールアドレス</label>
            </div>

            <div class="form-floating pb-4">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
              name="pass">
              <label for="floatingPassword">パスワード</label>
            </div>
            
            <button class="w-100 btn btn-lg btn-danger"type="submit" name="loginBtn">ログイン</button>
            <p></p>

          <a href="Register.php">新規登録はこちら</a>
          </div>
        </div>
      </div>
    </form>     

</div>
</main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>