<?
session_start();

//print_r ($_POST);

$valasz=$_POST[valasz];

//helyes válasz lekérdezése
 $adb=mysqli_connect("localhost","root","12345678","quiz-mester");

 $lekerdezes="SELECT * FROM valaszok WHERE q_id=$_SESSION[q_id] AND kerdes_szam=$_SESSION[kerdes_szam]";
 $t=mysqli_query($adb , $lekerdezes);
 $sor=mysqli_fetch_array($t);

//válasz ellenőrzése
 if($valasz=="") die();

 if($valasz!=$sor[helyes_valasz]) 
 {
  $_SESSION[rossz_valasz]="igen";
  die("<script> parent.location.href='rossz_valasz.php' </script>");
 }

//következő kérdés vagy értékelés
 if($_SESSION[kerdes_szam]==$_SESSION[ossz_kerdes_szam])
 {
  $_SESSION[teljesitve]="igen";
  print "<script>parent.location.href='Ertekeles.php'</script>";
 }

 else
 {
  $_SESSION[kerdes_szam]++;
  print "<script> parent.location.href=parent.location.href </script>";
 }

mysqli_close($adb);
?>