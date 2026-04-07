<?php
// seminar.php - Corporate Seminar page with included navbar
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seminar Event | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #1f2937;
    }

    /* Navbar CSS */
    nav {
      width: 100%;
      background: #6366F1;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 20px;
    }

    .logo {
      color: white;
      font-size: 32px;
      font-weight: 800;
    }

    .nav-menu {
      display: flex;
      list-style: none;
    }

    .nav-item>a {
      color: white;
      text-decoration: none;
      padding: 18px 15px;
      display: block;
      font-weight: 500;
      border-radius: 4px;
      transition: background 0.2s;
    }

    .nav-item>a:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    .dropdown {
      display: none;
      position: absolute;
      background: white;
      min-width: 180px;
      border-radius: 6px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .dropdown a {
      color: #333;
      padding: 12px 18px;
      display: block;
      text-decoration: none;
      font-weight: 500;
    }

    .dropdown a:hover {
      background: #F0FFF4;
      color: #3b82f6;
    }

    .nav-item:hover .dropdown {
      display: block;
    }

    /* Hero Section */
    .hero {
      height: 550px;
      background: url('images/seminar12.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: white;
      position: relative;
    }

    .hero::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero h2 {
      font-size: 3.5rem;
      font-weight: 700;
    }

    /* Button */
    .btn {
      background: #3b82f6;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.3s, transform 0.1s;
      box-shadow: 0 4px 10px rgba(59, 130, 246, 0.4);
    }

    .btn:hover {
      background: #2563eb;
      transform: translateY(-2px);
    }

    /* About */
    .about-us {
      display: flex;
      justify-content: center;
      padding: 60px 20px;
      background: #fff;
    }

    .about-box {
      max-width: 900px;
      padding: 40px;
      background: #fcfcfc;
      border-radius: 15px;
      text-align: center;
      border: 1px solid #eee;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .about-box h2 {
      color: #6366F1;
      margin-bottom: 20px;
      font-size: 2.2rem;
    }

    .about-box p {
      color: #444;
      line-height: 1.7;
    }

    /* Services */
    .services {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      padding: 40px 20px;
      background: #EAF3FF;
    }

    .service {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      text-align: center;
      border-bottom: 4px solid #3b82f6;
      font-weight: 600;
      color: #333;
      transition: transform 0.3s;
    }

    .service:hover {
      transform: translateY(-5px);
    }

    /* Gallery */
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      padding: 50px 20px;
    }

    .gallery img {
      width: 100%;
      height: 300px;
      border-radius: 15px;
      object-fit: cover;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .gallery img:hover {
      transform: scale(1.02);
    }

    footer {
      background: #1f2937;
      color: white;
      text-align: center;
      padding: 30px;
      font-weight: 500;
    }
  </style>
</head>

<body>

  <!-- Include Navbar -->
  <?php include 'navbar.php'; ?>

  <section class="hero">
    <div class="hero-content">
      <h3>Organize Your Professional Seminar 📚</h3>
      <br>
      <a href="book_event.php" class="btn">Book Now</a>
    </div>
  </section>

  <section class="about-us" id="about">
    <div class="about-box">
      <h2>Host With Confidence</h2>
      <p>
        At EventHub, we specialize in organizing impactful and well-structured seminars. From professional stage setups and high-quality audio-visual arrangements to comfortable seating, engaging presentations, and seamless coordination — we ensure every detail is managed with precision.
      </p>
      <p>
        Host your seminar with confidence, while we create a professional and inspiring environment that leaves a lasting impression on your audience.
      </p>
    </div>
  </section>

  <section class="services">
    <div class="service">
      <a href="speaker.php">🎤 Guest Speaker Management</a>
    </div>
    <div class="service">
      <a href="highseminar.php">📑 High-Quality Presentation Screens </a>
    </div>
    <div class="service">
      <a href="premiumsemi.php">☕ Premium Refreshments </a>
    </div>
    <div class="service">
      <a href="networksemi.php"> 🤝 Networking Space Design </a>
    </div>
  </section>

  <section class="gallery">
    <img src="images/seminarguest.jpg" alt="Seminar guest speakers">
    <img src="images/seminarpresantation.jpg" alt="Seminar Presentation">
    <img src="images/seminarrefreshments.jpg" alt="Seminar Refreshments">
    <img src="images/seminarnetwork.jpg" alt="Seminar Networking">
  </section>

  <footer>
    <p>© 2025 EventHub.</p>
  </footer>

</body>

</html>