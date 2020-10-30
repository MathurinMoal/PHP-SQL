<?php
function stars(){
  echo "<p style=\"text-align:center; line-height:20px;\">";
  for($i=0;$i<10;$i++){
    for($j=0;$j<$i;$j++){
      echo "**";
    }
    echo "<br>";
  }
  echo "</p>";
}
stars();
?>
