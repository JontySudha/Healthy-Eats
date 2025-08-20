<?php
include('header.php');
require 'functions.php';  // Ensure this path is correct

$users = getAllUsers();  // Fetch all users

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_user'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
       
    } elseif (isset($_POST['delete_user']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        deleteUser($id);
    }
    header("Location: users.php");  // Redirect to avoid form resubmission
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <style>
        /* Reset styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f9;
            color: #333;
        }
        /* Header styles */
        header {
            background: #4caf50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 20px;
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        /* Main container styles */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        /* Section heading styles */
        h2 {
            color: #4caf50;
            font-size: 1.8rem;
            margin-top: 0;
            margin-bottom: 20px;
        }
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
        /* Form styles */
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 1.1rem;
        }
        input[type="text"], input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin-bottom: 10px;
        }
        input[type="text"]:focus, input[type="email"]:focus {
            outline: none;
            border-color: #4caf50;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
            display: block;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        /* Delete button styles */
        .delete-form {
            display: inline-block;
        }
        .delete-form button {
            background-color: #f44336;
            margin-top: 0;
        }
        .delete-form button:hover {
            background-color: #cc372b;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin - Manage Users</h1>
    </header>
    <div class="container">
        <section>
            <h2>User List</h2>
            <table>
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                       
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                       
                        <td><?= htmlspecialchars($user['name']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['phone']) ?></td>
                      
                        <td>
                            <form class="delete-form" method="post">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
       
    </div>
</body>
</html>

<?php
include('footer.php');
?>