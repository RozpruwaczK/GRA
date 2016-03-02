<?php
// sluzy do losowania przedmiotu podstawionego do tablicy
$plik = @fopen("item-image.css", "r");
$a=0;
if ($plik) {
    while (($linia = fgets($plik, 4096)) !== false) {
        $przedmiot=explode("{",$linia);
        $przedmiot = str_replace('.', '', $przedmiot);
        $tablica[$a]=$przedmiot[0];
        //echo $tablica[$a] . "<br>";
        $a++;
    }
    if (!feof($plik)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($plik);
 echo $tablica[rand(0,239)];


/* tu są testy wywietlania losowań
$a=0;
while ($a<10){

$b=rand(0,239);
echo "losowanie numer - " . $a . " wylosowana komórka - " . $b . " wartosc komórki - " . $tablica[$b] . "<br>";
// echo $tablica[rand(0,4)];
$a++;
}
// echo $tablica[2];
//print_r($tablica);
/*/
}
?>