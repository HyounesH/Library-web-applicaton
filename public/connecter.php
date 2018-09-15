<?php
if(isset($_GET['login'])){
    $_GET['login']=strip_tags($_GET['login']);
}
?>
<html>
<head>
    <title>Connecter</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Latest compiled JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- jQuery library -->
    <script src="../jquery/1.12.0/jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <style type="text/css">
    body{
    background-image: url("../images/red_ink.jpg");
        }
    .jumbotron{
        background-color: rgba(145,145,145,0.5);
        margin-top: 50px;
    }
    h4{
        color: red;
        letter-spacing: 5px;
        font-family: "Tekton Pro", serif;
        font-size: 1.6em;

    }
    </style>
    </head>
<body>
<header class="header_page">
    <nav class="nav navbar-inverse" >
        <div class="container-fluid">
            <div class="navbar-header" >
                <a class="navbar-brand" href="index.php">ENSA LIBRARY </a>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="jumbotron">

                <h4>Connecter Vous Maintenant </h4>
                <HR>
                <form  method="post" action="validerUserLogin.php">
                    <div class="form-group">
                        <label for="username" ><i>CNE Etudiant :</i></label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password"><i>Password :</i></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                   <input type="submit" value="Se Connecter" class="btn btn-info">
                </form>
                <hr>
               <h4 style="color: blue;"><?php if (isset($_GET['login']))
                   echo $_GET['login']; ?></h4>
            </div>
        </div>
    </div>
</div>
</body>
</html>