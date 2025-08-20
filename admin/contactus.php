<?php
include('header.php');

// Function to get contact requests
function getAllContactRequests() {
    global $con; // Access the global connection variable

    // Perform query to fetch contact requests
    $sql = "SELECT name, email, subject, message FROM contactrequests";
    $result = $con->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        $requests = [];
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
        return $requests;
    } else {
        return []; // Return an empty array if no results
    }
}

// Fetch all contact requests
$contactRequests = getAllContactRequests();

// Close the connection (optional)
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background: #4caf50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4caf50;
            margin-top: 0;
            font-size: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Form Submissions</h1>
    </header>
    <div class="container">
        <section>
            <h2>Recent Contact Form Submissions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contactRequests as $request): ?>
                    <tr>
                        <td><?= htmlspecialchars($request['name']) ?></td>
                        <td><?= htmlspecialchars($request['email']) ?></td>
                        <td><?= htmlspecialchars($request['subject']) ?></td>
                        <td><?= htmlspecialchars($request['message']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <br><br><br>
    </div>
</body>
</html>
<?php
include('footer.php');
?>
