<?php 

function valid($s) {
$rx = "/^[a-z0-9]+$/i";
return preg_match($rx,$s);
}


function connexion() {
	#------------------------
	# MODIFIER SELON VOS PARAMETRES
	$dbsrv = "10.30.242.240";
	#------------------------
	$dblogin = "inject";
	$dbpsw = "abc-123";
	$bd = "inject";
	
	$cn = mysql_connect($dbsrv,$dblogin,$dbpsw);
	if (!$cn) {
		die('Erreur de connexion: ' . mysql_error());
	}
	mysql_select_db($bd);	
	
	return $cn;
}