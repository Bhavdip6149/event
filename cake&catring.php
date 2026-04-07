<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cake & Catering | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fff8f0, #ffe4ec);
      color: #333;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero {
      height: 100;
      background: url('https://images.unsplash.com/photo-1603023745939-8d83a2d90d7c?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      color: white;
      position: relative;
    }

    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
    }

    .hero h1,
    .hero p,
    .hero a {
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
      text-shadow: 0 3px 10px rgba(0, 0, 0, 0.6);
      animation: glow 2s infinite alternate;
    }

    .hero p {
      font-size: 1.2rem;
      margin-top: 10px;
    }

    .btn {
      display: inline-block;
      margin-top: 25px;
      background: linear-gradient(90deg, #ff80ab, #ffb300);
      color: white;
      padding: 14px 30px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn:hover {
      transform: scale(1.1);
    }

    /* Services Section */
    .services {
      padding: 80px 10%;
      text-align: center;
    }

    .services h2 {
      font-size: 2.5rem;
      color: #d81b60;
      margin-bottom: 50px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .service-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 50px;
    }

    .service-card {
      background: white;
      border-radius: 25px;
      overflow: hidden;
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
      transition: 0.4s;
    }

    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 35px rgba(0, 0, 0, 0.25);
    }

    .service-card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: transform 0.4s;
    }

    .service-card:hover img {
      transform: scale(1.1);
    }

    .service-card h3 {
      font-size: 1.6rem;
      color: #e91e63;
      margin: 20px 0 10px;
    }

    .service-card p {
      color: #555;
      font-size: 1rem;
      padding: 0 20px 25px;
    }

    /* Back Button Style (same as decoration.php) */
    .back-btn {
      display: block;
      margin: 50px auto 30px;
      padding: 12px 30px;
      background-color: #333;
      color: #fff;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      width: fit-content;
    }

    .back-btn:hover {
      background-color: #555;
    }

    footer {
      background: linear-gradient(90deg, #ff80ab, #ffb300);
      color: white;
      text-align: center;
      padding: 35px 10px;
      font-weight: 600;
      letter-spacing: 1px;
    }

    /* Glow animation for title */
    @keyframes glow {
      0% {
        text-shadow: 0 0 5px #ff4081, 0 0 10px #ff80ab;
      }

      100% {
        text-shadow: 0 0 15px #ff4081, 0 0 25px #ffb300;
      }
    }
  </style>
</head>

<body>

  <!-- Hero -->
  <section class="hero">
    <h1>Cake & Catering Services</h1>
    <p>Sweetness & Taste that Make Moments Special 🎂🍽</p>
    <br><br>
  </section>

  <!-- Services -->
  <section id="services" class="services">
    <h2>Our Specialties</h2>
    <div class="service-grid">

      <div class="service-card">
        <img src="images/cake.jpg" alt="Designer Cakes">
        <h3>Designer Cakes</h3>
        <p>From birthday cakes to royal wedding masterpieces, every creation is baked with love, flavor, and art.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/cupcake.jpg" alt="Custom Cupcakes">
        <h3>Custom Cupcakes</h3>
        <p>Mini delights for every mood — colorful, soft, and creamy cupcakes that melt in your mouth.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/catering.jpg" alt="Event Catering">
        <h3>Event Catering</h3>
        <p>Delicious multi-cuisine catering that brings a feast to your event — from starters to desserts.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/buffetsetup.jpg" alt="Buffet Setup">
        <h3>Elegant Buffet Setup</h3>
        <p>Decorated counters and creative food presentations that elevate your event’s style and taste.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/deseetbar.jpg" alt="Dessert Bar">
        <h3>Dessert Bar</h3>
        <p>Chocolates, pastries, puddings, and sweet treats that make your guests go “Wow!” every time.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

    </div>

    <!-- Back Button Added -->
    <a href="birthday.php" class="back-btn">← Back</a>
  </section>

  <footer>
    © 2025 EventHub 💕
  </footer>

</body>

</html>