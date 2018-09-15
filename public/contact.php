<html>
<head>

    <title>Contacter</title>
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
            background-color: rgba(147,6,23,0.3);
            margin-top: 5%;
        }
        .contact{
            width:200px;
            height: 30px;
            background-color: black;
            color: white;
            border-radius: 10px;
            vertical-align: middle;
        }
        .mot{
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;
            color: white;
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
    <div class="jumbotron" style="border-radius: inherit;">
    <h3 class="text-center contact" >Contact</h3>
   <HR>
    <div class="row">
        <div class="col-lg-6">
            <p> <h3 class="mot">Cher etudiant vous pouvez nous contactez.</h3></p>
            <p><span class="glyphicon glyphicon-map-marker"></span> ENSA AGADIR</p>
            <p><span class="glyphicon glyphicon-phone"></span> Télephone: +212 6 80 30 72 20</p>
            <p><span class="glyphicon glyphicon-envelope"></span> Email: younes.hamdane11@gmail.com</p>
        </div>
        <div class="col-lg-6">
            <form action="envoyerEmail.php" method="post">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Nom" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="msg" placeholder="message" rows="7" required></textarea>
                <HR>
            <div class="row">
                <div class="col-md-12 form-group">
                    <button class="btn btn-danger pull-right" type="submit">Send</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>