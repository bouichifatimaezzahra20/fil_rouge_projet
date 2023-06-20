
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!--FONT AWESOME-->
<script src="https://kit.fontawesome.com/0e22389e8c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg d-flex">
    <img src="image/logo.png" class="logoo" alt="logo">
            <!-- FORM SIGN UP -->
            <form action="signup.php" method="POST" class="contact-form" id="signupform">
                <?php
if(isset($_POST["signupbtn"]))
{
    include_once('db.php'); 
    $funObj = new dbConnect(); 
    $exist = $funObj->isUserExist($_POST['email']);
    if(! $exist)
    {
        $signup = $funObj->signup($_POST['name'],$_POST['password'],$_POST['adresse'],$_POST['email']);
        if ($signup) {
include('signin.php');
       }
        else
        {
            echo "erreur";
        }
    }
    else{
        ?>
  
                <p class="text-center text-danger"><?php echo "Ce compte exist deja";}
            } ?></p>

                    <div class="form d-flex flex-column">
                            <h1 class="text-white">Sign Up</h1>
                    <div class="formvalid w-50">
                        <input type="text" name="name" class="input-text js-input" id="name" />
                        <label class="label" for="name">Name</label>
                        <small></small>
                    </div>
                    <div class="formvalid w-50">
                        <input type="email" name="email" class="input-text js-input" id="email"/>
                        <label class="label" for="email">Email</label>
                        <small></small>
                    </div>
                    <div class="formvalid w-50">
                        <input type="text" name="adresse" class="input-text js-input" id="adresse"/>
                        <label class="label" for="adresse">Adresse</label>
                        <small></small>
                    </div>
                    <div class="formvalid w-50">
                            <input type="password" name="password" class="input-text js-input" id="password"/>
                            <label class="label" for="email">Password</label>
                        <small></small>
                    </div>
                    <div class="formvalid w-50">
                            <input type="password" name="confirmpassword" class="input-text js-input" id="confirmpassword"/>
                            <label class="label" for="confirmpassword">Confirme Password</label>
                        <small></small>
                </div>
                <button type="submit" class="btn submit-btn mt-5" name="signupbtn" value="signupbtn" id="signupbtn">Sign Up</button>
                <a class="text-center text-decoration-none" href="signin.php"> <i class="fa-solid fa-circle-chevron-left"></i> back to login</a>
        </div>
            </form>
        </div>
    </div>
    </div>
        </body>
        </html>