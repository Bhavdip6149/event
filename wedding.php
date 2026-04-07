<?php
// wedding.php - Wedding Celebration page
include('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Celebration | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --color-primary: #1f2937;
      --color-accent: #F472B6;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #1f2937;
    }

    /* Hero Section */
    .hero {
      height: 650px;
      background: url('images/wedding.jpg') no-repeat center center/cover;
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
      margin-bottom: 20px;
      font-weight: 700;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    /* Buttons */
    .btn {
      background: #059669;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      cursor: pointer;
      font-size: 1.1rem;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      transition: background 0.3s, transform 0.1s;
      box-shadow: 0 4px 10px rgba(244, 114, 182, 0.4);
    }

    .btn:hover {
      background: #E55C9C;
      transform: translateY(-2px);
    }

    /* About Us */
    .about-us {
      display: flex;
      justify-content: center;
      padding: 60px 20px;
      background: #fff;
    }

    .about-box {
      max-width: 900px;
      padding: 40px;
      background: #FEEFF4;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      text-align: center;
      border: 1px solid #eee;
    }

    .about-box h2 {
      color: #8c186f;
      margin-bottom: 20px;
      font-size: 2.2rem;
      font-weight: 700;
    }

    .about-box p {
      font-size: 1rem;
      color: #444;
      line-height: 1.7;
    }

    /* Services Grid */
    .services {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      padding: 40px 20px;
      background: #FEEFF4;
    }

    .service {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      font-weight: 600;
      color: #333;
      border-bottom: 4px solid #F472B6;
      transition: transform 0.3s;
    }

    .service:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
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
      object-fit: cover;
      border-radius: 15px;
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
      padding: 20px;
    }
  </style>
</head>

<body>

  <section class="hero">
    <div class="hero-content">
      <h3>Celebrate Your Dream Wedding 💍❤</h3>
      <a href="book_event.php" class="btn">Book Now</a>
    </div>
  </section>

  <section class="about-us">
    <div class="about-box">
      <h2>A Lifetime of Memories</h2>
      <p>
        At EventHub, we turn your wedding dreams into reality with elegance and grandeur. From stunning stage décor and elegant
        floral arrangements to delicious cuisine, live music, joyful dance, and professional photography—we manage every detail with perfection.
      </p>
      <p>
        Celebrate the beginning of your forever journey with style, love, and unforgettable moments, while we create a magical experience for you and your guests.
      </p>
    </div>
  </section>

  <section class="services">
    <div class="service"><a href="decoration_wedd.php">💐 Decoration & Flowers</a></div>
    <div class="service"><a href="catring_wedd.php">🍽 Gourmet Catering </a> </div>
    <div class="service"><a href="music&dj_wedd.php">🎶 Live Music & Entertainment</a></div>
    <div class="service"><a href="photography_wedd.php">📸 Photography & Videography</a></div>
  </section>

  <section class="gallery">
    <img src="images/weddingdecor.jpg" alt="Wedding Decoration">
    <img src="images/weddingcatring.jpg" alt="Wedding Catering">
    <img src="images/weddinglivemusic.jpg" alt="Wedding Live Music">
    <img src="images/weddingphotography.jpg" alt="Wedding Photography">
  </section>

  <footer>
    <p>© 2025 EventHub.</p>
  </footer>

</body>

</html>