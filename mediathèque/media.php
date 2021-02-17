<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="media.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  
</body>

<footer>  <a class="btn" href="index.html">Retour</a> </footer>
</html><?php

include"dbconf.php";


try{
  // Connexion à la bdd
  $db = new PDO('mysql:host=localhost;dbname=mediatheque','cruder','jecrud');
  $db->exec('SET NAMES "UTF8"');
  //gestion des erreurs//
} catch (PDOException $e){
  echo 'Erreur : '. $e->getMessage();
  die();

}
//entrer un film
     
if (isset($_POST['create'])) {
  $titre = $_POST['titre'];
  $acteurs = $_POST['acteurs'];
  $realisateur = $_POST['realisateur'];
  $synopsis = $_POST['synopsis'];
  $datesortiefilm = $_POST['datesortiefilm'];
  $affiche = $_POST['affiche'];

  
    $requete = "INSERT INTO `infos`(`titre`,`acteurs`,`realisateur`,`synopsis`,`datesortiefilm`,`affiche`) 
                VALUES (:titre,:acteurs,:realisateur,:synopsis,:datesortiefilm,:affiche)";
    $prepare = $db->prepare($requete);
    $prepare->execute(array(
      ":titre" => $titre,
      ":acteurs" => $acteurs,
      ":realisateur" => $realisateur,
      ":synopsis" => $synopsis,
      ":datesortiefilm" => $datesortiefilm,
      ":affiche" => $affiche

      
    ));
    echo "<h3>Le film a bien été ajouté</h3>";
  }

  //consulter un film
       
if (isset($_POST['read'])) {
  $id = $_POST['id']; 

  
  $requete = "SELECT *
  FROM `infos`
  WHERE `id` = :id";
    $prepare = $db->prepare($requete);
    $prepare->execute(array(
      ":id" => $id
    ));
    $resultat = $prepare->fetchAll();
  }
 
  echo "<div class='movies'>";

  foreach($resultat as $key => $value){
      echo "<div class='film'>
            <h2>". $value['titre'] ."</h2>
            <img src='". $value['affiche'] ."' alt='affiche du film'/>
            <p>". $value['acteurs'] ."</p>
            <p>". $value['datesortiefilm'] ."</p>
            <p>". $value['synopsis'] ."</p>
            </div>";

            echo "<div class='dateretour'>
            <p>". $value['realisateur'] ."</p> <p> Emprunté le:". $value['datesempruntfilm'] ."</p>
            <p> Rendu le:". $value['dateretourfilm'] ."</p>
            </div>";
  }
  echo "</div>";
  ?>


   
<?php
//editer un film

  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $acteurs = $_POST['acteurs'];
    $realisateur = $_POST['realisateur'];
    $synopsis = $_POST['synopsis'];
    $affiche = $_POST['affiche'];
  
    
      $requete = "UPDATE `infos`
                 SET `titre` = :titre, `acteurs`= :acteurs,`realisateur` = :realisateur,`synopsis`= :synopsis,`affiche`= :affiche
                 WHERE `id`=:id;";
      $prepare = $db->prepare($requete);
      $prepare->execute(array(
        ":id"  => $id,
        ":titre" => $titre,
        ":acteurs" => $acteurs,
        ":realisateur" => $realisateur,
        ":synopsis" => $synopsis,
        ":affiche" => $affiche
      ));
      $resultat = $prepare->rowCount();
      echo "<h3>Le statut du film a bien été mis à jour/h3>";
    }
   



//emprunter un film

  if (isset($_POST['emprunt'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $dateempruntfilm = $_POST['dateempruntfilm'];
    $dateretourfilm = $_POST['dateretourfilm'];
  
  
    
      $requete = "UPDATE `infos`
                 SET `titre` = :titre,`dateempruntfilm`= :dateempruntfilm,`dateretourfilm`= :dateretourfilm
                 WHERE `id`=:id;";
      $prepare = $db->prepare($requete);
      $prepare->execute(array(
        ":id"  => $id,
        ":titre"  => $titre,
        ":dateempruntfilm" => $dateempruntfilm,
        ":dateretourfilm" => $dateretourfilm
       
      ));
      $resultat = $prepare->rowCount();
      echo "<h3>Le film a bien été emprunté le </h3>";
    }

    //supprimer un film
    
    if (isset($_POST['delete'])) {
      $id = $_POST['id']; 
    
      
      $requete = "DELETE 
      FROM `infos`
      WHERE `id` = :id";
        $prepare = $db->prepare($requete);
        $prepare->execute(array(
          ":id" => $id
        ));
        $resultat = $prepare->fetchAll();
        echo "<h3>Le film a bien été supprimé</h3>";
      }




?>