<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talon</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
  <link rel="stylesheet" href="product.css">
<!--FONT AWESOME-->
<script src="https://kit.fontawesome.com/0e22389e8c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-black">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Contact</a>
              </li>
            </ul>
          </div>
          <div class="logo position-absolute">
              <a class="navbar-brand"><img class="logo" id="logo" src="/image/logo.png" alt="Logo" /></a>
          </div>
          <i class="fa-regular fa-user" style="color: #ffffff;"></i>
        </div>
      </nav>
    
      <h1>Welcome to Joury Caftan!</h1>
      <div class="d-flex">
      <div class="container">
        <hr>
            <div class="col-auto">
              
                    <ul class="nav flex-column align-items-center align-items-sm-start" id="menu">
                        <form class="d-flex" role="search" method="POST">
                            <input class="form-control bg-transparent " name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn w-2" type="submit" name="search_btn"><i class="fa-sharp fa-light fa-magnifying-glass" style="color: #f2ca8f;"></i></button>
                          </form>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Category</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100 text-white">
                                    <a href="caftan.php" class="nav-link text-white"> Caftan </a>
                                </li>
                                <li>
                                    <a href="jewlary.php" class="nav-link text-white"> Jewlary </a>                                </li>
                           </li>
                           <li>
                            <a href="talon.php" class="nav-link text-white"> Talon </a>                                </li>
                   </li>
                                </ul>
                        </li>
                        
                    </ul>
                </div>
            
    </div>
    <?php
      session_start();
    include_once('db.php');
    $db = new dbConnect();
    if(isset($_POST["search_btn"])){
      $search = $_POST["search"];
      $where = "id_category = 3 AND (Price LIKE '$search%' OR Title LIKE '$search%')";
      $result = $db->selectWithPagination('Product', '*', $where, 4);
      foreach ($result['result'] as $row) :
    ?>
    
    <div class="d-flex gap-5 mt-5">
      <div class="card bg-transparent mb-3" style="max-width: 18rem;">

        <img src="image/<?= $row['Cover_Image'] ?>" class="card-img ms-5" alt="...">
        <div class="card-body text-white">
          <h5 class="card-title text-white"><?= $row['Title'] ?></h5>
          <p class="card-text text-white"><?= $row['Price'] ?></p>
          <form action="product.php" method="post">
          <input type="hidden" name="ouvragecode" value="<?= $row['Product_id'] ?>">
          <button type="button" class="btn-borrow" <?= $row['Avaibality'] == 'available' ? '' : 'disabled'; ?>>Borrow</button>
      </form>
        </div>
      </div>
      <?php endforeach; ?>
        <!-- PAGINATION -->
  
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php
        if ($result['currentpage'] > 1) {
          echo '<li class="page-item"> <a  class="page-link text-black " href="?page=' . ($result['currentpage'] - 1) . '"><i class="fa-solid fa-chevron-left"></i></a> </li>';
        }
        for ($i = 1; $i <= $result['totalPages']; $i++) :
          if ($i == $result['currentpage']) {
            echo '<li class="page-item active"> <a  class="page-link  bg-black" href="#">' . $i . '</a> </li>';
          } else {
            echo '<li class="page-item"> <a  class="page-link text-black " href="?page=' . $i . '">' . $i . '</a> </li>';
          }
        endfor;
        if ($result['currentpage'] < $result['totalPages']) {
          echo '<li class="page-item"> <a class="page-link text-black " href="?page=' . ($result['currentpage'] + 1) . '"><i class="fa-solid fa-chevron-right"></i></a> </li>';
        }
        ?>
      </ul>
    </nav>
  </div>
    <?php }else{ ?>
    <?php
    include_once('db.php');
    $db = new dbConnect();
    $result = $db->selectWithPagination('product JOIN category ON Product.id_category=category.id_category ', '*', 'category.id_category = 3', 4);
    // Loop through the result and display the records
    foreach ($result['result'] as $row) :
    ?>
    <div class="card bg-transparent mb-3" style="max-width: 18rem;">

<img src="image/<?= $row['Cover_Image'] ?>" class="card-img ms-5" alt="...">
<div class="card-body text-white">
  <h5 class="card-title text-white"><?= $row['Title'] ?></h5>
  <p class="card-text text-white"><?= $row['Price'] ?></p>
  <form action="product.php" method="post">
  <input type="hidden" name="ouvragecode" value="<?= $row['Product_id'] ?>">
  <button type="button" class="btn-borrow" <?= $row['Avaibality'] == 'available' ? '' : 'disabled'; ?>>Borrow</button>
</form>
</div>
</div>
<?php endforeach; ?>
<div>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <?php
        if ($result['currentpage'] > 1) {
          echo '<li class="page-item"> <a  class="page-link text-black " href="?page=' . ($result['currentpage'] - 1) . '"><i class="fa-solid fa-chevron-left"></i></a> </li>';
        }
        for ($i = 1; $i <= $result['totalPages']; $i++) :
          if ($i == $result['currentpage']) {
            echo '<li class="page-item active"> <a  class="page-link  bg-black" href="#">' . $i . '</a> </li>';
          } else {
            echo '<li class="page-item"> <a  class="page-link text-black " href="?page=' . $i . '">' . $i . '</a> </li>';
          }
        endfor;
        if ($result['currentpage'] < $result['totalPages']) {
          echo '<li class="page-item"> <a class="page-link text-black " href="?page=' . ($result['currentpage'] + 1) . '"><i class="fa-solid fa-chevron-right"></i></a> </li>';
        }
        ?>
      </ul>
    </nav>
  </div>
  <?php }?>
    </div>
    </div>
</body>
</html>