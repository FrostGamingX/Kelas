<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        .contact-form {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .contact-form button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .contact-form button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3">

        <div class="container d-flex justify-content-between align-items-center">
            <div class="menu">
                <a href="index.php" class="text-white me-3 text-decoration-none">Home</a>
                <a href="shop.php" class="text-white me-3 text-decoration-none">Shop</a>
                <a href="contact.php" class="text-white text-decoration-none">Contact</a>
            </div>
            <h1>Contact Us</h1>
            <div class="auth">
                <a href="register.php" class="text-white me-3 text-decoration-none">Register</a>
                <a href="login.php" class="text-white me-3 text-decoration-none">Login</a>
                <a href="cart.php" class="text-white text-decoration-none">Cart</a>
            </div>
        </div>
    </header>
    
    <main>
        <section class="contact-form">
            <h2>Get in Touch</h2>
            <form action="submit_contact.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
</body>
</html>
