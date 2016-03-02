<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=iso-8859-2">
<link rel="stylesheet" type="text/css" href="world_n.css"/>
<link rel="stylesheet" type="text/css" href="item-image.css"/>
</HEAD>
<BODY>
<div class= "tlo">
<?php
//sluzy do pokazywania swiata, wygenerowany obraz na podstawie danych z tablicy, rozmiar swiata jest brany z tablicy
//wyciagniecie z pliku
error_reporting(E_ALL ^ E_NOTICE);
//echo "przesuniecie Y " . $_POST['przesuny'];
//echo " przesuniecie X " . $_POST['przesunx'];

$px=$px+$_POST['przesunx'];
$py=$py+$_POST['przesuny'];
//$px=-1;//pozycja x
//$py=0;//pozycja y
$rx=20;//rozmiar okna x
$ry=20;//rozmiar okna y

$x=$px; //licznik połozenia w wierszu
$obiekty[0][0]=-1; 
$obiekty[0][1]=5; 

$fp = @fopen("swiat.txt", "r");

while ($linia = fgets($fp, 512)) {
    $wiersz=explode(";",$linia);
	if ($wiersz[0]>=$px && $wiersz[0]<=$px+$rx && $wiersz[1]>=$py && $wiersz[1]<=$py+$ry) {//wyswietlanie tylko okna

		if ($wiersz[0]==$px) {//jesli odczytany x jest $px czyli rozpoczyna sie nowa linia

		echo '<ul>';//rozpoczecie rzedu
							 } 


			echo '<li><div class="kafel"><div class="wyp item-image ';
			$sum=($obiekty[0][0]-$wiersz[0]) * ($obiekty[0][0]-$wiersz[0]) + ($obiekty[0][1]-$wiersz[1])*($obiekty[0][1]-$wiersz[1]); //ustalanie odleglosci od bazy
			$od=sqrt($sum);
			if ($od>6) {echo 'item-slonce'; }
			else {	//ustalono ze widac, wyswietla
			if ($wiersz[2]==0) {echo 'item-pustynia';}
			if ($wiersz[2]==1) {echo 'item-baza';}
			if ($wiersz[2]==2) {echo 'item-slonce';}
			if ($wiersz[2]==3) {echo 'item-book_gen_box';}
}

			echo ' "><div class="dymek">';
			//tu wstawic tresc opisu
/*			if ($wiersz[2]==0) {echo 'to jest trawa';}
			if ($wiersz[2]==1) {echo 'tu pada deszcz';}
			if ($wiersz[2]==2) {echo 'tu swieci atomwe slonce';}
			if ($wiersz[2]==3) {echo 'tu spadla koperta';}
*/		

			 echo "X= " . $wiersz[0] . "Y= " . $wiersz[1];
			echo '</div></div></div></li>';
								

								
		if ($wiersz[0]==$px+$rx) {		//iesli odczytany x jest rowny punkt startowy + rozmiar okna to zamknij wiersz			
			echo '</ul>'; 
			echo '<div class="clear"></div>';
							 }
							}
}
fclose($fp);

?>


</form>

<form method="post" action="pokaz.php">
	<input type="hidden" name="przesunx" value="<?php echo $px+1; ?>">
    <input type="hidden" name="przesuny" value="<?php echo $py; ?>">
<button type="submit">w lewo</button>
</form>

<form method="post" action="pokaz.php">
	<input type="hidden" name="przesunx" value="<?php echo $px-1; ?>">
    <input type="hidden" name="przesuny" value="<?php echo $py; ?>">
<button type="submit">w prawo</button>
</form>

<form method="post" action="pokaz.php">
	<input type="hidden" name="przesunx" value="<?php echo $px; ?>">
    <input type="hidden" name="przesuny" value="<?php echo $py+1; ?>">
<button type="submit">do gory</button>
</form>

<form method="post" action="pokaz.php">
	<input type="hidden" name="przesunx" value="<?php echo $px; ?>">
    <input type="hidden" name="przesuny" value="<?php echo $py-1; ?>">
<button type="submit">w dol</button>
</form>

<form method="post" action="pokaz.php">
  Podaj X:<br>
  <input type="text" name="przesunx" value="<?php echo $px; ?>"><br>
  Podaj Y::<br>
  <input type="text" name="przesuny" value="<?php echo $py; ?>"><br><br>
  <button type="submit">Przejdz</button>
 </form>

</div>
</BODY>
</HTML>