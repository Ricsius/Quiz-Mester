<?
session_start();

//képek elérési útjai
 $k_torles=explode(";" , $_SESSION[k_nev]);
 print $k_torles[0];

//képek törlése
 for($i=0 ; $i<count($k_torles) ; $i++)
 {
 unlink($k_torles[$i]);
 }

//átirányítás
 print"<script> parent.location.href='oldal.php?p=quiz-bongeszo' </script>"; 

//visszalépés ellehetetlenítése
 $_SESSION[keszites]="";
 $_SESSION[cim]="";
 $_SESSION[ossz_kerdes_szam]="";
 $_SESSION[kerdes_szam]="";
 $_SESSION[beillesztes]="";
 $_SESSION[k_nev]="";
?>