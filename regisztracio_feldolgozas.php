<?
session_start();

//helyettesítés
 $_POST[felhasznalonev]=str_replace("<" , "&lt" , $_POST[felhasznalonev]);
 $_POST[e_mail]=str_replace("<" , "&lt" , $_POST[e_mail]);
 $_POST[jelszo]=str_replace("<" , "&lt" , $_POST[jelszo]);
 $_POST[jelszo_ismetles]=str_replace("<" , "&lt" , $_POST[jelszo_ismetles]);
 $_POST[vedelmi_szoveg]=str_replace("<" , "&lt" , $_POST[vedelmi_szoveg]);

 $_POST[felhasznalonev]=str_replace("'" , "&lt" , $_POST[felhasznalonev]);
 $_POST[e_mail]=str_replace("'" , "\'" , $_POST[e_mail]);
 $_POST[jelszo]=str_replace("'" , "\'" , $_POST[jelszo]);

//print_r ($_POST);

$hiba=0;
$felh_nev=$_POST[felhasznalonev];
$email=$_POST[e_mail];
$jelszo=$_POST[jelszo];
$nem=$_POST[nem];
$ev=$_POST[ev];
$honap_nev=$_POST[honap];
$nap=$_POST[nap];
$vedelmi_szoveg=$_POST[vedelmi_szoveg];

//egyezés vizsgálata
 $adb=mysqli_connect("localhost","root","12345678","quiz-mester");

 $lekerdezes="SELECT * FROM felhasznalok";
 $t=mysqli_query($adb , $lekerdezes);

 while($sor=mysqli_fetch_array($t))
 {
  if($sor[felhasznalonev]==$felh_nev)
   {
    print "<script> parent.document.getElementById('felh_hossz').innerHTML='A felhasználónév már használatban van!' </script>";
    $hiba++;
   }

  if($sor[email]==$email)
   {
    print "<script> parent.document.getElementById('e_mail_hiba').innerHTML='Az e-mail cím már használatban van!' </script>";
    $hiba++;
   }

  if($sor[jelszo]==$jelszo)
   {
    print "<script> parent.document.getElementById('jelszo_hossz').innerHTML='A jelszó már használatban van!' </script>";
    $hiba++;
   }
 }

//felhasználónév
 if(strlen($felh_nev)<3 ) $hiba++;

//jelszó
 if(strlen($jelszo)<3 ) $hiba++;

//jelszó ismétlés
 $jelszo_ism=$_POST[jelszo_ismetles];

 if($jelszo_ism!=$jelszo) $hiba++;

//nem
 if($nem=="") $hiba++;

//születésnap
 $honapok=[Január , Február , Március , Április , Május , Június , Július , Augusztus , Szeptember , Október , November , December];

 for($i=0;$i<12;$i++)
 {
  if($honapok[$i]==$honap_nev) $honap=$i+1;
 }

 $szul_dat="$ev-$honap-$nap";
 $szkoev=false;

 if($nap=="0" || $honap_nev=="0" || $ev=="0") $hiba++;

 if($ev%4==0 && $ev%100!=0 && $nap==29) $szokoev=true;

 if($ev%400==0 && $nap==29) $szokoev=true;

 if($nap>28 && $honap_nev=="Február" && $szokoev==false) $hiba++;

 if($nap>30 && $honap_nev=="Április") $hiba++;

 if($nap>30 && $honap_nev=="Június") $hiba++;

 if($nap>30 && $honap_nev=="Szeptember") $hiba++;

 if($nap>30 && $honap_nev=="November") $hiba++;

//védelmi szöveg
 if($vedelmi_szoveg!= $_SESSION[kep_szoveg]) 
 {
  print "<script> alert('Helytelen válasz!') </script>";
  $hiba++;
 }

//e-mail
 $uzenet="Ez egy autómatikus e-mail, zért ne válaszoljon. <br> <br>
          Köszönjük a regisztrációját a Quiz-Mester.hu-ra. <br> <br>
          Az ön felhasználóneve: $felh_nev <br> <br>
          Biztonsági okokból ez az e-mail nem tartalmazza a jelszavát. <br> <br>
          Jó szórakozást kívánunk!";

 if(!mail($email , "Quiz-Mester regisztráció" , $uzenet) )
 {
  print "<script> parent.document.getElementById('e_mail_hiba').innerHTML='Ez az e-mail cím nem létezik!' </script>";
  $hiba++;
 }

if($hiba>0) die();

//adat beillesztés
 $datum=@date("Y-m-d");
 $beillesztes="INSERT INTO felhasznalok (f_id , felhasznalonev , email    , jelszo    , nem    , szuletes_datum , pont , regisztracio_datum ,    profilkep )
 VALUES                                 (''   , '$felh_nev'    , '$email' , '$jelszo' , '$nem' , '$szul_dat'    , '0'  , '$datum'           , 'alap_pf.jpg')";
 
 mysqli_query($adb , $beillesztes); 

 mysqli_close($adb);

 print "<script> parent.location.href='sikeres_regisztracio.php' </script>";

 $_SESSION[regisztralva]="igen";
?>