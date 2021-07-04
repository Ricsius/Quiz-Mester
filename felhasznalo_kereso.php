<?
if($_SESSION[oldal]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");

//kereső lekérdezése
 $f_lekerdezes="SELECT * FROM felhasznalok WHERE f_id <> $_SESSION[bejelentkezve] AND felhasznalonev LIKE '%$_SESSION[keres]%'";
 $f=mysqli_query($adb,$f_lekerdezes);
?>

<form action='kereses.php' method='post' target='kisablak'> 

<table class='kereso'>
<tr> <td> <? print "<input type='text' name='kereses' value='$_SESSION[keres]'>"; ?> </td> <td> <input type='submit' class='gomb' value='Keresés'> </td> </tr> 
</table>

</form> <br>

<div class='q_lista'>

<h1> Felhasználó kereső </h1>

<?
//felhasználók listázása
 while($sor=mysqli_fetch_array($f))
 {
  print "<a class='doboz' href='oldal.php?p=profil/adatlap/f=$sor[f_id]'> <div class='iras index'> <img src='./profil_kepek/$sor[profilkep]'> <br> $sor[felhasznalonev] <br> </div> </a>";
 }

 $_SESSION[keres]="";
?>

<iframe name='kisablak' width='0px' height='0px' border='0px' style='border:0px'>
</iframe>

</div>
