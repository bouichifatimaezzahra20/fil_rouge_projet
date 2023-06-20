
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!--FONT AWESOME-->
<script src="https://kit.fontawesome.com/0e22389e8c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg d-flex">
    <img src="image/logo.png" class="logoo" alt="logo">

            <!-- FORM SIGN IN -->
            <form class="contact-form" action="signin.php" method="POST">

                <?php
if(isset($_POST["signinbtn"]))
{
    include_once('db.php'); 
    $funObj = new dbConnect(); 
    if( $funObj->signin($_POST['email'],$_POST['password']))
    {
        $funObj->signin($_POST['email'],$_POST['password']);
        $admin = $funObj->admin($_POST['email'],$_POST['password']);
        if($admin) 
        {
            // header("location: ../office/office.php");
 
        }
        else
        {
            session_start();
            $_SESSION["email"]=  $email;
            $email=$_POST['email'];
            $where="Email='$email'";
            $select=$funObj->Select("user",$rows="*", $where);
            $select["result"][0]["Email"];
            if($select["result"][0]["Penalty_Count"]>=3)
            {
                echo "your penality is".$select["result"][0]["Penalty_Count"];

            }
            else
            {
                header("location: caftan.php");
            }
        }
    }
    else{
        ?>
             <p class="texte-danger">Compte no valid</p>
             <?php
    }}
        ?>
        <div class="form d-flex flex-column">
        <h1 class="text-white">Sign In</h1>

                <div class="formvalid">
                    <input type="text" name="email" class="input-text js-input" id="nicknamesignin"/>
                    <label class="label" for="email">Email</label>
                    <small></small>
                </div>
                <div class="formvalid">
                    <input type="password" name="password" class="input-text js-input" id="passwordsignin" />
                    
                    <label class="label" for="password">Password</label>
                    <small></small>
                </div>
                <div class="formvalid col-lg-12">
                <button type="submit" class="submit-btn" name="signinbtn" value="signinbtn" id="signinbtn">Sign In</button>
</div>
                <a class="text-center text-decoration-none" href="signup.php"> Register here<i class="fa-solid fa-circle-chevron-right"></i></a>
                </div>
            </form>
        </div>
</body>
</html>
