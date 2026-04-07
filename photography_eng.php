<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Photography | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #fef7ff;
      color: #333;
    }

    .header {
      background: linear-gradient(90deg, #7f00ff, #e100ff);
      color: #fff;
      text-align: center;
      padding: 50px 20px;
      border-bottom-left-radius: 50px;
      border-bottom-right-radius: 50px;
    }

    .header h1 {
      font-size: 2.5em;
      margin-bottom: 10px;
    }

    .services {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
      padding: 60px 20px;
    }

    .card {
      background: #fff;
      width: 320px;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .card-content {
      padding: 20px;
      text-align: center;
    }

    .card-content h3 {
      font-size: 1.3em;
      color: #9c27b0;
      margin-bottom: 10px;
    }

    .card-content p {
      font-size: 0.9em;
      color: #666;
      margin-bottom: 15px;
    }

    .btn {
      background: linear-gradient(90deg, #7f00ff, #e100ff);
      border: none;
      color: #fff;
      padding: 10px 25px;
      border-radius: 25px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      display: inline-block;
    }

    .btn:hover {
      opacity: 0.9;
    }

    .back-btn {
      display: block;
      text-align: center;
      margin: 40px auto;
      width: 180px;
      background: #333;
      color: white;
      padding: 12px 0;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 600;
    }

    .back-btn:hover {
      background: #555;
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>📸 Photography & Videography</h1>
    <p>Capture every magical moment of your wedding with professional clicks.</p>
  </div>

  <section class="services">
    <div class="card">
      <img src="images/photography2.jpg" alt="Pre Wedding Shoot">
      <div class="card-content">
        <h3>Pre-Wedding Shoot</h3>
        <p>Creative and cinematic pre-wedding photoshoots to celebrate your love story beautifully.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <div class="card">
      <img src="images/drones.jpg" alt="Candid Photography">
      <div class="card-content">
        <h3>Candid Photography</h3>
        <p>Beautifully captured natural moments that will make your memories last forever.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

  </section>

  <a href="engagement.php" class="back-btn">⬅ Back</a>

</body>

</html>