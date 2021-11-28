<html>
<head>
    <title>Shopping Cart</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>

</head>
<body>
<h1>Hello World</h1>
<div class="cart">
    <div id="heading">Cart Items</div>

    <a id="EmptyCartBtn" href="index.php?action=empty">Empty Cart</a>

    <table class="cartTable">
        <tbody>
        <tr>
            <th style="text-align:Left ">Name</th>
            <th style="text-align: ">Quantity</th>
            <th style="text-align:right">Price</th>
            <th style="text-align:right ">Remove</th>
        </tr>


        <tr>
            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
            <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
            <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
            <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img style="height: 50px" src="images/bin.png" alt="Remove Item" /></a></td>
        </tr>
        <tr>
            <td style=""><b>Total Price:</b></td>
            <td style="align=right"> <?php echo $total_quantity; ?></td>
            <td style="align=right" colspan="2"><b><?php echo"$ ".number_format($total_price,2); ?> </b></td>

        </tr>

        </tbody>

        <div class="no_item_found"> Cart is Empty</div>

    </table>

</div>
<div class="list_Of_Products">
    <div id="heading">Available Products</div>

    <div class="product-item">
        <form method="post">
            <div class="prodImage"><img src="<?php echo $product_array[$key]["image"]?>"/></div>
            <div class="prodTitleFooter">
                <div class="prodName"><?php echo $product_array[$key]["name"]?></div>
                <div class="prodPrice"><?php echo "$".$product_array[$key]["price"]?></div>
                <div class="cartFunc">
                    <input type="text" class="productQuantity" name="quantity" value="1" size="2"/>
                    <input  type="submit" value="Add to Cart" class="btnAdd"/>
                </div>
            </div>
        </form>
    </div>

    <!-- PHP ending will go here-->
</div>
</body>
</html>