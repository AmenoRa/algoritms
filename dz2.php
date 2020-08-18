<?php

//0. Ознакомиться с предложенными дополнительными материалами
//1. Определить сложность следующих алгоритмов:
//- Поиск элемента массива с известным индексом // Q(1)
//- Дублирование одномерного массива через foreach // Q(n)
//    - Рекурсивная функция нахождения факториала числа // Q(n!)
//- Удаление элемента массива с известным индексом // Q(1)

//2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?
//    1) Q(n), 140000
//
//$n = 10000;
//$array[]= [];
//
//for ($i = 0; $i < $n; $i++) {
//    for ($j = 1; $j < $n; $j *= 2) {
//        $array[$i][$j]= true;
//    } }

//2) Q(n^2), 25005000
//
//$n = 10000;
//$array[] = [];
//
//for ($i = 0; $i < $n; $i += 2) {
//    for ($j = $i; $j < $n; $j++) {
//        $array[$i][$j]= true;
//    } }


//3. Требуется написать метод, принимающий на вход размеры двумерного массива и выводящий массив в виде инкременированной цепочки чисел, идущих по спирали против часовой стрелки.

$row = (int) 4;
$col = (int) 5;

for ($i = 1; $i <= $row; $i++) {
    for ($j = 1; $j <= $col; $j++){
        $arr[$i][$j] = 0;
    }
}

$minX = 1;
$maxX = $col;
$minY = 1;
$maxY = $row;
$num = 1;

for ($i = $row, $j = $col; $i >= 0 , $j >= 0; $i = $i - 2, $j = $j - 2){
    for ($i = $minY; $i <= $maxY; $i++){
        if ($arr[$i][$minX] != 0) {
            break 2;
        }
        $arr[$i][$minX] = $num++;
    }
    $minX++;

    for ($i = $minX; $i <= $maxX; $i++) {
        if ($arr[$maxY][$i] != 0) {
            break 2;
        }
        $arr[$maxY][$i] = $num++;
    }
    $maxY--;

    for ($i = $maxY; $i >= $minY; $i--){
        if ($arr[$i][$maxX] != 0) {
            break 2;
        }
        $arr[$i][$maxX] = $num++;
    }
    $maxX--;

    for ($i = $maxX; $i >= $minX; $i--) {
        if ($arr[$minY][$i] != 0) {
            break 2;
        }
        $arr[$minY][$i] = $num++;
    }
    $minY++;

}


    $html = "<table>";
    foreach ($arr as $item => $value) {
        $html .= "<tr>";
        foreach ($value as $key => $current) {
            $html .= "<td>" . $current . "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";

    echo $html;


$n = 10000;
$array[]= [];
$collect = 1;

for ($i = 0; $i < $n; $i += 2) {
    for ($j = $i; $j < $n; $j++) {
        $collect++;
    } }

echo $collect;