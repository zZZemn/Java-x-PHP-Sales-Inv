<?php 
include ('database.php');

if(isset($_GET['order_id']))
{
    $order_id = $_GET['order_id'];
    $order_id_query = "SELECT * FROM order_details WHERE order_id = $order_id";
    $order_result = $conn->query($order_id_query);
    $order = $order_result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Status</title>
        <link rel="shortcut icon" href="" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
            crossorigin="anonymous">
    </head>
    <body>
            <div class="delivery-container container d-flex row w-50 p-5 mt-5">
                <p><?php echo $order['order_id']?></p>
                <p><?php echo $order['address']?></p>

                <div class="status pt-5">
                    <i class="fa-solid fa-warehouse"></i>
                    <hr>
                    <i class="fa-solid fa-truck"></i>
                    <hr>
                    <i class="fa-solid fa-house"></i>
                </div>

                <a class="btn btn-primary mt-5">Back</a>
            </div>
        
            
            <script src="https://kit.fontawesome.com/c6c8edc460.js" crossorigin="anonymous"></script>
            <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
        </form>
    </body>
</html>