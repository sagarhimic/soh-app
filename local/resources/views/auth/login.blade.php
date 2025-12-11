<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 30px 35px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .login-title {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #444;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background: #4A90E2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #357ABD;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #4A90E2;
            text-decoration: none;
        }

        .error-box {
            color: red;
            background: #ffe6e6;
            padding: 10px;
            border-left: 4px solid red;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-container">

    <h2 class="login-title">Login</h2>

    @if ($errors->any())
        <div class="error-box">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn-login">Login</button>
    </form>

    <p class="register-link">
        Don't have an account?
        <a href="{{ route('register') }}">Register</a>
    </p>

</div>

</body>
</html>
