<?
session_start();

//átirányítás
 if($_SESSION[regisztralva]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");

$_SESSION[regisztralva]="";
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

 Sikeresen létrehoztad a fiókod. Jó szórakozást!<br><br>
 <a href='index.php'> <input class='gomb' type='button' value='Kész'> </a>

 </div>

</div>

</body>

</html>