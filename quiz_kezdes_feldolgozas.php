<?
session_start();

//próba lekérdezése
 $adb=mysqli_connect("localhost" , "root" , "12345678", "quiz-mester");

 $lekerdezes="SELECT COUNT(*) FROM probaltak WHERE q_id=$_SESSION[q_id] AND f_id=$_SESSION[bejelentkezve]";
 $t=mysqli_query($adb , $lekerdezes);
 $probalta=mysqli_fetch_array($t);

//próba beillesztése
 if($probalta[0]==0)
 {
  $beillesztes="INSERT INTO probaltak (p_id ,    q_id           ,         f_id              )
  VALUES                              (''   , '$_SESSION[q_id]' , '$_SESSION[bejelentkezve]')";
  mysqli_query($adb , $beillesztes);
 }

 mysqli_close($adb);

//átirányítás
 print"<script> parent.location.href='valaszolas.php' </script>";
?>