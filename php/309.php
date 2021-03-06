<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        if (empty($prices)) {
            return 0;
        }
        $dp = [];
        $dp[-1][0] = 0;
        $dp[-1][1] = -PHP_INT_MAX;
        $dp[0][0] = 0;
        $dp[0][1] = -$prices[0];

        for ($i = 1; $i < count($prices); $i++) {
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 2][0] - $prices[$i]);
        }

        return $dp[count($prices) - 1][0];
    }
}

$solution = new Solution();
var_dump($solution->maxProfit([1, 2, 3, 0, 2]));