<script>

function regisztracio()
{
//felhasználónév
 felh_nev=document.regisztracio_felulet.felhasznalonev.value

 if(felh_nev.length<3) felh_hossz.innerHTML =("<i>Legalább 3 vagy több karakterből álló felhasználónevet írjon!</i>")
 else felh_hossz.innerHTML=""

//jelszó
 jelsz=document.regisztracio_felulet.jelszo.value

 if(jelsz.length<3) jelszo_hossz.innerHTML=("<i>Legalább 3 vagy több karakterből álló jelszavatt írjon!</i>")
 else jelszo_hossz.innerHTML=""

//jelszó ismétlés
 jelsz_ism=document.regisztracio_felulet.jelszo_ismetles.value

 if(jelsz_ism!=jelsz) jelszoism.innerHTML=("<i>Nem egyezik a jelszóval!</i>")
 else jelszoism.innerHTML=""

//nem
 nem=document.regisztracio_felulet.nem.value

 if(nem==0) nem_valasz.innerHTML=("<i>Válasszon nemet!</i>")
 else nem_valasz.innerHTML=""

//születésnap
 ev=document.regisztracio_felulet.ev.value
 honap=document.regisztracio_felulet.honap.value
 nap=document.regisztracio_felulet.nap.value
 szokoev=false

 if(nap==0 || honap==0 || ev==0) szuletesnap_valasz.innerHTML="<i>Adja meg a születési dátumát!</i>"
 else szuletesnap_valasz.innerHTML=""

 if(ev%4==0 && ev%100!=0 && nap==29 && honap=="Február") szokoev=true

 if(ev%400==0 && document.regisztracio_felulet.nap.value==29 && document.regisztracio_felulet.honap.value=="Február") szokoev=true

 if(nap>28 && honap=="Február" && szokoev==false) szuletesnap_valasz.innerHTML="<i>Ilyen dátum nem lehetséges!</i>"

 if(nap>30 && honap=="Április" && ev!=0) szuletesnap_valasz.innerHTML="<i>Ilyen dátum nem lehetséges!</i>"

 if(nap>30 && honap=="Június" && ev!=0) szuletesnap_valasz.innerHTML="<i>Ilyen dátum nem lehetséges!</i>"

 if(nap>30 && honap=="Szeptember" && ev!=0) szuletesnap_valasz.innerHTML="<i>Ilyen dátum nem lehetséges!</i>"

 if(nap>30 && honap=="November" && ev!=0) szuletesnap_valasz.innerHTML="<i>Ilyen dátum nem lehetséges!</i>"
}

</script>

<style>

body
{
 background-color:#694c46;
}

body input
{
 font-family:arial;
 font-size:16;
}

body span
{
 background-color:black;
 color:#c11e1e;
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

.regisztracio
{
 text-align:center;
}

.regisztracios_tabla
{
 padding-top:100px;
 padding-bottom:30px;
 width:800px;
}

.robot_tabla
{
 padding-top:30px;
 padding-bottom:30px;
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

 <div class='iras regisztracio'>

 <h1>Regisztráció </h1>
 <form name='regisztracio_felulet' action='regisztracio_feldolgozas.php' method='post' target='kisablak'>
 <table class='regisztracios_tabla' align='center'>

 <tr><td> Felhasználónév: </td> <td> <span id='felh_hossz'></span> </td></tr>
 <tr><td> <input type='text' name='felhasznalonev' size='35' maxlength='35'>  </tr>

 <tr><td> e-mail cím: </td> <td> <span id='e_mail_hiba'></span> </td></tr>
 <tr><td> <input type='text' name='e_mail' size='35' maxlength='35'> </td> </tr>


 <tr><td> Jelszó: </td> <td> <span id='jelszo_hossz'></span> </td></tr>
 <tr><td> <input type='password' name='jelszo' size='35' maxlength='35'> </td></tr>

 <tr><td> Jelszó megismétlése: </td> <td> <span id='jelszoism'></span> </td></tr>
 <tr><td> <input type='password' name='jelszo_ismetles' size='35' maxlength='35'> </td></tr>

 <tr><td> Neme: </td> <td> <span id='nem_valasz'></span> </td></tr>
 <tr><td> <select name='nem'> <option> <option> Férfi <option> Nő <option> Egyéb </select> </td></tr>

 <tr><td>Születés napja</td> <td> <span id='szuletesnap_valasz'></span>  </td></tr>
 <tr><td> <select name='nap'> 
 <option value=0>Nap  

 <?
 for($i=1;$i<=31;$i++)
 {
  print("<option>".$i." ");
 }
 ?>

 </select> 

 <select name='honap'>
 <option value=0>Hónap
 <option>Január
 <option>Február
 <option>Március
 <option>Április
 <option>Május
 <option>Június
 <option>Július
 <option>Augusztus
 <option>Szeptember
 <option>Október
 <option>November
 <option>December
 </select> 

 <select name='ev'>
 <option value=0>Év

 <?
 for($i=1900;$i<=2017;$i++)
 {
  print("<option>".$i." ");
 }
 ?>

 </select></td></td>
 </tr>
 </table>


 <table class='robot_tabla' align='center'>
 <tr><td> <img src='robot_vedelmi_kep.php' width='320px' height='180px'> </td> <td> <input type='text' name='vedelmi_szoveg'> </td>
 </table>

 <a href='index.php'> <input class='gomb' type='button' Value='Vissza'> </a> <input class='gomb' type='submit'value='Regisztráció' onclick='regisztracio()'> 
 </form>

 </div>

<iframe name='kisablak' width='0px' height='0px' style='border:0px'>
</iframe>

</div>

</body>

</html>