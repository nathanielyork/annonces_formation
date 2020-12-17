<?php
require('header.php');
?>
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
<div class="container center">
<div class="card e0e0e0 grey lighten-2 ">
<form method="POST" action="" class="well col-md-6 col-md-offset-3" enctype="multipart/form-data" autocomplete="on">
    <div class="container">
             
    <div class="input-field col s6">
              AFFICHE :<input type="file" name="img">
             </div>
             <div class="input-field col s6">
              DOMAINE :
              <select class="browser-default" name="domaine" id="">
              <?php
              $dom=$bdd->prepare("SELECT * FROM domaine");
              $dom->execute();
              while($d=$dom->fetch(PDO::FETCH_OBJ)){
                ?>
               <option value="<?php echo$d->nom;?>"><?php echo$d->nom;?></option>
                <?php
              }
              ?>
              </select>
             </div>
             <div class="input-field col s6">
              FORMATEUR :
              <select class="browser-default" name="formateur">
              <?php
              $f="formateur";
              $checkformateur=$bdd->prepare("SELECT * FROM users WHERE titre=?");
              $checkformateur->execute(array($f));
              while($form=$checkformateur->fetch(PDO::FETCH_OBJ)) {
                ?>
               <option value="<?php echo$form->nom;?>"><?php echo$form->nom;?></option>
                <?php
              }
              ?>
              </select>
             </div>
             <div class="input-field col s6">
              NOM DE LA FORMATION :<input type="text" name="nom">
             </div>
             <div class="input-field col s6">
              DATE DE LA FORMATION : <input placeholder="" type="date"  name="datef" id="">
             </div>
             <div class="input-field col s6">
              DUREE DE LA FORMATION :<input type="text" name="duree">
             </div
             <div class="input-field col s6">
              LIEU DE LA FORMATION :<input type="text" name="lieu">
             </div>
             <input type="submit" value="publier" class="btn" name="submit">
             </div>
      </div>
</form>
             
  </div> 
</div>
  
</body>
<?php
               // code php publier uhe formation
                if (isset($_POST['submit'])){
                  $domaine=htmlspecialchars(trim($_POST['domaine']));
                  $formateur=htmlspecialchars(trim($_POST['formateur']));
                  $nom=htmlspecialchars(trim($_POST['nom']));
                  $datef=htmlspecialchars(trim($_POST['datef']));
                  $duree=htmlspecialchars(trim($_POST['duree']));
                  $lieu=htmlspecialchars(trim($_POST['lieu']));
                  $datep=date("d/m/y");
                  # code...//AFFICHE    
                  $img=$_FILES['img']['name'];
        $img_tmp=$_FILES['img']['tmp_name'];
        if (!empty($img_tmp)) {
            $image=explode('.',$img);
            $image_ext=end($image);
            if (in_array(strtolower($image_ext),array('png','jpg','jpeg'))==false) {
            echo'extension non supportée';    
            }else {
                $image_size=getimagesize($img_tmp);
                if ($image_size['mime']=='image/jpeg') {
                    $image_src=imagecreatefromjpeg($img_tmp);
               
                }
                elseif ($image_size['mime']=='image/png') {
                    $image_src=imagecreatefrompng($img_tmp);
                }else {
                    $image_src=false;
                    echo'image invalide';
                }
                if ($image_src!==false) {
                    $image_width=200;
                    if ($image_size[0]==$image_width) {
                        $image_finale=$image_src;
                    }else {
                        $new_width[0]=$image_width;
                        $new_height[1]=200;
                        $image_finale=imagecreatetruecolor($new_width[0],$new_height[1]);
                        imagecopyresampled($image_finale,$image_src,0,0,0,0,$new_width[0],$new_height[1],$image_size[0],$image_size[1]);
                        imagejpeg($image_finale,'formations/'.$nom.'.jpg');
                    }
                }
                //
            }
        }else {
            echo'AUCUNE AFFICHE IDENTIFIEE';
            echo'<br>';
        }

          
                  if ($nom&&$datef&&$lieu) {
                    # insertion...
                     $insertForm=$bdd->prepare("INSERT INTO formations(domaine,formateur,nom,dateform,duree,lieu,datePub) VALUES(?,?,?,?,?,?,?)");
                     $insertForm->execute(array($domaine,$formateur,$nom,$datef,$duree,$lieu,$datep));
                     echo"publié!!!!!";
                     echo$domaine;
                     echo$formateur;
                     echo$nom;
                     echo$datef;
                     echo$duree;
                     echo$lieu;
                     echo$datep;
                  }else{
                    echo"remplir tous les champs";
                  }
                }
              ?>
<?php
 include('footer.php');
  ?>