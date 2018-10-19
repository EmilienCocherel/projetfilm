<?php
require_once('connect_mysql.php');

function afficheFilm($titre_film){
  $connexion=connect_bd();
  $sql="select * from films WHERE titre_film='$titre_film';";
  return afficheTous($sql);
}

function afficheTous($sql){
  $connexion=connect_bd();
  $res=$connexion->query($sql);
  return $res;
}

function addFilm($titre_film,$date,$duree,$image){
  $connexion=connect_bd();
  $sql="insert into films values(:titre_film, :date, :duree, :image)";

  $stmt=$connexion->prepare($sql);
  $stmt->bindParam(':titre_film', $titre_film);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':duree', $duree);
  $stmt->bindParam(':image', $image);
  $stmt->execute();
}
?>
