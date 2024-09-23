<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tripmanager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle trip creation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_trip'])) {
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO trips (destination, start_date, end_date) VALUES ('$destination', '$start_date', '$end_date')";
    $conn->query($sql);
}

// Handle trip deletion
if (isset($_GET['delete_trip'])) {
    $id = $_GET['delete_trip'];
    $conn->query("DELETE FROM trips WHERE id=$id");
}

// Fetch all trips
$trips = $conn->query("SELECT * FROM trips");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9;
            color: #2e7d32;
            margin: 0;
            padding: 20px;
        }
        
        h1, h2 {
            color: #1b5e20;
        }

        form {
            background-color: #c8e6c9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="date"],
        button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #1b5e20;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #388e3c;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2e7d32;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #c8e6c9;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }

        a {
            color: #1b5e20;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Trip Manager</h1>

<h2>Create New Trip</h2>
<form method="POST">
    <input type="text" name="destination" placeholder="Destination" required>
    <input type="date" name="start_date" required>
    <input type="date" name="end_date" required>
    <button type="submit" name="create_trip">Create Trip</button>
</form>

<h2>Your Trips</h2>
<ul>
    <?php while($trip = $trips->fetch_assoc()): ?>
        <li>
            <?php echo $trip['destination'] . " (" . $trip['start_date'] . " to " . $trip['end_date'] . ")"; ?>
            <div>
                <a href="?delete_trip=<?php echo $trip['id']; ?>">Delete</a>
                <a href="itinerary.php?trip_id=<?php echo $trip['id']; ?>">Manage Itinerary</a>
            </div>
        </li>
    <?php endwhile; ?>
</ul>

</body>
</html>
