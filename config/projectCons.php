<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 此為專案常用變數，修改後記得執行php artisan config:cache
    |--------------------------------------------------------------------------
    |
    | 此設定會於程式全區出現，若該變數較少變動且不會因應環境不同而改變時，則須放置至此以利維運
    | Example: 簡訊點數不足時，需通知的人員名單Email Address
    |
    */

    // 健保補充保費(建議補充到未來幾年，當有變動時再來變更)
    'HISPR' => [
        '2010' => 2.00,
        '2011' => 2.00,
        '2012' => 2.00,
        '2013' => 2.00,
        '2014' => 2.00,
        '2015' => 2.00,
        '2016' => 1.91,
        '2017' => 1.91,
        '2018' => 1.91,
        '2019' => 1.91,
        '2020' => 1.91,
        '2021' => 2.11,
        '2022' => 2.11,
        '2023' => 2.11,
        '2024' => 2.11,
        '2025' => 2.11,
        '2026' => 2.11,
        '2027' => 2.11,
        '2028' => 2.11,
        '2029' => 2.11,
        '2030' => 2.11    
    ]
];
