<?php
require_once('connexiondb.php');
require_once('identifier.php');
?>

<!DOCTYPE HTML>
<html>
<head>
     <meta charset= "utf-8">
         <title>Changement de mot de passe</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../js/monjs.js"></script>
    
</head>
<body>



<div class="container editpwd-page">
    <h1 class="text-center">Changement du mot de passe</h1>
    
    <h2 class='text-center'> Compte :<?php echo $_SESSION['user']['login'] ?></h2>
    
    <form class='form-horizontal' method="post" action="updatePwd.php">
        
        
        <!-- *************Début Ancien mot de passe*****-->
                 
<div class='input-container'>
            <input
                   minlength=3
                   class='form-control oldPwd'
                   type='text'
                   name='oldPwd'
                   autocomplete='false'
                   placeholder='Taper votre Ancien Mot de passe'
                   required/>
    <i class="fa fa-eye fa-2x show-old-pwd clickable"></i>
 </div>
        
<!-- ******************fin Ancien mot de passe ****** -->
        
<!--****************Debut Nouveau mot de passe ******* -->
       
<div class='input-container'>
        <input
                   minlength=4
                   class='form-control newPwd'
                   type='text'
                   name='newPwd'
                   autocomplete='false'
                   placeholder='Taper votre nouveau Mot de passe'
                   required/>
    <i class="fa fa-eye fa-2x show-new-pwd  clickable"></i>
        
 </div>
<!-- ***************** fin Nouveau mot de passe ****** -->
        
<!-- ****************** start submit field ****** -->
 
<div class='input-container'>
 <input 
        type='submit'
        value='Enregistrer'
        class='btn btn-primary btn-block'/>
    </div>
    </form> 
</div>
</body>
</html>