<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewlary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
    <link rel="stylesheet" href="product.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/0e22389e8c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="bg">
  <?php session_start();?>
    <?php
    include_once('db.php');
    $db = new dbConnect();
    $result = $db->selectWithPagination('reservation JOIN Product ON reservation.Reservation_id=Product.Product_id JOIN category ON Product.id_category=category.id_category', '*', 'reservation.Reservation_confirm=0', 2);
    // Loop through the result and display the records
    foreach ($result['result'] as $row) :
    ?>
      <div class="d-flex gap-5 mt-5">
      <div class="card bg-transparent mb-3" style="max-width: 18rem;">

        <img src="image/<?= $row['Cover_Image'] ?>" class="card-img ms-5" alt="...">
        <div class="card-body text-white">
          <h5 class="card-title text-white"><?= $row['Title'] ?></h5>
          <p class="card-text text-white"><?= $row['Price'] ?></p>
          <form action="caftan.php" method="post">
          <input type="hidden" name="creservationid" value="<?= $row['Reservation_id'] ?>">
          <input type="hidden" name="Productid" value="<?= $row['Product_id'] ?>">
          <button type="submit" class="btn" name="cancel" value="cancel">Cancel</button>
      </form>
        </div>
      </div>
    <?php endforeach;?>
  </div>
</div>
<footer class="d-flex   flex-column align-items-center bg bottom-0">
  <div class="d-flex  gap-3  p-3">
    <a href="http://" class="btn text-light"><i class="fa-brands fa-facebook"></i></a>
    <a href="http://" class="btn text-light"><i class="fa-brands fa-google"></i></a>
    <a href="http://" class="btn text-light"><i class="fa-brands fa-twitter"></i></a>
  </div>
  <div class="">
    <p class="bg_p">© Copyright 2023 | Privacy Policy</p>
  </div>
</footer>

<?php
include_once('db.php');
$funObj = new dbConnect();
$dataupdat= array(
  'Avaibality' => 'available'
);
if (isset($_POST['cancel'])) {
  $delet = $funObj->Delete('reservation','Reservation_id', $_POST['reservationid']);
  $updat = $funObj->Updat('Product', $dataupdat, $_POST['productid'], 'id_product');
}
?>
</body>
</html>