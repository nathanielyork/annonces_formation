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
    $fff="formateur";
        $LESfORMATEURS=$bdd->prepare("SELECT * FROM users WHERE titre=?");
        $LESfORMATEURS->execute(array($fff));
        while ($unformateur=$LESfORMATEURS->fetch(PDO::FETCH_OBJ)) {
          # code...?>
          <div class="card">
          <img src="profiles/<?=$unformateur->nom;?>.jpg" class="circle" alt="">
          <div class="card-content">
          <?=$unformateur->nom;?><br>
          <img src="img/01.jpg" width="14px" height="14px" alt=""> <?=$unformateur->contact;?>
          <img src="img/email_26px.png" width="14px" height="14px" alt=""> <?=$unformateur->mail;?>
          habite à <?=$unformateur->ville;?></div>
          </div>
               <?php }
    ?>
        
</body>
</html>
<?php include('footer.php'); ?>