<?php

require 'Complex.php';

$complex1 = "5+2i";
$complex2 = "2-5i";

$complex = new Complex();

echo "z1 = ".$complex1."<br>";
echo "z2 = ".$complex2."<br>";
echo "<br>(z1 + z2) = ".$complex->sum($complex1,$complex2);
echo "<br>(z1 - z2) = ".$complex->sub($complex1,$complex2);
echo "<br>(z1 * z2) = ".$complex->add($complex1,$complex2);
echo "<br>(z1 / z2) = ".$complex->div($complex1,$complex2);
