<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Music & DJ Services | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(120deg, #ede7f6, #e3f2fd);
      color: #333;
      overflow-x: hidden;
    }

    .hero {
      height: 100;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      color: white;
      text-align: center;
    }

    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
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
      text-shadow: 0 3px 8px rgba(0, 0, 0, 0.6);
    }

    .hero p {
      font-size: 1.2rem;
      margin-top: 10px;
    }

    .btn {
      display: inline-block;
      margin-top: 25px;
      background: linear-gradient(90deg, #7e57c2, #42a5f5);
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

    .services {
      padding: 70px 10%;
      text-align: center;
    }

    .services h2 {
      font-size: 2.2rem;
      color: #512da8;
      margin-bottom: 40px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }

    .service-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 40px;
    }

    .service-card {
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: 0.4s;
    }

    .service-card:hover {
      transform: translateY(-10px);
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
      font-size: 1.5rem;
      color: #512da8;
      margin: 15px 0 10px;
    }

    .service-card p {
      color: #555;
      font-size: 1rem;
      padding: 0 20px 20px;
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
      background: linear-gradient(90deg, #7e57c2, #42a5f5);
      color: white;
      text-align: center;
      padding: 30px 10px;
      font-weight: 600;
      letter-spacing: 1px;
    }
  </style>
</head>

<body>

  <section class="hero">
    <h1>Music & DJ Services</h1>
    <p>Bring life to your party with energetic beats 🎶</p>
  </section>

  <section id="services" class="services">
    <h2>Our Music Highlights</h2>
    <div class="service-grid">
      <div class="service-card">
        <img src="images/djsetup.jpg" alt="DJ Setup">
        <h3>Professional DJ Setup</h3>
        <p>High-quality sound, lighting, and DJ systems that turn your event into an unforgettable experience.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/liveband.jpg" alt="Live Band">
        <h3>Live Band</h3>
        <p>From soft melodies to rock hits, our live bands make every occasion magical and lively.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/lightingshow.jpg" alt="Lighting Show">
        <h3>Lighting Show</h3>
        <p>Vibrant stage lighting effects synced with your music for a dazzling visual experience.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="service-card">
        <img src="images/floorsetup.jpg" alt="Dance Floor">
        <h3>Dance Floor Setup</h3>
        <p>LED dance floors and fog effects that make your guests groove all night long.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <!-- Back Button Added -->
    <a href="birthday.php" class="back-btn">← Back</a>
  </section>

  <footer>
    © 2025 EventHub | 🎵
  </footer>

</body>

</html>