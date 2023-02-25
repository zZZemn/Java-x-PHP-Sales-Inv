<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
            <a class="nav-link active" aria-current="page" href="sales.php">Sales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  href="labour.php">Labour</a>
        </li>
    </ul>

    <table class="table mt-5 w-75 table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Order Date</th>
                <th>Product Name</th>
                <th>Selling Price</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order_file = file('C:\xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\order.txt');
            $order_array = [];

            foreach ($order_file as $line) {
                $values = explode(',', $line);
                $order_array[] = $values;
            }
            
            echo "<br><br>";

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

                echo "<tr>";
                echo "<th scope='row'>".$orderline_array[$row][0]."</th>";
                echo "<td>".$order_array[$row][2]."</td>";
                echo "<td>".$orderline_array[$row][1]."</td>";
                echo "<td>".$sellingPrice."</td>";
                echo "<td>".$orderline_array[$row][2]."</td>";
                echo "<td>".$amount."</td>";
                
                echo "</tr>";
                $total+=$amount;
            }
            ?>
            <tr>
                <td colspan="6" class="bg-primary"></td>
            </tr>
            <tr>
                <th scope="row" colspan="5">Total sales: </th>
                <th scope="row"><?php echo $total;?></th>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>