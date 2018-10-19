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
          <li><a href = "ajouterfilm.html">Ajouter un film</a></i></li>
          <li><a href = "supprimerfilm.php">Supprimer un film</a></i></li>
          <li><a href = "accueil.php">Home</a></li>
        </ul>
      </div>
    </nav>
    <center>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <?php
    require_once('connect_mysql.php');
    require_once('methode.php');
    if ((isset($_GET["titre_film"])) and (!empty($_GET["titre_film"]))){
      $connexion=connect_bd();
      if (afficheFilm($_GET["titre_film"])->rowCount() == 0){
        echo "<h1>Désolé, le film recherché n'est pas dans la base de donnée.</h1>";
      }
      else{
        foreach (afficheFilm($_GET["titre_film"]) as $film) {
            echo "<img src='$film[image]' height=250px><br>";
            echo $film['titre_film']." dure : ".$film["duree"]."min<br>";
            echo $film['titre_film']." est sortie en ".$film['date'];
        }
      }
    }


    ?>
  </center>
  </body>
</html>
