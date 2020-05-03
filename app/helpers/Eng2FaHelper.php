<?php

//in this function, if you want to return eng format of the string, u should send FALSE as the second parameter of the method

if (!function_exists('convertNumbers')) {
    
        function convertNumbers($srting,$toPersian=true)
{
    $en_num = array('0','1','2','3','4','5','6','7','8','9');
    $fa_num = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
    if( $toPersian ) return str_replace($en_num, $fa_num, $srting);
        else return str_replace($fa_num, $en_num, $srting);
}
}

?>
