<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
    max-width: 1200px;
    margin: 0 auto;
    background: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

main section {
    margin-bottom: 20px;
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

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table thead tr {
    background-color: #3498db;
    color: white;
    text-align: left;
    font-weight: bold;
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Button Styles */
button {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.edit-btn {
    background-color: #2ecc71;
    color: white;
}

.edit-btn:hover {
    background-color: #27ae60;
}

.delete-btn {
    background-color: #e74c3c;
    color: white;
}

.delete-btn:hover {
    background-color: #c0392b;
}

/* Responsive Styles */
@media (max-width: 768px) {
    table, thead, tbody, th, td, tr {
        display: block;
    }

    table tr {
        margin-bottom: 15px;
    }

    table td {
        padding: 10px;
        text-align: right;
        position: relative;
    }

    table td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: bold;
        text-align: left;
    }

    header nav ul {
        flex-direction: column;
    }
}

    </style>
</head>
<body>
    <header>
        <h1>Manage Users</h1>
        <nav>
            <ul>
                <li><a href="admin.php">Admin Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>User List</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data pengguna akan dimuat secara dinamis dari database -->
                    <tr>
                        <td>1</td>
                        <td>user1</td>
                        <td>user1@example.com</td>
                        <td>Admin</td>
                        <td>
                            <button class="edit-btn" onclick="editUser(1)">Edit</button>
                            <button class="delete-btn" onclick="deleteUser(1)">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>user2</td>
                        <td>user2@example.com</td>
                        <td>User</td>
                        <td>
                            <button class="edit-btn" onclick="editUser(2)">Edit</button>
                            <button class="delete-btn" onclick="deleteUser(2)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Your Company. All rights reserved.</p>
    </footer>

    <script>
        // Placeholder for edit user action
        function editUser(userId) {
            alert("Edit user with ID: " + userId);
            // Redirect to edit-user.html or handle via modal
        }

        // Placeholder for delete user action
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                alert("User with ID: " + userId + " deleted.");
                // Handle delete user logic here, e.g., send request to backend
            }
        }
    </script>
</body>
</html>
