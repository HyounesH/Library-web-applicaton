<html>
<head>
    <title>Crée Compte</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

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
    <script type="text/javascript" src="../js/app.js"></script>
    <style type="text/css">
       body{
        background-color: #fff;
       }
        .jumbotron {
            background-color: rgba(145, 145, 145, 0.5);
        }
        h4{
            color: red;
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;
            font-size: 1.6em;

        }
        h5{
            color: crimson;
            letter-spacing: 5px;
            font-family: "Tekton Pro", serif;
            font-size: 1.2em;
        }
        img{
            width: 230px;
        }
        img:hover{
            width: 260px;
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
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-6">
            <br/>
            <br/>
            <div class="gallery">
                         <div class="img-w"><img src="../images/1.png" alt="" /></div>
                         <div class="img-w"><img src="../images/2.png" alt="" /></div>
                         <div class="img-w"><img src="../images/10.png" alt="" /></div>
                         <div class="img-w"><img src="../images/4.png" alt="" /></div>
                         <div class="img-w"><img src="../images/5.png" alt="" /></div>
                         <div class="img-w"><img src="../images/6.png" alt="" /></div>
                         <div class="img-w"><img src="../images/7.png" alt="" /></div>
                         <div class="img-w"><img src="../images/8.png" alt="" /></div>
                         <div class="img-w"><img src="../images/9.png" alt="" /></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="jumbotron" style="border-radius: inherit;">
                <h4>Créé Votre Compte Maintenant ! </h4>
                <HR>
                <form method="post" action="validateUserInfo.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cne"><i>CNE ETUDAINT :</i></label>
                        <input type="text" name="cne" class="form-control" required>
                        <h5><?php if (isset($_GET['cne'])){
                            $_GET['cne']=strip_tags($_GET['cne']);
                            echo $_GET['cne'];
                            }?></h5>
                    </div>
                    <div class="form-group">
                        <label for="nom"><i>NOM ETUDIANT : </i></label>
                        <input type="text" name="nomE" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom"><i>PRENOM ETUDIANT :</i></label>
                        <input type="text" name="prenomE" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><i>Email ETUDIANT :</i></label>
                        <input type="email" name="emailE" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordE"><i>PASSWORD ETUDIANT :</i></label>
                        <input type="password" name="passwordE" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="RpasswordE"><i>REPETER PASSWORD ETUDIANT :</i></label>
                        <input type="password" name="RpasswordE" class="form-control" required>
                        <h5><?php if (isset($_GET['Rpass'])){
                                $_GET['Rpass']=strip_tags($_GET['Rpass']);
                                echo $_GET['Rpass'];
                            }?></h5>
                    </div>
                    <div class="form-group">
                        <label for="tel"><i>TELEPHONE ETUDIANT :</i></label>
                        <input type="tel" name="phoneE" class="form-control" required>
                        <h5><?php if (isset($_GET['phoneE'])){
                                $_GET['phoneE']=strip_tags($_GET['phoneE']);
                                echo $_GET['phoneE'];
                            }?></h5>
                    </div>
                    <div class="form-group">
                        <label for="adress"><i>ADRESS ETUDIANT :</i></label>
                        <input type="text" name="adressE" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="niveau"><i>NIVEAU ETUDIANT :</i></label>
                        <select name="niveauE" class="form-control" required>
                            <option value="CP1">CP1</option>
                            <option value="CP2">CP2</option>
                            <option value="ENSA3">ENSA3</option>
                            <option value="ENSA4">ENSA4</option>
                            <option value="ENSA5">ENSA5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="photo"><i>Photo ETUDIANT :</i></label>
                        <input type="file" name="imageE" class="form-control" required>
                    </div>
                    <div class="pull-right">
                        <input type="submit" value="Crée Compte" class="btn btn-info">
                        <input type="reset" class="btn btn-warning">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>