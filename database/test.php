<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>テスト</h1>
  <?php
  echo 'test<br>';

  require_once 'DBManager.php';
  $dbmng = new DBManager();

  $searchArray = $dbmng->getProductList();

  foreach($searchArray as $row){
    echo $row['product_name']."<br>";
    // echo "<img src=".base64_encode($row['image']).">"."<br>";
    $img = base64_encode($row['image']);
    echo "<img src="."data:image/jpg;"."base64,".$img.">";
  }

  ?>
</body>
</html>