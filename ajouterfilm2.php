<?php
  if((isset($_REQUEST["titre_film"])) and (isset($_REQUEST["date"])) and (isset($_REQUEST["duree"])) and
    (!empty($_REQUEST["titre_film"])) and (!empty($_REQUEST["date"])) and (!empty($_REQUEST["duree"]))){
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
require_once('connect_mysql.php');
require_once('methode.php');
$connexion=connect_bd();
$req = $connexion->prepare("INSERT INTO films(code_film,titre_film, date, duree,) VALUES( :code_film, :titre_film, :date, :duree)");
$max = IdMax();
$req->execute(array(
  'code_film'=>$max,
  'titre_film' => $_REQUEST['titre_film'],
  'date' => $_REQUEST['date'],
  'duree' => $_REQUEST['duree'],
  ));
  echo "Le film a bien été ajouté !";
  ?>
  <form action='accueil.php' ,method="REQUEST">
    <input type="submit" name="ok" value="ok">
  </form>
