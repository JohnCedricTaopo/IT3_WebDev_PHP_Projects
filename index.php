<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding Page - Junior Software Engineer</title>
    <style>
  
        body {
            background-color: #f4f7f6; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            background-color: white; 
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); 
            width: 400px;
            text-align: center;
        }

        .tech-stack {
            text-align: left;
            display: inline-block;
            margin: 15px 0;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .system-info {
            background-color: #f8f9fa;
            border-top: 2px solid #dee2e6;
            padding-top: 15px;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Junior Software Engineer</h1>
        <p><strong>Name:</strong> John Cedric Taopo</p>
        <p><em>"Ready to learn PHP and MySQL this semester!"</em></p>

        <div class="tech-stack">
            <strong>Technical Skills:</strong>
            <ul>
                <li>HTML5 & CSS3</li>
                <li>JavaScript (Basics)</li>
                <li>XAMPP Environment</li>
            </ul>
        </div>

        <div>
            <button id="initialize-btn">Initialize System</button>
        </div>

        <div class="system-info">
            <h3>Server Status: Online</h3>
            <p><strong>Date & Time:</strong> <?php echo date('F j, Y, g:i a'); ?></p>
            <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
        </div>
    </div>

    <script>
        document.getElementById('initialize-btn').addEventListener('click', function() {
            alert("Welcome to the team! System initialized.");
        });
    </script>

</body>
</html>