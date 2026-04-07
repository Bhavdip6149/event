<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Live Music | EventHub</title>
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

    /* Header */
    .header {
      background: linear-gradient(90deg, #ff758c, #ff7eb3);
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

    /* Services Section */
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
      color: #e91e63;
      margin-bottom: 10px;
    }

    .card-content p {
      font-size: 0.9em;
      color: #666;
      margin-bottom: 15px;
    }

    /* Buttons */
    .btn {
      background: linear-gradient(90deg, #ff758c, #ff7eb3);
      border: none;
      color: #fff;
      padding: 10px 25px;
      border-radius: 25px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      display: inline-block;
      transition: 0.3s;
    }

    .btn:hover {
      opacity: 0.9;
    }

    /* Back Button */
    .back-btn {
      background: linear-gradient(90deg, #ff758c, #ff7eb3);
      border: none;
      color: #fff;
      padding: 12px 30px;
      border-radius: 25px;
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      display: block;
      width: fit-content;
      margin: 0 auto 50px;
      transition: 0.3s;
    }

    .back-btn:hover {
      opacity: 0.85;
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>🎶 Live Music & Entertainment</h1>
    <p>Make your wedding unforgettable with soulful music and performances.</p>
  </div>

  <section class="services">
    <!-- Card 1 -->
    <div class="card">
      <img src="images/liveband.jpg" alt="Band Performance">
      <div class="card-content">
        <h3>Wedding Band</h3>
        <p>Professional live bands creating vibrant and romantic vibes with your favorite tunes.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="images/floorsetup.jpg" alt="DJ Setup">
      <div class="card-content">
        <h3>DJ & Sound Setup</h3>
        <p>Modern DJ setup, high-energy beats, and light effects to make your night memorable.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>
  </section>

  <!-- Back Button -->
  <a href="engagement.php" class="back-btn">⬅ Back</a>

</body>

</html>