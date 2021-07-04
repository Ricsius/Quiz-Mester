<?
if($_SESSION[oldal]!="igen") die("<script> parent.location.href='rossz_link.php' </script>");
?>

<div class='utmutato'>

<h1>Útmutató</h1> 

<table class='tartalomjegyzek' align='center'>
<tr> <td colspan=4> <b> Tartalomjegyzék <b> </td> </tr> 
<tr> <td> <a href='#menupontok'> <b> <u> Menüpontok </u> </b> </a> </td> 
     <td> <a href='#quizek_elkezdese'> <b> <u> Quizek elkezdése </u> </b> </a> </td> 
     <td> <a href='#quizek_elkeszitese'> <b> <u> Quizek elkészítése </u> </b> </a> </td> 
     <td> <a href='#profil'> <b> <u> Profil </u> </b> </a> </tr>
</table

 <div>

 <list>

 <a name='menupontok'> 

 <h2> Menüpontok </h2> 

 <li> <b> Quiz-böngésző: </b> Itt megtalálhatod az összes feltöltött quiz-t.
 <li> <b> Quiz készítő: </b> Itt elkészítheted a saját quizeidet 10-100 kérdéssel.
 <li> <b> Profilom: </b> Itt megtekintheted a profilod adatait és megváltoztathatod a profilképedet.
 <li> <b> Felhasználó kereső: </b> Itt keresheted meg más felhasználók profilját.
 
 </a> 

 <a name='quizek_elkezdese'> 

 <h2> Quizek elkezdése </h2>

 <li> <b> Indító oldal </b> 
 <p> A quizeket az indító oldalukról tudod elindítani, ahova a quiz indexképére kattintva tudsz eljutni. <br>
     Ezen az oldalon megtekinthetsz adatokat a quizről, hozzászólásokat írhatsz, illetve hozzáadhatod a quizt a kedvenceidhez. <br>
     </p>

 <li> <b> Válaszolás </b>
 <p> A feltett kérdésekre mindig 4 válasz lehetőséged lessz. Ezek közül 30 másodperc alatt kell kiválasztanod a megfelelőt. Ha helytelen választ adsz meg, az egész quizt előlről kell kezdened. <br>
     Amennyiben lejár az idő, lehetőséged van egyből visszalépni az indító oldalra vagy a quiz böngészőbe.</p>
 
 <li> <b> Teljesítés </b>
 <p> Amennyiben sikeresen teljesítessz egy quizt értékelned kell, ám erre csak egy alkalommal van lehetőséged. <br> 
     Az értékelés után a pontjaidhoz hozzáadódik annyi pont amennyi kérdés volt a quizben. </p> 

 <li> <b> Csalás </b>
 <p> Ha a válaszolós oldalt újratöltöd, remélve hogy végtelen időre tehetsz szert, a quiz befejezésekor nem értékelheted a quizt, nem számít teljesítettnek és még az érte járó pont levonódik a pontjaidból. </p>

 </a>

 <a name='quizek_elkeszitese'> 

 <h2> Quizek elkészítése</h2>

 <li> <b> Első rész </b>
 <p> Ezen a lapon a quized indexképét, címét,leírását és a kérdések számát kell megadnod. Mindegyiket kötelező megadni. <br>
     A képnek minimum 100*100 as méretűnek és JPG formátumúnak kell lennie. <br> 
     A cím legfeljebb 35 karakterből állhat, a leírás viszont 150 karakter hosszú is lehet. 
     A kérdések száma alapvetően 10, de ez 100-ig növelhető. </p>

 <li> <b> Második rész </b>
 <p> Itt a kérdéseket, a hozzájuk tartozó négy válaszlehetőséget és a helyes válasz betűjelét kell megadnod. Ezt annyiszor kell elismételni amennyi kérdést beállítottál az előző odalon. <br>
     A kérdésekhez képet is feltölthetsz, ami majd a válaszolás oldalon fog megjelenni az adott kérdésnél. A képnek minimum 100*100-as méretűnek és JPG formátumúnak kell lennie. <br>
     A kérdés legfeljebb 150 karakterből állhat, a válaszlehetőségek 35-ből. <br>
     A kérdés és a válaszlehetőségek nem egyezhetnek egymással. </p>
 
 </a>

 <a name='profil'> 

 <h2> Profil </h2>

 <li> <b> Adatlap </b>
 <p> Itt a felhasználókról tekinthetsz meg adatokat. <br> 
     Amennyiben a saját adatlapodra lépsz, bármikor módosíthatod a profilképed. <br>
     A profilképnek minimum 100*100-as méretűnek és JPG formátumúnak kell lennie.</p>

 <li> <b> Kedvencek </b>
 <p> Itt az adott felhasználó kedvencek közé sorolt quizei kerülnek kilistázásra. </p>

 <li> <b> Quizek </b>
 <p> Itt az adott felhasználó által elkészített quizek kerülnek kilistázásra. </p>
 
 </a>

 </list>

 </div>

</div>