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
if (isset($_GET['trip_id'])) {
    $trip_id = $_GET['trip_id'];
} else {
    // Handle the error, e.g., redirect or show an error message
    die("trip_id is not set.");
}

// Get trip ID
$trip_id = $_GET['trip_id'];

// Handle itinerary item creation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_item'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    $sql = "INSERT INTO itinerary_items (trip_id, category, description) VALUES ($trip_id, '$category', '$description')";
    $conn->query($sql);
}

// Handle item deletion
if (isset($_GET['delete_item'])) {
    $id = $_GET['delete_item'];
    $conn->query("DELETE FROM itinerary_items WHERE id=$id");
}

// Fetch itinerary items
$items = $conn->query("SELECT * FROM itinerary_items WHERE trip_id = $trip_id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itinerary Management</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #e8f5e9; /* Light green background */
    color: #2e7d32; /* Dark green text */
}

h1 {
    text-align: center;
    color: #1b5e20; /* Darker green for the title */
}

form {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
    background: #c8e6c9; /* Light green form background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

form select, form input, form button {
    margin: 0 10px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #2e7d32; /* Dark green border */
}

form button {
    background-color: #388e3c; /* Button background */
    color: white;
    border: none;
    cursor: pointer;
}

form button:hover {
    background-color: #1b5e20; /* Darker green on hover */
}

h2 {
    text-align: center;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    background: #ffffff; /* White background for items */
    margin: 5px 0;
    padding: 10px;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}

a {
    color: #d32f2f; /* Red color for delete link */
    text-decoration: none;
}

a:hover {
    text-decoration: underline; /* Underline on hover */
}

footer {
    text-align: center;
    margin-top: 20px;
}

    </style>
   
</head>
<body>

<h1>Itinerary for Trip</h1>

<form method="POST">
    <select name="category" required>
        <option value="Transport">Transport</option>
        <option value="Lodging">Lodging</option>
        <option value="Activities">Activities</option>
    </select>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit" name="add_item">Add Item</button>
</form>

<h2>Itinerary Items</h2>
<ul>
    <?php while($item = $items->fetch_assoc()): ?>
        <li>
            <?php echo $item['category'] . ": " . $item['description']; ?>
            <a href="?trip_id=<?php echo $trip_id; ?>&delete_item=<?php echo $item['id']; ?>">Delete</a>
        </li>
    <?php endwhile; ?>
</ul>

<a href="tripplanner.php">Back to Trips</a>

</body>
</html>