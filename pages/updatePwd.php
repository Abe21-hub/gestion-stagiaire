<?php

require_once("identifier.php");

require_once('connexiondb.php');

$idUser=$_SESSION['user']['idUser'];

$oldPwd=isset($_POST['oldPwd'])?$_POST['oldPwd']:"";

echo $idUser.'<br>';
echo $oldPwd.'<br>';

$newPwd=isset($_POST['newPwd'])?$_POST['newPwd']:"";

$requete="select * from utilisateur where idUser=$idUser and pwd=MD5('$oldPwd')";

$resultat=$pdo->prepare($requete);

$resultat->execute();

$msg="";
$interval=3;
$url='login.php';

if($resultat->fetch()){
    
    $requete='update utilisateur set pwd=MD5(?) where idUser=?';
    $params=array($newPwd,$idUser);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);
    $msg= "
    <div class='alert alert-success'>
    <strong>Félicitation!</strong> votre mot de passe est modifié avec succés
    </div>
    ";
}else{
 $msg="
 <div class='alert alert-danger'>
 <strong>Erreur!</strong> l'ancien mot de passe est incorrect !!!
 </div>
 "; 
 $url=$_SERVER['HTTP_REFERER'];

}    
?>

<!DOCTYPE HTML>
<html>
<head>
     <meta charset= "utf-8">
         <title>Changement de mot de passe</title>
         <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    
</head>
    
    <body>
    <div class="container">
    <br><br>
    <?php 
      echo $msg;
      header("refresh:$interval;url=$url");   
    ?>
    </div>
    </body>
</html>