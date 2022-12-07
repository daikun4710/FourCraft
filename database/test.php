<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    echo '<img src='.'"data:image/jpg;'.'base64,'.$img.'"'.'class="bd-placeholder-img card-img-top" width="100%" height="300 xmlns="http://www.w3.org/2000/svg"  aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"'.'>';
  }

  ?>
  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>