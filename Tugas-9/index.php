<?php

require_once "Animal.php";
require_once "Ape.php";
require_once "Frog.php";

$sheep = new Animal("shaun");

echo "Nama: " . $sheep->name . "<br>";
echo "Legs: " . $sheep->legs . "<br>";
echo "Cold Blooded: " . $sheep->cold_blooded . "<br><br>";

$kodok = new Frog("buduk");

echo "Nama: " . $kodok->name . "<br>";
echo "Legs: " . $kodok->legs . "<br>";
echo "Cold Blooded: " . $kodok->cold_blooded . "<br>";
echo "Jump: ";
$kodok->jump();

echo "<br><br>";
$sungokong = new Ape("kera sakti");

echo "Nama: " . $sungokong->name . "<br>";
echo "Legs: " . $sungokong->legs . "<br>";
echo "Cold Blooded: " . $sungokong->cold_blooded . "<br>";
echo "Yell: ";
$sungokong->yell();
