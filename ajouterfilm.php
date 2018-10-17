      <?php
        if((!isset($_REQUEST["titre"])) and (isset($_REQUEST["date"])) and (isset($_REQUEST["duree"])) and
          (!empty($_REQUEST["titre"])) and (!empty($_REQUEST["date"])) and (!empty($_REQUEST["duree"]))){
          ?>
          <div class="form-style-8">
            <h2>Ajouter un nouveau film</h2>
            <form action='formulaireFilm.php' method="REQUEST">
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
          $real= $file_db->query("SELECT code_indiv from individus where nom LIKE '".$_REQUEST['realisateur']."%'");
          $maxi= $file_db->query("SELECT max(code_film) from films");
          $result = $real->fetchAll();
          $max = $maxi->fetchAll();

          $req = $file_db->prepare("INSERT INTO films(code_film,titre_film, date, duree,) VALUES( :code_film, :titre_film, :date, :duree)");

          if($result){

          $req->execute(array(
            'code_film'=>$max['0']['0']+1,
          	'titre_film' => $_REQUEST['titre_film'],
          	'date' => $_REQUEST['date'],
          	'duree' => $_REQUEST['duree'],
          	));
            echo "Le film ";
            echo $_REQUEST['titre_film'];
            echo ' a bien été ajouté !';
            ?>
            <form action='accueil.html' ,method="REQUEST">
              <input type="submit" name="ok" value="ok">
            </form>
          <?php
          }
          else{
            echo"ajouter le réalisateur";
            ?>
            <form action='formulaireReal.php' ,method="REQUEST">
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
