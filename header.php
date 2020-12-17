<?php 
session_start();
require'bdd.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>formatog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.min.css" />
    <script src="main.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
</head>
<body>
    
<header>
    
        
  <nav>
    <div class="nav-wrapper">
      <!-- <a href="acuueil.html" class="brand-logo"><img src="9.png" alt="logo" height="" width="50px"></a><br> -->
      <ul class="right hide-on-med-and-down">
        <li><a href="accueil.php" class="waves-light btn">Accueil</a></li>
        <li><a href="login.php" class="waves-light btn">Connexion</a></li>
        <li><a href="profile.php" class="waves-light btn">profile</a></li>
        <li><a href="publier.php" class="waves-light btn">Publier</a></li>
        <li><a href="decouvrir_des_formateurs.php" class="waves-light btn">Découvrir des formateurs</a></li>
        <li><a href="contact.php" class="waves-light btn">Contacts</a></li>
        <li><a href="apropos.php" class="waves-light btn">A propos</a></li>
        <!-- <li><a class="waves-effect waves-light btn">Button <i class="material-icons right">cloud</i></a></li>
        <li><a class="waves-effect waves-light btn-large">Large Button</a></li> -->
      </ul>
    </div>
  </nav>

</header>

</body>
</html>