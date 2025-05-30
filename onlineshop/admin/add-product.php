<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
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

header nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

header nav ul li {
    margin: 0 10px;
}

header nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

main {
    padding: 20px;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input, textarea, select, button {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #3498db;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
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
        <h1>Add New Product</h1>
        <nav>
            <ul>
            <li><a href="admin.php">Admin Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li> <!-- For logout -->
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Product Details</h2>
            <form action="add-product.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product_name" placeholder="Enter product name" required>
                </div>

                <div class="form-group">
                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" name="product_image" required>
                </div>

                <div class="form-group">
                    <label for="product-price">Price (Rp):</label>
                    <input type="number" id="product-price" name="product_price" step="0.01" placeholder="Enter product price" required>
                </div>

                <div class="form-group">
                    <label for="product-description">Description:</label>
                    <textarea id="product-description" name="product_description" rows="4" placeholder="Enter product description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="product-stock">Stock:</label>
                    <input type="number" id="product-stock" name="product_stock" placeholder="Enter product stock" required>
                </div>

                <div class="form-group">
                    <label for="product-category">Category:</label>
                    <select id="product-category" name="product_category" required>
                        <option value="" disabled selected>Select a category</option>
                        <!-- Dynamically populated from database in the PHP file -->
                    </select>
                </div>

                <button type="submit">Add Product</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
