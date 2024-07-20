<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @if ($errors->has('name'))
                        <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="form-group mt-4">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @if ($errors->has('email'))
                        <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                    @if ($errors->has('password'))
                        <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="form-group mt-4">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                    @if ($errors->has('password_confirmation'))
                        <div class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <div class="form-footer mt-4">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
