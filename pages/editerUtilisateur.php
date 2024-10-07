
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
    $requete="select * from utilisateur where idUser=$idUser" ;
    
    $resultat=$pdo->query($requete);
    $utilisateur=$resultat->fetch();

    $login=$utilisateur['login'];
    $email=$utilisateur['email'];

?>


<!DOCTYPE HTML>
<html>
     <head> 
          <meta charset= "utf-8">
         <title>Edition de stagiaire</title>
         <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
      <body>
             <?php include("menu.php");?>
          <br><br><br>
        <div class="container">
               
        <div class="panel panel-primary margetop60">
        <div class="panel-heading">Edition de l'utilisateur :</div>
        <div class="panel-body">
            <form method="post" action="updateUtilisateur.php" class="form" enctype="multipart/form-data">
                
             <div class="form-group">
                <!--<label for="idUser"> id user: </label>-->
                <input type= "hidden" name="idUser"
                    class="form-control" 
                    value="<?php echo $idUser ?>">
            </div>
                
                <div class="form-group">
                <label for="login"> Login: </label>
                <input type="text" name="login"
                       placeholder="Login"
                    class="form-control"
                    value="<?php echo $login ?>"/>
                </div>
                
                <div class="form-group">
                <label for="email"> Email: </label>
                <input type="text" name="email"
                       placeholder="email"
                    class="form-control"
                    value="<?php echo $email ?>"/>
                </div>
                
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-save"></span>
                Enregistrer...
                </button>
                <a href='editPwd.php'>Changer le mot de passe </a>
            </form>
        </div>    
        </div>
        </div>
      </body>
</html>