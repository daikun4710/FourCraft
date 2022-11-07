<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了画面</title>
</head>
<style>
  .kanryo{
    font-size:50px;
  }
</style>
<body>
  <div style="text-align:center;">
    <img src="Logo.png"width="200"height="200">
    <div class="kanryo">
      登録完了しました
    </div>
    <a href="ProductList.php">
      <h1>商品一覧画面へ</h1></a>
  </div>
</body>

<?php//新規登録処理
    require_once 'database/DBManager.php';
    $dbmng = new DBManager();
    $dbmng->setUser($_POST['mail'],$_POST['pass']);

    try { //ログインしてセッション作成
        $userArray = $dbmng->LoginUser($_POST['mail'],$_POST['pass']);
        foreach($userArray as  $row){//セッション作成
          $_SESSION['mail'] = $row['user_mail'];
			    $_SESSION['id'] = $row['user_id'];
        }
    } catch (BadMethodCallException $bex) {
        $msg='メールアドレスが存在しません。';
        echo '<script> console.log('. json_encode( $msg ) ')
        </script>';//コンソールに出力
        header("location:Login.php");
    }catch(LogicException $lex){
        $msg ='パスワードが一致しません';
        echo '<script> console.log('. json_encode( $msg ) ')
        </script>';//コンソールに出力
        header("location:Login.php");
    }
?>
</html>