<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=iso-8859-2">
<link rel="stylesheet" type="text/css" href="world.css"/>
<link rel="stylesheet" type="text/css" href="item-image.css"/>
</HEAD>
<BODY>
<div class= "tlo">
<?php
//sluzy do pokazywania swiata, wygenerowany obraz na podstawie danych z tablicy, rozmiar swiata jest brany z tablicy
//wyciagniecie z pliku

$x=0;
$y=0;
$rx=0;
$ry=0;

$fp = @fopen("plik.txt", "r");

while ($linia = fgets($fp, 512)) {

        $wiersz=explode(";",$linia);
		if ($wiersz[0]<$rx) { //zamkniecie wiersza, wrzucone tutaj bo poprzedia linia musi zostac zamknieta zanim otworzy sie nowa
			echo '</ul>';
			echo '<div class="clear"></div>';
			$rx=0;

							}

		if ($wiersz[0]>=$rx) { $rx=$wiersz[0]; }
//		if ($wiersz[1]>=$ry) { $ry=$wiersz[1]; }

		if ($wiersz[0]==0) {

		echo '<ul>';
						} 


			echo '<li><div class="kafel"><div class="wyp item-image ';
			if ($wiersz[2]==0) {echo 'item-bplan_c';}
			if ($wiersz[2]==1) {echo 'item-deszcz';}
			if ($wiersz[2]==2) {echo 'item-slonce';}
			if ($wiersz[2]==3) {echo 'item-book_gen_box';}

			echo ' "><div class="dymek">';
			//tu wstawic tresc opisu
			if ($wiersz[2]==0) {echo 'to jest trawa';}
			if ($wiersz[2]==1) {echo 'tu pada deszcz';}
			if ($wiersz[2]==2) {echo 'tu swieci atomwe slonce';}
			if ($wiersz[2]==3) {echo 'tu spadla koperta';}
			echo '</div></div></div></li>';
								}
			echo '</ul>'; //dodatkowe zamkniecie wiersza
			echo '<div class="clear"></div>';
fclose($fp);




/*
$fp = @fopen("plik.txt", "r");
while ($linia = fgets($fp, 512)) {
        $wiersz=explode(";",$linia);
        $swiat[$wiersz[0]][$wiersz[1]] = $wiersz[2];
		if ($wiersz[0]>=$rx) { $rx=$wiersz[0]; }
		if ($wiersz[1]>=$ry) { $ry=$wiersz[1]; }
								}

fclose($fp);

while ($y<=$ry)	{

	echo '<ul>';

	while ($x<=$rx)	{
		
		echo '<li><div class="kafel"><div class="wyp item-image ';
		include('losowanie2.php');
		echo ' "></div></div></li>';
		
		$x++;

					}

	echo '</ul>';
	echo '<div class="clear"></div>';
$x=0;
$y++;		
				}
//		<ul>
/*			<li><div class="kafel"><div class="wyp item-image <?php include ('losowanie2.php');?>"></div></div></li>
//			<li><div class="kafel"><div class="wyp item-image <?php include ('losowanie2.php');?>"></div></div></li>
//			<li><div class="kafel"><div class="wyp item-image <?php include ('losowanie2.php');?>"></div></div></li>
//			<li><div class="kafel"><div class="wyp item-image <?php include ('losowanie2.php');?>"></div></div></li>
//		</ul>
//		<div class="clear"></div>
//wywietl div
//wyswietl linie
//wyswietl komorke w linii
*/
?>
<form action="swiat.php" method="post">
Podaj rozmiar swiata (tylko liczby od 1 do 40): <input type="text" name="rozmiar" />
<input type="submit" value="Wstaw" />
</form>

<form method="post" action="zdarzenia.php">
    <button type="submit" name="zdarzenie" value="1">Deszcz</button>
</form>

<form method="post" action="zdarzenia.php">
    <button type="submit" name="zdarzenie" value="2">Atomowe slonce</button>
</form>

<form method="post" action="zdarzenia.php">
    <button type="submit" name="zdarzenie" value="3">Koperty</button>
</form>
</div>
</BODY>
</HTML>