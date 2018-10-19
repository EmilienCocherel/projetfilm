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
    <form name="f1" method="GET" action="film.php">
    <div class=div_search_film>
    <input type="text" name = "titre_film" placeholder = "Titre Film"></input>
    <input value="Rechercher" type="submit"/>
  </div>
    <?php
    require_once('connect_mysql.php');
    require_once('methode.php');

    echo "<table>";
    echo "<tr>"."<th>"."Titre Film"."</th>"."<th>"."Année de sortie"."</th>"."<th>"."Durée"."</th>"."</tr>";
    foreach (afficheTous("select * from films") as $f){
      echo "<tr>"."<td>"."<a href='film.php?titre_film=$f[titre_film]'>".$f['titre_film']."</a>"."</td>"."<td>".$f['date']."</td>"."<td>".$f['duree']."min"."</td>"."</tr>";
    }
    echo "</table>";
    ?>
  </form>
  </center>
  </body>
</html>
