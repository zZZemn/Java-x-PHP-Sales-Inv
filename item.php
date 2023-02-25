<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <ul class="nav nav-tabs mt-5 w-75 nav-tabs">
        <li class="nav-item">
            <a class="nav-link nav-bold" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="item.php">Item</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sales.php">Sales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="labour.php">Labour</a>
        </li>
    </ul>

    <table class="table mt-5 w-75 table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $num = 1;
            $handle = fopen("C:xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\item.txt", "r"); // open file for reading
            while(!feof($handle))
            {
                $data = explode(",",fgets($handle));
                echo "<tr><th scope='row'>".$num."</th>";
                $num++;
                foreach ($data as $datas)
                    {
                        echo "<td>".$datas."</td>";
                    }
                echo "</tr>";
            }   
            fclose($handle);
            echo "<tr>
                    <td colspan='4' class='text-center table-bottom-label' font>Inventory</td>
                  </tr>";
        ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>