<?
session_start();

//nem bejelentkezett felhasználók átirányítása
 if($_SESSION[bejelentkezve]=="") die("<script> parent.location.href='rossz_link.php' </script>");

$q_id=$_GET[q];

$adb=mysqli_connect("localhost" , "root" , "12345678", "quiz-mester");

//quizek számának lekérdezése
 $qsz_lekerdezes="SELECT COUNT(*) FROM quizek";
 $qsz=mysqli_query($adb , $qsz_lekerdezes);
 $q_szam=mysqli_fetch_array($qsz);

//nem létező quiz adat lkérdezés megakadályozása
 if($q_id>$q_szam[0] || $q_id<=0) die("<script> parent.location.href='rossz_link.php' </script>");

//quiz lekérdezés
 $q_lekerdezes="SELECT * FROM quizek WHERE q_id=$q_id";
 $q=mysqli_query($adb , $q_lekerdezes);
 $sor=mysqli_fetch_array($q);

//pontszám
 $pontszam=$sor[egy_csillag]+($sor[ketto_csillag]*2)+($sor[harom_csillag]*3)+($sor[negy_csillag]*4)+($sor[ot_csillag]*5);

 if($pontszam>0) $pontszam/=($sor[egy_csillag] + $sor[ketto_csillag] + $sor[harom_csillag] + $sor[negy_csillag] + $sor[ot_csillag]);
 else $pontszam=0;

 if(substr($pontszam , 3 , 1)>=5) $pontszam+=0.1;

//szerző lekérdezése
 $sz_lekerdezes="SELECT f_id , felhasznalonev FROM felhasznalok WHERE f_id=$sor[f_id] ";
 $sz=mysqli_query($adb , $sz_lekerdezes);
 $szerzo=mysqli_fetch_array($sz);

//próbálták lekérdezés
 $p_lekerdezes="SELECT COUNT(*) FROM probaltak WHERE q_id=$q_id ";
 $p=mysqli_query($adb , $p_lekerdezes);
 $probaltak=mysqli_fetch_array($p);

//teljesítették lekérdezés
 $t_lekerdezes="SELECT COUNT(*) FROM teljesitettek WHERE q_id=$q_id ";
 $t=mysqli_query($adb , $t_lekerdezes);
 $teljesitettek=mysqli_fetch_array($t);

//felhasználó teljesítette-e?
 $f_lekerdezes="SELECT COUNT(*) FROM teljesitettek WHERE q_id=$q_id AND f_id=$_SESSION[bejelentkezve]";
 $f=mysqli_query($adb , $f_lekerdezes);
 $figyelmeztetes=mysqli_fetch_array($f);

//hozzáadva a kedvencekhez?
 $k_lekerdezes="SELECT COUNT(*) , aktiv FROM kedvencek WHERE q_id=$q_id AND f_id=$_SESSION[bejelentkezve] AND aktiv='I'";
 $k=mysqli_query($adb , $k_lekerdezes);
 $kedvenc=mysqli_fetch_array($k);

//hozzászólások lekérdezése
 $h_lekerdezes="SELECT * FROM hozzaszolasok WHERE q_id=$q_id";
 $h=mysqli_query($adb , $h_lekerdezes);

//adatok továbbítása
 $_SESSION[kerdes_szam]=1;
 $_SESSION[q_id]=$q_id;
 $_SESSION[ossz_kerdes_szam]=$sor[kerdesek_szama];
 $_SESSION[csalas_szamlalo]=$sor[kerdesek_szama]*-1; 
?>

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
 color:black;
 font-weight:bold;
}

textarea
{
 font-family:arial;
 font-size:16;
 text-align:center;
 margin-top:30px;
 margin-bottom:30px;
 width:675px;
 height:50px;
}

.adatok
{
 margin-top:30px;
 margin-bottom:30px;
}

.adatok td
{
 padding-bottom:10px;
}

.keret
{
 margin:30px;
}

.leiras
{
 background-color:#694c46;
 font-family:arial;
 font-size:16;
 margin:auto;
 margin-top:30px;
 text-align:center;
 width:675px;
 height:50px;
}

.iras
{
 font-family:arial;
 font-size:16;
}

.kezdes
{
 text-align:center;
}

.kezdes img
{
 width:540px;
 height:270px;
}

.teljesitve
{
 background-color:black;
 color:#c11e1e;
 font-weight:bold;
 font-size:22;
}

.leiras
{
border:1px solid black;
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

.hozzaszolas
{
 background-color:white;
 margin-top:10px;
 text-align:left;
 width:675px;
 min-height:50px;
}

.hozzaszolas img
{
 width:100px;
 height:100px;
 float:left;
}

.hozzaszolas_tabla
{
 border-spacing:10px;
}

</style>

<html>

<body>

<div class='keret'>

 <div class='iras kezdes'>

 <h1> <? print $sor[cim]; ?> </h1>

 <? if($figyelmeztetes[0]==1) print "<span class='teljesitve'> A quizt már teljesítetted! </span> <br>"; ?>

 <? print "<img src='./index_kepek/$sor[kep]'>"; ?>
 <table class='adatok' align='center'>
 <tr><td> <b> Szerző: </b> </td> <td> <? print "<a href='oldal.php?p=profil/f=$szerzo[f_id]'> $szerzo[felhasznalonev] </a>"; ?> </td> </tr> 
 <tr><td> <b> Kérdések: </b> </td> <td> <? print $sor[kerdesek_szama]; ?> </td> </tr> 
 <tr><td> <b> Pontszám: </b> </td> <td> <? print substr($pontszam , 0 , 3); ?> </td> </tr> 
 <tr><td> <b> Próbálták: </b> </td> <td> <? print "$probaltak[0] "; ?> </td> </tr> 
 <tr><td> <b> Teljesítették: </b> </td> <td> <? print "$teljesitettek[0]"; ?> </td> </tr> 
 </table>

 <b> Leírás: </b> <br>

  <div class='leiras'>
  <? print $sor[leiras]; ?> 
  </div>

 <form action='quiz_kezdes_feldolgozas.php' target='kisablak'>
 <a href='oldal.php?p=quiz-bongeszo'> <input class='gomb' type='button'value='Vissza'> </a>  <input class='gomb' type='submit'value='Kezdés'>
 </form>

 <form action='kedvencek_feldolgozas.php' method='post' target='kisablak'>
 <? 
 //kedvenc gombok
  if($kedvenc[0]==0 || $kedvenc[aktiv]=="N") print "<input class='gomb' name='kedvenc_gomb' type='submit' value='Hozzáadás kedvencekhez'>";
  else print "<input name='kedvenc_gomb' class='gomb' type='submit' value='Eltávolítás kedvencek közül'>";
 ?>
 </form>

 <form action='hozzaszolas.php' method='post' target='kisablak'>

 <textarea name='hozzaszolas' placeholder='Írj hozzászólást'></textarea> <br>

 <input class='gomb' type='submit' value='Beküldés'>
 </form>

 <hr> 
 <b> Hozzászólások </b><br>
 
 <?
 //hozzászólások listázása
  while($hozzaszolasok=mysqli_fetch_array($h))
  {
   $nev_lekerdezes="SELECT f_id , felhasznalonev , profilkep FROM felhasznalok WHERE f_id=$hozzaszolasok[f_id]";
   $n=mysqli_query($adb , $nev_lekerdezes);
   $nev=mysqli_fetch_array($n);

   print "<div class='hozzaszolas'> 
 
           <a href='oldal.php?p=profil/adatlap/f=$nev[f_id]'> <img src='./profil_kepek/$nev[profilkep]'> </a>
          
           <table class='hozzaszolas_tabla'> 
           <tr> <td> <a href='oldal.php?p=profil/adatlap/f=$nev[f_id]'> $nev[felhasznalonev] </a> </td> </tr>
           <tr> <td> $hozzaszolasok[datum] </td> </tr>
           <tr> <td> $hozzaszolasok[hozzaszolas] </td> </tr>
           </table>

          </div>";
  } 

 mysqli_close($adb);
 ?>

 </div>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</body>

</html>