<?php
if(file_exists("exo3.txt")){
  $file=fopen("exo3.txt","r");
  $numRead=intval(fread($file,filesize("exo3.txt")));
  fclose($file);
  $file=fopen("exo3.txt","w+");
  $numRead++;
  fwrite($file,$numRead);
  echo $numRead;
  fclose($file);
}
else{
  $file=fopen("exo3.txt","w");
  fwrite($file,"1");
  fclose($file);
  echo "1";
}
?>
