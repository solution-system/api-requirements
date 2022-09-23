<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body>
    Products:
    <ul>

        @foreach($products["products"] as $product)        
        <?php 
        $category = ''; 
        if (request()->has('category')) {
            $category = request()->input('category');
            print "seg: $category";
         }
        ?>
        @if (chk_url($product['category'], $category))
            <li>
                SKU: {{$product['sku']}}
            </li>
            <li>
                Name: {{$product['name']}}
            </li>
            <li>
                Category: {{$product['category']}}
            </li>
            <li>
                <?php
                $price_temp = explode('|', show_price($product['category'], $product['price'], $product['sku']));
                $discount = $price_temp[0];
                $new_price_plain = $price_temp[1];
                $new_price = $price_temp[2];
                $is_discount = $price_temp[3];
                if ($is_discount) { ?>
                    Price: {{$new_price}}
                <?php
                } else {
                    // $discount = ($product['price'] - $new_price_plain); 
                ?>
                    <ul>
                        <li>Original: {{ price_format($product['price'])}} </li>
                        <li>Discount: {{ price_format($discount) }} </li>
                        <li>Discount %pct: {{ get_pct($product['price'], $new_price_plain)}}% </li>
                        <li>Final Price: {{ price_format($new_price) }} </li>
                    </ul>
                <?php
                } ?>
            </li>
            <hr>
        @endif
        @endforeach
    </ul>
</body>

</html>