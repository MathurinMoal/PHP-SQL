<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Blurp</title>
</head>
<body>
  <?php formulaire(); uploadScreen();?>
  <form name="winForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <input type="text" name="nomJ1" placeholder="Nom Joueur 1"><br><br>
    <input type="text" name="nomJ2" placeholder="Nom Joueur 2"><br><br>
    <input type="text" name="numMatch" placeholder="Numero du match"><br><br>
    <label for="winer">Le Vainqueur est?</label>
    <select name="winner">
      <option value="joueur1">Joueur 1</option>
      <option value="joueur2">Joueur 2</option>
    </select><br><br>
    Votre screenshot<input type="file" name="screenshot" accept="image/png, image/jpg" size="200000"><br><br>
    <input type="submit" name="submit" value="Envoyer">
  </form>
</body>
</html>
<?php
function formulaire(){
  $count=0;
  $winner="";
  if(isset($_POST["nomJ1"])){
    $nomJ1=htmlspecialchars($_POST["nomJ1"]);
    $count++;
  }
  if(isset($_POST["nomJ2"])){
    $nomJ2=htmlspecialchars($_POST["nomJ2"]);
    $count++;
  }
  if(isset($_POST["numMatch"])){
    $numMatch=htmlspecialchars($_POST["numMatch"]);
    $count++;
  }
  if(isset($_POST["winner"]) && $_POST["winner"]=="joueur1"){
    $winner="W1";
  }
  if(isset($_POST["winner"]) && $_POST["winner"]=="joueur2"){
    $winner="W2";
  }
}
function uploadScreen(){
  $moveUpFile="";
  $targetFile="";
  $uploadsFct="uploads/";//name of the folder
  if(isset($_FILES["screenshot"]["name"])){
    $targetFile=$uploadsFct.basename($_FILES["screenshot"]["name"]);//geting the file in the input in $tergetFile
  }
  $imgFileType=strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));//getting the extention of the uploaded file
  $uploadOk=1;//a system who prevent from errors or inapropriate files (size, type...)
  if(isset($_POST["submit"])){
    $check=getimagesize($_FILES["screenshot"]["tmp_name"]);//testing if its an image
    if($check!==false){
      $uploadOk=1;
    }
    else{
      $uploadOk=0;
      echo "Its not an image";
      echo "<br>";
    }
  }
  if(isset($_FILES["screenshot"]["name"])){
    if($imgFileType!="jpg" && $imgFileType!="png"){
      $uploadOk=0;
      echo "Only .jpg and .png are supported";
      echo "<br>";
    }
  }
  if(isset($_FILES["screenshot"]["name"])){
    if($_FILES["screenshot"]["size"]>2000000){
      $uploadOk=0;
      echo "Your file is too large";
      echo "<br>";
    }
  }
  if(file_exists($targetFile)){//tresting this existance of a file in the folder
    $uploadOk=0;
    echo "Already uploaded";
    echo "<br>";
  }
  if($uploadOk==0){
    echo "Upload failed";
    echo"<br>";
  }
  else{
    if(isset($_FILES["screenshot"]["name"])){
      $moveUpFile=move_uploaded_file($_FILES["screenshot"]["tmp_name"],$targetFile);//will move the file in the $targetFile in the next if fct
    }
    if($moveUpFile){//file moved
      echo "File upload";
      echo"<br>";
    }
    else{
      if(isset($_FILES["screenshot"]["name"])){
        echo "Upload failed2";
        echo "<br>";
      }
    }
  }
}
?>
