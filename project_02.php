<?php

class Cart
{

    /**
     * Example of cart_items array structure
     * $cart_items = ['product_id' => ['quantity' => quantity, 'unit_price' => unit_price]]
     */

    public $cart_items = [];
    public $tax_percent = 10;
    private $price_list = [
        // 'product_id' => price,
        // these prices are in pennies
        '1001' => 1299,
        '1002' => 927,
        '1003' => 1000,
        '1004' => 419,
        '1005' => 675,
    ];  
}