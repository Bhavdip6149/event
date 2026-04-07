<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EventHub - Home | Spectacular Events Planning</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --color-primary: #1F2937;
      --color-accent: #059669;
      --color-highlight: #F59E0B;
      --color-bg-light: #F9FAFB;
      --color-text-dark: #1F2937;
      --color-text-mid: #4B5563;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      line-height: 1.6;
      background-color: var(--color-bg-light);
      color: var(--color-text-dark);
    }

    /* Hero Section */
    .hero {
      width: 100%;
      padding: 80px 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #c8c8c8ff, #e6e0e1ff);
      flex-wrap: wrap;
    }

    .hero-container {
      max-width: 1200px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
      flex-wrap: wrap;
    }

    .hero-text {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .circle-box {
      width: 300px;
      height: 300px;
      background: white;
      border-radius: 50%;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 25px;
      transition: transform 0.4s;
    }

    .circle-box:hover {
      transform: scale(1.05);
    }

    .circle-box h1 {
      color: #b33a62ff;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .circle-box p {
      font-size: 15px;
      color: #555;
      margin-bottom: 15px;
    }

    .circle-box .btn {
      background: #e91e63;
      color: white;
      padding: 10px 25px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .circle-box .btn:hover {
      background: #d81b60;
    }

    .hero-image {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .hero-image img {
      width: 100%;
      max-width: 600px;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* About Us Section */
    .about-section {
      background: white;
      padding: 80px 20px;
      text-align: center;
    }

    .about-rectangle {
      background: var(--color-bg-light);
      border-radius: 18px;
      width: 90%;
      max-width: 900px;
      margin: auto;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      padding: 60px;
      border: 1px solid #E5E7EB;
    }

    .about-rectangle h2 {
      font-size: 38px;
      margin-bottom: 20px;
      color: var(--color-primary);
      font-weight: 700;
    }

    .about-rectangle p {
      font-size: 17px;
      color: var(--color-text-mid);
      line-height: 1.8;
      margin-bottom: 10px;
    }

    .about-info {
      margin-top: 50px;
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .info-box {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      width: 320px;
      text-align: left;
      border-left: 6px solid var(--color-highlight);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .info-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .info-box h3 {
      margin-bottom: 12px;
      color: var(--color-text-dark);
      font-weight: 700;
      font-size: 20px;
    }

    .info-box p {
      font-size: 16px;
      line-height: 1.7;
      color: #6B7280;
    }

    /* Featured Events */
    .featured-events {
      background: #f9fafb;
      padding: 80px 20px;
      text-align: center;
    }

    .featured-events h2 {
      font-size: 36px;
      color: var(--color-primary);
      margin-bottom: 40px;
      font-weight: 700;
    }

    .event-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
    }

    .event-card {
      background: white;
      width: 260px;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .event-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .event-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .event-card h3 {
      margin: 15px 0 8px;
      color: var(--color-accent);
    }

    .event-card p {
      font-size: 15px;
      color: var(--color-text-mid);
      padding: 0 15px;
      margin-bottom: 15px;
    }

    .event-card .btn {
      display: inline-block;
      background: var(--color-highlight);
      color: white;
      padding: 8px 18px;
      border-radius: 25px;
      margin-bottom: 20px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .event-card .btn:hover {
      background: #d97706;
    }

    /* CTA */
    .cta {
      background: linear-gradient(135deg, #909694ff, #9790c7ff);
      color: white;
      text-align: center;
      padding: 80px 20px;
    }

    .cta h2 {
      font-size: 34px;
      margin-bottom: 15px;
      font-weight: 700;
    }

    .cta p {
      font-size: 18px;
      margin-bottom: 25px;
    }

    .cta-btn {
      background: #f59e0b;
      color: white;
      padding: 12px 25px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
    }

    .cta-btn:hover {
      background: #d97706;
    }

    footer {
      background: var(--color-primary);
      color: white;
      text-align: center;
      padding: 35px;
      margin-top: 60px;
      font-size: 16px;
      font-weight: 500;
    }
  </style>
</head>

<body>

  <!-- ✅ Navbar Included -->
  <?php include('navbar.php'); ?>

  <section class="hero">
    <div class="hero-container">
      <div class="hero-text">
        <div class="circle-box">
          <h1>Welcome To EventHub</h1>
        </div>
      </div>
      <div class="hero-image">
        <img src="images/indeximage1.jpg" alt="EventHub Image">
      </div>
    </div>
  </section>

  <section class="featured-events">
    <h2>Our Events</h2>
    <div class="event-container">
      <div class="event-card">
        <img src="images/birthday.jpg" alt="Birthday Party">
        <h3>Birthday Party</h3>
        <p>Fun-filled birthday themes, cakes, lights and balloon magic for all ages.</p>
        <a href="birthday.php" class="btn">Show</a>
      </div>
      <div class="event-card">
        <img src="images/wedding.jpg" alt="Wedding">
        <h3>Wedding</h3>
        <p>Make your dream wedding come true with stunning floral decor and setup.</p>
        <a href="wedding.php" class="btn">Show</a>
      </div>
      <div class="event-card">
        <img src="images/engage.jpg" alt="Engagement">
        <h3>Engagement</h3>
        <p>Celebrate the beginning of forever with our elegant engagement decor.</p>
        <a href="engagement.php" class="btn">Show</a>
      </div>
      <div class="event-card">
        <img src="images/seminar12.jpg" alt="Seminar">
        <h3>Seminar</h3>
        <p>Professional seminar setups with complete lighting, seating, and sound.</p>
        <a href="seminar.php" class="btn">Show</a>
      </div>
    </div>
  </section>

  <section class="cta">
    <h2>Ready to Make Your Event Unforgettable?</h2>
    <p>Let’s create magical moments together — stress-free and perfectly organized!</p>
    <a href="book_event.php" class="cta-btn">Book Now</a>
  </section>

  <section class="about-section" id="about">
    <div class="about-rectangle">
      <h2>About EventHub</h2>
      <p>EventHub is a Baroda-based establishment working since 2018.
        We aim at adding life to your events and making memories last forever.
        Our platform brings all celebration-related services together to make
        the Event Planning process easier and hassle-free for customers.</p>
      <p>We provide total solutions for every occasion. From weddings to seminars,
        we ensure that our clients enjoy their events while we handle every detail
        with creativity, commitment, and care.</p>
    </div>

    <div class="about-info">
      <div class="info-box">
        <h3>📍 Address</h3>
        <p>
          Medhasan , Modasa , Arravli, Gujarat 383276<br>

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
  </section>

  <footer>
    <p>&copy; 2025 EventHub.</p>
  </footer>
</body>

</html>