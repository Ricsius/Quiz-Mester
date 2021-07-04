<div class='iras profil_menu'>
  
 <table class='profil_menu_tabla' align='center'>
 <tr> <td> <? print "<a href='oldal.php?p=profil/adatlap/f=$p_osztas[1]'>"; ?> Adatlap </a> </td>
      <td> <? print "<a href='oldal.php?p=profil/kedvencek/f=$p_osztas[1]'>"; ?> Kedvencek </a> </td>
      <td> <? print "<a href='oldal.php?p=profil/quizek/f=$p_osztas[1]'>"; ?> Quizek </a> </td> 
 </tr>
 </table> 

</div>

<div>

 <?
 //aloldalak betöltése
  if($p_osztas[0]=="profil/adatlap/f") include("adatlap.php");
  else if($p_osztas[0]=="profil/kedvencek/f") include("kedvencek.php");
  else if($p_osztas[0]=="profil/quizek/f") include("felhasznalo_quizei.php");

  else print"<script> parent.location.href='rossz_link.php' </script> ";
 ?>

</div>


