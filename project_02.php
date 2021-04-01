<!--PHP Version 7.4.2-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shopping Cart</title>
    </head>
    <style>
        #cart content {
            //display:flex;
        }
        #cart content .product {
            margin:0 10px;
            display:flex;
        }
        #cart content .product div  {
            padding:5px 10px;
            margin:0 2px 0 0;
            background:#efefef;
        }
    </style>
    <body>
      <?php


      class Cart
      {

          /**
           * Example of cart_items array structure
           * $cart_items = ['product_id' => ['quantity' => quantity, 'unit_price' => unit_price]]
           */

          public $cart_items = [
            ['ID' => "1001", 'name' => "Product 1", 'quantity' => 2, 'unit_price' => 12.99],
            ['ID' => "1003", 'name' => "Product 3", 'quantity' => 4, 'unit_price' => 10.00],
            ['ID' => "1002", 'name' => "Product 2", 'quantity' => 7, 'unit_price' => 9.27]
          ];
          public $tax_percent = .1;
          private $product_list = [
              ['ID' => "1001", 'name' => "Product 1", 'quantity' => 1, 'unit_price' => 12.99],
              ['ID' => "1002", 'name' => "Product 2", 'quantity' => 1, 'unit_price' => 9.27],
              ['ID' => "1003", 'name' => "Product 3", 'quantity' => 1, 'unit_price' => 10.00],
              ['ID' => "1004", 'name' => "Product 4", 'quantity' => 1, 'unit_price' => 4.19],
              ['ID' => "1005", 'name' => "Product 5", 'quantity' => 1, 'unit_price' => 6.75],
          ];
          public function addToCart($value) {
            $inCart = array_search($value, array_column($this->cart_items, 'ID'));
            if ($inCart === false) {
                $itemID = array_search($value, array_column($this->product_list, 'ID'));
                array_push($this->cart_items, $this->product_list[$itemID]);
            } else {
                $this->cart_items[$inCart]['quantity'] = $this->cart_items[$inCart]['quantity'] + 1;
            }
            
            return $cart_items;
          }
          public function removeAllFromCart($value) {
            $inCart = array_search($value, array_column($this->cart_items, 'ID'));
            if ($inCart === false) {
                echo "Item not in cart";
            } else {
                unset($this->cart_items[$inCart]);
            }
            return $cart_items;
          }

          public function removeQuantityFromCart($value) {
            $inCart = array_search($value, array_column($this->cart_items, 'ID'));
            $itemQ = $this->cart_items[$inCart]['quantity'];
            if ($inCart === false) {
                echo "Item not in cart";
            } else if ($itemQ < 2) {
                unset($this->cart_items[$inCart]);
            } else {
                $this->cart_items[$inCart]['quantity'] = $this->cart_items[$inCart]['quantity'] - 1;
            }
                
            return $cart_items;
          } 

          public function clearCart() {
                unset($this->cart_items);
                echo "Cart is Cleared";
          }
          public function showCart() {
            $product_array = $this->cart_items;
            foreach($product_array as $key=>$value){
                echo "<div class='product'>";
                echo "<div class='name'>".$product_array[$key]['name']."</div>";
                echo "<div class='quantity'>".$product_array[$key]['quantity']."</div>";
                echo "<div class='price'>".$product_array[$key]['unit_price']."</div>";
                echo "</div><br>";
            
            }
          }
          public function showTotal() {

            $subTotal;
            $Total;
            $TaxPer = $this->tax_percent;
            $product_array = $this->cart_items;
            foreach($product_array as $key=>$value){
                $totalItemCost = $product_array[$key]['quantity'] * $product_array[$key]['unit_price'];
                $subTotal = $subTotal + $totalItemCost;
            }
            $Tax = $subTotal * $TaxPer;
            $Total = $subTotal + $Tax;
            echo "Subtotal: $" . $subTotal . "<br>";
            echo "Tax: " . $TaxPer * 100 . "%<br>";
            echo "<strong>Total: $" . round($Total, 2) . "</strong>";
          }
      }

      $currCart = new Cart;



      ?>
        <div id="cart">
            <header>Shopping Cart:</header>
            <content>
            <?php $currCart->showCart(); ?>
            </content>
            <footer>
                <?php $currCart->showTotal(); ?>
            </footer>
        </div>
    </body>
</html>










