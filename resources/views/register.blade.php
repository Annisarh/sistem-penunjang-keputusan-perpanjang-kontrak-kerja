<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/css/auth.css') }}">
    <title>SPK | Register</title>
</head>
<body>
    <div class="login-wrapper">
        @include('alert.alert');
        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <h2>Register an account</h2>
            @error('nama')
                <span style="text-align: left">{{$message}}</span>
            @enderror
            <div class="input-field">
                <input type="text" name="nama" id="nama" value="{{@old('nama')}}" >
                <label for="nama">Enter your Name</label>
            </div>
            @error('email')
            <span style="text-align: left">{{$message}}</span>
            @enderror
            <div class="input-field">
                <input type="text" name="email" id="email" value="{{@old('email')}}" >
                <label for="email">Enter your Email</label>
            </div>
            @error('password')
            <span style="text-align: left">{{$message}}</span>
            @enderror
            <div class="input-field">
                <input type="password" name="password" id="password">
                <label for="password">Enter your Password</label>
            </div>
            <button type="submit">Sign Up</button>
            <div class="account-options">
                <p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>
