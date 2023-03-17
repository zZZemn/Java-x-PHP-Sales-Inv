<?php 
    $order_file = file('C:\xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\order.txt');
    $order_array = [];

    foreach ($order_file as $line) {
        $values = explode(',', $line);
        $order_array[] = $values;
    };

    $orderline_file = file('C:xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\orderLine.txt');
    $orderline_array = [];

    foreach ($orderline_file as $line) 
    {
        $values = explode(',', $line);
        $orderline_array[] = $values;
    }


    $total = 0;
    for($row = 0; $row < count($orderline_array); $row++)
    {
        $sellingPrice = $orderline_array[$row][3] / $orderline_array[$row][2];
        $amount = $sellingPrice * $orderline_array[$row][2];
        $total+=$amount;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul class="nav nav-tabs mt-5 w-75 nav-tabs">
        <li class="nav-item">
            <a class="nav-link active nav-bold" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="item.php">Item</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sales.php">Sales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="orders.php">Orders</a>
        </li>
    </ul>

    <div class="container mt-5 home-container w-50">
        <div class="border-top border-4 border-primary rounded m-5 h-75 w-50 dashboard-content-container">
            <a href="item.php" class="p-5 text-decoration-none">Items</a>
        </div>
        <div class="border-top border-4 border-primary rounded m-5 h-75 w-50 dashboard-content-container">
            <a href="sales.php" class="p-5 text-decoration-none">Sales - PHP <?php echo $total;?></a> 
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>