<?
session_start();

//print_r ($_POST);

$keresokifejezes=$_POST[kereses];

//kereső kifejezés beillesztése
 $_SESSION[keres]=$keresokifejezes;

//print $_SESSION[keres];

//oldal újratöltése
 print "<script> parent.location.href=parent.location.href </script>"
?>