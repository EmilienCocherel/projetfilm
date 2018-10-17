<?php
require_once('connect_mysql.php');

function afficheFilm($titre_film){
  $connexion=connect_bd();
  $sql="SELECT * FROM films WHERE titre_film='$titre_film';";
  $list=" ";
  if(!$connexion->query($sql)) echo "Pb d'accès au FILM";
  else{
       foreach ($connexion->query($sql) as $row)
       if(strncasecmp ($row['titre_film'],$titre_film, strlen($titre_film))==0)
        $list=array("code_film"=>$row['code_film'],"titre_film"=>$row['titre_film'],"date"=>$row[ 'date'],"duree"=>$row[ 'duree'],"image"=>$row['image']);
       }
  return $list;
}
?>
