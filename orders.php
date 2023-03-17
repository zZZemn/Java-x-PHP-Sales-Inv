<?php 

include ('database.php');

if(isset($_POST['submit']))
{
    $customer_name = $_POST['customer'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact'];
    $payment = $_POST['payment'];

    $order_id = sprintf("%05d", rand(0, 99999));
    $order_id_query = "SELECT COUNT(*) AS count FROM order_details WHERE order_id = $order_id";
    $order_id_result = $conn->query($order_id_query);
    $order = $order_id_result->fetch_assoc();

    while($order['count'] > 0)
    {
        $order_id = sprintf("%05d", rand(0, 99999));

        $order_id_query = "SELECT COUNT(*) AS count FROM order_datails WHERE order_id = $order_id";
        $order_id_result = $conn->query($order_id_query);
        $order = $order_id_result->fetch_assoc();
    }

    $insert_order_query = "INSERT INTO `order_details`(`order_id`, `customer_name`, `address`, `contact_no`, `payment`) 
                           VALUES ('$order_id','$customer_name','$address','$contact_no','$payment')";
    
    if($conn->query($insert_order_query) == true)
    {
        echo "<script>alert('Order Added');</script>";
    }
    else
    {
        echo "<script>alert('Order Failed');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orders</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <ul class="nav nav-tabs mt-5 w-75 nav-tabs">
            <li class="nav-item">
                <a class="nav-link nav-bold" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="item.php">Item</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sales.php">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="orders.php">Orders</a>
            </li>
        </ul>

        <div class="container">
            <form class="mt-4 bg-primary p-3" method="post">
                <div class="d-flex justify-content-around">
                    <div class="">
                        <input type="text" class="form-control" placeholder="Customer" name="customer">
                    </div>

                    <div class="">
                        <input type="text" class="form-control" placeholder="Address" name="address">
                    </div>
                    <div class="">
                        <input type="text" class="form-control" placeholder="Contact no" name="contact">
                    </div>

                    <div class="">
                        <select class="form-control" name="payment">
                            <option>COD</option>
                            <option>Gcash</option>
                            <option>Maya</option>
                        </select>
                    </div>
                    <div class="">
                        <input type="submit" class="form-control" name="submit">
                    </div>
                </div>
            </form>

        </div>

        <div class="container">
            <table class="table mt-3">
                <tr>
                    <th>ID</th>
                    <th>Customer name</th>
                    <th>Address</th>
                    <th>Contact no</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
                <?php 
            $orders_query = "SELECT * FROM order_details";
            $orders_query_result = $conn->query($orders_query);
            if($orders_query_result->num_rows > 0)
            {
                while($row = $orders_query_result->fetch_assoc())
                {

            ?>
                <tr>
                    <td><?php echo $row['order_id']?></td>
                    <td><?php echo $row['customer_name']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['contact_no']?></td>
                    <td><?php echo $row['payment']?></td>
                    <td class="action">
                        <a href="order-item.php?id=<?php echo $row['order_id'] ?>" class="add">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                        <a href="#" class="edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="delete">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }
            }
            ?>
            </table>
        </div>

        <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>

        <script>
            if (window.history.replaceState) {
                window
                    .history
                    .replaceState(null, null, window.location.href);
            }
        </script>
    </body>
</html>