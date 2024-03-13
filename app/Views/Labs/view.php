<?php

helper('number');

// number_to_size($num[, $precision = 1[, $locale = null]])
echo number_to_size(456);
echo "<br>";

// number_to_amount($num[, $precision = 1[, $locale = null])
echo number_to_amount(123456);
echo "<br>";

// number_to_currency($num, $currency[, $locale = null[, $fraction = 0]])
echo number_to_currency(1234.56, 'USD', 'en_US', 2);
echo "<br>";

// number_to_roman($num)
echo number_to_roman(23);
echo "<br>";