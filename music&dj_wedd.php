<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Live Music & Entertainment | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background-color: #f8f9fb;
    }

    header {
      background-color: #111;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 26px;
      letter-spacing: 1px;
    }

    .container {
      max-width: 1200px;
      margin: 60px auto;
      text-align: center;
    }

    h2 {
      color: #c0392b;
      margin-bottom: 20px;
    }

    p {
      color: #555;
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 40px;
    }

    .card {
      background: white;
      display: inline-block;
      width: 300px;
      margin: 20px;
      border-radius: 18px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-8px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 20px;
    }

    .card-content h3 {
      color: #e74c3c;
      margin-bottom: 10px;
    }

    .card-content p {
      font-size: 14px;
      color: #666;
    }

    .btn {
      display: inline-block;
      padding: 12px 25px;
      background-color: #e74c3c;
      color: white;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s;
      margin: 15px 8px;
    }

    .btn:hover {
      background-color: #c0392b;
    }
  </style>
</head>

<body>

  <header>🎶 Live Music & Entertainment</header>

  <div class="container">
    <h2>Experience the Rhythm of Celebration</h2>
    <p>Make your wedding unforgettable with our professional musicians, DJs, and entertainers. From romantic tunes to energetic beats, we bring life to your event!</p>

    <div class="card">
      <img src="images/liveband.jpg" alt="Live Band">
      <div class="card-content">
        <h3>Live Band</h3>
        <p>Enjoy soulful performances by our talented live bands, perfect for every wedding moment.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <div class="card">
      <img src="images/floorsetup.jpg" alt="DJ Music">
      <div class="card-content">
        <h3>DJ Night</h3>
        <p>Dance the night away with high-energy beats and lighting by our professional DJs.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <div class="card">
      <img src="images/djsetup.jpg" alt="Singer Performance">
      <div class="card-content">
        <h3>Solo Singer</h3>
        <p>Live romantic melodies by professional singers for your special day.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <br><br>

    <a href="wedding.php" class="btn" style="background-color:#555;">Back</a>
  </div>

</body>

</html>