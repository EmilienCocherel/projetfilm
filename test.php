<?php
// on se connecte à MySQL
$db = mysql_connect('localhost', 'jmartin', 'jmartin');

// on sélectionne la base
mysql_select_db('dbjmartin',$db);

// on crée la requête SQL
$sql = 'SELECT * FROM films';

// on envoie la requête
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

// on fait une boucle qui va faire un tour pour chaque enregistrement
while($data = mysql_fetch_assoc($req))
    {
    // on affiche les informations de l'enregistrement en cours
    echo '<b>'.$data['nom'].' '.$data['prenom'].'</b> ('.$data['statut'].')';
    echo ' <i>date de naissance : '.$data['date'].'</i><br>';
    }

// on ferme la connexion à mysql
mysql_close();
?>
