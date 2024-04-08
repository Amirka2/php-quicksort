<?php

$randArr = createArray(2000000);

print_r($randArr);

quickSort($randArr, 0, sizeof($randArr) - 1);

print_r($randArr);

function quickSort(array &$arr, int $low, int $high) {
    if ($low < $high) {
        $i = $low;
        $j = $high;
        $middle = $low + ($high - $low) / 2;
        $pivot = $arr[(int)$middle];

        while ($i <= $j) {
            while ($arr[$i] < $pivot) {
                $i++;
            }

            while ($arr[$j] > $pivot) {
                $j--;
            }

            if ($i <= $j) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $i++;
                $j--;
            }
        }

        if ($low < $j) {
            quickSort($arr, $low, $j);
        }

        if ($high > $i) {
            quickSort($arr, $i, $high);
        }
    }
}

function createArray(int $size) {
    $randomNumbers = array();

    for ($i = 0; $i < $size; $i++) {
        $randomNumbers[] = mt_rand(1, $size);
    }

    return $randomNumbers;
}