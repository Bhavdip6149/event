<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- ✅ Navbar Start -->
<style>
  :root {
    --color-primary: #1F2937;
    --color-accent: #059669;
    --color-highlight: #F59E0B;
    --color-bg-light: #F9FAFB;
    --color-text-dark: #1F2937;
    --color-text-mid: #4B5563;
  }

  /* Navbar Container */
  nav {
    width: 100%;
    background: var(--color-primary);
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  .nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 20px;
  }

  .logo {
    color: white;
    font-size: 32px;
    font-weight: 800;
    letter-spacing: -0.5px;
  }

  /* Menu Layout */
  .nav-menu {
    display: flex;
    list-style: none;
    align-items: center;
  }

  .nav-item {
    position: relative;
  }

  .nav-item>a {
    color: white;
    text-decoration: none;
    padding: 14px 15px;
    display: block;
    font-weight: 500;
    border-radius: 4px;
    transition: background 0.2s;
  }

  .nav-item>a:hover {
    background: rgba(255, 255, 255, 0.15);
  }

  /* Dropdown Menu */
  .dropdown {
    display: none;
    position: absolute;
    background: white;
    min-width: 180px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
    overflow: hidden;
    top: 100%;
    left: 0;
    z-index: 20;
  }

  .dropdown a {
    color: var(--color-text-dark);
    padding: 12px 18px;
    display: block;
    text-decoration: none;
    font-weight: 500;
    transition: background 0.2s;
  }

  .dropdown a:hover {
    background: #F0FFF4;
    color: var(--color-accent);
  }

  .nav-item:hover .dropdown {
    display: block;
  }

  /* Responsive Navbar */
  @media (max-width: 768px) {
    .nav-menu {
      flex-direction: column;
      background: var(--color-primary);
      position: absolute;
      top: 60px;
      left: 0;
      right: 0;
      display: none;
      text-align: center;
      padding: 20px 0;
    }

    .nav-menu.active {
      display: flex;
    }

    .nav-item>a {
      padding: 12px;
    }

    .menu-toggle {
      display: block;
      cursor: pointer;
      color: white;
      font-size: 24px;
    }
  }

  @media (min-width: 769px) {
    .menu-toggle {
      display: none;
    }
  }
</style>

<nav>
  <div class="nav-container">
    <div class="logo">EventHub</div>

    <!-- Mobile Toggle Button -->
    <div class="menu-toggle" onclick="toggleMenu()">☰</div>

    <ul class="nav-menu" id="navMenu">
      <li class="nav-item"><a href="index.php">Home</a></li>

      <li class="nav-item">
        <a href="#">Events ▼</a>
        <div class="dropdown">
          <a href="birthday.php">Birthday Party</a>
          <a href="wedding.php">Wedding</a>
          <a href="engagement.php">Engagement</a>
          <a href="seminar.php">Seminar</a>
        </div>
      </li>

      <li class="nav-item">
        <a href="#">Services ▼</a>
        <div class="dropdown">
          <a href="balloon.php">Balloon Decor</a>
          <a href="flower.php">Flower Decor</a>
          <a href="lighting.php">Light Decor</a>
        </div>
      </li>

      <li class="nav-item"><a href="index.php#about">About Us</a></li>
      <li class="nav-item"><a href="feedback.php">Feedback</a></li>
      <li class="nav-item"><a href="contactt.php">Contact</a></li>

      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
        <li class="nav-item"><a href="profile.php">👤 <?= htmlspecialchars($_SESSION['user_name']); ?></a></li>
        <li class="nav-item"><a href="logout.php" style="color:#F59E0B;">Logout</a></li>
      <?php else: ?>
        <li class="nav-item"><a href="login.php">Login</a></li>
        <li class="nav-item"><a href="register.php">Sign Up</a></li>
      <?php endif; ?>

      <li class="nav-item"><a href="admin_login.php">ADMIN LOGIN</a></li>
    </ul>
  </div>
</nav>

<script>
  // ✅ Mobile menu toggle
  function toggleMenu() {
    document.getElementById('navMenu').classList.toggle('active');
  }
</script>
<!-- ✅ Navbar End -->