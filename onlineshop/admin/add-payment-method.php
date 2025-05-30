<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment Method</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #333;
    color: white;
    padding: 15px 20px;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 24px;
}

header nav ul {
    list-style: none;
    padding: 0;
    margin: 10px 0 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}

header nav ul li {
    margin: 0;
}

header nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s;
}

header nav ul li a:hover {
    color: #3498db;
}

main {
    padding: 20px;
    max-width: 800px;
    margin: 20px auto;
    background: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    font-size: 22px;
    color: #333;
    border-bottom: 2px solid #3498db;
    padding-bottom: 5px;
    margin-bottom: 20px;
}

footer {
    text-align: center;
    padding: 15px 20px;
    background-color: #333;
    color: white;
    margin-top: 20px;
}

/* Form Styles */
.form-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    resize: none;
}

input[type="text"]:focus, textarea:focus {
    border-color: #3498db;
    outline: none;
}

textarea {
    resize: vertical;
}

.submit-btn {
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background-color: #2980b9;
}

/* Responsive Styles */
@media (max-width: 768px) {
    main {
        padding: 15px;
    }

    header nav ul {
        flex-direction: column;
    }
}

    </style>
</head>
<body>
    <header>
        <h1>Add Payment Method</h1>
        <nav>
            <ul>
                <li><a href="admin.php">Admin Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Add New Payment Method</h2>
            <form action="process-add-payment.php" method="POST" class="form-container">
                <div class="form-group">
                    <label for="payment-name">Payment Method Name:</label>
                    <input type="text" id="payment-name" name="payment_name" placeholder="Enter payment method name" required>
                </div>
                <div class="form-group">
                    <label for="payment-details">Payment Details:</label>
                    <textarea id="payment-details" name="payment_details" placeholder="Enter payment details (e.g., bank account, instructions)" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-btn">Add Payment Method</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
