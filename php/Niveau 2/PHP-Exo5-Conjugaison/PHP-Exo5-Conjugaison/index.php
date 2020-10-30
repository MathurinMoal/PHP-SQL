<?php
function conjugaison($verbe=""){
  if(strlen($verbe)>15){
    echo "Recommencez";
    return;
  }
  else if($verbe[strlen($verbe)-1]!="r"){
    echo "Recommencez";
    return;
  }
  else if($verbe[strlen($verbe)-2]!="e"){
    echo "Recommencez";
    return;
  }
  else{
    echo "<p>Je ";
    echo substr($verbe,0,strlen($verbe)-1);
    echo "<br>Tu ";
    echo substr($verbe,0,strlen($verbe)-1)."s";
    echo "<br>Il / Elle ";
    echo substr($verbe,0,strlen($verbe)-1);
    echo "<br>Nous ";
    echo substr($verbe,0,strlen($verbe)-2)."ons";
    echo "<br>Vous ";
    echo substr($verbe,0,strlen($verbe)-2)."ez";
    echo "<br>Ils / Elles ";
    echo substr($verbe,0,strlen($verbe)-2)."ent</p>";
  }
}
conjugaison("blurper");
?>
