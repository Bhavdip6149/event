<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Photography & Videography | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(120deg, #e0f7fa, #cc9ac9ff);
      color: #fff;
      overflow-x: hidden;
    }

    .hero {
      height: 100;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;
      position: relative;
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
      background: linear-gradient(90deg, #00bfa5, #004d40);
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
      background-color: rgba(255, 255, 255, 0.05);
    }

    .services h2 {
      font-size: 2.2rem;
      color: #c95a69ff;
      margin-bottom: 40px;
      text-transform: uppercase;
    }

    .service-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 40px;
    }

    .service-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      overflow: hidden;
      transition: 0.4s;
      backdrop-filter: blur(10px);
    }

    .service-card:hover {
      transform: translateY(-10px);
      background: rgba(255, 255, 255, 0.2);
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
      color: #c95a69ff;
      margin: 15px 0 10px;
    }

    .service-card p {
      color: #121010ff;
      font-size: 1rem;
      padding: 0 20px 20px;
    }

    .back-btn {
      display: block;
      margin: 50px auto 30px;
      padding: 12px 30px;
      background: linear-gradient(90deg, #004d40, #00bfa5);
      color: #fff;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
      width: fit-content;
      text-align: center;
    }

    .back-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    footer {
      background: linear-gradient(90deg, #004d40, #00bfa5);
      color: white;
      text-align: center;
      padding: 30px 10px;
      font-weight: 600;
    }
  </style>
</head>

<body>

  <section class="hero">
    <h1>Photography & Videography</h1>
    <p>Capture your memories beautifully 📸</p>
  </section>

  <section id="services" class="services">
    <h2>Our Creative Services</h2>
    <div class="service-grid">
      <div class="service-card">
        <img src="images/eventphoto.jpg" alt="Event Photography">
        <h3>Event Photography</h3>
        <p>Capturing every emotion and highlight of your special event with artistic frames.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
      <div class="service-card">
        <img src="images/photography2.jpg" alt="Candid Shots">
        <h3>Candid Shots</h3>
        <p>Natural, spontaneous photos that showcase genuine smiles and emotions.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
      <div class="service-card">
        <img src="images/photography3.jpg" alt="Cinematic Videography">
        <h3>Cinematic Videography</h3>
        <p>Beautiful cinematic storytelling with HD video and creative editing.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
      <div class="service-card">
        <img src="images/drones.jpg" alt="Drone Shoots">
        <h3>Drone Shoots</h3>
        <p>Capture breathtaking aerial views of your celebration with high-end drone cameras.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <!-- 🌸 Added Back Button Here -->
    <a href="birthday.php" class="back-btn">← Back</a>
  </section>

  <footer>
    © 2025 EventHub | Capture Every Moment Beautifully 💫
  </footer>

</body>

</html>