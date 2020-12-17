
	<?php
	 require'header.php';

	?>
	
	<?php 
if (!isset($_SESSION['nom'])) {
	header('location: login.php');
	}
	if (isset($_GET['action'])) {
		if ($_GET['action']=='deconnexion') {
			session_destroy();
			unset($_SESSION['nom']);
			header("location: accueil.php");
		}
		}
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROFIL</title>
</head>
<body>
</a>
<div class="container center">
<a href="?action=deconnexion"><strong class="btn">Se Deconnecter</strong></a>
</div>
<div class="container center">
<div class="card z-depth-2">

<div class="card-title"><h2>VOTRE PROFIL:</h2></div>
VUE : <br><img class="circle" src="profiles/<?php echo $_SESSION['nom']; ?>.jpg" alt=""><br>
     
<strong>
<b><?=$_SESSION['nom'];?></b><br>
 <?=$_SESSION['titre'];?> à 
     <?=$_SESSION['ville'];?><br>
    <img src="img/01.jpg" width="14px" height="14px" alt=""> <?=$_SESSION['contact'];?>
	<img src="img/email_26px.png" width="14px" height="14px" alt=""><?=$_SESSION['mail'];?><br>
	 </strong>
	 </div>
</div>
</body>
</html>

<?php require'footer.php';

?>
