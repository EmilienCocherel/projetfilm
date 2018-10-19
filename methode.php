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

function deleteFilm($titre_film){
  $connexion=connect_bd();
  $req="delete from jouer where titre_film=:titre_film;";
  $stmt=$connexion->prepare($req);
  $stmt->bindParam(':titre_film', $titre_film);
  $stmt->execute();
  $req="delete from films where titre_film=:titre_film;";
  $stmt=$connexion->prepare($req);
  $stmt->bindParam(':titre_film', $titre_film);
  $stmt->execute();
}

function listActeur($titre_film){
  $connexion=connect_bd();
  $sql="select nom,prenom,nationalite,date_naiss from acteur natural join jouer natural join films where titre_film=:titre_film;";
  $stmt=$connexion->prepare($sql);
  $stmt->bindParam(':titre_film', $titre_film);
  $stmt->execute();
  return $stmt;
}
?>
