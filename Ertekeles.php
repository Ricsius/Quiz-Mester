<?
session_start();

//oldal elérés korlátozása
 if($_SESSION[teljesitve]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");
 if($_SESSION[csalas_szamlalo]>0) die("<script> parent.location.href='csalas.php' </script>");

//teljesítés lekérdezése
 $adb=mysqli_connect("localhost" , "root" , "12345678", "quiz-mester");

 $lekerdezes="SELECT COUNT(*) FROM teljesitettek WHERE q_id=$_SESSION[q_id] AND f_id=$_SESSION[bejelentkezve]";
 $t=mysqli_query($adb , $lekerdezes);
 $teljesitette=mysqli_fetch_array($t);

 mysqli_close($adb);

$_SESSION[teljesitve]="";

//átirányítás
 if($teljesitette[0]!=0) print "<script> parent.location.href='oldal.php?p=quiz-bongeszo' </script>";

?>

<script>

//hover
 function ures_csillag_hover()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"
 }

 function egy_csillag_hover()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"
 }

 function ketto_csillag_hover()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"
 }

 function harom_csillag_hover()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('arany_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"
 }

 function negy_csillag_hover()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('arany_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('gyemant_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"
 }

 function ot_csillag_hover()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('arany_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('gyemant_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('zold_csillag.png')"
 }

//onclick
 function egy_csillag()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')" 
  document.getElementById("ertekelo_tabla").onmouseout=function() {egy_csillag_hover()}

  document.ertekeles.csillag.value=1
 }

 function ketto_csillag()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"

  document.getElementById("ertekelo_tabla").onmouseout=function() {ketto_csillag_hover()}

  document.ertekeles.csillag.value=2
 }

 function harom_csillag()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('arany_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('ures_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"

  document.getElementById("ertekelo_tabla").onmouseout=function() {harom_csillag_hover()}

  document.ertekeles.csillag.value=3
 }

 function negy_csillag()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('arany_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('gyemant_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('ures_csillag.png')"

  document.getElementById("ertekelo_tabla").onmouseout=function() {negy_csillag_hover()}

  document.ertekeles.csillag.value=4
 }

 function ot_csillag()
 {
  document.getElementById("ertekelo_tabla").rows[0].cells[0].style.backgroundImage="url('bronz_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[1].style.backgroundImage="url('ezust_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[2].style.backgroundImage="url('arany_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[3].style.backgroundImage="url('gyemant_csillag.png')"
  document.getElementById("ertekelo_tabla").rows[0].cells[4].style.backgroundImage="url('zold_csillag.png')"

  document.getElementById("ertekelo_tabla").onmouseout=function() {ot_csillag_hover()}

  document.ertekeles.csillag.value=5 
 }

</script>

<style>

body
{
 background-color:#694c46;
}

input
{
 font-size:16;
 font-family:arial;
}

.keret
{
 margin:30px;
}

 .iras
{
 font-size:16;
 font-family:arial;
}

.lap
{
 height:795px;
 text-align:center;
 background-color:white;
}

#ertekelo_tabla td
{
 background-image:url("ures_csillag.png");
 background-position: center;
 background-repeat:no-repeat;
 padding:125px;
 text-align:center;
}

#pontszam
{
 padding-top:25px;
 margin-left:310px;
 margin-right:310px;
 margin-bottom:30px;
 height:50px;
 background-color:#319a5d;
 text-align:center;
}

#pontszam input
{
 border:0px;
 background-color:#319a5d;
 text-align:center;
 font-size:16;
 font-family:arial;
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

 <div class='iras lap'>

 <h1>Gratulálunk! Sikeresen teljesítetted a quiz-t</h1>

 Kérjük értékelje a quizt.

 <form name='ertekeles' action='ertekeles_feldolgozas.php' method='post' target='kisablak'>

 <table id='ertekelo_tabla' name='ertekelo_tabla' align='center' onmouseout='ures_csillag_hover()'>
 <tr> <td onclick='egy_csillag()' onmouseover='egy_csillag_hover()'></td> <td onclick='ketto_csillag()' onmouseover='ketto_csillag_hover()'></td> <td onclick='harom_csillag()' onmouseover='harom_csillag_hover()'></td> <td onclick='negy_csillag()' onmouseover='negy_csillag_hover()'></td> <td onclick='ot_csillag()' onmouseover='ot_csillag_hover()'></td> </tr>
 </table>

  <div id='pontszam' class='iras'>

  <input type='text' name='csillag' readonly size=1> csillagot adok

  </div>

 <input class='gomb' type='submit' value='Kész'>

 </form>

 </div>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</body>

</html>