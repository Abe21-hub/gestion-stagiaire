<?php
require_once('identifier.php');
require_once("connexiondb.php");

$login= isset($_GET['login'])?$_GET['login']:"";

$size = isset($_GET['size']) ? $_GET['size'] : 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $size;

$requeteUser="select * from utilisateur where login like '%$login%'";
$requeteCount="select count(*) countUser from utilisateur";

$resultatUser = $pdo->query($requeteUser);
$resultatCount = $pdo->query($requeteCount);

$tabCount = $resultatCount->fetch();
$nbrUser = $tabCount['countUser'];
$reste = $nbrUser % $size;
$nbrPage = ($reste === 0) ? ($nbrUser / $size) : floor($nbrUser / $size) + 1;
                                                    
?>
<!DOCTYPE HTML>
<html>
<head> 
    <meta charset="utf-8">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
</head>
<body>
    <?php include("menu.php"); ?>
    <br><br><br>
    <div class="container">
        <div class="panel panel-success margetop60">
            <div class="panel-heading">Rechercher des utilisateurs</div>
            <div class="panel-body">
                <form method="get" action="utilisateurs.php" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="login" 
                        placeholder="Nom et prénom" 
                        class="form-control" 
                        value="<?php echo $login ?>"/>
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span>
                        chercher...
                    </button>
                </form>
            </div>
        </div>    
        <div class="panel panel-primary">
            <div class="panel-heading">Liste des utilisateurs (<?php echo $nbrUser ?> utilisateurs)</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>login</th> <th>Email</th> <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php while ($user = $resultatUser->fetch()) { ?>
                            <tr class = "<?php echo $user['etat']==1?'success':'danger'?>">
                                <td><?php echo htmlspecialchars($user['login']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['role']); ?></td>
                                <td>
                                    <a href="editerUtilisateur.php?idUser=<?php echo htmlspecialchars($user['idUser']); ?>">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    
                                   &nbsp;&nbsp;
                                    <a onclick="return confirm('Etes-vous sûr de vouloir supprimer cet utilisateur');" href="supprimerUtilisateur.php?idUser=<?php echo htmlspecialchars($user['idUser']); ?>">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                        
                                     &nbsp;&nbsp;
                                    <a href="activerUtilisateur.php?idUser=<?php echo htmlspecialchars($user['idUser']); ?>&etat=<?php echo htmlspecialchars($user['etat']); ?>">
                                        
                                    <?php 
                                    if($user['etat']==1){
                                        echo "<span class='glyphicon glyphicon-remove'></span>";
                                    }else{
                                        echo "<span class='glyphicon glyphicon-ok'></span>";
                                     }
                                    ?>
                                        
                                    </a>
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <ul class="pagination pagination-md">
                        <?php for ($i = 1; $i <= $nbrPage; $i++) { ?>
                            <li class="<?php if ($i == $page) echo 'active'?>"> 
                                <a href="utilisateurs.php?page=<?php echo $i; ?>&login=<?php echo htmlspecialchars($login); ?>">
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
