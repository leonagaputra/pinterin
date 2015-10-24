<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pinterin - Selamat Datang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $base_url; ?>css/bootstrap/bootstrap.min.css?v=<?php echo $version; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $base_url; ?>css/the-big-picture.css?v=<?php echo $version; ?>" rel="stylesheet">
    <style>
        .modal-header, h4, .close {
            background-color: #00A65A;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Pinterin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>                        
                        <a href="#" data-toggle="modal" data-target="#myModal">Log In</a>
                    </li>
                    <!--<li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?php
            require_once 'frontpage_login.php';
        ?>
    <!-- Page Content -->
    <!--<div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12" style="color:white;">
                <h1>To Live Is To Give</h1>
                <p></p>
            </div>
        </div>
        
    </div>-->
    <!-- /.container -->

    <!-- jQuery -->
    <!--<script src="js/jquery.js"></script>-->
    <script src="<?php echo $base_url; ?>js/jQuery/jQuery-2.1.4.min.js?v=<?php echo $version; ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script src="<?php echo $base_url; ?>js/bootstrap/bootstrap.min.js?v=<?php echo $version; ?>"></script>
    <script src="<?php echo $base_url; ?>js/main_function.js?v=<?php echo $version; ?>"></script>
    <script>
    var main = {
        base_url : "<?php echo $base_url; ?>"
    }
    </script>
</body>

</html>