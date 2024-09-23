<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo '<style>
    body { font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4; }
    .message { padding: 10px; margin-bottom: 10px; border-radius: 5px; }
    .success { color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; }
    .error { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; }
    .warning { color: #856404; background-color: #fff3cd; border: 1px solid #ffeeba; }
</style>';

$host = 'localhost';
$db = 'expense_tracker';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<div class="message success">Connected successfully</div>';
} catch(PDOException $e) {
    echo '<div class="message error">Connection failed: ' . $e->getMessage() . '</div>';
}

// Log Expense
if ($_POST['action'] == 'logExpense') {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $notes = $_POST['notes'];
    $userId = 1; // Assume user ID 1 for now.

    $stmt = $conn->prepare("INSERT INTO expenses (amount, category, date, notes, user_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$amount, $category, $date, $notes, $userId]);
    echo '<div class="message success">Expense logged successfully.</div>';
}

// Set Budget
if ($_POST['action'] == 'setBudget') {
    $tripName = $_POST['tripName'];
    $totalBudget = $_POST['totalBudget'];
    $accommodationBudget = $_POST['accommodationBudget'];
    $foodBudget = $_POST['foodBudget'];
    $transportBudget = $_POST['transportBudget'];
    $otherBudget = $_POST['otherBudget'];
    $userId = 1; // Assume user ID 1 for now.

    $stmt = $conn->prepare("INSERT INTO budgets (trip_name, total_budget, accommodation_budget, food_budget, transport_budget, other_budget, user_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$tripName, $totalBudget, $accommodationBudget, $foodBudget, $transportBudget, $otherBudget, $userId]);
    echo '<div class="message success">Budget set successfully for the trip: ' . $tripName . '</div>';
}

// Currency Conversion
// Currency Conversion
if ($_POST['action'] == 'convertCurrency') {
    $convertAmount = $_POST['convertAmount'];
    $fromCurrency = strtoupper(trim($_POST['fromCurrency'])); // Convert to uppercase to match database entries
    $toCurrency = strtoupper(trim($_POST['toCurrency'])); // Convert to uppercase

    // Prepare and execute query to fetch exchange rate for fromCurrency
    $stmt = $conn->prepare("SELECT exchange_rate FROM currency WHERE UPPER(currency_code) = ?");
    $stmt->execute([$fromCurrency]);
    $fromRate = $stmt->fetchColumn();

    // Prepare and execute query to fetch exchange rate for toCurrency
    $stmt = $conn->prepare("SELECT exchange_rate FROM currency WHERE UPPER(currency_code) = ?");
    $stmt->execute([$toCurrency]);
    $toRate = $stmt->fetchColumn();

    // Check if both rates are available
    if ($fromRate && $toRate) {
        $convertedAmount = $convertAmount * ($toRate / $fromRate);
        echo '<div class="message success">Converted Amount: ' . $convertedAmount . ' ' . $toCurrency . '</div>';
    } else {
        // Provide detailed feedback
        echo '<div class="message error">Currency conversion failed. Please check that the currency codes are correct and available in the database.</div>';
    }
}

