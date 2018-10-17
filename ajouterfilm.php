<!DOCTYPE html>
<html lang='fr'>
<head>
<meta charset="utf-8"/>
<title>Ajout film</title>
</head>
<body>
    <?php
        if((!isset($_REQUEST["titre"])) and (isset($_REQUEST["date"])) and (isset($_REQUEST["duree"])) and
          (!empty($_REQUEST["titre"])) and (!empty($_REQUEST["date"])) and (!empty($_REQUEST["duree"]))){
            
          $file_db=new PDO("mysql:creationBD.sql");
          $maxi= $file_db->query("SELECT max(code_film) from films");
          $result = $real->fetchAll();
          $max = $maxi->fetchAll();

          $req = $file_db->prepare("INSERT INTO films(code_film, titre, date, duree, image) VALUES( :code_film, :titre, :date, :duree, 'None')");

          /*if($result){*/

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
          //}
        }
      ?>



    </section>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  </body>
</html>
