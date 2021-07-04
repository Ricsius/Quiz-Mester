<?
if($_SESSION[oldal]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");

//quiz lekérdezés
 $q_lekerdezes="SELECT * FROM quizek WHERE cim LIKE '%$_SESSION[keres]%'";
 $q=mysqli_query($adb , $q_lekerdezes);
?>

<form action='kereses.php' method='post' target='kisablak'> 

<table class='kereso'>
<tr> <td> <? print "<input type='text' name='kereses' value='$_SESSION[keres]'>"; ?> </td> <td> <input type='submit' class='gomb' value='Keresés'> </td> </tr> 
</table>

</form> <br>

<div class='q_lista'>

<h1> Quiz-böngésző </h1>

<?
//quizek listázása
 while($sor=mysqli_fetch_array($q))
 {
  $t_eredmeny="";
  $t_lekerdezes="SELECT COUNT(*) FROM teljesitettek WHERE q_id=$sor[q_id] AND f_id=$_SESSION[bejelentkezve]";
  $t=mysqli_query($adb , $t_lekerdezes);
  $teljesitette=mysqli_fetch_array($t); 
 
  if($teljesitette[0]==1) $t_eredmeny="Teljesítve"; 

  print "<a class='doboz' href='quiz_kezdes.php?q=$sor[q_id]'> <div class='iras index'> <img src='./index_kepek/$sor[kep]'> <br> $sor[cim] <br> <span> $t_eredmeny </span> </div> </a>";
 }

 $_SESSION[keres]="";
?>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</div>

