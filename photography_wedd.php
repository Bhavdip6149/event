<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photography & Videography | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fffaf5;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #2c3e50;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 26px;
    }

    .container {
      max-width: 1200px;
      margin: 50px auto;
      text-align: center;
    }

    h2 {
      color: #d35400;
      margin-bottom: 15px;
    }

    p {
      color: #555;
      margin-bottom: 40px;
    }

    .grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 25px;
    }

    .photo-card {
      background: white;
      width: 320px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .photo-card:hover {
      transform: translateY(-6px);
    }

    .photo-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .photo-card h3 {
      margin: 15px;
      color: #e67e22;
    }

    .photo-card p {
      margin: 0 15px 20px;
      font-size: 14px;
      color: #666;
    }

    .btn {
      display: inline-block;
      margin-top: 30px;
      background-color: #e67e22;
      color: white;
      padding: 12px 30px;
      text-decoration: none;
      border-radius: 25px;
      font-weight: 600;
      margin: 15px 8px;
    }

    .btn:hover {
      background-color: #d35400;
    }
  </style>
</head>

<body>

  <header>📸 Photography & Videography</header>

  <div class="container">
    <h2>Capture Every Beautiful Moment</h2>
    <p>Our professional photographers and videographers ensure your wedding memories last forever — with creativity, precision, and love.</p>

    <div class="grid">
      <div class="photo-card">
        <img src="images/photography2.jpg" alt="Wedding Photography">
        <h3>Wedding Photography</h3>
        <p>Perfectly capturing your smiles, emotions, and timeless wedding moments.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="photo-card">
        <img src="images/photography3.jpg" alt="Candid Shots">
        <h3>Candid Moments</h3>
        <p>Natural and beautiful candid shots that reflect your true emotions.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>

      <div class="photo-card">
        <img src="images/drones.jpg" alt="Cinematic Video">
        <h3>Cinematic Videography</h3>
        <p>Beautifully edited videos that make your wedding look like a movie.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>


    <a href="wedding.php" class="btn" style="background-color:#555;">Back</a>
  </div>

</body>

</html>