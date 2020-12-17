<?php
 require('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.min.css" />
    <script src="main.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="../crud/php/main.js"></script>
</head>
<body>








<!-- code html -->

<div class="container center">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
        <form action="" method="POST">
          <div class="card-content white-text">
              <h1><span class="card-title"><h1><u><B>login admin</B></u></h1></span></h1>
            
            <div><br><br>

      <div class="input-field col s6">
      
        <input placeholder="admin name" name="nom" id="first_name2" type="text" class="validate">
        
      </div>
      
      <div class="input-field col s6">
      
        <input placeholder="password" name="pass" id="first_name2" type="password" class="validate">
        
      </div>

         <!-- //bas -->
          <div class="card-action">
            <button class="btn" type="submit" name="submit">login</button>
            <!-- <a href="register.php" class="btn">S'inscrire</a> -->
          </div>
          </form>

        </div>
      </div>
  </div>
            






 
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $nom=$_POST['nom'];
    $pass=$_POST['pass'];
// $user="NathAniel";
// $pass="kokorere21";
if ($nom&&$pass) {

    // $_SESSION['nom']=$nom;
    $Admin=$bdd->prepare("SELECT * FROM admins WHERE nom=? AND pass=?");
    $Admin->execute(array($nom,$pass));
    $ouiAdmin=$Admin->fetch(PDO::FETCH_OBJ);
    $_SESSION['nom']=$nom;
    if ($ouiAdmin) {
      // header('Location : admin.php');
      echo'<div class="container centered">';
    echo"<a>connexion, reussi</a>";
    echo"connexion reussi! <a href=\"admin.php\">Ouvrir la page admin</a>";
    echo'</div>';
    }else {
      echo'admin inconnu';
    }   
}else{
    echo"merci de remplir tous les champs";
}
}
?>