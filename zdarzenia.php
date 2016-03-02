<?php
//sluzy do podstawiania losowych wartosci do swiata

$x=0;
$y=0;
$rx=0;
$ry=0;

$zdarzenie=$_POST['zdarzenie'];

//wyciagniecie z pliku
$fp = @fopen("plik.txt", "r");

while ($linia = fgets($fp, 4096)) {
        $wiersz=explode(";",$linia);
        $swiat[$wiersz[0]][$wiersz[1]] = $wiersz[2];
       	if ($wiersz[0]>=$rx) { $rx=$wiersz[0]; } //ustalanie rozmiaru tablicy X
		if ($wiersz[1]>=$ry) { $ry=$wiersz[1]; } // ustalanie rom Y
    }
    
fclose($fp);


// zdarzenie deszcz
$fp = fopen("plik.txt", "r");
$x=rand(0,$rx);
$y=rand(0,$ry);
$swiat[$x][$y]=$zdarzenie;
$swiat[$x+1][$y]=$zdarzenie;
$swiat[$x][$y+1]=$zdarzenie;
$swiat[$x-1][$y]=$zdarzenie;
$swiat[$x][$y-1]=$zdarzenie;
fclose($fp);

// zrzucenie tablicy do pliku zapisanie do pliku

$fp = fopen("plik.txt", "w");
$x=0;
$y=0;
while ($y<=$ry) {
	while ($x<=$rx) {
		fputs($fp, $x . ';' . $y . ';' . $swiat[$x][$y] . ';' . "\r\n");
		$x++;
}
	$x=0;
	$y++;
}
fclose($fp);
/*
$x=0;
$y=0;
while ($y<=$ry) {
	while ($x<=$rx) {
		echo $swiat[$x][$y];
		$x++;
}
	$x=0;
	echo '<BR>';
	$y++;
}
*/

include('pokaz.php');

?>