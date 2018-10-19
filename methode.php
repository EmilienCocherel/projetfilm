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

function prochainId(){
          $connexion=connect_bd();
          foreach ($connexion->query("SELECT max(code_film) maxi FROM films") as $id){}
            return ((int) $id["maxi"])+1;
        }

function addFilm($titre_film,$date,$duree){
  $connexion=connect_bd();
  $code_film=prochainId();
  $sql="insert into films values(:code_film, :titre_film, :date, :duree)";

  $stmt=$connexion->prepare($sql);
  $stmt->bindParam(':code_film', $code_film);
  $stmt->bindParam(':titre_film', $titre_film);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':duree', $duree);
  $stmt->execute();
}
?>
