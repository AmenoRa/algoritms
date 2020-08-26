<?php

$arr1 = [1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] ;
$arr2 = [1, 2, 4, 5, 6];
$arr3 = [];

function searchMissingElement ($arr) {

    $iStart = 0;
    $iEnd = count($arr) - 1;

    //пока у нас не осталось всего два элемента в массиве, между которыми пропущенное число
    while (($iEnd - $iStart) > 1) {

        //назначаем базовый элемент приблизительно в середине массива
        $iBase = ceil(($iStart + $iEnd) / 2);

        //если разница значений элементов не равна разнице значений ключей, то пропущенный элемент в этой половине $arr
        if (($arr[$iBase] - $arr[$iStart]) != ($iBase - $iStart)) {
            //сдвигаем конец поиска
            $iEnd = $iBase;
        } else { // иначе - он в другой половине массива, сдвигаем начало поиска
            $iStart = $iBase;
        }

    }

    //первый элемент из двух оставшихся от перебора будет на 1 меньше пропущенного числа
    return $arr[$iStart] + 1;


}

echo searchMissingElement($arr1).PHP_EOL;
echo searchMissingElement($arr2).PHP_EOL;
echo searchMissingElement($arr3).PHP_EOL;