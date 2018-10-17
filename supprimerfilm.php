<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supprimer film</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<section>
    <?php
      if(!isset ($_REQUEST['titre_film'])){
    ?>
    <div class="form-style-8">
      <h2>Supprimer un film</h2>
      <form action='supprimerfilm.php' method="REQUEST">
        <input type="text" name="titre_film" placeholder="Entrez le titre du film">
        <input type="submit" name="ajouterfilm" value="Supprimer">
      </form>
    </div>

      <?php
    }
    else{

    $file_db=new PDO("sqlite:donnees.sqlite");
    $req = $file_db->prepare("DELETE FROM films WHERE titre_film LIKE '".$_REQUEST['titre_film']."'");

    $req->execute();

      echo 'Le film a bien été supprimé';
      ?>
      <form action='accueil.html' ,method="REQUEST">
        <input type="submit" name="ok" value="ok">
      </form>
      <?php

    }
      ?>

    </section>

    
</body>
</html>