<?
session_start();

//átirányítás
 if($_SESSION[elkeszult]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");

//helyettesítés
 $_SESSION[cim]=str_replace("\'" , "'" , $_SESSION[cim]);

//quiz beillesztése
 $adb=mysqli_connect("localhost" , "root" , "12345678" , "quiz-mester");

 $beillesztes=explode(";" , $_SESSION[beillesztes]);

 for($i=0 ; $i<count($beillesztes) ; $i++) mysqli_query($adb , $beillesztes[$i]);

 mysqli_close($adb);

$_SESSION[elkeszult]="";
?>

<style>

body
{
 background-color:#694c46;
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

.iras a
{
 text-decoration:none;
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

 Sikeresen elkészítette a(z) <? print $_SESSION[cim]; ?> című quizt. <br>

 <a href='oldal.php?p=quiz-bongeszo'> <input class='gomb' type='button' value='Vissza a quiz-böngészőbe'> </a>

 </div>

</div>

</body>

</html>