<?php
    require_once('identifier.php');
    require_once('connexiondb.php');

    $ids=isset($_POST['idS'])?$_POST['idS']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"";
    $idFiliere=isset($_POST['idFiliere'])?$_POST['idFiliere']:"";

    $nomPhoto=isset($_FILES['Photo']['name'])?$_FILES['Photo']['name']:"";
    
    $imageTemp=$_FILES['nomPhoto']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    // echo $nomPhoto."<br>";
    // echo $imageTemp;

    if ( !empty($nomPhoto) )
    {
        $requete="update stagiaire set nom=?,prenom=?,civilite=?,idFiliere=?,photo=? where idStagiaire=?";
        $params=array($nom,$prenom,$civilite,$idFiliere,$nomphoto,$ids);
        
    }else
        {      
            $requete="update stagiaire set nom=?,prenom=?,civilite=?,idFiliere=? where idStagiaire=?";
            $params=array($nom,$prenom,$civilite,$idFiliere,$ids);
        }
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
   
   header('location:stagiaires.php');
?>