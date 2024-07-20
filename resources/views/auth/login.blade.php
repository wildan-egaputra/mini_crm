<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7a7a7a;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.297);
            width: 100%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            color: white; /* Menjadikan semua teks dalam form berwarna putih */
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: white;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: white;
            text-align: left;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ffffff4a;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: rgba(245, 245, 245, 0.279);
            color: white; /* Menjadikan teks dalam input berwarna putih */
        }

        .form-container input[type="checkbox"] {
            margin-right: 10px;
        }

        .form-container .remember-me {
            display: flex;
            align-items: center;
            justify-content: left;
            margin-bottom: 10px;
            color: white;
        }

        .form-container .forgot-password {
            color: #007BFF;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }

        .form-container .forgot-password:hover {
            text-decoration: underline;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #dc8000;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s linear;
        }

        .form-container button:hover {
            background-color: #885000;
        }

        .form-container .email {
            color: white;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Login</h2>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="email">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <button type="submit">Log In</button>
        </form>
    </div>

</body>
</html>
