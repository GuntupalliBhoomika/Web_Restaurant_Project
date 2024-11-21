<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("—Pngtree—green minimalist fresh tea banner_1006617.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .order-container {
            text-align: center;
            padding: 20px;
            background-color: #ffecb3;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            background-image: url("https://img.freepik.com/free-vector/world-chocolate-day-hand-drawn-flat-background_23-2149453945.jpg?w=1060&t=st=1699895586~exp=1699896186~hmac=613411886fdf1796797345c6113a068b076f22b3e8b770b608db184de0bc5f86");
            background-size: cover;
            max-width: 400px;
            width: 100%;
            overflow: hidden;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .order-container:hover {
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            transform: scale(1.05);
        }

        table {
            margin-bottom: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 2px solid #ffc107; /* Yellow border */
            padding: 12px; /* Increased padding */
            text-align: center;
            background-color: #ffeeba; 
            color:black/* Light yellow background */
            font-style:bold;
        }

        th {
            background-color:#ffecbb; /* Yellow background for header */
            color: black; /* White text for header */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .step-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .submit-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 0 auto; /* Center the button horizontally */
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .sparkle {
            animation: sparkle 1s infinite;
        }

        @keyframes sparkle {
            0% {
                color: #ffecb3;
            }
            50% {
                color: #ffc107;
            }
            100% {
                color: #ffecb3;
            }
        }
    </style>
</head>
<body>

<?php
session_start();
include('db.php');

// Check if the first step is submitted
if(isset($_POST['submit_step1'])) {
    // Process the user details and display the second step
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    
    echo "<div class='order-container step-container'>";
    echo "<h2>Select-Menu</h2>";
    echo "<form method='post' action='place.php'>";
    
    // Display user details
    echo "<input type='hidden' name='customer_name' value='$customer_name'>";
    echo "<input type='hidden' name='customer_phone' value='$customer_phone'>";
    echo "<input type='hidden' name='customer_address' value='$customer_address'>";
    
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th></tr>";

    // Query to fetch food items
    $sql = "SELECT id, name, price FROM food_items";
    $result = $con->query($sql);

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>$".$row["price"]."</td><td><input type='number' name='quantity_".$row["id"]."' min='1'></td></tr>";
    }

    echo "</table>";
    echo "<input type='submit' name='submit_step2' class='submit-button sparkle' value='Place Order'>";
    echo "</form>";
    echo "</div>";

} else {
    // Display the first step to collect user details
    echo "<div class='order-container step-container'>";
    echo "<h2>Order</h2>";
    echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
    
    echo "<label for='customer_name'>Your Name:</label>";
    echo "<input type='text' name='customer_name' required>";
    
    echo "<label for='customer_phone'>Your Phone Number:</label>";
    echo "<input type='text' name='customer_phone' required>";
    
    echo "<label for='customer_address'>Your Address:</label>";
    echo "<input type='text' name='customer_address' required>";

    echo "<input type='submit' name='submit_step1' class='submit-button sparkle' value='Next'>";
    echo "</form>";
    echo "</div>";
}

$con->close();
?>

</body>
</html>
