
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport">
    <title>essaie</title>
    <link rel="stylesheet" href="atable.css">
  </head>
  <body>

    <?php


    	$bdd = new PDO('mysql:host=localhost;dbname=a_table;charset=utf8', 'root', 'Canelle1995');
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Si tout va bien, on peut continuer


    $requete = 'SELECT * FROM clients ORDER BY dates DESC';
    $result = $bdd->query($requete);

    if (!$result){
        echo 'La récupération des données a rencontré un problème!';
    }else{
      $nbre_scan = $result->rowCount();
?>

<h2>Derniers Scan QR code</h2>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>QR code</th>
            <th></th>
            <th>Smartphone</th>
            <th></th>
            <th>Langue</th>
            <th></th>
            <th>Date</th>
            <th></th>


        </tr>
        </thead>
        <tbody>

<?php

while($ligne= $result->fetch(PDO::FETCH_NUM)){
    echo '<tr>';
      foreach ($ligne as $valeur) {
        echo '<td>' .$valeur. '<td>';
      }
    echo '<tr>';
}
?>

    </tbody>
  </table>
</div>

<?php
$result->closeCursor();

    }
?>

  </body>
</html>
