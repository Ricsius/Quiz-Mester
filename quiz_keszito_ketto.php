<?
session_start();

//átirányítás
if($_SESSION[keszites]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");
?>

<script>

function vizsgalat()
{
 hiba_szin="#911E1E"

 kerdes=document.quiz_keszito_ketto.kerdes.value
 a_valasz=document.quiz_keszito_ketto.a_valasz.value
 b_valasz=document.quiz_keszito_ketto.b_valasz.value
 c_valasz=document.quiz_keszito_ketto.c_valasz.value
 d_valasz=document.quiz_keszito_ketto.d_valasz.value


 if (kerdes=="" || kerdes==a_valasz || kerdes==b_valasz || kerdes==c_valasz || kerdes==d_valasz) document.quiz_keszito_ketto.kerdes.style.backgroundColor=hiba_szin
 else document.quiz_keszito_ketto.kerdes.style.backgroundColor="white"

 if (a_valasz=="" || a_valasz==kerdes || a_valasz==b_valasz || a_valasz==c_valasz || a_valasz==d_valasz) document.quiz_keszito_ketto.a_valasz.style.backgroundColor=hiba_szin
 else document.quiz_keszito_ketto.a_valasz.style.backgroundColor="white"

 if (b_valasz=="" || b_valasz==kerdes || b_valasz==a_valasz || b_valasz==c_valasz || b_valasz==d_valasz) document.quiz_keszito_ketto.b_valasz.style.backgroundColor=hiba_szin
 else document.quiz_keszito_ketto.b_valasz.style.backgroundColor="white"

 if (c_valasz=="" || c_valasz==kerdes || c_valasz==a_valasz || c_valasz==b_valasz || c_valasz==d_valasz) document.quiz_keszito_ketto.c_valasz.style.backgroundColor=hiba_szin
 else document.quiz_keszito_ketto.c_valasz.style.backgroundColor="white"

 if (d_valasz=="" || d_valasz==kerdes || d_valasz==a_valasz || d_valasz==b_valasz || d_valasz==c_valasz) document.quiz_keszito_ketto.d_valasz.style.backgroundColor=hiba_szin
 else document.quiz_keszito_ketto.d_valasz.style.backgroundColor="white"
}

</script>

<style>

body 
{
 background-color:#694c46;
}

body textarea
{
 font-family:arial;
 font-size:16;
 text-align:center;
 border:0px;
 width:675px;
 height:50px;
}

body input
{
 font-family:arial;
 font-size:16;
}

body select
{
 font-family:arial;
 font-size:16;
 font-weight:bold;
}

body a
{
 text-decoration:none;
}

.keret
{
 margin:30px;
}

.iras
{
 font-family:arial;
 font-size:16;
}

.keszites
{
 text-align:center;
 padding-top:350px;
}

#lehetosegek_tabla
{
 border-spacing:30px;
}

#lehetosegek_tabla td
{
 padding-left:5px;
 padding-right:5px;
 background-color:#475d8e;
 width:350px;
 height:100px;
 border-radius:20px;
}

#lehetosegek_tabla input
{
 border:0px;
}

.gomb
{
 margin-top:30px;
 background-color:#319a5d;
 font-weight:bold;
 border:solid 2px #319a5d;
}

.gomb:hover
{
 background-color:white;
}

</style>

<html>

<body>

<div class='keret'>

 <div class='iras keszites'>

 <form name='quiz_keszito_ketto' action='quiz_keszito_ketto_feldolgozas.php' method='post' target='kisablak' enctype='multipart/form-data'>

 <input type='file' name='kep'> kép feltöltése opcionális <br>

 <? print $_SESSION[kerdes_szam].". "; ?>Kérdés:<br>
 <textarea name='kerdes' maxlength='150'></textarea>

 <table id='lehetosegek_tabla' align='center'>
 <tr><td> <b>A:</b> <input type='text' name='a_valasz' size='35' maxlength='35'> </td> <td> <b>B:</b> <input type='text' name='b_valasz' size='35' maxlength='35'> </td></tr>
 <tr><td> <b>C:</b> <input type='text' name='c_valasz' size='35' maxlength='35'> </td> <td> <b>D:</b> <input type='text' name='d_valasz' size='35' maxlength='35'> </td></tr>
 </table>

 Helyes válasz betűjele: 

<select name='helyes_valasz'>
 <option> A
 <option> B
 <option> C
 <option> D
 </select> <br>
 
 <input class='gomb'type='submit' onclick='vizsgalat()' value='Tovább'>
 
 </form>

 <form action='quiz_keszito_kilepes.php' method='post' target='kisablak'> <input class='gomb'type='submit' value='Kilépés'> </form>

 </div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</div>

</body>

</html>