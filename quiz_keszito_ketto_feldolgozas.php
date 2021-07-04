<?
session_start();

//helyettesítés
 $_POST[kerdes]=str_replace("<" , "&lt" , $_POST[kerdes]);
 $_POST[a_valasz]=str_replace("<" , "&lt" , $_POST[a_valasz]);
 $_POST[b_valasz]=str_replace("<" , "&lt" , $_POST[b_valasz]);
 $_POST[c_valasz]=str_replace("<" , "&lt" , $_POST[c_valasz]);
 $_POST[d_valasz]=str_replace("<" , "&lt" , $_POST[d_valasz]);

 $_POST[kerdes]=str_replace("'" , "\'" , $_POST[kerdes]);
 $_POST[a_valasz]=str_replace("'" , "\'" , $_POST[a_valasz]);
 $_POST[b_valasz]=str_replace("'" , "\'" , $_POST[b_valasz]);
 $_POST[c_valasz]=str_replace("'" , "\'" , $_POST[c_valasz]);
 $_POST[d_valasz]=str_replace("'" , "\'" , $_POST[d_valasz]);

 $_POST[kerdes]=str_replace("\r\n" , "" , $_POST[kerdes]);

//print_r($_POST);
//print_r($_FILES);

$kep=$_FILES[kep]; 
$kep_nev="nincs";
$kerdes=$_POST[kerdes];
$a_valasz=$_POST[a_valasz];
$b_valasz=$_POST[b_valasz];
$c_valasz=$_POST[c_valasz];
$d_valasz=$_POST[d_valasz];
$helyes_valasz=$_POST[helyes_valasz];

//egyezés és üresség vizsgálata
 if($kerdes=="" || $a_valasz=="" || b_valasz=="" || $c_valasz=="" || $d_valasz=="") die();

 if($kerdes==$a_valasz || $kerdes==$b_valasz || $kerdes==$c_valasz || $kerdes==$d_valasz ||
    $a_valasz==$b_valasz || $a_valasz==$c_valasz || $a_valasz==$d_valasz ||
    $b_valasz==$c_valasz || $b_valasz==$d_valasz ||
    $c_valasz==$d_valasz) die();

//képfeltöltés
 if($kep[name]!="")
 {
  if(substr($kep[name] , -3)!="jpg") die("<script> alert('JPG képet töltsön fel!') </script>");

  $kep_nev=$_SESSION[q_id]."_".$_SESSION[kerdes_szam]."_vk.jpg";

  move_uploaded_file($kep[tmp_name] , "./valasz_kepek/eredeti.jpg");

  $eredeti_kep=imagecreatefromjpeg("./valasz_kepek/eredeti.jpg");
  $mod_kep=imagecreatetruecolor(300 , 150);
  $ex=imagesx($eredeti_kep);
  $ey=imagesy($eredeti_kep);
  $mx=imagesx($mod_kep);
  $my=imagesy($mod_kep);

  if($ex<100 || $ey<100) die("<script> alert('Legalább 100 * 100 as képet töltsön fel!') </script>");

  imagecopyresampled($mod_kep , $eredeti_kep , 0 , 0 , 0 , 0 , $mx , $my , $ex , $ey);

  imagejpeg($mod_kep , "./valasz_kepek/$kep_nev");

  unlink("./valasz_kepek/eredeti.jpg");
  imagedestroy($eredeti_kep);
  imagedestroy($mod_kep);

  $_SESSION[k_nev].=";./valasz_kepek/$kep_nev";
 }

//elkészült a quiz?
 if($_SESSION[kerdes_szam]==$_SESSION[ossz_kerdes_szam])
 {
  $_SESSION[elkeszult]="igen";
  print "<script> parent.location.href='sikeres_keszites.php' </script>";
 }

 else print "<script> parent.location.href=parent.location.href </script>";

//adatok beillesztése
 $_SESSION[beillesztes].=";INSERT INTO valaszok (v_id ,      q_id         ,    kerdes_szam           ,   kerdes  ,      a      ,      b      ,      c      ,      d      ,   helyes_valasz  ,    kep  )           
 VALUES                                         (''   , '$_SESSION[q_id]' , '$_SESSION[kerdes_szam]' , '$kerdes' , '$a_valasz' , '$b_valasz' , '$c_valasz' , '$d_valasz' , '$helyes_valasz' , '$kep_nev')";

//kérdés szám léptetés
 $_SESSION[kerdes_szam]++;
?>


