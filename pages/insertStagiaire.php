<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"";
    $idFiliere=isset($_POST['idFiliere'])?$_POST['idFiliere']:"";

    $nomPhoto=isset($_FILES['Photo']['name'])?$_FILES['Photo']['tmp_name']:"";
    $imageTemp=$_FILES['nomPhoto']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    $requete="insert into stagiaire(nom,prenom,civilite,idFiliere,photo) values(?,?,?,?,?)"; 
    $params=array($nom,$prenom,$civilite,$idFiliere,$nomphoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);

/*   $req= $bdd->prepare("INSERT INTO stagiaire(nom='SAADAOUI',prenom='MOHAMED',civilite='M',photo='Chryssanthène.jpg',idFiliere=1)");
$req->execute();
*/
   header('location:stagiaires.php');

?>