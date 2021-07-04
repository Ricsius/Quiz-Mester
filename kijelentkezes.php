<?
session_start();

//kijelentkezés rögzítése
 $adb=mysqli_connect("localhost" , "root" , "12345678" , "quiz-mester");

 $beillesztes="INSERT INTO kijelentkezes (ki_id ,     f_id                  , datum , ip)
 VALUES                                  (''    , '$_SESSION[bejelentkezve]', NOW() , '$_SERVER[SERVER_ADDR]')";
 mysqli_query($adb , $beillesztes);

 mysqli_close($adb);

//átirányítás
 print"<script> parent.location.href='index.php' </script>";

//$_SESSION törlése
 session_unset();
?>