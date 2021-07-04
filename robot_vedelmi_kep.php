<?
session_start();

header("content-type:image/gif");

$kep=imagecreate (640 , 480);
$feher=imagecolorallocate ($kep, 255 , 255 , 255 );
$betuszin=imagecolorallocate ($kep , 0 , 0 , 118);
$abc="abcdefghijklmnopqrstuvwxyz0123456789";
$k="";

//szöveg létrehozása
 for($i=0;$i<=6;$i++)
 {
  $k.=substr($abc , rand(0,36) , 1);
 }

 imagettftext ($kep , 56 , 0 , 140 , 239 , $betuszin , "BOOKOSI.ttf" , $k );

//kép létrehozása
 imagegif ($kep);

//szöveg megjegyzése
 $_SESSION[kep_szoveg]=$k;
?>