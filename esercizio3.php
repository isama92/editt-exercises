<?php
/*
Usiamo un po' di oggetti!

Abbiamo dei personaggi, e abbiamo delle casate.
Ogni casata ha un cognome che la identifica, e ha più personaggi a rappresentarla, tutti con lo stesso cognome.
Il vostro scopo è definire le classi e le loro proprietà e metodi in modo tale che il codice di esempio
funzioni senza errori e dia il risultato previsto.
*/

class Personaggio{
	private $nome;

	function __construct($nome){
		$this->nome = $nome;
	}

	public function getName(){
		return $this->nome;
	}
}

class Casata{
	private $cognome;
	private $esponenti;

	function __construct(){
		$this->esponenti = [];
	}

	public function settaCognome($cognome){
		$this->cognome = $cognome;
	}

	public function aggiungi($personaggio){
		$this->esponenti[] = $personaggio;
	}

	public function faiArrayPersonaggi(){
		$arr = [];
		foreach($this->esponenti as $esponente)
			$arr[] = $esponente->getName() . ' ' . $this->cognome;
		return $arr;
	}
}

/**
ESEMPI DI TEST:
**/

$lannister = new Casata();
$lannister->settaCognome('Lannister');

$lannister->aggiungi(new Personaggio('Cersei'));
$lannister->aggiungi(new Personaggio('Jamie'));
$lannister->aggiungi(new Personaggio('Tywin'));

$personaggi_lannister = $lannister->faiArrayPersonaggi();

echo '<pre>';
var_dump($personaggi_lannister);
echo '</pre>';

/*
Risultato previsto (notare che il cognome viene aggiunto in automatico):

[
	'Cersei Lannister',
	'Jamie Lannister',
	'Tywin Lannister',
]
*/

$targaryen = new Casata();
$targaryen->settaCognome('Targaryen');

$targaryen->aggiungi(new Personaggio('Daenerys'));
$targaryen->aggiungi(new Personaggio('Aerys II'));

$personaggi_targaryen = $targaryen->faiArrayPersonaggi();

echo '<pre>';
var_dump($personaggi_targaryen);
echo '</pre>';
