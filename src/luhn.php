<?php

namespace Krak\Luhn;

use function iter\map,
    iter\reduce;

function _enumerate($iterable) {
    foreach ($iterable as $key => $val) {
        yield [$key, $val];
    }
}

/** validate a number with the luhn mod10 algorithm */
function luhn_validate($num) {
    $len = strlen($num);
    $last_digit = (int) $num[$len - 1];
    $cksm = luhn_checksum(substr($num, 0, -1));

    return ($last_digit + $cksm) % 10 == 0;
}

/** generate the checksum from a string */
function luhn_checksum($num) {
    $nums = str_split($num);
    $rnums = array_reverse($nums);

    $rnums = map(function($tup) {
        list($i, $num) = $tup;
        $num = (int) $num;

        if ($i % 2 != 0) {
            return $num;
        }

        $num = $num * 2;
        if ($num <= 9) {
            return $num;
        }

        return $num - 9;
    }, _enumerate($rnums));

    return reduce(function($acc, $n) {
        return $acc + $n;
    }, $rnums, 0);
}
