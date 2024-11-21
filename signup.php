<?php
    session_start();
    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST['fname'];
        $email=$_POST['mail'];
        $num=$_POST['pnum'];
        $add=$_POST['address'];
        $password=$_POST['pass'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query="insert into sign (fname,mail,pnum,address,pass) values('$name','$email','$num','$add','$password')";
            mysqli_query($con,$query);
            echo "<script type='text/javascript'> alert('Successfully Signuped')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles3.css">
    <title>Signup Page</title>
    <style>
    body {
  margin: 0;
  padding: 0;
  background-image: url("food-frame-with-asian-dish.jpg"); /* Adjust the path to your background image */
  background-size: cover;
  background-position: center;
  font-family: Arial, sans-serif;
}

.signup-form {
  width: 300px;
  margin: 0 auto;
  padding: 50px;
  background-color: rgba(255, 255, 255, 0.9);
  background-image: url("bglogin.jpeg"); /* Adjust the path to your signup container background image */
  background-size: cover;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  text-align: center;
  margin-top: 50px;
}
</style>
</head>
<body>
    <div class="signup-form">
        <h1>Sign Up</h1>
        <form  method="POST">
            <label for="name">Name:</label>
            <input type="text" name="fname" required >

            <label for="email">Email:</label>
            <input type="email"  name="mail" required >

            <label for="phone">Phone Number:</label>
            <input type="tel"  name="pnum" required >

            <label for="address">Address:</label>
            <input type="text"  name="address" required >

            <label for="password">Password:</label>
            <input type="password"  name="pass" required >
            <button type="submit">Submit</button>
           
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
            <p>Already have an account?<a href="login.php">Login Here</a></p>
      
        </form>
    </div>

</body>
</html>