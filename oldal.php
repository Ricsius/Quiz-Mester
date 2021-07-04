<?
session_start();

$_SESSION[oldal]="igen";

//nem bejelentkezett felhasználók átirányítása
 if($_SESSION[bejelentkezve]=="") die("<script> parent.location.href='rossz_link.php' </script>");

//felhasználók száma
 $adb=mysqli_connect("localhost" , "root" , "12345678", "quiz-mester");

 $fsz_lekerdezes="SELECT COUNT(*) FROM felhasznalok";
 $fsz=mysqli_query($adb , $fsz_lekerdezes);
 $f_szam=mysqli_fetch_array($fsz);

//csalás védelem
 $_SESSION[q_id]="";
 $_SESSION[figyelmeztetve]="";
 $_SESSION[teljesitve]="";
 $_SESSION[rossz_valasz]="";
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

textarea
{
 font-family:arial;
 font-size:16;
 text-align:center;
 border:0px;
 width:675px;
 height:50px;
}

body a
{
 text-decoration:none;
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

.menu
{
 background-color:black;
 height:80px;
 border-radius:30px;
}

.menu a
{
 color:black;
 font-size:22;
 background-color:#319a5d;
 font-weight:bold;
}

.menu a:hover
{
 background-color:white;
 color:black;
}

.menu_tabla
{
 border-spacing:30px 0px;
}

.menu_tabla td
{
 height:80px;
}

.kereso 
{
 float:right;
 magrgin-bottom:30px;
}

.kereso input
{
 margin:0px;
}

.q_lista
{
 width:100%;
 awidth:1680px;
 margin:auto;
}

.doboz
{
 color:black;
}

.index
{
 background-color:#319a5d;
 margin:30px;
 padding:30px;
 text-align:center;
 font-weight:bold;
 width:300px;
 height:150px;
 float:left;
}

.index img
{
 width:270px;
 height:135px;
}

.index span
{
 color:#c11e1e;
}

.index:hover
{
 background-color:white;
}

.keszites
{
 text-align:center;
 padding-top:100px;
}

.keszites_tabla
{
 margin-bottom:30px;
}

.tartalomjegyzek 
{
 text-align:center;
}

.tartalomjegyzek 
{
 border-spacing:20px 10px;
}

.tartalomjegyzek a
{
 color:black;
}

.profilkep_feltoltes
{
 text-align:center;
 font-size:22;
}

.adatlap img
{
 width:500px;
 height:500px;
}

.adatlap_tabla
{
 background-color:white;
 font-size:22;
}

.profil_menu
{
 background-color:black;
 width:400px;
 margin:auto;
 margin-bottom:30px;
}

.profil_menu a
{
 color:black;
 font-size:22;
 background-color:#f58700;
 font-weight:bold;
 text-decoration:none;
}

.profil_menu a:hover
{
 background-color:white;
 color:black;
}

.profil_menu_tabla
{
 border-spacing:30px 0px;
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

 <div class='iras menu'>

  <table class='menu_tabla' align='center'> 
  <tr> <td>  <a href='?p=quiz-bongeszo'> Quiz-böngésző </a> </td> 
       <td>  <a href='?p=quiz-keszito'> Quiz készítő </a> </td>  
       <td> <a href='?p=utmutato'> Útmutató </a> </td>   
       <td> <? print "<a href='?p=profil/adatlap/f=$_SESSION[bejelentkezve]'>"; ?> Profilom </a> </td> 
       <td> <a href='?p=felhasznalo_kereso'> Felhasználó kereső </a>
       <td> <a href='kijelentkezes.php'> Kejelentkezés </a> </td>
 </tr> 
  </table>

 </div>

 <div class='iras'>

  <?
  $p=$_GET[p];

  $p_osztas=explode("=" , $p); 

  //aloldalak betöltése
   if($p=="quiz-bongeszo") include("quiz-bongeszo.php");
   else if($p=="quiz-keszito") include("quiz_keszito_egy.php");
   else if($p=="utmutato") include("utmutato.php");
   else if(substr($p_osztas[0] , 0 , 6)=="profil") include("profil.php");
   else if($p=="felhasznalo_kereso") include("felhasznalo_kereso.php");

   else print"<script> parent.location.href='rossz_link.php' </script> ";

  mysqli_close($adb);

  $_SESSION[oldal]="";
  ?>

 </div>

</div>

</body>

</html>