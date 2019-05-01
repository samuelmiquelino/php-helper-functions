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

// àáãâ => aaaa
function removeAccents($string) {
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
}

// àáãâ => aaaa
function removeAccentsRegex($string) {
    return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $string));
}

//2019-05-01 => 01/05/2019
function dateDatabaseToDateBr($dateDatabase) {
    return implode('/', array_reverse(explode('-', $dateDatabase)));
}

//01/05/2019 => 2019-05-01
function dateBrToDateDatabase($dateBr) {
    return implode('-', array_reverse(explode('/', $dateBr)));
}

