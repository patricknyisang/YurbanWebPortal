<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yurban Web portal</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff; /* Changed to white */
        }

        /* Container for the login box */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        /* Login box styling */
        .login-box {
            background: rgba(255, 255, 255, 0.9); /* Slightly opaque white */
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            color: #333; /* Dark text color for better contrast */
        }

        /* Title styles */
        .login-box h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            color: #333; /* Dark title color */
        }

        /* Input group styling */
        .input-group {
            position: relative;
            margin-bottom: 30px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 15px;
            background: transparent;
            border: none;
            border-bottom: 2px solid rgba(51, 51, 51, 0.5);
            color: #333; /* Dark input text */
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-group label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 16px;
            color: rgba(51, 51, 51, 0.5);
            pointer-events: none;
            transition: all 0.3s;
        }

        .input-group input:focus + label,
        .input-group input:valid + label {
            top: 0;
            left: 0;
            font-size: 12px;
            color: #333; /* Dark label color */
        }

        .input-group input:focus {
            border-bottom-color: #3498db; /* Border color on focus */
        }

        /* Button styles */
        .btn {
            width: 100%;
            padding: 10px;
            background: #28a745; /* Green button */
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #218838; /* Darker green on hover */
        }

        /* Additional actions */
        .actions {
            margin-top: 20px;
            color: rgba(51, 51, 51, 0.7); /* Dark color for actions */
        }

        .actions a {
            color: #3498db;
            text-decoration: underline;
            font-weight: bold;
            transition: color 0.3s;
        }

        .actions a:hover {
            color: #2980b9;
        }

        /* Media query for responsiveness */
        @media (max-width: 768px) {
            .login-box {
                padding: 30px;
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="post" action="{{url('post_login')}}" enctype="multipart/form-data" class="registration-form">
            {{ csrf_field() }} 
                <div class="input-group">
                    <input type="number" name="username" required>
                    <label for="phonenumber">User Name</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="actions">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
