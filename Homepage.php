<?php
  include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="chat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Add this CSS for the hover effect */
    .navigation-list a:hover {
      background-color: #e2672e;
      color: #fff;
      
    }
    .login-button:hover {
      background-color: #222; /* Change to the color you prefer */
      color: #fff;
    }
    .frame3-content {
      display: none;
    }

    .content:target {
      display: block;
    }
  </style>
  <title>Restaurant Website</title>
</head>
<body>
  <div class="container">
      <b><h1 style="color:red">WELCOME USER</h1></b>
    <div class="frame frame1">
        <div class="logo-and-name">
            <img src="restaurant-logo-design-vector-10067826-removebg-preview.png" height="50px" width="50px">
            <h1 class="restaurant-name">RL Saluable Alimento</h1>
        </div>
      <a href="#" class="logout-button" id="logoutBtn">Logout</a>
    </div>
    <div class="frame frame2">
        <nav>
          <ul class="navigation-list">
            <li><a href="menu2.html">Menu</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="reserve.php">Reserve</a></li>
            <li><a href="#frame4">OurVairieties</a></li>
            <li><a href="#frame5">OurChefs</a></li> 
            <li><a href="event.html">Events</a></li>
          </ul>
        </nav>
      </div>
    <div class="frame frame3">
       <marquee> <p>Welcome to our restaurant!! Have a great day with great food!! <a href="aboutus.html" target="_parent">Know more</a></p></marquee>
        <div class="frame3-content">
          <!-- Content to be displayed on hover -->
          <p>This is the content you want to display when hovering.</p>
          <p>You can add more details here.</p>
        </div>
    </div>
    <div class="frame frame4" id="frame4">
        <div class="menu-items">
            <a href="starters.html">
               <img src="manchuriya.jpg" alt="Menu-Item 1">
               <p>Starters</p>
            </a>
             <a href="Biriyani.html">
                     <img src="briyani.jpg" alt="Menu-Item 2">
                     <p>Briyani</p>
            </a>
            <a href="Bevarages.html">
                     <img src="beverages.jpeg" alt="Menu-Item 2">
                     <p>Bevarages</p>
            </a>
            <a href="Pastries.html">
                <img src="pastry.jpeg" alt="Menu-Item 2">
                <p>Deserts</p>
            </a>
       </div>
    </div>
    <div class="frame frame5" id="frame5">
        <div class="chefs">
            <div class="chef">
              <a href="chef1.html">
                <img src="sanjeev kappor.jpeg" alt="Chef 1">
                <p>Sanjeev Kapoor</p>
              </a>
            </div>
            <div class="chef">
              <a href="chef2.html">
                <img src="Nikita Gandhi.png" alt="Chef 2">
                <p>Nikita Gandhi</p>
              </a>
            </div>
            <div class="chef">
                <a href="chef3.html">
                  <img src="sanjeev thumma.jpeg" alt="Chef 2">
                  <p>Sanjeev Thumma</p>
                </a>
              </div>
            <div class="chef">
                <a href="chef4.html">
                  <img src="anahita dhondy.png" alt="Chef 2">
                  <p>Anahita Dhondy</p>
                </a>
            </div>
            <div class="chef">
                <a href="chef5.html">
                  <img src="vkhanna.webp" alt="Chef 2">
                  <p>Vikas Khanna</p>
                </a>
            </div>
            <!-- Add more chefs here -->
        </div>
    </div>
    <div class="frame frame6">
            <div class="customer-reviews">
              <h2>Customer Reviews</h2>
              <div class="review">
                <div class="customer-info">
                  <img src="download (1).jpeg"alt="Customer 1">
                  <p>John Doe</p>
                </div>
                <div class="review-details">
                  <p>Great food and excellent service! Will definitely visit again.</p>
                  <div class="rating">
                    <span class="stars">⭐⭐⭐⭐⭐</span>
                    <span class="rating-value">5.0</span>
                  </div>
                </div>
              </div>
              <div class="review">
                <div class="customer-info">
                    <img src="cus2.jpeg"alt="Customer 1">
                    <p>Keerthi Sharma</p>
                  </div>
                  <div class="review-details">
                    <p>Nice experience!!So many variaties need to be try!!</p>
                    <div class="rating">
                      <span class="stars">⭐⭐⭐⭐</span>
                      <span class="rating-value">4.0</span>
                    </div>
                  </div>
              </div>
            </div>
            <div class="location">
              <h2>Our Location</h2>
              <p>RL Saluable Alimento</p>
              <p>Vadlamudi,Near Vignan University,Guntur</p>
              <p>Phone: 0863-456-7890</p>
              <iframe src="https://www.google.com/maps/embed?..."></iframe> <!-- Add your Google Maps embed code here -->
            </div>
         </div>
    <div class="frame frame7">
      <div class="contact-details">
        <p>&copy; 2023 RL Saluable Alimento. All rights reserved.</p>
        <p> Vadlamudi, Guntur,Andrapradesh</p>
        <p>Phone: (123) 456-7890</p>
        <p>Email: info@RLSaluableAlimento.com</p>
      </div>
      <div class="chat-box">
        <div class="chat-header">
            <h3>Chat with us</h3>
        </div>
        <div class="glass">
          <h1>Ask Your Question??</h1>
          <h2>Yeah,ask Some Question</h2>
          <div class="input">
          <input
          type="text"
          id="userBox"
          onkeydown="if(event.keyCode == 13){ talk()}"
          placeholder="Type your Question"
          />
          </div>
          <p id="chatLog">Answer Appering Hear</p>
          </div>
          <script src="chat.js"></script>
    </div>   
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const logoutButton = document.getElementById('logoutBtn');
  
        logoutButton.addEventListener('click', function() {
          const confirmLogout = confirm("Are you sure you want to logout?");
          if (confirmLogout) {
            window.location.href = "login.php";
          }
        });
      });
    </script> 
</body>
</html>