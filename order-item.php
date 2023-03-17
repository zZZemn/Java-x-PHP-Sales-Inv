<?php 
include ('database.php');

if(isset($_GET['id']))
{
    $order_id = $_GET['id'];
    $order_id_query = "SELECT * FROM order_details WHERE order_id = $order_id";
    $order_result = $conn->query($order_id_query);
    $order = $order_result->fetch_assoc();
}


if(isset($_POST['add']))
{
    $productID = $_POST['product'];
    $qty = $_POST['qty'];
    
    $item_query = "SELECT * FROM inventory WHERE item_id = $productID";
    $item_query_result = $conn->query($item_query);
    $item = $item_query_result->fetch_assoc();

    $item_name = $item['item_name'];
    $item_selling_price = $item['price'];

    $total = $item_selling_price * $qty;

    $order_query = "INSERT INTO `items`(`order_id`, `item_id`, `item_name`, `price`, `qty`) 
    VALUES ('$order_id','$productID','$item_name','$total','$qty')";
    
    $conn->query($order_query);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order
            <?php echo $order['order_id']; ?></title>
        <link rel="shortcut icon" href="" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
    </head>
    <body>
        <div class="container-orders">
            <div class="top-details mt-5">
                <h3><?php echo $order['order_id'];?></h3>
                <h3><?php echo $order['customer_name'];?></h3>
                <h3><a href="deliver.php?order_id=<?php echo $order['order_id'] ?>"><i class="fa-solid fa-truck"></i></a></h3>
            </div>

            <table class="table table-striped order-list mt-5 text-center">
                <tr>
                    <td>Item</td>
                    <td>Quantity</td>
                    <td>Amount</td>
                </tr>

                <?php 
                $orders_sql = "SELECT * FROM items";
                $orders_sql_res = $conn->query($orders_sql);
                
                if($orders_sql_res->num_rows > 0)
                {
                    while($order_row = $orders_sql_res->fetch_assoc())
                    {
                        ?>
                            <tr>
                                <td><?php echo $order_row['item_name'] ?></td>
                                <td><?php echo $order_row['qty'] ?></td>
                                <td><?php echo $order_row['price'] ?></td>
                            </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>

        <form class="form-orders" method="post">
            <input class="pro-name" type="text" name="product" placeholder="Product name" list="products">
            <datalist id="products">
                <?php 
                
                $product = "SELECT * FROM inventory";
                $product_result = $conn->query($product);

                if($product_result->num_rows > 0)
                {
                    while($product_row = $product_result->fetch_assoc())
                    {
                        ?>

                        <option value="<?php echo $product_row['item_id']?>"><?php echo $product_row['item_name'] ?></option>

                        <?php
                    }
                }
                
                ?>
            </datalist>
            
            <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
            <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
            <input class="pro-quantity" type="number" name="qty" placeholder="Qty">
            <input type="submit" class="btn btn-primary" name="add" value="Add">
        </form>
    </body>
</html>