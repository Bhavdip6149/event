<?php
// contactt.php - Contact Us page
session_start();
include 'navbar.php'; // <-- Navbar include link added properly
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EventHub - Contact Us</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    /* Primary: #6366F1, Accent: #F472B6 */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #F0FFF4;
      line-height: 1.6;
    }

    h1 {
      text-align: center;
      color: #1F2937;
      margin-top: 100px;
      /* Navbar ke neeche space ke liye */
      margin-bottom: 20px;
      font-size: 40px;
      font-weight: 700;
    }

    /* Contact Info Section */
    .about-info {
      margin-top: 40px;
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .info-box {
      background: #fff;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 320px;
      transition: transform 0.3s;
      border-left: 5px solid #F472B6;
    }

    .info-box:hover {
      transform: translateY(-5px);
    }

    .info-box h3 {
      margin-bottom: 10px;
      color: #333;
      font-size: 20px;
      font-weight: 600;
    }

    .info-box p {
      font-size: 15px;
      line-height: 1.6;
      color: #555;
    }

    /* Map Section */
    .map-container {
      margin: 60px auto;
      width: 90%;
      max-width: 1000px;
      height: 450px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    iframe {
      width: 100%;
      height: 100%;
      border: 0;
    }

    footer {
      background: #1f2937;
      color: white;
      text-align: center;
      padding: 30px;
      font-weight: 500;
      margin-top: 40px;
    }
  </style>
</head>

<body>

  <h1>Get In Touch</h1>

  <div class="about-info">
    <div class="info-box">
      <h3>📍 Address</h3>
      <p>
                 Medhasan , Modasa , Arravli, Gujarat 383276<br><br>
      
      </p>
    </div>

    <div class="info-box">
      <h3>📞 Contact</h3>
      <p>
         +91 9316962052<br>
          +91 6351498341<br>
        EventHub@gmail.com
      </p>
    </div>
  </div>

  <div class="map-container">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7315.2993697546935!2d73.22751399999999!3d23.545099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395decf7e3731765%3A0xeb37e54e04143c01!2sMedhasan%2C%20Gujarat%20383276!5e0!3m2!1sen!2sin!4v1775501958613!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <footer>
    <p>© 2025 EventHub.</p>
  </footer>

</body>

</html>