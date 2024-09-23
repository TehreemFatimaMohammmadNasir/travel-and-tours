<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Guide</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        header {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 1rem;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        .hero {
            background-color: #A8E6CF; /* Light Green */
            padding: 4rem 1rem;
            text-align: center;
            border-bottom: 4px solid #4CAF50;
            width: 100%;
            max-width: 800px;
        }
        .section {
            padding: 2rem;
            margin: 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }
        button {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1rem;
        }
        button:hover {
            background-color: #388E3C; /* Darker Green */
        }
        footer {
            background-color: #4CAF50; /* Green */
            color: white;
            text-align: center;
            padding: 1rem;
            width: 100%;
            position: relative;
            margin-top: auto;
        }
        input[type="email"] {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(100% - 12px);
            max-width: 400px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<header>
    <h1>Travel Guide</h1>
</header>


<section class="section">
    <h2>Destination Highlights</h2>
    <p><strong>Destination 1:</strong> A beautiful place to visit.</p>
    <p><strong>Destination 2:</strong> A must-see for travelers.</p>
    <p><strong>Destination 3:</strong> Perfect for your next getaway.</p>
</section>

<section class="section">
    <h2>Essential Travel Tips</h2>
    <ul>
        <li>Packing essentials</li>
        <li>Learn local customs</li>
        <li>Stay safe while traveling</li>
    </ul>
</section>

<section class="section">
    <h2>Stay Updated</h2>
    <p>Sign up for travel tips and news:</p>
    <input type="email" placeholder="Enter your email" required>
    <button>Subscribe</button>
</section>

<footer>
    <p>Contact: info@yourwebsite.com | Phone: (123) 456-7890</p>
</footer>

</body>
</html>
