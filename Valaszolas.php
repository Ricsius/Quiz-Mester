<?
session_start();

//átirányítás
 if($_SESSION[q_id]=="") die("<script> parent.location.href='rossz_link.php' </script>");

//kérdések, válaszok és helyes válasz lekérdezése
 $adb=mysqli_connect("localhost","root","12345678","quiz-mester");

 $lekerdezes="SELECT * FROM valaszok WHERE q_id=$_SESSION[q_id] AND kerdes_szam=$_SESSION[kerdes_szam]";
 $t=mysqli_query($adb,$lekerdezes);
 $sor=mysqli_fetch_array($t);

 mysqli_close($adb);

//csalás számláló
 $_SESSION[csalas_szamlalo]++;
?>

<script>

valasz_szin="#475d8e"
kijelolt_valasz_szin="#5b4584"
keves_ido_szin="#c11e1e"
lejart_hatter_szin="#911E1E"
lejart_szin="#787878"

//hover
 function hover(kep)
 {
  kep.style.backgroundColor=kijelolt_valasz_szin
 }

 function hover_out(kep)
 {
  kep.style.backgroundColor=valasz_szin
 }

 function elrejtes()
 {
  document.getElementById("gomb_ketto").style.visibility="hidden"
  document.getElementById("gomb_harom").style.visibility="hidden"
 }

//szamlalo
 function lekerdezes()
 {
  alap_datum=new Date()
  alap_masodperc=alap_datum.getSeconds()
  alap_perc=alap_datum.getMinutes()
 }


 function visszaszamlalo()
 {
  datum=new Date()
  masodperc=datum.getSeconds()
  perc=datum.getMinutes()
  kulunbseg=(masodperc-alap_masodperc)
  szamlalo=(30-kulunbseg)

  if(perc>alap_perc) szamlalo=szamlalo-60 
 
  if(szamlalo<=5) document.getElementById("visszaszamlalas").style.color=keves_ido_szin

  visszaszamlalas.innerHTML=szamlalo 

  if(szamlalo==0) lejart_az_ido()
 }

 idozito=setInterval('visszaszamlalo()',1000)

 function lejart_az_ido()
 {
  clearInterval(idozito)

  document.body.style.backgroundColor=lejart_hatter_szin
  document.valaszolas.valasz.style.backgroundColor=lejart_hatter_szin

  document.getElementById("kerdes").style.backgroundColor=lejart_szin

  document.getElementById("valaszok_tabla").rows[0].cells[0].style.backgroundColor=lejart_szin
  document.getElementById("valaszok_tabla").rows[0].cells[1].style.backgroundColor=lejart_szin
  document.getElementById("valaszok_tabla").rows[1].cells[0].style.backgroundColor=lejart_szin
  document.getElementById("valaszok_tabla").rows[1].cells[1].style.backgroundColor=lejart_szin

  document.getElementById("gomb_egy").style.visibility="hidden"
  document.getElementById("gomb_ketto").style.visibility="visible"
  document.getElementById("gomb_harom").style.visibility="visible"

  document.getElementById("valaszok_tabla").rows[0].cells[0].onclick="" 
  document.getElementById("valaszok_tabla").rows[0].cells[1].onclick=""
  document.getElementById("valaszok_tabla").rows[1].cells[0].onclick=""
  document.getElementById("valaszok_tabla").rows[1].cells[1].onclick=""

  document.getElementById("valaszok_tabla").rows[0].cells[0].onmouseover =""
  document.getElementById("valaszok_tabla").rows[0].cells[1].onmouseover =""
  document.getElementById("valaszok_tabla").rows[1].cells[0].onmouseover=""
  document.getElementById("valaszok_tabla").rows[1].cells[1].onmouseover =""

  document.getElementById("valaszok_tabla").rows[0].cells[0].onmouseout =""
  document.getElementById("valaszok_tabla").rows[0].cells[1].onmouseout =""
  document.getElementById("valaszok_tabla").rows[1].cells[0].onmouseout =""
  document.getElementById("valaszok_tabla").rows[1].cells[1].onmouseout =""
 }

//válaszok
 function a_valasz()
 {
  document.getElementById("valaszok_tabla").rows[0].cells[0].style.backgroundColor=kijelolt_valasz_szin
  document.getElementById("valaszok_tabla").rows[0].cells[1].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[0].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[1].style.backgroundColor=valasz_szin

  document.getElementById("valaszok_tabla").rows[0].cells[0].onmouseout =""
  document.getElementById("valaszok_tabla").rows[0].cells[1].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[1].cells[0].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[1].cells[1].onmouseout =function() {hover_out(this)}

  document.valaszolas.valasz.value ="A"
 }

 function b_valasz()
 { 
  document.getElementById("valaszok_tabla").rows[0].cells[0].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[0].cells[1].style.backgroundColor=kijelolt_valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[0].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[1].style.backgroundColor=valasz_szin

  document.getElementById("valaszok_tabla").rows[0].cells[0].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[0].cells[1].onmouseout =""
  document.getElementById("valaszok_tabla").rows[1].cells[0].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[1].cells[1].onmouseout =function() {hover_out(this)}

  document.valaszolas.valasz.value ="B"
 }

 function c_valasz()
 {
  document.getElementById("valaszok_tabla").rows[0].cells[0].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[0].cells[1].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[0].style.backgroundColor=kijelolt_valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[1].style.backgroundColor=valasz_szin

  document.getElementById("valaszok_tabla").rows[0].cells[0].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[0].cells[1].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[1].cells[0].onmouseout =""
  document.getElementById("valaszok_tabla").rows[1].cells[1].onmouseout =function() {hover_out(this)}

  document.valaszolas.valasz.value ="C"
 }

 function d_valasz()
 {
  document.getElementById("valaszok_tabla").rows[0].cells[0].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[0].cells[1].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[0].style.backgroundColor=valasz_szin
  document.getElementById("valaszok_tabla").rows[1].cells[1].style.backgroundColor=kijelolt_valasz_szin

  document.getElementById("valaszok_tabla").rows[0].cells[0].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[0].cells[1].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[1].cells[0].onmouseout =function() {hover_out(this)}
  document.getElementById("valaszok_tabla").rows[1].cells[1].onmouseout =""

  document.valaszolas.valasz.value ="D"
 }


</script>

<style>

body 
{
 background-color:#694c46;
}

input
{
 font-family:arial;
 font-size:16;
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
 font-size:16;
 font-family:arial;
}

.kep
{
 border:solid black 1px;
 text-aling:center;
 width:300px;
 height:150px;
 margin:auto;
 margin-bottom:10px;
}

.valasz
{
 background-color:#694c46;
 font-weight:bold;
 border:0px;
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

#visszaszamlalas 
{
 float: right;
 color:#f58700;
 padding-top:120px;
 text-align:center;
 font-size:60;
 font-family:arial;
 background-image: url("visszaszamlalo_hatter.png");
 width:300px;
 height:175px;
}

#kerdes
{
 margin:auto;
 margin-bottom:30px;
 background-color:#475d8e;
 font-family:arial;
 font-size:16;
 text-align:center;
 width:675px;
 height:50px;
}

#valaszok
{
 text-align:center;
 padding-top:350px;
}

#valaszok_tabla
{
 border-spacing:30px;
}

#valaszok_tabla td
{
 padding-left:5px;
 padding-right:5px;
 background-color:#475d8e;
 width:350px;
 height:100px;
 border-radius:20px;
}

</style>

<html>

<body onload='lekerdezes(),elrejtes(),visszaszamlalo()'>

<div class='keret'>

 <div id='visszaszamlalas'>
 </div>

 <div id='valaszok' class='iras'>

 <form name='valaszolas' method='post' action='valaszolas_feldolgozas.php' target='kisablak'>
 
 <?
//kép
 if($sor[kep]!="nincs") print"
 <div class='kep'>

 <img src='./valasz_kepek/$sor[kep]'>

 </div>"; 
 ?>

 <? print $_SESSION[kerdes_szam]; ?>. Kérdés  <br>
 <div id='kerdes'>

 <? print $sor[kerdes]; ?>

 </div> 

 Válasz: <input type='text' size=1 name='valasz' class='iras valasz' readonly>

 <table id='valaszok_tabla' align='center'>
 <tr> <td onclick='a_valasz()' onmouseover='hover(this)' onmouseout='hover_out(this)'> <b>A:</b> <? print $sor[a]; ?> </td> <td onclick='b_valasz()' onmouseover='hover(this)' onmouseout='hover_out(this)'> <b>B:</b> <? print $sor[b]; ?> </td> </tr>
 <tr> <td onclick='c_valasz()' onmouseover='hover(this)' onmouseout='hover_out(this)'> <b>C:</b> <? print $sor[c]; ?> </td> <td onclick='d_valasz()' onmouseover='hover(this)' onmouseout='hover_out(this)'> <b>D:</b> <? print $sor[d]; ?> </td> </tr>
 </table>
 <input class='gomb' type='submit' id='gomb_egy' value='Következő'> <br>
 <a id='gomb_ketto' href='oldal.php?p=quiz-bongeszo'> <input  class='gomb'type='button' value='Vissza a quiz-böngészőbe'> </a>  
 <a id='gomb_harom' href='quiz_kezdes.php?q=<? print $_SESSION[q_id] ?>'> <input class='gomb' type='button' value='Újra'> </a>
 
</form>

 </div>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</body>

</html>