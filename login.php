<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Restaurant Automation System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="o-page o-page--center">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
      <?php if(isset($_SESSION['error'])){ ?>

        <div class="alert alert-danger"><?= $_SESSION['error'];?></div>
    
    <?php }?>

        <div class="o-page__card">
            <div class="c-card u-mb-xsmall">
                <header class="c-card__header">
                    <h1 class="u-h3 u-text-center u-text-bold u-mb-zero">SIGN IN</h1>
                </header>
                
                <form class="c-card__body" method="post" action="verify_login.php">
                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input1">EMAIL</label> 
                        <input class="c-input" type="email" id="input1" name="email" placeholder=""> 
                    </div>

                    <div class="c-field u-mb-small">
                        <label class="c-field__label" for="input2">PASSWORD</label> 
                        <input class="c-input" type="password" id="input2" name="password" placeholder=""> 
                    </div>

                    <button class="c-btn c-btn--info c-btn--fullwidth" type="submit">SIGN IN TO DASHBOARD</button>

                </form>
            </div>

        </div>

        <script src="js/main.min.js"></script>
    </body>
</html>