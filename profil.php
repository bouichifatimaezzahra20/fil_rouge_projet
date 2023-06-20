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
    <?php
    session_start();
    ?>
    <div class="bg"></div>
    <div class="d-flex p-4 flex-column justify-content-center align-items-center">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="bg d-md-flex mt-3 rounded w-50 p-2">
            <!-- FORM EDIT -->
            <?php
            include_once('db.php');
            $obj = new dbConnect();
            $session = $_SESSION["email"];
            $where = "Email='$session'";
            $result = $obj->Select('user', '*', $where);
            ?>
            <form action="profil.php" method="POST" class="p-5 d-flex flex-column justify-content-center gap-4 w-100" id="editprofileform">
                <h4 class="text-center">Edit your account</h4>
                <div class="d-flex gap-3">
                    <div class="formvalid w-50">
                        <input type="text" name="name" class="form-control" id="nameedit" placeholder="Enter your name" value="<?= isset($result['result'][0]["Name"]) ? $result['result'][0]["Name"] : '' ?>" />
                        <small></small>
                    </div>
                    <div class="formvalid w-50">
                        <input type="email" name="email" class="form-control" id="emailedit" placeholder="Enter your email" value="<?= isset($result['result'][0]["Email"]) ? $result['result'][0]["Email"] : '' ?>" />
                        <small></small>
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <div class="formvalid w-100">
                        <input type="text" name="adresse" class="form-control" id="adresseedit" placeholder="Enter your address" value="<?= isset($result['result'][0]["Address"]) ? $result['result'][0]["Address"] : '' ?>" />
                        <small></small>
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <div class="formvalid w-50">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="passwordedit" placeholder="Enter your password" />
                            <span class="input-group-text" id="togglePasswordedit"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <small></small>
                    </div>
                    <div class="formvalid w-50">
                        <div class="input-group">
                            <input type="password" name="confirmpassword" class="form-control" id="confirmpasswordedit" placeholder="Enter your password" />
                            <span class="input-group-text" id="togglePasswordconfirmedit"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <small></small>
                    </div>
                </div>
                <button type="submit" class="btn bgbtn" value="edit_profile" name="edit_profile" id="edit_profile">Edit</button>
            </form>
        </div>
    </div>
    <footer class="d-flex flex-column align-items-center bg">
        <div class="d-flex gap-3 p-3">
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

    if (isset($_POST["edit_profile"])) {
        if (isset($_POST['email'])) {
            $dataupdate = array(
                'Name' => $_POST['name'],
                'Password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'Address' => $_POST['adresse'],
                'Email' => $_POST['email'],
            );
            $exist = $funObj->isUserExist($_POST['email']);
            if (!$exist) {
                $update = $funObj->Updat('user', $dataupdate, $_SESSION["email"], 'Email');
                if ($update) {
                    $result = $obj->Select('user', '*', $where);
                }
                echo '<p>good</p>';
            } else {
                echo '<script>alert("This information already exists")</script>';
            }
        } else {
            // Handle the case when 'email' key is not present in $_POST array
        }
    }
    ?>
</body>
</html>
