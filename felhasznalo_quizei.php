<?
if($_SESSION[oldal]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");

//nem létező felhasználó adat lekérés megakadaályozása
 if($p_osztas[1]>$f_szam[0] || $p_osztas[1]<=0) die("<script> parent.location.href='rossz_link.php' </script>");

//felhasználónév lekérdezése
 $fn_lekerdezes="SELECT felhasznalonev FROM felhasznalok WHERE f_id=$p_osztas[1]";
 $fn=mysqli_query($adb,$fn_lekerdezes);;
 $felhasznalonev=mysqli_fetch_array($fn);

//felhasználó quizeinek lekérdezése
 $q_lekerdezes="SELECT * FROM quizek WHERE f_id=$p_osztas[1] AND cim LIKE '%$_SESSION[keres]%'";
 $q=mysqli_query($adb,$q_lekerdezes);

//kereső
 print"
 <form action='kereses.php' method='post' target='kisablak'> 

 <table class='kereso'>
 <tr> <td> <input type='text' name='kereses' value='$_SESSION[keres]'> </td> <td> <input type='submit' class='gomb' value='Keresés'> </td> </tr> 
 </table>

 </form> <br>"; 

//felhasználónév kiírása
 if($p_osztas[1]==$_SESSION[bejelentkezve]) print "<h1> Quizeid </h1>";
 else print "<h1> $felhasznalonev[felhasznalonev] quizei </h1>";
?>

<div class='q_lista'>

<?
//quizek listázása
 while($sor=mysqli_fetch_array($q))
 {
  $t_eredmeny="";
  $t_lekerdezes="SELECT COUNT(*) FROM teljesitettek WHERE q_id=$sor[q_id] AND f_id=$_SESSION[bejelentkezve]";
  $t=mysqli_query($adb , $t_lekerdezes);
  $teljesitette=mysqli_fetch_array($t); 
 
  if($teljesitette[0]==1) $t_eredmeny="Teljesítve"; 

  print "<a class='doboz' href='quiz_kezdes.php?q=$sor[q_id]'> <div class='iras index'> <img src='./index_kepek/$sor[kep]'> <br> $sor[cim] <br> <span class='teljesitve'> $t_eredmeny </span> </div> </a>";
 }

 $_SESSION[keres]="";
?>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>