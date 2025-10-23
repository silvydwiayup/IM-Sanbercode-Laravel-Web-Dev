<?php
require_once 'Animal.php';
require_once 'Frog.php';
require_once 'Ape.php';

$sheep = new Animal("shaun");

echo "name : " . $sheep->name; // "shaun"
echo "<br>";
echo "legs : " . $sheep->legs; // 4
echo "<br>";
echo "cold blooded : " . $sheep->cold_blooded; // "no"

echo "<br>";
echo "<br>";


$kodok = new Frog("buduk");

echo "name : " . $kodok->name; 
echo "<br>";
echo "legs : " . $kodok->legs; 
echo "<br>";
echo "cold blooded : " . $kodok->cold_blooded; 
echo "<br>";
echo $kodok->jump(); 


echo "<br>";
echo "<br>";

$sungokong = new Ape("kera sakti");

echo "name : " . $sungokong->name; 
echo "<br>";
echo "legs : " . $sungokong->legs;
echo "<br>";
echo "cold blooded : " . $sungokong->cold_blooded; 
echo "<br>";
echo $sungokong->yell(); 


?>