<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

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

        .register-container {
            background: #fff;
            padding: 30px 35px;
            border-radius: 10px;
            width: 380px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .register-title {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #444;
        }

        input[type="text"],
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

        .btn-register {
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

        .btn-register:hover {
            background: #357ABD;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
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

<div class="register-container">

    <h2 class="register-title">Create Account</h2>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit" class="btn-register">Register</button>
    </form>

    <p class="login-link">
        Already have an account? <a href="{{ route('login') }}">Login</a>
    </p>

</div>

</body>
</html>
