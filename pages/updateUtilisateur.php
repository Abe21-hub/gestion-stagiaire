<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $idUser=isset($_POST['idUser'])?$_POST['idUser']:0;
    $login=isset($_POST['login'])?$_POST['login']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    
    $requete="update utilisateur set login=?,email=? where idUser=?";
    $params=array($login,$email,$idUser);

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
   
   header('location:utilisateurs.php');
?>