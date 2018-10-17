<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="accueil.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><i class="material-icons"><a href = "ajouterfilm.html">add</a></i></li>
          <li><a href = "accueil.php">Home</a></li>
        </ul>
      </div>
    </nav>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <?php
    require_once('connect_mysql.php');
    require_once('methode.php');
    $req = $connexion->prepare("select code_film from films where" .$_GET["titre_film"]. "='titre_film'");
    if ((isset($_GET["titre_film"])) and (!empty($_GET["titre_film"]))){
      if(!$req){
      $connexion=connect_bd();
      print("Le titre du film est: ");
      $film = afficheFilm($_GET["titre_film"]);
      print_r($film["titre_film"]);
      echo "<br>";
      print("La durée du film est: ");
      print_r($film["duree"]);
      print("min");
      echo "<br>";
      echo "<form action='supprimerfilm.php' ,method='REQUEST'>";
      echo "<input value='Supprimer' type='submit'/>";
      echo "</form>";
      }
    else{
      echo "Inexistant";
      echo "<br>";
      echo "<form action='supprimerfilm.php' ,method='REQUEST'>";
      echo "<input value='Supprimer' type='submit'/>";
      echo "</form>";
    }

    }


    ?>
  </body>
</html>
