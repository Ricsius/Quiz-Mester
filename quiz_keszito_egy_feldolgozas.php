<?
session_start();

//helyettesítés
 $_POST[cim]=str_replace("<" , "&lt" , $_POST[cim]);
 $_POST[leiras]=str_replace("<" , "&lt" , $_POST[leiras]);

 $_POST[cim]=str_replace("'" , "\'" , $_POST[cim]);
 $_POST[leiras]=str_replace("'" , "\'" , $_POST[leiras]);

 $_POST[leiras]=str_replace("\r\n" , "" , $_POST[leiras]);

//print_r($_POST);
//print_r($_FILES);

$cim=$_POST[cim];
$leiras=$_POST[leiras];
$ossz_kerdes_szam=$_POST[kerdes_szam];
$index_kep=$_FILES[index_kep];

//formátum vizsgálat
 if(substr($index_kep[name] , -3)!="jpg") die("<script> alert('JPG képet töltsön fel!') </script>");

if($cim=="" || $leiras=="") die();

$datum=@date("Y"."-"."m"."-"."d");

//kulcs lekérdezés
 $adb=mysqli_connect("localhost" , "root" , "12345678" , "quiz-mester");
 $lekerdezes="SELECT COUNT(*) FROM quizek";
 $k=mysqli_query($adb , $lekerdezes);
 $kulcs=mysqli_fetch_array($k);

 $q_id=$kulcs[0]+1;

$kep_nev=$q_id."_".$_SESSION[bejelentkezve]."_qk.jpg";


//eredeti kép elhelyezése
 move_uploaded_file($index_kep[tmp_name] , "./index_kepek/eredeti.jpg");

//kép módosítás
 $eredeti_kep=imagecreatefromjpeg("./index_kepek/eredeti.jpg");
 $mod_kep=imagecreatetruecolor(270 , 135);
 $ex=imagesx($eredeti_kep);
 $ey=imagesy($eredeti_kep);
 $mx=imagesx($mod_kep);
 $my=imagesy($mod_kep);

 if($ex<100 || $ey<100) die("<script> alert('Legalább 100 * 100 as képet töltsön fel!') </script>");

 imagecopyresampled($mod_kep , $eredeti_kep , 0 , 0 , 0 , 0 , $mx , $my , $ex , $ey);

//módosított kép elhelyezése
 imagejpeg($mod_kep , "./index_kepek/$kep_nev");
 unlink("./index_kepek/eredeti.jpg");

imagedestroy($eredeti_kep);
imagedestroy($mod_kep);

//adatok beillesztése
 $beillesztes="INSERT INTO quizek (q_id ,      f_id                  ,   cim  ,   kerdesek_szama    ,   leiras   ,   feltoltes_datum  , egy_csillag , ketto_csillag , harom_csillag , negy_csillag , ot_csillag ,   kep     )
 VALUES                           (''   , '$_SESSION[bejelentkezve]' , '$cim' , '$ossz_kerdes_szam' , '$leiras'  ,           '$datum' , '0'         , '0'           , '0'           , '0'          , '0'        , '$kep_nev')";

 mysqli_close($adb);

//adatok továbbítása
 $_SESSION[q_id]=$q_id;
 $_SESSION[cim]=$cim;
 $_SESSION[ossz_kerdes_szam]=$ossz_kerdes_szam;
 $_SESSION[kerdes_szam]=1;
 $_SESSION[beillesztes]=$beillesztes;
 $_SESSION[keszites]="igen";
 $_SESSION[k_nev]="./index_kepek/$kep_nev";

//átirányítás
 print"<script> parent.location.href='quiz_keszito_ketto.php' </script>";