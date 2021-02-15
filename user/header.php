<?php
session_start();
$inactive = 600;
if(!isset($_SESSION['timeout']))
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

$_SESSION['timeout']=time();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
else {
    $email = $_SESSION['email'];
if($session_life > $inactive)
{  session_destroy(); header("Location:login.php");     }


}


?>
<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Restaurant Automation System</title>
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600" rel="stylesheet">
        <!-- Favicon -->
        <!-- Stylesheet -->
        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="o-page">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="o-page__sidebar js-page-sidebar">
            <div class="c-sidebar">
                <a class="c-sidebar__brand" href="#">
               <?php echo $_SESSION['email']; ?>
                </a>
                
                <h4 class="c-sidebar__title">Dashboards</h4>
                <ul class="c-sidebar__list">

                    
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="manage_order.php">
                            <i class="fa fa-file-text-o u-mr-xsmall"></i>Manage Order 
                        </a>
                    </li>
                    
                     
                    
                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="user_bill.php">
                            <i class="fa fa-file-text-o u-mr-xsmall"></i>Bill generate 
                        </a>
                    </li>

                    <li class="c-sidebar__item">
                        <a class="c-sidebar__link" href="kitchen.php">
                            <i class="fa fa-file-text-o u-mr-xsmall"></i> Kitchen 
                        </a>
                    </li>

                    

                </ul>

               

              
            </div><!-- // .c-sidebar -->
        </div><!-- // .o-page__sidebar -->

        <main class="o-page__content">
            <header class="c-navbar u-mb-medium">
                <button class="c-sidebar-toggle u-mr-small">
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                    <span class="c-sidebar-toggle__bar"></span>
                </button><!-- // .c-sidebar-toggle -->

                <h2 class="c-navbar__title u-mr-auto">OVERVIEW</h2>

                <div class="c-dropdown dropdown">
                    <a  class="c-avatar c-avatar--xsmall has-dropdown dropdown-toggle" href="#" id="dropdwonMenuAvatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="c-avatar__img" src="img/profile-img.png" alt="User's Profile Picture">
                    </a>

                    <div class="c-dropdown__menu dropdown-menu dropdown-menu-right" aria-labelledby="dropdwonMenuAvatar">
                        <a class="c-dropdown__item dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </header>
