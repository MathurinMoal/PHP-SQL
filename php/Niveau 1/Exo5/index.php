<?php
function verificationPassword($password){
  $compare='/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/m';
  $result=preg_match($compare, $password);
  var_dump($result);
}
/*echo verificationPassword("s1Aff");*/


function capital($pays){
  switch($pays){
    case "france";
    return "Paris";
    case "allemagne";
    return "Berlin";
    case "italie";
    return "Rome";
    case "maroc";
    return "Rabat";
    case "espagne";
    return "Madrid";
    case "portugal";
    return "Lisbonne";
    case "angleterre";
    return "Londres";
    default:
    return "Inconnu";
  }
}
/*echo capital(strtolower("Maroc"));*/


function listHTML($liste=array("Paris","Londres","Moscou"), $titre="Capitals"){
  echo "<h3>".$titre."</h3><ul>";
  for($i=0;$i<count($liste);$i++){
    echo "<li>".$liste[$i]."</li>";
  }
  echo "</ul>";
}
listHTML();


function remplacerLesLettres($string=""){
  $string=str_ireplace("e","3",$string);
  $string=str_ireplace("i","1",$string);
  echo $string=str_ireplace("o","0",$string);
}
/*remplacerLesLettres("azeeaoooeaeiiieae");*/


function quelleAnnee(){
  return date("y");
}
echo date("d / m / Y");
?>
