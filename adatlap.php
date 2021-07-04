<?
if($_SESSION[oldal]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");

//nem létező felhasználó adat lekérés megakadaályozása
 if($p_osztas[1]>$f_szam[0] || $p_osztas[1]<=0) die("<script> parent.location.href='rossz_link.php' </script>");

//felhasználó azonosítása 
 $f_lekerdezes="SELECT * FROM felhasznalok WHERE f_id=$p_osztas[1]";
 $f=mysqli_query($adb , $f_lekerdezes);
 $sor=mysqli_fetch_array($f);

//teljesített quizek száma
 $tq_lekerdezes="SELECT COUNT(*) FROM teljesitettek WHERE f_id=$p_osztas[1]";
 $tq=mysqli_query($adb , $tq_lekerdezes);
 $teljes_quiz=mysqli_fetch_array($tq);

print "<div class='iras adatlap'>";

//profilkép feltöltése
 if($p_osztas[1]==$_SESSION[bejelentkezve]) 

 print "
 <form action='profilkep_feltoltes.php' method='post' target='kisablak' enctype='multipart/form-data'>

 <table class='profilkep_feltoltes' align='center'>
 <tr> <td> Új profilkép feltöltése: </td> <td> <input type='file' name='profil_kep' > </td> </tr>
 <tr> <td colspan='2'> <input type='submit' class='gomb' value='Feltöltés'> </td> </tr>
 </table>

 </form>";
?>

<table class='adatlap_tabla' align='center'>
<tr> <td colspan='2'> <? print "<img src='./profil_kepek/$sor[profilkep]'>" ?> </td> </tr>
<tr> <td> Név: </td> <td> <? print $sor[felhasznalonev]; ?> </td> </tr>
<tr> <td> Nem: </td> <td> <? print $sor[nem]; ?> </td> </tr>
<tr> <td> Teljesített quizek: </td> <td> <? print $teljes_quiz[0]; ?> </td> </tr>
<tr> <td> Pontok: </td> <td> <? print $sor[pont]; ?> </td> </tr>
<tr> <td> Születési dátum: </td> <td> <? print $sor[szuletes_datum]; ?> </td> </tr>
</table>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>