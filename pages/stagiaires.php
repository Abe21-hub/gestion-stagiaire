<?php
require_once('identifier.php');
require_once("connexiondb.php");

// Récupération des paramètres
$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";
$filiere = isset($_GET['filiere']) ? $_GET['filiere'] :0;

$size = isset($_GET['size']) ? $_GET['size'] : 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

// requete pour obtenir les stagiaires
if ($filiere === 0) {
    $requeteStagiaire = "SELECT idStagiaire, nom, prenom, nomFiliere, photo, civilite FROM filiere as f, stagiaire as s WHERE f.idFiliere=s.idFiliere and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') order by idStagiaire LIMIT $size OFFSET $offset";
    
    $requeteCount = "SELECT COUNT(*) AS countS FROM stagiaire
                     WHERE nom LIKE '%$nomPrenom%' or prenom like '%$nomPrenom%'";
} else {
   $requeteStagiaire = "SELECT idStagiaire, nom, prenom, nomFiliere, photo, civilite FROM filiere as f, stagiaire as s WHERE f.idFiliere=s.idFiliere and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')  and f.idFiliere=$filiere order by idStagiaire LIMIT $size OFFSET $offset";
    
    $requeteCount = "SELECT COUNT(*) AS countS FROM stagiaire WHERE (nom LIKE '%$nomPrenom%' or prenom like '%$nomPrenom%') and f.idFiliere=$filiere ";
}

$resultatStagiaire = $pdo->query($requeteStagiaire);
$resultatCount = $pdo->query($requeteCount);
$tabCount = $resultatCount->fetch();

$nbrStagiaire = $tabCount['countS'];
$reste = $nbrStagiaire % $size;
$nbrPage = ($reste === 0) ? ($nbrStagiaire / $size) : floor($nbrStagiaire / $size) + 1;
                                                       
// Requête pour obtenir les filières
$requeteFiliere = "SELECT * FROM filiere";
$resultatFiliere = $pdo->query($requeteFiliere);
?>

<!DOCTYPE HTML>
<html>
<head> 
    <meta charset="utf-8">
    <title>Gestion des stagiaires</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
    <?php include("menu.php"); ?>
    <br><br><br>
    <div class="container">
        <div class="panel panel-success margetop60">
            <div class="panel-heading">Rechercher des stagiaires</div>
            <div class="panel-body">
                <form method="get" action="stagiaires.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="nomPrenom" 
                        placeholder="Nom et prénom" 
                        class="form-control" 
                        value="<?php echo htmlspecialchars($nomPrenom); ?>"/>
                    </div>
                    <label for="filiere">Filière</label>
                    <select name="filiere" class="form-control" id="filiere" onchange="this.form.submit()">
                        <option value="all">Toutes les filières</option>    
                        <?php while ($filiere = $resultatFiliere->fetch()) { ?>                   
                            <option value="<?php echo htmlspecialchars($filiere['nomFiliere']); ?>"
                            <?php if ($filiere['nomFiliere'] == $filiere) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($filiere['nomFiliere']); ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span>
                        chercher...
                    </button>
                     &nbsp;  &nbsp;
                    <?php if ($_SESSION['user']['role']== 'ADMIN') { ?>
                        <a href="nouveauStagiaire.php">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nouveau Stagiaire
                        </a>
                    <?php } ?>
                </form>
            </div>
        </div>    
        <div class="panel panel-primary">
            <div class="panel-heading">Liste des stagiaires (<?php echo htmlspecialchars($nbrStagiaire); ?> Stagiaires)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id Stagiaire</th> <th>Nom</th> <th>Prénom</th>
                            <th>Filière</th><th>Photo</th>
                            <?php if ($_SESSION['user']['role']== 'ADMIN') { ?>
                                <th>Actions</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($stagiaire = $resultatStagiaire->fetch()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($stagiaire['idStagiaire']); ?></td>
                                <td><?php echo htmlspecialchars($stagiaire['nom']); ?></td>
                                <td><?php echo htmlspecialchars($stagiaire['prenom']); ?></td>
                                <td><?php echo htmlspecialchars($stagiaire['nomFiliere']); ?></td>
                                <td><img src="../images/<?php echo htmlspecialchars($stagiaire['photo']); ?>" alt="Photo" width ='50px' height='50px'class='img-circle'></td>
                                 <?php if ($_SESSION['user']['role']== 'ADMIN') { ?>
                                <td>
                                    <a href="editerStagiaire.php?idS=<?php echo htmlspecialchars($stagiaire['idStagiaire']); ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    &nbsp;
                                    <a onclick="return confirm('Etes-vous sûr de vouloir supprimer le stagiaire?');" href="supprimerStagiaire.php?idS=<?php echo htmlspecialchars($stagiaire['idStagiaire']); ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                                <?php }?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination pagination-md">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                            <li class="<?php if ($i == $page) echo 'active'; ?>"> 
                                <a href="stagiaires.php?page=<?php echo $i; ?>&nomPrenom=<?php echo htmlspecialchars($nomPrenom); ?>&filiere=<?php echo htmlspecialchars($filiere); ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>  
    </div>  
</body>
</html>
