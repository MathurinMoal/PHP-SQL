<?php
$tab=array("bob","pat","mat","blurp");
$tabChiffre=array("3","10","100","4");
function firstElmt($leTab){
return current($leTab);
}
echo firstElmt($tab);
echo "<br>";
function lastElmt($leTab){
  return end($leTab);
}
echo lastElmt($tab);
echo "<br>";
function plusGrand($leTab){
  return max($leTab);
}
echo plusGrand($tabChiffre);
echo "<br>";
function plusPetit($leTab){
  return min($leTab);
}
echo plusPetit($tabChiffre);
?>
