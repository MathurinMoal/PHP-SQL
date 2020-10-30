<?php
function reverse($string=""){
  $newString="";
  echo $string."<br>";
  for($i=strlen($string)-1;$i>=0;$i--){
    $newString.=$string[$i];
  }
  return $newString;
}
echo reverse("abcdefg");
?>
