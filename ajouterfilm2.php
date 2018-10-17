<?php
  require_once("methode.php");
  addFilm($_GET["titre_film"], $_GET["annee"], $_GET["duree"]);
  header("Location: ajouterfilm.html");
  die();
  ?>
