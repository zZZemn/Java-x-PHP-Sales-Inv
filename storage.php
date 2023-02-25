<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering System</title>
</head>
<body>
  <div class="container">
    <div class="top-container">
      <div class="left">
        <table border="1">
        <?php
        $myfile = fopen("C:xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\item.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
          $data = explode(",",fgets($myfile));
          echo "<tr>";
          foreach ($data as $datas)
          {
            echo "<td>".$datas."</td>";
          }
          echo "</tr>";
        } 
        fclose($myfile);
        ?>
        </table>  
      </div>

      <div class="right">
        <?php
        $myfile = fopen("C:xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\item.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
          echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
        ?>  
      </div>
    </div>

    <div class="bottom-container">
      <div class="left">
        <?php
        $myfile = fopen("C:xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\item.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
          echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
        ?>  
      </div>
      
      <div class="right">
        <?php
        $myfile = fopen("C:xampp\htdocs\IPT-Act2\Simple Ordering System in Java\storage\item.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
          echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
        ?>  
      </div>
    </div>
  </div>
</body>
</html>

