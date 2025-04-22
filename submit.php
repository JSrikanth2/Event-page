<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $category = htmlspecialchars($_POST['category']);
    $message = htmlspecialchars($_POST['message']);

    // Displaying confirmation message
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Submission Successful</title>
        <link rel='stylesheet' href='styles.css'>
        <style>
            body {
                background: linear-gradient(to right, #ff416c, #ff4b2b);
                text-align: center;
                color: white;
                padding: 50px;
                font-family: Arial, sans-serif;
            }
            .container {
                background: rgba(0, 0, 0, 0.7);
                padding: 30px;
                border-radius: 10px;
                max-width: 500px;
                margin: auto;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            }
            button {
                background: #ff416c;
                color: white;
                padding: 10px;
                border: none;
                cursor: pointer;
                transition: 0.3s;
                margin-top: 20px;
                border-radius: 5px;
            }
            button:hover {
                background: #ff4b2b;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Thank You, $name!</h1>
            <p>Your registration for the event has been received.</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Category:</strong> $category</p>
            <p><strong>Message:</strong> $message</p>
            <a href='index.html'><button>Back to Home</button></a>
        </div>
    </body>
    </html>";
} else {
    // Redirect to home if accessed incorrectly
    header("Location: index.html");
    exit();
}
?>
