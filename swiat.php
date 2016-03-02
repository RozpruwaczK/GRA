<?php
// sluzy do generowania tablicy swiata
$x=0;
$y=0;
$roz=$_POST['rozmiar']+0;

//echo $roz;
//echo gettype($_POST['rozmiar']);

if ($roz>=1 && $roz<=40) { }
	else {echo "podaj liczbę od 1 do 40";
	$roz=0;}
	


$rx=$roz;
$ry=$roz;


// generowanie losowej tablicy
while ($y<$ry) {
	while ($x<$rx) {
	//	if (bcmod($x, 2)>0 && $x<$rx) {
	//		$swiat[$x][$y] = 1;
	//		$x++;
	//	}
		$swiat[$x][$y] = 0;
		$x++;

}

	$x=0;
	$y++;
}
// zrzucenie tablicy do pliku zapisanie do pliku
//echo '<BR><BR><BR><BR> wyswietla foreach<BR>';

$fp = fopen("plik.txt", "w");
$x=0;
$y=0;
while ($y<$ry) {
	while ($x<$rx) {
		fputs($fp, $x . ';' . $y . ';' . $swiat[$x][$y] . ';' . "\r\n");
		//echo $swiat[$x][$y];	
		$x++;

}
	$x=0;
	$y++;
}
fclose($fp);

//wyciagniecie z pliku
/*
$fp = @fopen("plik.txt", "r");

while ($linia = fgets($fp, 4096)) {
        $wiersz=explode(";",$linia);
        echo $wiersz[2]+0;
        $nowyswiat[$wiersz[0]][$wiersz[1]] = $wiersz[2];
    }
    
fclose($fp);









//wyciagniecie z tabeli zeby porownac
echo '<BR><BR><BR><BR> wyswietla z petli while<BR>';
$x=0;
$y=0;
while ($y<$ry) {
	while ($x<$rx) {
		echo $nowyswiat[$x][$y];
		$x++;
}
	$x=0;
	echo '<BR>';
	$y++;
}
$x=0;
$y=0;
while ($y<$ry) {
	while ($x<$rx) {
		echo $swiat[$x][$y];
		$x++;
}
	$x=0;
	echo '<BR>';
	$y++;
}
// sprawdzanie wartosci tablicy
echo '<BR><BR><BR><BR> wyswietla foreach<BR>';

foreach ($swiat as $wyswietl) {
	echo $wyswietl[1]; //wywietla cala druga (y) linie
}
echo '<BR><BR><BR><BR> print_r ponizej <BR>';
print_r($nowyswiat);
*/

//wyswietlanie wygenerowanego swiata
include('pokaz.php');
?>