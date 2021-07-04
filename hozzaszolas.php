<?
session_start();

//helyettesítés
 $_POST[hozzaszolas]=str_replace("<" , "&lt" , $_POST[hozzaszolas]);
 $_POST[hozzaszolas]=str_replace("'" , "\'" , $_POST[hozzaszolas]);
 $_POST[hozzaszolas]=str_replace("\r\n" , "<br>" , $_POST[hozzaszolas]);

//print_r ($_POST);

$hozzaszolas=$_POST[hozzaszolas];

//üres hozzászólások megakadályozása
 if($hozzaszolas=="") die();

//hozzászólás belillesztése
 $adb=mysqli_connect("localhost" , "root" , "12345678", "quiz-mester");

 $datum=@date("Y-m-d");
 $beillesztes="INSERT INTO hozzaszolasok (h_id ,     q_id          ,             f_id           ,    hozzaszolas   ,   datum )
 VALUES                                  (''   , '$_SESSION[q_id]' , '$_SESSION[bejelentkezve]' ,  '$hozzaszolas'  , '$datum')";
 mysqli_query($adb , $beillesztes);

 mysqli_close($adb);

//oldal újratöltése
 print "<script> parent.location.href=parent.location.href </script>";
?>