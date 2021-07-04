<?
if($_SESSION[oldal]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");
?>

<script>

function ures()
{
 hiba_szin="#911E1E" 

 cim=document.quiz_keszito_egy.cim.value
 leiras=document.quiz_keszito_egy.leiras.value

 if(cim=="") document.quiz_keszito_egy.cim.style.backgroundColor=hiba_szin
 else document.quiz_keszito_egy.cim.style.backgroundColor="white"

 if(leiras=="") document.quiz_keszito_egy.leiras.style.backgroundColor=hiba_szin
 else document.quiz_keszito_egy.leiras.style.backgroundColor="white"
}

</script>

<h1> Quiz-készítő </h1>

<div class='iras keszites'>

 <form name='quiz_keszito_egy' action='quiz_keszito_egy_feldolgozas.php' method='post' target='kisablak' enctype='multipart/form-data'>
 
 <table align='center' class='keszites_tabla'>
 <tr><td> Indexkép feltöltése </td> <td> <input type='file' name='index_kep'> </td></tr>
 <tr><td> Cím: </td> <td> <input type='text' name='cim' size='35' maxlength='35'> </td></tr> 
 <tr><td> Kérdések száma: </td> <td> <select name='kerdes_szam'> 
 <? for($i=3;$i<=100;$i++) print "<option>$i"; ?></td></tr> 
 </table>

 Leírás: <br>
 <textarea name='leiras' maxlebgth='150'></textarea> <br>

 <input class='gomb' type='submit'value='Tovább' onclick='ures()'>

 </form>

</div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>
