<?
session_start();

if($_SESSION[rossz_valasz]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");
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

 <h1> Helytelen Válasz! </h1>
 <a href='oldal.php?p=quiz-bongeszo'> <input class='gomb' type='button' value='Vissza a quiz-böngészőbe'> </a> 
 <? 
 print "<a href='quiz_kezdes.php?q=$_SESSION[q_id]'>"; ?> <input class='gomb' type='button' value='Újra'> </a>

 <?
 //csalás megakadályozása
  $_SESSION[q_id]=""; 
 ?>

 </div>

</div>

</body>

</html>