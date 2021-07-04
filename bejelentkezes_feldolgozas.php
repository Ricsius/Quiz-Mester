<?
session_start();

//helyettesítés
 $_POST[felhasznalonev]=str_replace("<" , "&lt" , $_POST[felhasznalonev]);
 $_POST[jelszo]=str_replace("<" , "&lt" , $_POST[jelszo]);

 $_POST[felhasznalonev]=str_replace("'" , "\'" , $_POST[felhasznalonev]);
 $_POST[jelszo]=str_replace("'" , "\'" , $_POST[jelszo]);

//print_r ($_POST);

$felh_nev=$_POST[felhasznalonev];
$jelszo=$_POST[jelszo];

//bejelentkeztetés és bejelentkezés rögzítése
 $adb=mysqli_connect("localhost", "root", "12345678" , "quiz-mester");

 $lekerdezes="SELECT f_id , felhasznalonev , jelszo FROM felhasznalok WHERE felhasznalonev='$felh_nev' AND jelszo='$jelszo' ";
 $t=mysqli_query($adb , $lekerdezes);

 if($sor=mysqli_fetch_array($t))
 {
  if($sor[felhasznalonev]==$felh_nev && $sor[jelszo]==$jelszo)
  {
   $beillesztes="INSERT INTO bejelentkezes (be_id ,     f_id    , datum , ip)
   VALUES                                  (''    , '$sor[f_id]', NOW() , '$_SERVER[SERVER_ADDR]')";
   mysqli_query($adb , $beillesztes);
   $_SESSION[bejelentkezve]=$sor[f_id];
   print "<script> parent.location.href='oldal.php?p=quiz-bongeszo' </script>";
  }
 }
 else print "<script> alert('Helytelen felhasználónév vagy jelszó') </script>";

 mysqli_close($adb);
?>

