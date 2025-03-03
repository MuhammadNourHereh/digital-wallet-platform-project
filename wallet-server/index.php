<?php

function rev($num) {

    $sign = $num < 0 ? -1: 1;
    $res = 0;
    while($num > 0) {
        $res += 10*($num%10);
        $num /= 10;
    }
    $res *= $sign;
    return $res;

} 