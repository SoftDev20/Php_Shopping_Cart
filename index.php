<?php
session_start();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
//                $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>


<html>
<head>
    <title>Shopping Cart</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>

</head>
<body>
<div class="cart">
    <div id="heading">Cart Items</div>

    <a id="EmptyCartBtn" href="index.php?action=empty">Empty Cart</a>
    <?php
    if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    ?>
    <table class="cartTable">
        <tbody>
        <tr>
            <th style="text-align:Left;">Name</th>
            <th style="text-align:right;width:5% ">Quantity</th>
            <th style="text-align:right; width: 10%">Price</th>
            <th style="text-align:right;width: 5% ">Remove</th>
        </tr>
        <?php
        foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
        ?>


        <tr>
            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
            <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
            <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
            <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img style="height: 50px" src="images/bin.png" alt="Remove Item" /></a></td>
        </tr>
            <?php
            $total_quantity += $item["quantity"];
            $total_price += ($item["price"]*$item["quantity"]);
        }
        ?>
        <tr>
            <td style=""><b>Total Price:</b></td>
            <td style="align=right"> <?php echo $total_quantity; ?></td>
            <td style="align=right" colspan="2"><b><?php echo"$ ".number_format($total_price,2); ?> </b></td>

        </tr>

        </tbody>



    </table>
        <?php
    } else {
    ?>
    <div class="no_item_found"> Cart is Empty</div>
        <?php
    }
    ?>
</div>
<div class="list_Of_Products">
    <div id="heading">Available Products</div>

    <div class="product-item">
        <form method="post">
            <div class="prodImage"><img src="<?php echo $product_array["image"]?>"/></div>
            <div class="prodTitleFooter">
                <div class="prodName"><?php echo $product_array["name"]?></div>
                <div class="prodPrice"><?php echo "$".$product_array["price"]?></div>
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