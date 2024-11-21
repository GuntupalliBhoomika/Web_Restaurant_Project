<?php
session_start();
include("db.php");
date_default_timezone_set("Asia/Kolkata");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['book'])) {
        $name = $_POST['fname'];
        $phone = $_POST['pnum'];
        $date = $_POST['date'];
        $email = $_POST['mail'];
        $time = $_POST['time'];
        $period = $_POST['period'];
        $people = $_POST['people'];
        $reservationId = uniqid('id');
        $indianTime = date("h:i A", strtotime($time));

        if (!empty($name) && !empty($people) && !empty($email) && !is_numeric($email)) {
            $query = "INSERT INTO booktable (fname, pnum, date, mail, time, period, people, id) 
                      VALUES ('$name', '$phone', '$date', '$email', '$indianTime', '$period', '$people', '$reservationId')";
            mysqli_query($con, $query);
            echo "<script type='text/javascript'> alert('Booking successful!')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
        }
    }

    if (isset($_POST['cancel'])) {
        $reservationId = $_POST['fname'];
        $query = "DELETE FROM booktable WHERE fname= '$reservationId'";
        mysqli_query($con, $query);
        echo "<script type='text/javascript'> alert('Reservation cancelled')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
    <style>
        body {
            overflow-y: auto;
            overflow-x: hidden;
            margin: 0;
            font-family: 'Raleway', sans-serif;
        }

        .background-image {
            background-image: linear-gradient(
                    rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)),
                url(https://websitedemos.net/deli-restaurant-02/wp-content/uploads/sites/637/2020/08/homepage-hero-bg-img.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 50px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container form h2 {
            font-size: 25px;
            margin-bottom: 20px;
            color: white;
        }

        .container form input,
        .container form select,
        .container form button {
            height: 40px;
            width: 100%;
            margin-bottom: 20px;
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
            box-sizing: border-box;
        }

        .container form label {
            margin-right: 10px;
            color: white;
        }

        .container form select {
            width: 100%;
            margin-bottom: 20px;
        }

        .container form button {
            background: black;
            color: white;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .container form button:hover {
            color: #ffc107; /* Change this to your desired hover color */
            background: black;
        }

        .dashboard {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
            padding: 20px;
            background: black;
            color: white;
            border-radius: 0 10px 10px 0;
            box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            height: 200px;
            z-index: 1;
        }

        .dashboard a {
            text-decoration: none;
            color: white;
            margin-bottom: 10px;
            transition: color 0.3s;
        }

        .dashboard a:hover {
            color: #ffc107; /* Change this to your desired hover color */
        }
    </style>
</head>

<body class="background-image">
    <div class="dashboard">
        <a href="Homepage.php">Home</a>
        <a href="aboutus.html">About Us</a>
        <a href="menu2.html">Menu</a>
        <a href="offer.html">Offers</a>
        <a href="contact.html">Contact</a>
    </div>

    <div class="container">
        <form method="post">
            <h2>RESERVE A TABLE</h2>
            <input type="text" name="fname" Placeholder="Name*" required><br>
            <input type="text" name="pnum" placeholder="Mobile.No*" required><br>
            <input type="date" name="date" placeholder="DD\MM\YYYY" required><br>
            <input type="mail" name="mail" placeholder="Active Mail*" required><br>
            <label>Reservation Time:</label>
            <input type="time" name="time" required>
            <select name="period">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select><br>
            <input type="text" name="people" placeholder="No.of People*" required><br>
            <input type="hidden" name="id" value="<?php echo $reservationId; ?>">
            <button type="submit" name="book">Book Now</button>
            <button type="submit" name="cancel">Cancel Reservation</button>
        </form>
    </div>
</body>

</html>
