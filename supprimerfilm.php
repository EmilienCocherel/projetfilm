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
<section>
    <?php
      if(!isset ($_REQUEST['titre_film'])){
    ?>
    <div class="form-style-8">
      <h2>Supprimer un film</h2>
      <form action='supprimerfilm.php' method="REQUEST">
        <ul>
        <li><input type="text" name="titre_film" placeholder="Entrez le titre du film"></li>
        <li><input type="submit" name="ajouterfilm" value="Supprimer"></li>
      </ul>
      </form>
    </div>
      <?php
    }
    else{
    require_once('connect_mysql.php');
    require_once('methode.php');
    $connexion=connect_bd();
    deleteFilm($_REQUEST['titre_film']);
    echo '<h1>Le film a bien été supprimé<h1>';
    ?>
    <form action='accueil.php' ,method="REQUEST">
      <input type="submit" name="ok" value="ok">
    </form>
    <?php
    }
    ?>
    </section>
    </center>
</body>
</html>
