<?php
// decoration.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Decoration | Event Management System</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fff8f0, #fde4e4);
      color: #333;
    }

    header {
      background: linear-gradient(90deg, #e9e6e3ff, #bcaaaaff, #cc89c8ff);
      color: #fff;
      text-align: center;
      padding: 50px 20px;
      font-size: 2.5rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }

    .decor-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
      gap: 50px;
    }

    .decor-card {
      width: 120%;
      max-width: 950px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      display: flex;
      flex-direction: row;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .decor-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .decor-card img {
      width: 50%;
      height: 350px;
      object-fit: cover;
    }

    .decor-info {
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: left;
      width: 50%;
    }

    .decor-info h2 {
      font-size: 1.9rem;
      color: #ff5e62;
      margin-bottom: 15px;
    }

    .decor-info p {
      color: #555;
      line-height: 1.8;
      margin-bottom: 25px;
      font-size: 15px;
    }

    .book-btn {
      display: inline-block;
      background: linear-gradient(90deg, #ff9966, #ff5e62);
      color: #fff;
      padding: 12px 35px;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
      text-align: center;
      width: fit-content;
    }

    .book-btn:hover {
      background: linear-gradient(90deg, #ff5e62, #ff9966);
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(255, 94, 98, 0.5);
    }

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
      background: #1f2937;
      color: white;
      text-align: center;
      padding: 30px;
      font-weight: 500;
    }

    @media (max-width: 768px) {
      .decor-card {
        flex-direction: column;
      }

      .decor-card img,
      .decor-info {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <header>✨ Decoration Services ✨</header>

  <div class="decor-container">

    <!-- Balloon Decoration -->
    <div class="decor-card">
      <img src="images/balloon1.jpg" alt="Balloon Decoration">
      <div class="decor-info">
        <h2>🎈 Balloon Decoration</h2>
        <p>Bring joy and festivity to your celebrations with vibrant balloon arches, backdrops, and centerpieces that fill the space with color and fun energy.</p>
        <a href="book_event.php?type=balloon" class="book-btn">Book Now</a>
      </div>
    </div>

    <!-- Flower Decoration -->
    <div class="decor-card">
      <img src="images/flower1.jpg" alt="Flower Decoration">
      <div class="decor-info">
        <h2>🌸 Flower Decoration</h2>
        <p>Elegant floral arrangements using fresh blooms that create a serene, royal, and natural beauty perfect for weddings and special occasions.</p>
        <a href="book_event.php?type=flower" class="book-btn">Book Now</a>
      </div>
    </div>

    <!-- Lighting Decoration -->
    <div class="decor-card">
      <img src="images/light1.jpg" alt="Lighting Decoration">
      <div class="decor-info">
        <h2>💡 Lighting Decoration</h2>
        <p>Illuminate your event with sparkling fairy lights, warm glows, and creative LED effects that set the perfect mood for every celebration.</p>
        <a href="book_event.php?type=lighting" class="book-btn">Book Now</a>
      </div>
    </div>

    <!-- Theme Decoration -->
    <div class="decor-card">
      <img src="images/theme.jpg" alt="Theme Decoration">
      <div class="decor-info">
        <h2>🎨 Theme Decoration</h2>
        <p>Personalize your event with unique theme setups — from royal and vintage to fun cartoon or pastel dreamy styles — crafted to match your story.</p>
        <a href="book_event.php?type=theme" class="book-btn">Book Now</a>
      </div>
    </div>
  </div>

  <a href="birthday.php" class="back-btn">← Back</a>

  <footer>
    <p>© 2025 EventHub.</p>
  </footer>

</body>

</html>