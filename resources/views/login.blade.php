<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/css/auth.css') }}">
    <title>SPK | Login</title>
</head>
<body>
    @include('alert.alert')
    <div class="login-wrapper">
        <form action="{{route('login.proses')}}" method="POST">
            @csrf
            <h2>Login to Account</h2>
            <div class="input-field">
                <input type="email" name="email" id="email" value="{{@old('email')}}" required>
                <label for="email">Enter your Email</label>
            </div>
            @error('email')
                <span style="text-align: left">{{$message}}</span>
            @enderror
            <div class="input-field">
                <input type="password" name="password" id="password" required>
                <label for="password">Enter your Password</label>
            </div>
            @error('password')
                <span style="text-align: left">{{$message}}</span>
            @enderror
            <button type="submit">Sign In</button>
            <div class="account-options">
                <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>
