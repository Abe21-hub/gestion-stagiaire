<?php
require_once('identifier.php');
?>
<! DOCTYPE HTML>
<html>
     <head> 
          <meta charset= "utf-8">
         <title>Nouvelle filière</title>
         <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
      <body>
             <?php include("menu.php");?>
          <br><br><br>
        <div class="container">
               
        <div class="panel panel-primary margetop60">
        <div class="panel-heading"> Veuillez saisir les données de la nouvelle filière </div>
        <div class="panel-body">
            <form method="post" action="insertFiliere.php" class="form">
                
             <div class="form-group">
                    <label for="niveau"> Nom de la filière: </label>
                <input type="text" name="nomF"
                   placeholder="Nom de la filière"
                   class="form-control">
            </div>
                
                <div class="form-group">
                <label for="niveau"> Niveau </label>
                <select name="niveau" class="form-control" id="niveau">
                    <option value="q" > Qualification</option>
                    <option value="t" > Technicien</option>
                    <option value="ts" > Technicien spécialisé</option>
                    <option value="l" > Licence</option>
                    <option value="m" > Master</option>
                </select>
            </div>
                
                <button type="submit" class="btn btn-success">
                  <span class="glyphicon glyphicon-search"></span>
                Enregistrer...
                </button>
                </div>
            </form>
        </div>    
        </div>
      </body>
</html>