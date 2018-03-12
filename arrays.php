<?php
/*
Avete in ingresso alla funzione un array bi-dimensionale (un array di array - detta anche matrice).
Rappresenta un campo di "prato fiorito", il vecchio gioco di Windows.
Gli asterischi rappresentano le mine, gli spazi le caselle vuote.

Occorre restituire in uscita un array uguale ma con i numeri compilati al posto delle caselle vuote.
Per chi non conoscesse il gioco, i numeri rappresentano semplicemente la quantità di mine contenute nelle caselle immediatamente adiacenti (in orizzontale, in verticale, e in diagonale).

Quindi ad esempio un array in ingresso del genere:

	[
		[' ', ' ', ' ', ' '],
		[' ', '*', ' ', ' '],
		[' ', '*', '*', ' '],
		[' ', ' ', ' ', '*'],
	]

Restituirà in uscita un array così fatto:

	[
		['1', '1', '1', '0'],
		['2', '*', '3', '1'],
		['2', '*', '*', '2'],
		['1', '2', '2', '*'],
	]
*/



/*
	(-1, -1)	(0, -1)		(+1, -1)
	(-1,  0)	(0,  0)		(+1,  0)
	(-1, +1)	(0, +1)		(+1, +1)
*/

function pratoFiorito($arr){
	/*
		l'ho fatto in maniera un po' particolare per non fare una delle solite soluzioni
		in cui si scrivono tutte le combinazioni di indici a mano con tanti IF per fare i controlli degli indici out of bound
	*/

	$directions = [
		[-1, -1],
		[ 0, -1],
		[+1, -1],
		[-1,  0],
		[+1,  0],
		[-1, +1],
		[ 0, +1],
		[+1, +1],
	];
	for($i = 0; $i < count($arr); $i++)
		for($j = 0; $j < count($arr[$i]); $j++)
			if($arr[$i][$j] == '*')
				foreach($directions as $d){
					$z1 = $i + $d[0];
					$z2 = $j + $d[1];
					if($z1 >= 0 && $z2 >= 0 && $z1 < count($arr) && $z2 < count($arr[$i]))
						if($arr[$z1][$z2] == ' ')
							$arr[$z1][$z2] = 1;
						else
							$arr[$z1][$z2]++;
				}
			else
				if($arr[$i][$j] == ' ')
					$arr[$i][$j] = 0;
	return $arr;
}

/**
ESEMPI DI TEST:
**/

echo '<pre>';

var_dump(pratoFiorito(
	[
		[' ', ' ', ' ', '*'],
		[' ', '*', ' ', ' '],
		[' ', ' ', ' ', ' '],
		[' ', ' ', ' ', '*'],
	]
));

echo '<br><br>########################################<br>########################################<br>########################################<br><br><br>';

var_dump(pratoFiorito(
	[
		['*', ' ', ' ', '*'],
		['*', '*', ' ', ' '],
		['*', ' ', ' ', '*'],
		[' ', ' ', ' ', '*'],
	]
));

echo '<br><br>########################################<br>########################################<br>########################################<br><br><br>';

var_dump(pratoFiorito(
	[
		['*', ' ', ' ', '*'],
		[' ', ' ', ' ', ' '],
		[' ', ' ', '*', ' '],
		[' ', ' ', ' ', '*'],
	]
));

echo '</pre>';