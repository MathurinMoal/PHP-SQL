<?php
$note=[
  "Roger"=>12,
  "Monica"=>16,
  "Najat"=>15,
];
$note["Anton"]=10;
$note["Monica"]=false;
//arsort($note);
ksort($note);
print_r($note);
function moyenne(){
  $note=[
    "Roger"=>12,
    "Monica"=>16,
    "Najat"=>15,
  ];
  $values=array_sum($note);
  print_r($values/sizeof($note));

}
moyenne();
?>
