<?php require('header.php');?>

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
      <div class="container">
      <div class="col s12 m6">
        <div class="card e0e0e0 grey lighten-2 ">
        <form action="register.php" method="POST" enctype="multipart/form-data">
         <div class="card-content white-text center">
              <h3><span class="card-title"><h1><u><b>CONNEXION</b></u></h1></span></h3>
         
          </div>

          <div class="container">
            
            <div class="input-field col s6">
            <!-- titre<input type="text" name="titre"> -->
            <select name="titre" class="browser-default">
          <option value="postulant">postulant</option>
          <option value="formateur">formateur</option>
          </select>
             </div>
             <div class="input-field col s6">
             NOM D'UTILISATEUR : <input type="text" name="nom">
             </div>
             <!-- <div class="input-field col s6">
             PRENOM D'UTILISATEUR :<input type="text" name="prenom">
             </div> -->
             <div class="input-field col s6">
             CONTACT :<input type="text" name="contact">
             </div>
             <div class="input-field col s6">
             ADRESSE EMAIL :<input type="email" name="mail">
             </div>
             <div class="input-field col s6">
             VILLE :<input type="text" name="ville">
             </div>
             <div class="input-field col s6">
             MOT DE PASSE :<input type="password" name="pass1">
             </div>
             <div class="input-field col s6">
              CONFIRMATION DU MOT DE PASSE :<input type="password" name="pass2">
             </div>
             <div class="input-field col s6">
              AJOUTER UNE PHOTO DE PROFIL :<input type="file" name="img">
             </div>
             <div class="card-action center">
          <input type="submit" name="submit" class="btn" value="s'inscrire">
            <a href="login.php" class="btn">j'ai un compte</a>
          </div
          </div>
          </div>
      </form>
  </div>
  </div>
</body>
</html>

<?php if (isset($_POST['submit'])) {
    $titre=$_POST['titre'];
    $nom=$_POST['nom'];
    $contact=$_POST['contact'];
    $mail=$_POST['mail'];
    $ville=$_POST['ville'];
  $pass1=sha1($_POST['pass1']);
  $pass2=sha1($_POST['pass2']);
  $D=date("d/m/y");
  //profil image
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
                        imagejpeg($image_finale,'profiles/'.$nom.'.jpg');
                    }
                }
                //
            }
        }else {
            echo'AUCUNE PHOTO DE PROFIL IDENTIFIEE';
            echo'<br>';
        }


  if ($titre&&$nom&&$contact&&$mail&&$ville&&$pass1&&$pass2) {
if ($pass1==$pass2) {
    $motdepasse=$pass1;
    $Insert=$bdd->prepare("INSERT INTO users(titre,nom,contact,mail,ville,pass,datecompte) VALUES(?,?,?,?,?,?,?)");
    $Insert->execute(array($titre,$nom,$contact,$mail,$ville,$motdepasse,$D));
    echo'compte cree';
}else {
  echo'pass diff';
}

  }else {
    echo'remplir tout';
  }
} 
?>

<?php include('footer.php'); ?>