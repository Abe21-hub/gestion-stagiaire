
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $ids=isset($_GET['idS'])?$_GET['idS']:0;
    $requeteS="select * from stagiaire where idStagiaire=$ids" ;
    $resultatS=$pdo->query($requeteS);
    $stagiaire=$resultatS->fetch();
    $nom=$stagiaire['nom'];
    $prenom=$stagiaire['prenom'];
    $civilite= strtoupper($stagiaire['civilite']);
    $idFiliere=$stagiaire['idFiliere'];
    $nomPhoto=$stagiaire['photo'];

     $requeteF="select * from filiere" ;
     $resultatF =$pdo->query($requeteF);

?>


<!DOCTYPE HTML>
<html>
     <head> 
          <meta charset= "utf-8">
         <title>Nouveau stagiaire</title>
         <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
      <body>
             <?php include("menu.php");?>
          <br><br><br>
        <div class="container">
               
        <div class="panel panel-primary margetop60">
        <div class="panel-heading">les infos du nouveau  stagiaire :</div>
        <div class="panel-body">
            <form method="post" action="insertStagiaire.php" class="form" enctype="multipart/form-data">
 
                <div class="form-group">
                <label for="nom"> Nom  </label>
                <input type="text" name="nom"
                       placeholder="Nom"
                    class="form-control"
                    value="<?php echo $nom ?>"/>
                </div>
                
                <div class="form-group">
                <label for="prenom"> Prénom : </label>
                <input type="text" name="prenom"
                       placeholder="prénom"
                    class="form-control"
                    value="<?php echo $prenom ?>"/>
                </div>
                 <div class="form-group">
                <label for="civilite"> Civilite </label>
                <div class="radio">
                <label> <input type="radio" name="civilite"
                              value="F" checked/> F </label><br>
                <label><input type="radio" name="civilite"
                               value="M"  checked /> M </label>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="idfiliere">filière:</label>
                    <select name="idFiliere" class="form-control" id="idFiliere">
                       <?php while($filiere=$resultatF->fetch()) { ?>
                        <option value = "<?php echo $filiere['idFiliere'] ?>">
                        <?php echo $filiere['nomFiliere'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                     <div class="form-group">
                <label for="photo"> photo :</label>
                 <input type="file" name="photo"/>
                </div>
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-save"></span>
                Enregistrer...
                </button>
                
            </form>
        </div>    
        </div>
        </div>
      </body>
</html>