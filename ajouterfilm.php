<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="ajouterfilm.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><i class="material-icons"><a href = "ajouterfilm.html">add</a></i></li>
          <li><a href="badges.html">Components</a></li>
          <li><a href="collapsible.html">JavaScript</a></li>
        </ul>
      </div>
    </nav>
    <div class="col s12 m2 div-add">
        <p class="z-depth-1">z-depth-1</p>
    </div>
    <section>
      <?php
        if(!isset($_POST['titre_original'])){
          ?>
          <div class="form-style-8">
            <h2>Ajouter un nouveau film</h2>
            <form action='formulaireFilm.php' method="POST">
              <input type="text" name="titre_film" placeholder="Titre">
              <input type="text" name="date" placeholder="Année de sortie">
              <input type="text" name="duree" placeholder="Durée du film">

              <input type="submit" name="ajouterfilm" value="Ajouter le film">
            </form>
          </div>

        <?php
        }
        else{

          $file_db=new PDO("sqlite:donnees.sqlite");
          $real= $file_db->query("SELECT code_indiv from individus where nom LIKE '".$_POST['realisateur']."%'");
          $maxi= $file_db->query("SELECT max(code_film) from films");
          $result = $real->fetchAll();
          $max = $maxi->fetchAll();

          $req = $file_db->prepare("INSERT INTO films(code_film,titre_film, date, duree,) VALUES( :code_film, :titre_film, :date, :duree)");

          if($result){

          $req->execute(array(
            'code_film'=>$max['0']['0']+1,
          	'titre_film' => $_POST['titre_film'],
          	'date' => $_POST['date'],
          	'duree' => $_POST['duree'],
          	));
            echo "Le film ";
            echo $_POST['titre_film'];
            echo ' a bien été ajouté !';
            ?>
            <form action='accueil.html' ,method="POST">
              <input type="submit" name="ok" value="ok">
            </form>
          <?php
          }
          else{
            echo"ajouter le réalisateur";
            ?>
            <form action='formulaireReal.php' ,method="POST">
              <input type="submit" name="AjoutReal" value="Ajouter le réalisateur">
            </form>
            <?php

          }
        }
      ?>



    </section>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  </body>
</html>
