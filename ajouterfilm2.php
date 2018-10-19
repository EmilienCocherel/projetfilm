<?php
  require_once("methode.php");
  addFilm($_GET["titre_film"], $_GET["date"], $_GET["duree"]);
  header("Location: ajouterfilm.html");
  echo "Le film";
  die();
  ?>
