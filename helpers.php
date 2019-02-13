<?php


// ab9c8;#7 ==> 987
function extractNumber($string){
    return preg_replace("/\D+/", "", $string);
}


// 12,00 ==> 12.00
function stringToFloatMysql($string){
    $string = removeSpecialChars($string);
    $string = ltrim($string, '0');
    if(strlen($string)<3){
        $string = str_pad($string, 3, '0', STR_PAD_LEFT);
    }
    return substr_replace($string, '.', -2,0);
}


// 100.50*2 - 35% ==> 130.65
function discountFinalValueInPercentage($amount,$quantity,$discount){
    return ($amount * $quantity) - (($amount * $quantity) * ($discount/100));
}
