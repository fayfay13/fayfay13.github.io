<?php
// Initialize a flag for submission status
$success = false;
$error = false;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "nomsnicewindows1@gmail.com"; // <-- replace with your email
    $subject = "New Estimate Request";

    // Collect form data safely
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $service = htmlspecialchars($_POST["service"]);
    $message = htmlspecialchars($_POST["message"]);

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Address: $address\n";
    $body .= "Service: $service\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request an Estimate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            padding: 16px;        
            min-height: 120px;    
            resize: vertical;     
            font-size: 14px;     
            border-radius: 8px;  
            background-color: #f9f9f9; 
        }

        button {
            padding: 14px 20px;
            font-size: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.2s;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 6px;
        }
        .success { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Request an Estimate</h1>

        <?php if ($success): ?>
            <div class="message success">Thank you! Your request has been sent. We will get back to you as soon as possible!</div>
        <?php elseif ($error): ?>
            <div class="message error">Oops! Something went wrong. Please give us a call or email while we fix the problem.</div>
        <?php endif; ?>

        <!-- Show form only if not submitted successfully -->
        <?php if (!$success): ?>
        <form method="post" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Phone Number">
            <input type="text" name="address" placeholder="Address">
            <select name="service" required>
                <option value="">Select Service</option>
                <option value="Window Cleaning">Window Cleaning</option>
                <option value="Pressure Washing">Pressure Washing</option>
                <option value="Soft Washing">Soft Washing</option>
                <option value="Gutter Cleaning">Gutter Cleaning</option>
                <option value="Other">Other</option>
            </select>
            <textarea name="message" placeholder="Please list all specific details for this service" rows="8"></textarea>
            <button type="submit">Send Request</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>