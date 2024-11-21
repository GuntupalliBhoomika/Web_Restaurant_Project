<?php
    session_start();
    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
      $email=$_POST['mail'];
      $password=$_POST['pass'];

      if(!empty($email) && !empty($password) && !is_numeric($email))
      {
          $query="select * from sign where mail='$email' limit 1";
          $result=mysqli_query($con,$query);

          if($result)
          {
            if($result && mysqli_num_rows($result)>0)
            {
              $user_data=mysqli_fetch_assoc($result);
              $_SESSION['username'] = $user['fname']; // Store the username in the session variable
              header("Location: Homepage.php"); // Redirect to the welcome page
              exit();
            }
          }
          echo "<script type='text/javascript'> alert('wrong email or password')</script>";
       }
       else
       {
        echo "<script type='text/javascript'> alert('wrong email or password')</script>";
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles1.css">
  <title>Login Page</title>
</head>
<body>
  <div class="login-container">
    <h1>Login</h1>
    <form  method="POST">
      <label for="email">Email:</label>
      <input type="text"  name="mail" required>

      <label for="password">Password:</label>
      <input type="password"  name="pass" required>

      <button type="submit">Submit</button>
    </form>
    <b><p>Don't have an account? <a href="signup.php">Sign up</a></p></b>
  </div>
  
</body>
</html>