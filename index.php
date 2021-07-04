<?
session_save_path("./session_save");
session_start();

//bejelentkezett felhasználók átirányítása
 if($_SESSION[bejelentkezve]!="") print "<script> parent.location.href='oldal.php?p=quiz-bongeszo' </script>";
?>

<style>

body
{
 background-color:#694c46;
}

h1
{
 text-align:center;
}

input
{
 font-family:arial;
 font-size:16;
}

.keret
{
 margin:30px;
}

.iras
{
 font-family:arial;
 font-size:16;
}

.cim
{
 margin-left:8000px;
 overflow:hidden;
}

.bejelentkezes
{
 text-align:center;
 padding-top:100px;
}

.bejelentkezes_tabla
{
 padding-top:30px;
 padding-bottom:30px;
}

.gomb
{
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

 <div class='iras bejelentkezes'>

 <div class='cim'> <h1> Quiz-mester </h1> </div>

 <img src='Quiz-Mester_logo.png' height='20%'>

 <form action='bejelentkezes_feldolgozas.php' method='post' target='kisablak'>

 <table align='center' class='bejelentkezes_tabla'>
 <tr><td> Felhasználónév: </td> <td> <input type='text' name='felhasznalonev'> </td></tr>
 <tr><td> Jelszó: </td> <td> <input type='password' name='jelszo'> </td></tr>
 </table>

 Ha még nem regisztráltál <a href='regisztracio.php'> itt </a> megteheted. <br>

 <input class='gomb'type='submit' value='Bejelentkezés'>

 </form>

 </div>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</body>

</html>
