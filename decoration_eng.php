<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Decoration | Event Management</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #fff8f8;
      color: #333;
    }

    /* Header */
    .header {
      background: linear-gradient(90deg, #ff8a00, #e52e71);
      color: white;
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
      background: white;
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
      color: #ff5e57;
      margin-bottom: 10px;
    }

    .card-content p {
      font-size: 0.9em;
      color: #666;
      margin-bottom: 15px;
    }

    .btn {
      background: linear-gradient(90deg, #ff8a00, #e52e71);
      border: none;
      color: white;
      padding: 10px 25px;
      border-radius: 25px;
      cursor: pointer;
      transition: 0.3s;
      text-decoration: none;
      font-weight: 600;
      display: inline-block;
    }

    .btn:hover {
      opacity: 0.85;
    }

    /* Gallery section */
    .gallery {
      text-align: center;
      padding: 50px 20px;
    }

    .gallery h2 {
      font-size: 2em;
      margin-bottom: 20px;
      color: #e52e71;
    }

    .gallery-images {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 200px;
      max-width: 1100px;
      margin: auto;
    }

    .gallery-images img {
      width: 100%;
      border-radius: 15px;
      height: 400px;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .gallery-images img:hover {
      transform: scale(1.05);
    }

    /* Navigation Buttons */
    .nav-buttons {
      text-align: center;
      margin: 60px 0 40px;
    }

    .nav-buttons .btn {
      margin: 0 15px;
    }

  </style>
</head>
<body>

  <div class="header">
    <h1>✨ Decoration Services ✨</h1>
    <p>Transform your events with elegant and creative decor.</p>
  </div>

  <section class="services">
    <!-- Flower Decoration -->
    <div class="card">
      <img src="images/de1.jpg" alt="Flower Decoration">
      <div class="card-content">
        <h3>🌸 Flower Decoration</h3>
        <p>Elegant floral arrangements using fresh blossoms that create sweet, royal, and natural beauty for your wedding.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>

    <!-- Balloon Decoration -->
    <div class="card">
      <img src="images/de2.jpg" alt="Balloon Decoration">
      <div class="card-content">
        <h3>🎈 Balloon Decoration</h3>
        <p>Bring joy and festivity to your celebrations with vibrant balloon arches, backdrops, and theme displays full of fun energy.</p>
        <a href="book_event.php" class="btn">Book Now</a>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="gallery">
    <h2>Our Decoration Gallery</h2>
    <div class="gallery-images">
      <img src="images/de3.jpg" alt="Decoration Sample 1">
      <img src="images/de4.jpg" alt="Decoration Sample 2">
      <img src="images/de5.jpg" alt="Decoration Sample 3">
      <img src="images/de6.jpg" alt="Decoration Sample 4">
    </div>
  </section>

  <!-- Back and Next Buttons -->
  <div class="nav-buttons">
    <a href="engagement.php" class="btn"> ⬅Back</a>
    
  </div>

</body>
</html>