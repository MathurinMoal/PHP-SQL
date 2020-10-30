<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style=background-color:#303030;color:white>
    <form name="formulaire" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype="multipart/form-data">
      <input type="text" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Envoyer">
    </form>
<?php
/*mysqli_query($link, "CREATE DATABASE niveau2 DEFAULT CHARACTER SET UTF8 DEFAULT COLLATE UTF8_GENERAL_CI";)*/
$link = new PDO('mysql:host=127.0.0.1;dbname=niveau2','root',"");
$regexEmail='/(?:[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/m';
/*mysqli_query($link, "CREATE TABLE connexion(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,login VARCHAR(40) NOT NULL,password VARCHAR(40) NOT NULL,date_connexion VARCHAR(40) NOT NULL)";);*/
if (isset($_POST["email"]) && isset($_POST["password"]) && preg_match($regexEmail,$_POST["email"])){
  /**/
  $email=htmlspecialchars($_POST["email"]);
  /**/
  $password=htmlspecialchars($_POST["password"]);
  $hash=$link->prepare("SELECT mdp FROM utilisateur WHERE email='$email'");
  $hash->execute([$_POST['email']]);
  /**/
  $sqlConnexion=$link->prepare("INSERT INTO connexion(login,password,date_connexion) VALUES ('$email','$password',NOW());");
  $sqlEmail=$link->query("SELECT login FROM connexion WHERE login='$email'");
  $sqlEmailFetch=$sqlEmail->fetch();
  /**/
  if($sqlEmailFetch==0 && password_verify($password,$hash)){
    $sqlConnexion->execute();
    echo "gg";
  }
  else{
    echo "bouuuuuuuuuuuh!";
  }
}
?>
</body>
</html>

<!--Lorsque l’utilisateur saisit un email et un mot de passe, vous allez faire une requête en base de données pour vérifier si l’email existe et si, pour cet email, le mot de passe saisi est bien le bon.-->
<?php
/*if (filter_var($mail, FILTER_VALIDATE_EMAIL)) //adresse valide via regex inclus?
  {
    //je vérifie si mon email existe dans la BDD même si mon champs mail est une clé unique.
    $VerifMailQuery = $bdd->query("SELECT Pseudo FROM membre WHERE Pseudo = '$mail'");
    $VerifMailFetch = $VerifMailQuery->fetch();
if ($VerifMailFetch == 0){}*/
?>
