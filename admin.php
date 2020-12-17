<?php require('header.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
   
<a href="?action=ajouteradmin"><strong class="btn">Ajouter un admin</strong></a>
<a href="?action=listedesutilisateurs"><strong class="btn">liste des utilisateur</strong></a>
<!-- <a href="?action=listedespostulants"><strong class="btn">liste des postulants</strong></a> -->
<a href="?action=ajouterdomaine"><strong class="btn">Ajouter un domaine de formation</strong></a>
<a href="?action=formations"><strong class="btn">FORMATIONS</strong></a>
<a href="?action=ajouteradmin"><strong class="btn">Aouter un admin</strong></a>
<body>    
</body>
</html>
<?php 
if(!$_SESSION['nom']){
    header('Location: index.php');
}

if (isset($_GET['action'])) {
    if ($_GET['action']=='ajouteradmin') {
        # code...
        ?>
        <!-- code html ajout admin -->
        <div class="container center">
        <div class="card blue-grey darken-1">
        <form action="" method="POST">
          <div class="card-content white-text">
              <h1><span class="card-title"><h3><u><B>AJOUTER UN ADMIN</B></u></h3></span></h1>
            
            <div><br><br>

      <div class="input-field col s6">
      
        <input placeholder="admin name" name="nom" id="first_name2" type="text" class="validate">
        
      </div>
      
      <div class="input-field col s6">
      
        <input placeholder="password" name="pass" id="first_name2" type="password" class="validate">
        
      </div>

         <!-- //bas -->
          <div class="card-action">
            <button class="btn" type="submit" name="submit">ajouter</button>
            <!-- <a href="register.php" class="btn">S'inscrire</a> -->
          </div>
          </form>

        </div>
      </div>
  </div>
<?php
        // code php ajout admin
        if (isset($_POST['submit'])) {
            $nom=$_POST['nom'];
    $pass=$_POST['pass'];
// $user="NathAniel";
// $pass="kokorere21";
if ($nom&&$pass) {

    // $_SESSION['nom']=$nom;
    $insertAd=$bdd->prepare("INSERT INTO admins(nom,pass) VALUES(?,?)");
    $insertAd->execute(array($nom,$pass));
    
}else{
    echo"merci de remplir tous les champs";
}
        }
    }elseif ($_GET['action']=='ajouterdomaine') {
        # code...ajouter un domaine php
if (isset($_POST['submit'])) {
    # code...
    $nom=$_POST['nom'];
    if ($nom) {
        $d=$bdd->prepare("SELECT * FROM domaine WHERE nom=?");
        $d->execute(array($nom));
        $dE=$d->fetch(PDO::FETCH_OBJ);
        if ($dE) {
            echo"ce nom de domaine existe deja";
        }else {
        $insererDom=$bdd->prepare("INSERT INTO domaine(nom) VALUES(?)");
        $insererDom->execute(array($nom));
        echo"domaine ajouté!!";
        }

    }else {
        echo"merci de saisir le nom du domaine.";
    }
}
        # code...ajouter un domaine php
        ?>

        <!-- # code...ajouter un domaine html -->
       <div class="container center">
    <div class="card e0e0e0 grey lighten-2 ">
<form action="" method="POST">
<div>
<input type="text" name="nom"></div>
<input type="submit" value="ajouter" class="btn" name="submit">
</form>
</div>
</div>

        <!-- # code...ajouter un domaine html -->

        <?php
    }elseif (isset($_GET['action'])=='listedesutilisateurs') {
        ?>
         <table>
        <thead>
          <tr>
              <th>TITRE</th>
              <th>NOM</th>
              <th>CONTACT</th>
              <th>MAIL</th>
              <th>VILLE</th>
              <th>PHOTO DE PROFIL</th>
          </tr>
        </thead>
        <?php
        # code...execute()
        $lesUtilisateurs=$bdd->prepare("SELECT * FROM users ORDER BY id DESC");
        $lesUtilisateurs->execute();
        while ($u=$lesUtilisateurs->fetch(PDO::FETCH_OBJ)) {
            # code?>
             <tbody>
          <tr>
          <td><?=$u->titre;?></td>
          <td><?=$u->nom;?></td>
          <td><?=$u->contact;?></td>
          <td><?=$u->mail;?></td>
          <td><?=$u->ville;?></td>
          <td><img src="profiles/<?=$u->nom;?>.jpg" height="40px" width="40px" class="circle" alt="<?=$u->nom;?>"></td>
            <!-- html ls users -->
            <?php
        }
        ?>
        </tr>
        </tbody>
      </table>
      <?php
    }
}

?>
</div>
<?php require('footer.php') ?>