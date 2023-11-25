<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>List of Sales and Payments</h1>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Price</th>
                <th>title</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "kapetann";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error){
                die("Connection failed: ". $connection->connect_error);
            }

            $sql = "SELECT * FROM orders ";
            $result = $connection->query($sql);

            if (!$result){
                die("Invalid query: ". $connection->error);
            }

            while ($row = $result->fetch_assoc()){
                echo " <tr>
                <td>". $row["id"] ."</td>
                <td>". $row["price"] ."</td>
                <td>". $row["title"] ."</td>
                <td>". $row["quantity"] ."</td>
                <td>". $row["subtotal_amount"] ."</td>
                <td>". $row["date"] ."</td>
            </tr>";
            }
            
            ?>
        </tbody>
    </table>
</body>
</html>