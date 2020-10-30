<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Blurp</title>
</head>
<body>
  <form name="inscription" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="nom" placeholder="Nom" required><br><br>
    <input type="text" name="email" placeholder="Email" required><br><br>
    <input type="text" name="tel" placeholder="Telephone" required><br><br>
    <input type="text" name="adresse" placeholder="Adresse" required><br><br>
    <input type="text" name="postal" placeholder="Code postal" required><br><br>
    <input type="submit" name="valider" value="Valider">
  </form>
  <?php
  $count=0;
  if(isset($_POST["nom"])){
    $nom=htmlspecialchars($_POST["nom"]);
    $count++;
  }
  if(isset($_POST["email"])){
    $email=htmlspecialchars($_POST["email"]);
    $count++;
  }
  if(isset($_POST["tel"])){
    $tel=htmlspecialchars($_POST["tel"]);
    $count++;
  }
  if(isset($_POST["adresse"])){
    $adresse=htmlspecialchars($_POST["adresse"]);
    $count++;
  }
  if(isset($_POST["postal"])){
    $postal=htmlspecialchars($_POST["postal"]);
    $count++;
  }
  $regexPostal='[0-9]{5}';
  $regexTel = '/^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/m';
  $regexEmail='/(?:[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/m';
  if($count==5 && preg_match($regexEmail, $email) && preg_match($regexTel,$tel)){//count = 5 pour les 5 champs remplis
    echo $nom;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $tel;
    echo "<br>";
    echo $adresse;
    echo "<br>";
    echo $postal;
  }
  ?>
</body>
</html>
