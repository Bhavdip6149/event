<?php
// birthday.php - All HTML and CSS for the Birthday Party page
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Birthday Party | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
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

    /* --- Hero Section --- */
    .hero {
      height: 600px;
      background: url('images/birthday1.jpg') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
    }

    .hero::before {
      content: '';
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
      color: white;
    }

    .hero h2 {
      font-size: 3.8rem;
      margin-bottom: 25px;
      font-weight: 800;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
    }

    .btn {
      background: #4c9c83ff;
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-size: 1.1rem;
      font-weight: 700;
      text-decoration: none;
      display: inline-block;
      transition: background 0.3s, transform 0.1s;
      box-shadow: 0 8px 20px rgba(6, 182, 212, 0.4);
    }

    .btn:hover {
      background: #0891b2;
      transform: translateY(-2px);
    }

    /* --- About Us Section --- */
    .about-us {
      display: flex;
      justify-content: center;
      padding: 70px 20px;
      background: white;
    }

    .about-box {
      max-width: 900px;
      padding: 40px 50px;
      background: #f0f7ff;
      border-radius: 18px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      text-align: center;
      border: 1px solid #e0e7ff;
    }

    .about-box h2 {
      color: #1e3a8a;
      margin-bottom: 20px;
      font-size: 2.5rem;
      font-weight: 800;
    }

    .about-box p {
      font-size: 1rem;
      color: #4b5563;
      line-height: 1.7;
    }

    /* --- Services --- */
    .services {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      padding: 50px 20px;
      background: #eff6ff;
    }

    .service {
      background: #ffffff;
      text-align: center;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      font-weight: 600;
      color: #1f2937;
      border-bottom: 4px solid #06b6d4;
      transition: transform 0.3s, box-shadow 0.3s, background 0.3s, color 0.3s;
    }

    .service:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      background: #1e3a8a;
      color: white;
    }

    /* --- Gallery --- */
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      padding: 60px 20px;
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
      padding: 30px;
      font-weight: 500;
    }
  </style>
</head>

<body>

  <!-- ✅ Navbar include kiya gaya yahan -->
  <?php include 'navbar.php'; ?>

  <section class="hero">
    <div class="hero-content">
      <h3>Celebrate Your Dream Birthday ❤</h3>
      <a href="book_event.php" class="btn">Book Now</a>
    </div>
  </section>

  <section class="about-us">
    <div class="about-box">
      <h2>Why Book Your Birthday with Us?</h2>
      <p>
        At EventHub, we make birthdays extra special with fun, joy, and unforgettable memories. From vibrant decorations and delicious
        cakes to lively music, entertainment, and professional
        photography—we take care of every detail to create a perfect celebration.
      </p>
      <p>
        Celebrate your big day with happiness and style, while we turn your birthday into a magical experience that you and your loved
        ones will cherish forever.
      </p>
    </div>
  </section>

  <section class="services">
    <div class="service">
      <a href="decoration.php">🎈 Decoration </a>
    </div>
    <div class="service">
      <a href="cake&catring.php">🎂 Cake & Catering </a>
    </div>
    <div class="service">
      <a href="musi&dj.php">🎶 Music & DJ </a>
    </div>
    <div class="service">
      <a href="photography&videography.php">📸 Photography & Videography </a>
    </div>
  </section>

  <section class="gallery">
    <img src="images/decoration.jpg" alt="Decoration">
    <img src="images/cake1.jpg" alt="Cake">
    <img src="images/birthmusic.jpg" alt="Party Setup">
    <img src="images/gift.jpg" alt="Themed Gift Area">
  </section>

  <footer>
    <p>© 2025 EventHub.</p>
  </footer>

</body>

</html>