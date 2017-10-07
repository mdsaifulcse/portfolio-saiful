<?php
require_once'AdminLogin.php';

if (isset($_SESSION['id'])) {
    header("location:dashboard.php");
}

if (isset($_POST['login'])) {
    $adminLogin=new AdminLogin();
   $message=$adminLogin->userLogin($_POST);
}
?>


<!doctype html>
<html class="no-js" lang="eng" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
        
        
    </head>
    <body style="background-image: url(../img/background.PNG);">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="well" style="margin-top: 30%;">
                <h3 class="text-danger"><?php echo isset($message)?"$message":""; ?></h3>
                    <form class="form-hirizanta" action="index.php" method="POST">
                    <h2 class="text-center text-info"><span class="glyphicon glyphicon-log-out text-warning"></span> Admin login</h2>
                    <div class="form-group form-group-sm">
                        <label>Usrname / Email</label>
                        <div>
                            <input type="email" name="email" placeholder="Email address" required class="form-control">
                        </div>
                    </div>

                    <div class="form-group form-group-sm">
                        <label>Password</label>
                        <div>
                            <input type="password" name="password"  required class="form-control" placeholder="password">
                        </div>
                    </div>


                    <div class="form-group form-group-sm">
                        <div>
                            <input type="submit" name="login" value="ADMIN LOGIN" required class="form-control btn btn-success">
                        </div>
                    </div>
                    <a href="">Forgot Password <span class="text-danger">?</span> </a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
        
        
        <script src="../js/jquery-1.11.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
        $('#nav>li').hover(function() {
        $(this).children('.drop').stop(true,false,true).fadeToggle(600);
         });

        $('#nav>li>a').click(function() {
        $(this).children('.drop>li>a').stop(true,false,true).fadeToggle(600);
         });

        $('.drop>li').hover(function() {
        $(this).children('.down').stop(true,false,true).slideToggle(400);
         });
     });

</script>
        
    </body>
</html>
