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

function afficheTousFilms($sql){
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
