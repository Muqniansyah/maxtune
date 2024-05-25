<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .dashboard {
            display: flex;
            flex-wrap: wrap;
        }

        .box {
            flex: 1;
            margin: 10px;
            padding: 20px;
            text-align: center;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .box h2 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="box">
            <h2>Login</h2>
        </div>
        <div class="box">
            <h2>Forms</h2>
        </div>
        <div class="box">
            <h2>Contact</h2>
        </div>
        <div class="box">
            <h2>Subscribe</h2>
        </div>
    </div>
</body>
</html>