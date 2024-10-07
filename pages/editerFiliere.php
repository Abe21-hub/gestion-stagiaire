
<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
/*
    $idf= isset($_GET['idFiliere'])?$_GET['idFiliere']:0;
    */
    $idF=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from filiere where idFiliere=$idF" ;

    $resultat=$pdo->query($requete);
/*
    if($resultat!== false){
    $filiere=$resultat->fetch();
    }else{
        echo 'erreur de requete';
    }
        
var_dump($resultat);
*/
    $filiere=$resultat->fetch;
    $nomf=$filiere['nomFiliere'];
    $niveau=strtolower($filiere['niveau']);

?>


<!DOCTYPE HTML>
<html>
     <head> 
          <meta charset= "utf-8">
         <title>Edition d'une nouvelle filière</title>
         <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
      <body>
             <?php include("menu.php");?>
          <br><br><br>
        <div class="container">
               
        <div class="panel panel-primary margetop60">
        <div class="panel-heading">Edition de la filière :</div>
        <div class="panel-body">
            <form method="post" action="updateFiliere.php" class="form">
                
             <div class="form-group">
                    <label for="idF"> id de la filière:<?php echo $idF ?> </label>
                <input type="hidden" name="idF"
                    class="form-control" 
                    value="<?php echo $idF ?>">
            </div>
                      
                
                <div class="form-group">
                <label for="niveau"> Nom de la filière: </label>
                <input type="text" name="nomf"
                       placeholder="Nom de la filiere"
                    class="form-control"
                    value="<?php echo $nomf ?>"/>
                </div>
                
                <div class="form-group">
                    <label for="niveau">Niveau:</label>
                    <select name="niveau" class="form-control" id="niveau">
                        <option value="q" <?php if($niveau=="q") echo "selected" ?>> Qualification </option>
                        <option value="t" <?php if($niveau=="t") echo "selected" ?>> Technicien</option>
                        <option value="ts" <?php if($niveau=="ts") echo "selected" ?> > Technicien spécialisé</option>
                        <option value="l" <?php if($niveau=="l") echo "selected" ?>> Licence</option>
                        <option value="m" <?php if($niveau=="m") echo "selected" ?>> Master</option>
                    </select>
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