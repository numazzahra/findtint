<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['full_name'])) {
    $_SESSION['full_name'] = 'User';
}
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = 'user@example.com';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FindTint - Your Perfect Makeup Match</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Argent+CF:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #e91e63;
            --primary-dark: #c2185b;
            --primary-light: #f8bbd9;
            --secondary: #ff6090;
            --text: #2d2d2d;
            --text-light: #666;
            --background: #fff5f7;
            --white: #ffffff;
            --gray-light: #f9f9f9;
            --gray: #e0e0e0;
            --shadow: 0 8px 32px rgba(233, 30, 99, 0.15);
            --radius: 16px;
        }

        body {
            background: linear-gradient(135deg, #ffeef8 0%, #fff5f7 100%);
            min-height: 100vh;
            color: var(--text);
            line-height: 1.6;
        }

        /* Header */
        header {
            background: var(--white);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 32px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            font-family: "Argent CF", serif;
            font-style: italic;
        }

        .logo span {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: "Argent CF", serif;
            font-style: italic;
        }

        .logo i {
            font-family: "Font Awesome 6 Free";
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text);
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .user-profile:hover {
            background: var(--gray-light);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
        }

        .user-status {
            font-size: 12px;
            color: var(--text-light);
        }

        .dropdown-menu {
            position: absolute;
            top: 80px;
            right: 5%;
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 15px 0;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .dropdown-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--text);
            transition: all 0.3s ease;
        }

        .dropdown-menu a:hover {
            background: var(--gray-light);
            color: var(--primary);
        }

        .btn {
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 15px;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 30, 99, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 30, 99, 0.4);
        }

        /* Hero Section */
        .hero {
            padding: 100px 5%;
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .hero-content {
            flex: 1;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .hero h1 {
            font-size: 56px;
            line-height: 1.2;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: var(--text-light);
            margin-bottom: 40px;
            max-width: 500px;
        }

        /* Categories Section */
        .categories {
            padding: 100px 5%;
            background: linear-gradient(135deg, #ffeef8 0%, #fff5f7 100%);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 40px;
            margin-bottom: 15px;
            color: var(--text);
        }

        .section-header p {
            font-size: 18px;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .category-card {
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(233, 30, 99, 0.15);
        }

        .category-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .category-content {
            padding: 30px;
        }

        .category-content h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: var(--text);
        }

        .category-content p {
            color: var(--text-light);
            margin-bottom: 20px;
        }

        /* Testimonials */
        .testimonials {
            padding: 100px 5%;
            background: var(--white);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: var(--white);
            padding: 30px;
            border-radius: var(--radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .testimonial-content {
            font-style: italic;
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .author-info h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .author-info p {
            font-size: 14px;
            color: var(--text-light);
        }

        /* CTA Section */
        .cta {
            padding: 100px 5%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
        }

        .cta h2 {
            font-size: 40px;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 18px;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
        }

        .cta .btn {
            background: white;
            color: var(--primary);
            font-weight: 700;
        }

        .cta .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        footer {
            background: var(--text);
            color: white;
            padding: 60px 5% 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto 40px;
        }

        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 25px;
            position: relative;
        }

        .footer-column h3::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--primary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #ccc;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 20px;
            }

            .nav-links {
                gap: 20px;
            }

            .hero h1 {
                font-size: 40px;
            }

            .section-header h2 {
                font-size: 32px;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .nav-links {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .hero h1 {
                font-size: 32px;
            }

            .btn {
                width: 100%;
                max-width: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <a href="#" class="logo">
                💄
                <span>FindTint</span>
            </a>

            <div class="nav-links">
                <a href="#" onclick="scrollToSection('hero')">Home</a>
                <a href="#" onclick="scrollToSection('categories')">Categories</a>
                <a href="#" onclick="scrollToSection('testimonials')">Testimonials</a>
                <a href="#" onclick="scrollToSection('footer')">About</a>
            </div>

            <div class="nav-actions" id="navActions">
                <!-- User profile will be shown when user is logged in -->
                <div id="userActions">
                    <div class="user-profile" id="userProfile">
                        <div class="user-avatar" id="userAvatar">
                            <?= strtoupper(substr($_SESSION['full_name'], 0, 1)) ?>
                        </div>
                        <div class="user-info">
                            <div class="user-name" id="full_name">
                                <?= htmlspecialchars($_SESSION['full_name']) ?>
                            </div>
                            <div class="user-status">Online</div>
                        </div>
                        <i class="fas fa-chevron-down" style="font-size: 12px; margin-left: 5px"></i>
                    </div>

                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="#">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="#">
                            <i class="fas fa-heart"></i>
                            <span>My Favorites</span>
                        </a>
                        <a href="#">
                            <i class="fas fa-history"></i>
                            <span>Recommendation History</span>
                        </a>
                        <a href="#" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="hero-content">
            <h1>Find Your Perfect Makeup Match</h1>
            <p>
                Discover the ideal foundation, lipstick, and blush shades that
                complement your unique skin tone with our AI-powered recommendation
                engine.
            </p>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80"
                alt="Makeup Products" />
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <div class="section-header">
            <h2>Find Your Perfect Match</h2>
            <p>
                Explore our categories to find the ideal products for your unique
                features
            </p>
        </div>

        <div class="categories-grid">
            <div class="category-card">
                <div class="category-image" style="
              background-image: url('https://images.unsplash.com/photo-1571781926291-c477ebfd024b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            "></div>
                <div class="category-content">
                    <h3>Foundation & Concealer</h3>
                    <p>
                        Find your perfect base match with our advanced skin tone analysis
                        technology.
                    </p>
                    <button class="btn btn-outline" onclick="navigateToCategory('foundation.html')">
                        Explore
                    </button>
                </div>
            </div>

            <div class="category-card">
                <div class="category-image" style="
              background-image: url('https://images.unsplash.com/photo-1586495777744-4413f21062fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            "></div>
                <div class="category-content">
                    <h3>Lip Products</h3>
                    <p>
                        Discover lipsticks, glosses, and stains that complement your
                        skin's undertones.
                    </p>
                    <button class="btn btn-outline" onclick="navigateToCategory('lip.html')">
                        Explore
                    </button>
                </div>
            </div>

            <div class="category-card">
                <div class="category-image" style="
              background-image: url('https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            "></div>
                <div class="category-content">
                    <h3>Blush</h3>
                    <p>
                        Get personalized recommendations for cheek products that enhance
                        your natural glow.
                    </p>
                    <button class="btn btn-outline" onclick="navigateToCategory('blush.html')">
                        Explore
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="section-header">
            <h2>What Our Users Say</h2>
            <p>
                Discover how FindTint has transformed the makeup shopping experience
            </p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    "I've always struggled to find foundation that matches my olive
                    undertones. FindTint recommended three perfect matches based on my
                    previous purchases!"
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">S</div>
                    <div class="author-info">
                        <h4>Sarah Johnson</h4>
                        <p>Beauty Enthusiast</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-content">
                    "As someone new to makeup, FindTint made the process so much less
                    intimidating. The recommendations based on my few existing products
                    were spot on!"
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">M</div>
                    <div class="author-info">
                        <h4>Maya Rodriguez</h4>
                        <p>Makeup Beginner</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-content">
                    "I've saved so much money by not buying products that don't work for
                    me. FindTint's recommendations based on my product history are
                    incredibly accurate!"
                </div>
                <div class="testimonial-author">
                    <div class="author-avatar">J</div>
                    <div class="author-info">
                        <h4>Jessica Lee</h4>
                        <p>Makeup Artist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <h2>Ready to Find Your Perfect Match?</h2>
        <p>
            Join thousands of users who have discovered their ideal makeup shades
            with FindTint
        </p>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3>FindTint</h3>
                <p>
                    Your personal makeup matchmaker. Find the perfect shades for your
                    unique skin tone.
                </p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-column">
                <h3>Categories</h3>
                <ul class="footer-links">
                    <li><a href="foundation.html">Foundation</a></li>
                    <li><a href="lip.html">Lipstick</a></li>
                    <li><a href="blush.html">Blush</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Company</h3>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Support</h3>
                <ul class="footer-links">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 FindTint. All rights reserved.</p>
        </div>
    </footer>

    <script>

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = 'logout.php';
            }
        }

        // Fungsi untuk navigasi ke kategori
        function navigateToCategory(page) {
            window.location.href = page;
        }

        // Fungsi untuk scroll ke section tertentu
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: "smooth" });
            }
        }

        // Dropdown menu functionality
        document.addEventListener("DOMContentLoaded", function () {
            const userProfile = document.getElementById("userProfile");
            const dropdownMenu = document.getElementById("dropdownMenu");

            if (userProfile && dropdownMenu) {
                userProfile.addEventListener("click", function (e) {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle("active");
                });

                // Close dropdown when clicking outside
                document.addEventListener("click", function () {
                    dropdownMenu.classList.remove("active");
                });
            }
        });

        // Navbar scroll effect
        window.addEventListener("scroll", function () {
            const header = document.querySelector("header");
            if (header) {
                if (window.scrollY > 50) {
                    header.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.1)";
                } else {
                    header.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.08)";
                }
            }
        });
    </script>
</body>

</html>