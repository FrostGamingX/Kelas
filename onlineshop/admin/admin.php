<?php
// File admin.php adalah halaman utama untuk panel admin yang berisi link ke berbagai halaman pengelolaan
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #333;
    color: white;
    padding: 10px;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

h1 {
    margin-top: 0;
}

main {
    padding: 20px;
}

.admin-links ul {
    list-style-type: none;
    padding: 0;
}

.admin-links ul li {
    margin-bottom: 10px;
}

.admin-links ul li a {
    padding: 10px;
    background-color: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.admin-links ul li a:hover {
    background-color: #2980b9;
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: white;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="admin.php">Admin Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li> <!-- For logout -->
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Welcome to the Admin Panel</h2>
            <p>This is your control center. Choose any of the options below to manage your store.</p>
            <div class="admin-links">
                <ul>
                    <li><a href="add-product.php">Add New Product</a></li>
                    <br>
                    <li><a href="manage-users.php">Manage Registered Users</a></li>
                    <br>
                    <li><a href="manage-contact.php">View Messages from Contact Form</a></li>
                    <br>
                    <li><a href="add-category.php">Add Product Category</a></li>
                    <br>
                    <li><a href="add-payment-method.php">Add Payment Method</a></li>
                    <br>
                    <li><a href="update-banner.php">Update Website Banner</a></li>
                </ul>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
