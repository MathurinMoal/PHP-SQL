<?php
echo "Texte à afficher ";
echo aGrouGrou();
function aGrouGrou(){
  return "ce p'tit bonnhome c'est Butters";
}
echo argument("blurp");
function argument($abc){
  return $abc;
}
function concatenation($a, $b){
  return $a.$b;
}
echo concatenation("blurp"," a que coucou bob");
function concatenationAvecEspace($c, $d){
  return $c." ".$d;
}
echo concatenationAvecEspace("blurp","a que coucou bob")
?>
