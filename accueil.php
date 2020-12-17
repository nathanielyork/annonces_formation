<?php include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/materialize.min.css" />
    <script src="main.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
</head>
<body>
    <?php
        $Lesformations=$bdd->prepare("SELECT * FROM formations ORDER BY dateform DESC");
        $Lesformations->execute();
        while ($uneForm=$Lesformations->fetch(PDO::FETCH_OBJ)) {
          # code...
          if (isset($_POST['suivre'])) {
            #suivre une formation
            header('Location: login.php');
            if (!$_SESSION['nom']) {
              echo"vous devez d'abord vous connecter";
              echo'<a href="login.php">connexion</a>';
            }else {
              $form=$uneForm->nom;
            $post=$_SESSION['nom'];
            $InsertSuivre=$bdd->prepare("INSERT INTO suivre(formation,postulant) VALUES(?,?)");
            $InsertSuivre->execute(array($form,$post));
            echo"rendez-vous fixé";
            echo$post;
            echo$form;
            }
          }
          ?>
           <div class="container center">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image small">
          <img height="400px" width="300px" src="formations/<?=$uneForm->nom;?>.jpg">
          <span class="card-title"><h1><?=$uneForm->nom;?><br></h1></span>
          <div class="card-action">
          <form action="" method="POST"><input type="submit" value="suivre" name="suivre" class="btn"></form>
          </div>
        </div>
        <div class="card-content">
          <p>
         ( <?=$uneForm->domaine;?>)<br>
        Par:  <?=$uneForm->formateur;?><br>
         Le: <?=$uneForm->dateform;?><br>
         Duree <?=$uneForm->duree;?><br>
         Lieu: <?=$uneForm->lieu;?><br>
          </p>
        </div>
      </div>
    </div>
  </div>
        <?php
        }
        ?>
</body>
</html>
<?php include('footer.php'); ?>