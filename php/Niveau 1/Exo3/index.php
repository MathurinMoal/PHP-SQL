<?php
function majeur($age){
  if($age>="18"){
    return $maJeur=true;
  }
  return $maJeur=false;
}
echo majeur("19");
function plusGrand($a,$b){
  return max($a,$b);
}
echo "<br>";
echo plusGrand("5","10");
function plusPetit($a,$b){
  return min($a,$b);
}
echo "<br>";
echo plusPetit("5","10");
function lePlusPetit($a,$b,$c){
  return min($a,$b,$c);
}
echo "<br>";
echo lePlusPetit("5","10","2");
?>
