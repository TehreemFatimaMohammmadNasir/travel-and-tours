<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #e8f5e9, #c8e6c9); /* Gradient background */
    padding: 20px;
}

h2 {
    text-align: center;
    color: #1b5e20; /* Darker green for header */
    margin-bottom: 20px;
}

h3 {
    color: #388e3c; /* Medium green for section titles */
    border-bottom: 2px solid #1b5e20;
    padding-bottom: 10px;
}

.form-container {
    background-color: #ffffff; /* White background for forms */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    transition: transform 0.3s, box-shadow 0.3s; /* Animation */
}

.form-container:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2); /* Enhanced shadow */
}

input, select, textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    box-sizing: border-box;
    border: 2px solid #388e3c; /* Dark green border */
    border-radius: 5px;
    transition: border-color 0.3s; /* Smooth border transition */
}

input:focus, select:focus, textarea:focus {
    border-color: #1b5e20; /* Darker green on focus */
    outline: none; /* Remove default outline */
}

button {
    padding: 12px 20px;
    background-color: #4caf50; /* Bright green button */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.2s; /* Animation */
}

button:hover {
    background-color: #388e3c; /* Darker green on hover */
    transform: translateY(-2px); /* Slight lift on hover */
}

.message {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.success {
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
}

.error {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
}

.warning {
    color: #856404;
    background-color: #fff3cd;
    border: 1px solid #ffeeba;
}

    </style>
</head>
<body>
    <h2>Expense Tracker</h2>
    
    <!-- Expense Logging Form -->
    <div class="form-container">
        <h3>Log an Expense</h3>
        <form action="tracker.php" method="POST">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" id="amount" name="amount" required>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes"></textarea>

            <input type="hidden" name="action" value="logExpense">
            <button type="submit">Log Expense</button>
        </form>
    </div>

    <!-- Budget Setup Form -->
    <div class="form-container">
        <h3>Set a Budget for Your Trip</h3>
        <form action="tracker.php" method="POST">
            <label for="tripName">Trip Name:</label>
            <input type="text" id="tripName" name="tripName" required>

            <label for="totalBudget">Total Budget:</label>
            <input type="number" step="0.01" id="totalBudget" name="totalBudget" required>

            <label for="accommodationBudget">Accommodation Budget:</label>
            <input type="number" step="0.01" id="accommodationBudget" name="accommodationBudget">

            <label for="foodBudget">Food Budget:</label>
            <input type="number" step="0.01" id="foodBudget" name="foodBudget">

            <label for="transportBudget">Transport Budget:</label>
            <input type="number" step="0.01" id="transportBudget" name="transportBudget">

            <label for="otherBudget">Other Budget:</label>
            <input type="number" step="0.01" id="otherBudget" name="otherBudget">

            <input type="hidden" name="action" value="setBudget">
            <button type="submit">Set Budget</button>
        </form>
    </div>

    <!-- Currency Conversion Form -->
    <div class="form-container">
        <h3>Convert Currency</h3>
        <form action="tracker.php" method="POST">
            <label for="convertAmount">Amount:</label>
            <input type="number" step="0.01" id="convertAmount" name="convertAmount" required>

            <label for="fromCurrency">From Currency:</label>
            <select id="fromCurrency" name="fromCurrency">
                <option value="USD">USD - US Dollar</option>
                <option value="EUR">EUR - Euro</option>
                <option value="GBP">GBP - British Pound</option>
                <option value="INR">INR - Indian Rupee</option>
                <!-- Add other currencies here -->
            </select>

            <label for="toCurrency">To Currency:</label>
            <select id="toCurrency" name="toCurrency">
                <option value="USD">USD - US Dollar</option>
                <option value="EUR">EUR - Euro</option>
                <option value="GBP">GBP - British Pound</option>
                <option value="INR">INR - Indian Rupee</option>
                <!-- Add other currencies here -->
            </select>

            <input type="hidden" name="action" value="convertCurrency">
            <button type="submit">Convert</button>
        </form>
    </div>
</body>
</html>
