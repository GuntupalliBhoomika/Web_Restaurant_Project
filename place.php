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
            height: 90vh;
            margin: 0;
            background-image: url("—Pngtree—green minimalist fresh tea banner_1006617.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .order-container {
            text-align: center;
            padding: 40px;
            background-image: url("https://img.freepik.com/free-photo/abstract-blur-empty-green-gradient-studio-well-use-as-background-website-template-frame-business-report_1258-52616.jpg?size=626&ext=jpg&ga=GA1.1.595284326.1699587350&semt=ais");
            background-size: cover;
            background-color: #eeddb0; /* Light yellow-brown background */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Box shadow */
        }

        .order-details {
            margin-top: 20px;
        }

        .order-details p {
            margin-bottom: 10px;
        }

        .order-success {
            color: green;
            font-weight: bold;
        }

        .cancel-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff9999; /* Light red background */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: white;
        }
    </style>
</head>
<body>

<?php
session_start();
include('db.php');

// Initialize variables with default values
$customer_name = $customer_email = $customer_contact = "";
$order_placed = $order_cancelled = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign values from $_POST if they are set
    $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : "";
    $customer_email = isset($_POST['customer_email']) ? $_POST['customer_email'] : "";
    $customer_contact = isset($_POST['customer_contact']) ? $_POST['customer_contact'] : "";

    // Generate order id
    $order_id = 'ORD' . rand(1000, 9999);

    // Loop through food items and handle quantities
    foreach ($_POST as $key => $value) {
        // Check if the input field is a quantity field
        if (strpos($key, 'quantity_') === 0) {
            $food_id = substr($key, strlen('quantity_'));
            $quantity = (int)$value; // Ensure it's an integer

            // Display only if quantity is greater than zero
            if ($quantity > 0) {
                // Query to fetch food price
                $sql_food_price = "SELECT price FROM food_items WHERE id = $food_id";
                $result_food_price = $con->query($sql_food_price);

                if ($result_food_price->num_rows > 0) {
                    $row_food_price = $result_food_price->fetch_assoc();
                    $food_price = $row_food_price["price"];

                    // Calculate total price
                    $total_price = $food_price * $quantity;

                    // Query to insert order data
                    $query = "INSERT INTO orders2 (order_id, customer_name, customer_email, customer_contact, food_id, quantity, total_price) 
                              VALUES ('$order_id', '$customer_name', '$customer_email', '$customer_contact', '$food_id', '$quantity', '$total_price')";

                    if (mysqli_query($con, $query)) {
                        $order_placed = true;
                        break; // Stop processing once the order is placed
                    } else {
                        echo "Error: " . $query . "<br>" . mysqli_error($con);
                    }
                }
            }
        }
    }
}

// Cancel order logic
if (isset($_POST['cancel_order'])) {
    $order_id_to_cancel = $_POST['cancel_order'];
    $query_cancel = "DELETE FROM orders2 WHERE order_id = '$order_id_to_cancel'";
    if (mysqli_query($con, $query_cancel)) {
        $order_cancelled = true;
        // JavaScript alert for order cancellation and redirect
        echo "<script>alert('Order Cancelled successfully!'); window.location.href = 'order.php';</script>";
    } else {
        echo "Error: " . $query_cancel . "<br>" . mysqli_error($con);
    }
}

// Display order details if order placed successfully
if ($order_placed) {
    echo "<div class='order-container'>";
    echo "<h2 class='order-success'>Order Details</h2>";
    echo "<div class='order-details'>";
    echo "<h3><p>Order ID: $order_id</p></h3>";
    echo "<h3><p>Customer Name: $customer_name</p></h3>";
    echo "<p>Items:</p>";

    $total_order_price = 0; // To calculate total order price

    // Loop through food items and display details
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity_') === 0) {
            $food_id = substr($key, strlen('quantity_'));
            $quantity = (int)$value;

            // Query to fetch food details
            $sql_food_details = "SELECT name, price FROM food_items WHERE id = $food_id";
            $result_food_details = $con->query($sql_food_details);

            if ($result_food_details->num_rows > 0) {
                $row_food_details = $result_food_details->fetch_assoc();
                $food_name = $row_food_details["name"];
                $food_price = $row_food_details["price"];

                $total_order_price += $food_price * $quantity;

                echo "<p>- $food_name (Quantity: $quantity)</p>";
            }
        }
    }
    echo "<h1><p>Total Order Price: $total_order_price</p></h1>";
    echo "<h2><p class='order-success'>Order placed successfully</p></h2>";

    // Cancel order button
    echo "<form method='post'>";
    echo "<input type='hidden' name='cancel_order' value='$order_id'>";
    echo "<button type='submit' class='cancel-button'>Cancel Order</button>";
    echo "</form>";

    echo "</div>";
    echo "</div>";
} elseif ($order_cancelled) {
    echo "<div class='order-container'>";
    echo "<b><h2 class='order-success'>Order Cancelled</h2></b>";
    echo "</div>";
} else {
    echo "Form not submitted or error in order placement";
}

// Close connection
mysqli_close($con);
?>

</body>
</html>
