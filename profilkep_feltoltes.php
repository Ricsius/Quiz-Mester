<?
session_start();

//print_r($_FILES);

$profil_kep=$_FILES[profil_kep];

//formátum vizsgálat
 if(substr($profil_kep[name] , -3)!="jpg") die("<script> alert('JPG képet töltsön fel!') </script>");

$kep_nev=$_SESSION[bejelentkezve]."_pk.jpg";

//eredeti kép elhelyezése
 move_uploaded_file($profil_kep[tmp_name] , "./profil_kepek/eredeti.jpg");

//kép módosítás
 $eredeti_kep=imagecreatefromjpeg("./profil_kepek/eredeti.jpg");
 $mod_kep=imagecreatetruecolor(500,500);
 $ex=imagesx($eredeti_kep);
 $ey=imagesy($eredeti_kep);
 $mx=imagesx($mod_kep);
 $my=imagesy($mod_kep);

 if($ex<100 || $ey<100) die("<script> alert('Legalább 100 * 100 as képet töltsön fel!') </script>");

 imagecopyresampled($mod_kep , $eredeti_kep , 0 , 0 , 0 , 0 , $mx , $my , $ex , $ey);

//módosított kép elhelyezése
 imagejpeg($mod_kep , "./profil_kepek/$kep_nev");
 unlink("./profil_kepek/eredeti.jpg");

imagedestroy($eredeti_kep);
imagedestroy($mod_kep);

//kép nevének felülírása
 $adb=mysqli_connect("localhost" , "root" , "12345678" , "quiz-mester");

 $kep_csere="UPDATE felhasznalok SET profilkep = '$kep_nev' WHERE felhasznalok.f_id = $_SESSION[bejelentkezve]";
 mysqli_query($adb , $kep_csere);

 mysqli_close($adb);
print "<script> parent.location.href=parent.location.href </script>";
?>