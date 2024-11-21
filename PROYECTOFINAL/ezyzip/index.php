<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Viaje</title>
    <style>
  
/* General Body Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    background-color: #f7f8fa;
    box-sizing: border-box;
}

/* Header Styling */
header {
    width: 100%;
    background-color: white;
    padding: 20px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
}

.logo {
    font-size: 24px;
    font-weight: bold;
    color: #f77d0e;
}

/* Search Bar Styling */
.search-bar input[type="text"] {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 20px;
    width: 200px;
}

/* Navigation Links Styling */
.nav-links {
    list-style: none;
    display: flex;
    gap: 30px;
    margin: 0;
}

.nav-links li a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
}

/* Auth Buttons Styling */
.auth-buttons {
    display: flex;
    gap: 10px;
}

.auth-buttons .login,
.auth-buttons .signup {
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
}

.auth-buttons .login {
    background-color: #f9f9f9;
    color: #f77d0e;
    border: 1px solid #f77d0e;
}

.auth-buttons .signup {
    background-color: #f77d0e;
    color: white;
}

/* Hero Section Styling */
.hero {
    display: flex;
    padding: 60px 40px;
    align-items: center;
    background-color: #f7f8fa;
    gap: 40px;
}

.text-content h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
}

.text-content p {
    color: #666;
    line-height: 1.6;
    margin: 20px 0;
}

.btn-primary {
    background-color: #f77d0e;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.btn-secondary {
    background-color: white;
    color: #f77d0e;
    padding: 10px 20px;
    border: 1px solid #f77d0e;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 10px;
    font-weight: bold;
}

/* Images Section Styling */
.images {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 20px;
}

.images img {
    width: 150px;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
}

/* Form Search Bar Styling */
.search-bar {
    padding: 20px;
    background-color: white;
    margin: 20px auto;
    max-width: 800px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
}

.search-bar form {
    display: flex;
    gap: 20px;
    width: 100%;
}

.form-group {
    flex: 1;
    min-width: 150px;
}

.form-group label {
    display: block;
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.btn-search {
    background-color: #f77d0e;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    flex-shrink: 0;
}

/* Section Styling */
section {
    padding: 60px 40px;
    text-align: center;
    background-color: #f9f9f9;
}

/* Footer Styling */
footer {
    background-color: #222;
    color: #fff;
    padding: 40px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
}

.footer-content h4 {
    margin-top: 0;
}

.footer-content ul {
    list-style: none;
    padding: 0;
}

.footer-content ul li {
    margin: 5px 0;
}

.footer-content ul li a {
    color: #fff;
    text-decoration: none;
}

.footer-content .social-media li {
    display: inline;
    margin: 0 10px;
}

.footer-content .social-media li a {
    color: #fff;
    font-size: 1.2em;
}

/* Cards and Blog Posts Styling */
.testimonials-cards, .blog-posts {
    display: flex;
    justify-content: space-around;
    gap: 20px;
    flex-wrap: wrap;
}

.card, .post {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    max-width: 300px;
}

.card img, .post img {
    width: 100%;
    border-radius: 8px;
}

.btn {
    background-color: #ff7e1a;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
}

/* Newsletter Section Styling */
#newsletter form {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

#newsletter input[type="email"] {
    padding: 10px;
    width: 300px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

#newsletter button {
    padding: 10px 20px;
    background-color: #ff7e1a;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


    </style>
</head>
<body>

<header>
        <nav>
            <div class="logo">Tourista</div>
            <div class="search-bar">
                <input type="text" placeholder="Search bar">
            </div>
            <ul class="nav-links">
                <li><a href="#">Tours</a></li>
                <li><a href="#">Destinations</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <button class="login">Log In</button>
                <button class="signup">Sign Up</button>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="text-content">
            <h1>"Discover Your Next Adventure with Us"</h1>
            <p>Embark on an unforgettable journey with our Exceptional Global Tour Package, offering a seamless blend of luxury, adventure, and cultural immersion across the world’s most iconic destinations.</p>
            <button class="btn-primary">Book Now</button>
            <button class="btn-secondary">Learn More</button>
        </div>
        <div class="images">
            <!-- Placeholder images, use real images for a project -->
            <img src="image1.jpg" alt="Travel image 1">
            <img src="image2.jpg" alt="Travel image 2">
            <img src="image3.jpg" alt="Travel image 3">
            <img src="image4.jpg" alt="Travel image 4">
            <img src="image5.jpg" alt="Travel image 5">
        </div>
    </section>

    <section class="search-bar">
        <form>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" id="destination" placeholder="Country: America">
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" id="keywords" placeholder="Type your keywords">
            </div>
            <div class="form-group">
                <label for="checkin">Check In</label>
                <input type="date" id="checkin">
            </div>
            <div class="form-group">
                <label for="checkout">Check Out</label>
                <input type="date" id="checkout">
            </div>
            <button type="submit" class="btn-search">Search Now</button>
        </form>
    </section>


    <!-- Testimonials Section -->
    <section id="testimonials">
        <h2>Why Choose Us</h2>
        <div class="features">
            <p>Choose us for your travel needs because we offer personalized itineraries, unbeatable deals, and 24/7 customer support, ensuring a seamless and unforgettable journey every time.</p>
            <ul>
                <li>Thoughtfully selected experiences by our team.</li>
                <li>Different types of tour plans.</li>
                <li>Easy booking system.</li>
                <li>Payment return policy.</li>
                <li>Trusted by more than 50,000 users.</li>
            </ul>
            <a href="#" class="btn">Find Out More</a>
        </div>
        <h3>Testimonial</h3>
        <div class="testimonials-cards">
            <div class="card">
                <img src="user1.jpg" alt="Nusrat Jahan">
                <h4>Nusrat Jahan</h4>
                <p>Graphic Designer</p>
                <p>The travel website is user-friendly with smooth navigation and appealing visuals.</p>
                <p>Rating: ⭐⭐⭐⭐⭐</p>
            </div>
            <div class="card">
                <img src="user2.jpg" alt="Morsalin Ahmed">
                <h4>Morsalin Ahmed</h4>
                <p>Product Manager</p>
                <p>Unmatched support and fast loading times, perfect for quick recommendations.</p>
                <p>Rating: ⭐⭐⭐⭐⭐</p>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section id="newsletter">
        <h2>Get Special Offers in Your Inbox</h2>
        <form>
            <input type="email" placeholder="Submit your email" required>
            <button type="submit">Submit</button>
        </form>
    </section>

    <!-- Blog Section -->
    <section id="news">
        <h2>News and Blog</h2>
        <div class="blog-posts">
            <div class="post">
                <img src="blog1.jpg" alt="Off Road Travel Experiences">
                <h3>Off Road Travel Experiences</h3>
                <p>September 15, 2024</p>
            </div>
            <div class="post">
                <img src="blog2.jpg" alt="Unconventional Travel Escapes">
                <h3>Unconventional Travel Escapes and Hidden Adventures</h3>
                <p>August 22, 2024</p>
            </div>
            <div class="post">
                <img src="blog3.jpg" alt="Secret Trail Travel Adventures">
                <h3>Secret Trail Travel Adventures</h3>
                <p>October 5, 2024</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="about">
                <h3>Tourista</h3>
                <p>Tourista is a dynamic travel website designed to cater to the diverse needs of travelers across Asia, Europe, and America.</p>
                <ul class="social-media">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
            <div class="links">
                <h4>About us</h4>
                <ul>
                    <li><a href="#">Our story</a></li>
                    <li><a href="#">Travel Blog & Trips</a></li>
                    <li><a href="#">Working with us</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="support">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Privacy & Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="payment">
                <h4>Pay Safely With Us</h4>
                <p>The payment is encrypted and transmitted securely with an SSL protocol.</p>
                <img src="payment-icons.png" alt="Payment Methods">
            </div>
        </div>
        <p>&copy; 2024 Tourista. All rights reserved.</p>
    </footer>
</body>
</html>

        
    