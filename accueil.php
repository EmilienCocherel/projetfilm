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
    <form name="f1" method="GET" action="film.php">
    <input type = "text" name = "titre_film" placeholder = "Titre Film"></input>
    <input value="Rechercher" type="submit"/>
    <?php
    require_once('connect_mysql.php');
    require_once('methode.php');
    if ((isset($_GET["titre_film"])) and (!empty($_GET["titre_film"]))){
      $connexion=connect_bd();
      $req = $connexion->prepare("select code_film from films where" .$_GET["titre_film"]. "='Iron Man 2'");
      print("Le titre du film est:");
      $film = afficheFilm($_GET["titre_film"]);
      print_r($film);
    }
    echo "<table>";
    echo "<tr>"."<th>"."Titre Film"."</th>"."<th>"."Année de sortie"."</th>"."<th>"."Durée"."</th>"."</tr>";
    foreach (afficheTousFilms("select * from films") as $f){
      echo "<tr>"."<td>".$f['titre_film']."</td>"."<td>".$f['date']."</td>"."<td>".$f['duree']."</td>"."</tr>";
    }
    echo "</table>";
    ?>
  </form>
  </body>
</html>
