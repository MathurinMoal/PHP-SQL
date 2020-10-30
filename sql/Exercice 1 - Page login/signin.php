<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <style>body{background-color:#303030;color:white;/*display:flex;justify-content:center;*/}#send{padding:15px 30px;background-color:antiquewhite;}a{color:darkorange}</style>
  <form name="formulaire" method="post" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype="multipart/form-data">
    <input type="text" name="nom" placeholder="Nom" required><br><br>
    <input type="text" name="prenom" placeholder="Prenom" required><br><br>
    <input type="text" name="email" placeholder="Adresse Mail" required><br><br>
    <input type="password" name="password" placeholder="Mot de Passe" required><br><br>
    <input type="password" name="passwordVerify" placeholder="Vérification Mot de Passe" required><br><br>
    <select name="pro">
      <option value="1">Professionnel</option><!--1=pro-->
      <option value="0">Particulier</option><!--0=not pro-->
    </select><br><br>
    <input type="checkbox" name="checkAgree" required>Je reconnais avoir pris connaissance des conditions d'utilisation et y adhère totalement<br><a href="#">Conditions d'utilisation</a><br><br>
    <input type="submit" value="Envoyer" id="send">
  </form>
  <?php
  /*mysqli_query($link, "CREATE TABLE utilisateur(nom VARCHAR(40) NOT NULL, prenom VARCHAR(40) NOT NULL,email VARCHAR(40) UNIQUE NOT NULL,mdp VARCHAR(255) NOT NULL,pro VARCHAR(1) NOT NULL)";);*/
  $link = new PDO('mysql:host=127.0.0.1;dbname=niveau2','root',"");
  if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["checkAgree"])){
    $nom=htmlspecialchars($_POST["nom"]);
    $prenom=htmlspecialchars($_POST["prenom"]);
    $email=htmlspecialchars($_POST["email"]);
    $password=htmlspecialchars($_POST["password"]);
    $passwordVerify=htmlspecialchars($_POST["passwordVerify"]);
    $pro=$_POST["pro"];
    $compare='/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/m';
    /**/
    /*$emailVerif=mysqli_query($link, "SELECT*FROM utilisateur WHERE email='".$_POST['email']."''");
    if(mysqli_num_rows($emailVerif)==1){
      echo "Cette adresse email est déjà utilisé"; echo "<br>";
    }*/
    /**/
    if(preg_match($compare, $password)){
      if($password==$passwordVerify){
        $hashPassword=password_hash($password,PASSWORD_BCRYPT);
        $sql=$link->prepare("INSERT INTO utilisateur(nom,prenom,email,mdp,pro) VALUES ('$nom','$prenom','$email','$hashPassword','$pro')");
        /*INSERT INTO utilisateur(nom,prenom,email,mdp,pro) VALUES ('Moal','Mathurin','srqthff@dt.com','$2y$10$sNUuBt9oJnJNMdQXTc3lxenPCEivN4fLSmA0NTchQOxgksIEiuOyu',1)*/
        $sql->execute();
        echo "Votre compte à bien été créé";
      }
      else{
        echo "Les mots de passes ne correspondent pas";
        echo "<br>";
      }
    }
    else{
      echo "Votre mot de passe doit contenir au moin une majuscule, une minuscule et un chiffre";
      echo "<br>";
    }
  }
  else if(isset($_POST["checkAgree"])){echo "Un ou plusieurs champs n'ont pas été remplis";}
  else if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["password"])){
    echo "Veuillez cocher la case \"Je reconnais avoir pris connaissance des conditions d'utilisation et y adhère totalement\"";
  }

  ?>
</body>
</html>
