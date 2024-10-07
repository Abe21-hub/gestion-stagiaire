<?php
require_once('identifier.php');
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand"> Gestion des stagiaires</a>
        </div>
    <ul class="nav navbar-nav">
       <li> <a href="stagiaires.php">Les stagiaires</a></li>
       <li> <a href="filieres.php">Les filières </a></li>
       <li> <a href="utilisateurs.php">Les utilisateurs </a> </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
       <li> <a href="editerUtilisateur.php?idUser=<?php echo $_SESSION['user']['idUser'] ?>"><i class="glyphicon glyphicon-user"></i><?php echo ' '.$_SESSION['user']['login'] ?></a></li>
       <li> <a href="seDeconnecter.php"><i class='glyphicon glyphicon-log-out'></i>&nbsp; Se deconnecter</a></li>
    </ul>
    </div>
</nav>