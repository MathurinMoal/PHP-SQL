<?php
function syracuse($laVar){
  while($laVar!=1){
    if($laVar%2==1){
      echo $laVar=$laVar*3+1;
      echo " ";
    }
    else{
      echo $laVar=$laVar/2;
      echo " ";
    }
  }
}
syracuse(123);
?>
