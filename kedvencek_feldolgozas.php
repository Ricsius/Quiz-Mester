<?
session_start();

//print_r ($_POST);

$gomb=$_POST[kedvenc_gomb];

$adb=mysqli_connect("localhost" , "root" , "12345678", "quiz-mester");

//kedvenc rögzítése vagy aktiválása
 if($gomb=="Hozzáadás kedvencekhez")
 {
  $lekerdezes="SELECT COUNT(*) FROM kedvencek WHERE q_id=$_SESSION[q_id] AND f_id=$_SESSION[bejelentkezve]";
  $k=mysqli_query($adb , $lekerdezes);
  $kedvenc=mysqli_fetch_array($k);

  if($kedvenc[0]==0)
  {
   $beillesztes="INSERT INTO kedvencek (k_id ,     q_id        ,             f_id         , aktiv)
   VALUES                              (''   , $_SESSION[q_id] , $_SESSION[bejelentkezve] ,  'I' )";
   mysqli_query($adb , $beillesztes);
   mysqli_close($adb);
  }
 
  else
  {
   $feluliras="UPDATE kedvencek SET aktiv = 'I' WHERE kedvencek.q_id=$_SESSION[q_id] AND kedvencek.f_id = $_SESSION[bejelentkezve]";
   mysqli_query($adb , $feluliras);
   mysqli_close($adb);
  }
 }

//rögzített kedvenc deaktiválása
 else
 {
  $feluliras="UPDATE kedvencek SET aktiv = 'N' WHERE kedvencek.q_id=$_SESSION[q_id] AND kedvencek.f_id = $_SESSION[bejelentkezve]";
  mysqli_query($adb , $feluliras);
  mysqli_close($adb);
 }

//oldal újratöltése
 print"<script> parent.location.href=parent.location.href </script>";
?>