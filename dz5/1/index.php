<?php

use Classes\Test;

$a = Test::single();
echo $a->value; // выведет 0

$a->value = 5;
echo $a->value; // выведет 5

$b = Test::single();
echo $b->value; // выведет 5