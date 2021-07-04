<?
session_start();

$csillag=$_POST[csillag];

if($csillag=="")
{
 die();
}

//teljesítés beillesztése
$adb=mysqli_connect("localhost" , "root" , "12345678" , "quiz-mester");

 $beillesztes="INSERT INTO teljesitettek (t_id ,     q_id          ,        f_id               )
 VALUES                                  (''   , '$_SESSION[q_id]' , '$_SESSION[bejelentkezve]')";
 mysqli_query($adb , $beillesztes);

//felhasználó pontszámának lekérdezése
 $p_lekerdezes="SELECT pont FROM felhasznalok WHERE f_id=$_SESSION[bejelentkezve]";
 $p=mysqli_query($adb , $p_lekerdezes);
 $pont=mysqli_fetch_array($p);
 $pont_szam=$pont[pont];
 $pont_szam+=$_SESSION[ossz_kerdes_szam];
 $pontozas="UPDATE felhasznalok SET pont = '$pont_szam' WHERE felhasznalok.f_id = $_SESSION[bejelentkezve]";

 mysqli_query($adb , $pontozas);

//csillag lekérdezés és hozzáadás
 $cs_lekerdezes="SELECT egy_csillag , ketto_csillag , harom_csillag , negy_csillag , ot_csillag FROM quizek WHERE q_id=$_SESSION[q_id]";
 $cs=mysqli_query($adb , $cs_lekerdezes);
 $csillagok=mysqli_fetch_array($cs);

 switch($csillag)
 {
  case 1:
 
   $cs_szam=$csillagok[egy_csillag];
   $cs_szam++;
   $ertekeles="UPDATE quizek SET egy_csillag = '$cs_szam' WHERE quizek.q_id = $_SESSION[q_id]";
   mysqli_query($adb , $ertekeles);
   break;

  case 2:
 
   $cs_szam=$csillagok[ketto_csillag];
   $cs_szam++;
   $ertekeles="UPDATE quizek SET ketto_csillag = '$cs_szam' WHERE quizek.q_id = $_SESSION[q_id]";
   mysqli_query($adb , $ertekeles);
   break;

  case 3:
 
   $cs_szam=$csillagok[harom_csillag];
   $cs_szam++;
   $ertekeles="UPDATE quizek SET harom_csillag = '$cs_szam' WHERE quizek.q_id = $_SESSION[q_id]";
   mysqli_query($adb , $ertekeles);
   break;

  case 4:
 
   $cs_szam=$csillagok[negy_csillag];
   $cs_szam++;
   $ertekeles="UPDATE quizek SET negy_csillag = '$cs_szam' WHERE quizek.q_id = $_SESSION[q_id]";
   mysqli_query($adb , $ertekeles);
   break;

  case 5:
 
   $cs_szam=$csillagok[ot_csillag];
   $cs_szam++;
   $ertekeles="UPDATE quizek SET ot_csillag = '$cs_szam' WHERE quizek.q_id = $_SESSION[q_id]";
   mysqli_query($adb , $ertekeles);
   break;
 }

 mysqli_close($adb);

print "<script> parent.location.href='oldal.php?p=quiz-bongeszo' </script>";
?>