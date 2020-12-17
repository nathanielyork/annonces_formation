<?php 
session_start();
if (isset($_SESSION['nom'])) {
  header('Location:mes_formation.php');
}
include('header.php')
?>



<?php
//code..
if (isset($_POST['submit'])) {
  $nom=$_POST['nom'];
  $pass=sha1($_POST['pass']);
  if ($nom&&$pass) {
    # tous les champs sont remplis
    //traitement
    $userExiste=$bdd->prepare("SELECT * FROM users WHERE nom=? AND pass=?");
    $userExiste->execute(array($nom,$pass));
    $unUser=$userExiste->fetch(PDO::FETCH_OBJ);
    if ($unUser) {
      $_SESSION['titre']=$unUser->titre;
      $_SESSION['nom']=$unUser->nom;
      // $_SESSION['nom']=$nom;
      $_SESSION['contact']=$unUser->contact;
      $_SESSION['mail']=$unUser->mail;
      $_SESSION['ville']=$unUser->ville;
      $_SESSION['datecompte']=$unUser->datecompte;
      echo'vous etes connecte';
      echo'<a href="profile.php">profile</a>';
      // header('Location : profile.php');
    }else {
      echo'<div class="container center">';
      echo'We havent seen this account in our database!!!!!';
      echo'</div>';
    }
  }else {
    echo"Vous navez pas rempli tous les champs";
  }
}
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>login</title>
</head>
<body>
<div class="container center">
<div class="card e0e0e0 grey lighten-2 ">
<form method="POST" action="login.php" class="well col-md-6 col-md-offset-3" autocomplete="on">
    <div class="container">
             
             <div class="input-field col s6">
              NOM D'UTILISATEUR :<input type="text" name="nom">
             </div>
             <div class="input-field col s6">
              MOT DE PASSE :<input type="password" name="pass">
             </div>
             <div class="card-action">
             <input type="submit" value="se connecter" class="btn" name="submit">
             <a class="btn" href="register.php">je n'ai pas de compte</a>
             </div>
      </div>
</form>
             
  </div> 
</div>
</body>
</html>



<?php require('footer.php');?>