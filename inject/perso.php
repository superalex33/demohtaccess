<html>
<head>
    <link href="main.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main">

<?php

include 'fonctions.php';

if (!(valid($_POST['login']) and valid($_POST['mdp']))) {
echo "<span style='color:red'>Caractères non permis</span> <br>
<a href='index.php'>Retour à la page d'accueil</a>";
exit();
}

$l = $_POST['login'];
$p = hash('sha256',$_POST['mdp']);
$sql_u = "SELECT id,nom,prenom 
			FROM Utilisateur 
			WHERE login = '$l' AND mdp = '$p'";

#print_r($sql_u."<br>");

$cn = connexion();

$resultat = mysql_query($sql_u,$cn);

if (mysql_num_rows($resultat) == 0) { 
	echo "<span style='color:red'>Erreur d'authentification!</span> <br>
	<a href='index.php'>Retour Ã  la page d'accueil</a>";
	exit();
} else { 
	while ($r = mysql_fetch_array($resultat)) {
		$nom = $r['nom'];
		$prenom = $r['prenom'];
		$id = $r['id'];
	}
}
?>
<h2>Bienvenue, <?php echo $prenom.' '.$nom ?>!</h2>



</div>
</body>
</html>
