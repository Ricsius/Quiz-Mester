<?
session_start();

//újratöltés megakadályozása
 if($_SESSION[csalas_szamlalo]<=0 || $_SESSION[csalas_szamlalo]/1!=$_SESSION[csalas_szamlalo]) die("<script> parent.location.href='rossz_link.php' </script>");
 if($_SESSION[figyelmeztetve]=="igen") die("<script> parent.location.href='oldal.php?p=quiz-bongeszo' </script>");

//pontszám levonása
 $adb=mysqli_connect("localhost","root","12345678","quiz-mester");
 $lekerdezes="SELECT pont FROM felhasznalok WHERE f_id=$_SESSION[bejelentkezve]";
 $t=mysqli_query($adb , $lekerdezes);
 $pont=mysqli_fetch_array($t);
 $pont_szam=$pont[pont];
 $pont_szam-=$_SESSION[ossz_kerdes_szam];
 $pontozas="UPDATE felhasznalok SET pont = '$pont_szam' WHERE felhasznalok.f_id = $_SESSION[bejelentkezve]";

 mysqli_query($adb , $pontozas);

//visszalépés és újralevonás ellehetetlenítése
 $_SESSION[q_id]="";
 $_SESSION[figyelmeztetve]="igen"
?>

<style>

body
{
 background-color:#911E1E;
}

.keret
{
 margin:30px;
 padding-top:300px;
}

.iras
{
 font-size:36;
 font-family:arial;
 font-weight:bold;
 text-align:center;
}


.gomb
{
 font-family:arial;
 font-size:16;
 margin-top:30px;
 background-color:#319a5d;
 font-weight:bold;
 border:solid 2px #319a5d;
}

.gomb:hover
{
 background-color:white;
}

</style>

<html>

<body>

<div class='keret'>

 <div class='iras'>

 <h1> A quiz-ben <? print $_SESSION[csalas_szamlalo] ?> alkalommal próbáltál csalni, ezért <? print $_SESSION[ossz_kerdes_szam] ?> pontot kerül levonásra. </h1>
 <a href='oldal.php?p=quiz-bongeszo'> <input class='gomb' type='button' value='Tovább'> </a>

 </div>

</div>

</body>

</html>