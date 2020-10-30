<?php
function fibonacci($nbMois){
  $nbLapin=0;
  $nbLapinJeune=1;
  $somme=0;
  for($i=0;$i<$nbMois;$i++){
    echo $nbLapin." ";
    $somme=$nbLapinJeune+$nbLapin;
    $nbLapin=$nbLapinJeune;
    $nbLapinJeune=$somme;
  }
}
fibonacci(12);
?>
