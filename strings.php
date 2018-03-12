<?php
/*
Scrivere il codice della funzione in modo che ritorni un'array rappresentante il conteggio delle parole contenute
all'interno della stringa passata (case insensitive).
Ad esempio per la frase in input "Ciao il signor Casa è a casa.", dovrebbe ritornare un'array così composto:
 [
   'ciao' => 1,
   'il' => 1,
   'signor' => 1,
   'casa' => 2,
   'è' => 1,
   'a' => 1,
 ]
*/


function contaParole($stringa){
  // dichiaro un array vuoto
  $parole = [];

  // divido l'array sugli spazio
  $words = explode(' ', $stringa);

  // per ogni parola
  foreach($words as $word){
    // rimuovo i simboli
    $word = preg_replace('/[^\p{L}\p{N}\s]/u', '', $word);
    // rendo tutto minuscolo
    $word = strtolower($word);

    // se la parola è presente nell'array incremento il counter, altrimenti la aggiungo con counter uguale a 1
    if(!empty($parole[$word]))
      $parole[$word]++;
    else
      $parole[$word] = 1;
  }

  // ritorno l'array
	return $parole;
}



/**
ESEMPI DI TEST:
**/

echo '<pre>';
var_dump(contaParole('Maga Magò fece una magia. Che magia che fece maga Magò.'));
var_dump(contaParole('Tre numeri. Il tre è ripetuto tre volte. Il due, due volte. E il numero uno poverino, una sola volta.'));
echo '</pre>';