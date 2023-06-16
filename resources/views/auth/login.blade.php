<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel Login | Scripter</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin_login.css') }}">
</head>

<body>
    <div class="workSpace">
        <div class="avatar" style="background: white;">
            <div id="infinity-round">
                <img src="{{asset('assets/imgs/scripter.jpg')}}" style="margin-top: 10px; height: 90px; border-radius: 50%;" alt="">
            </div>
        </div>
        
        <div class="left">
            <img class="img-fluid" src="{{asset('assets/imgs/scripter.jpg')}}" alt="">
            <h1 class="logo">Welcome to Scripter</h1>
            <p>Ready To Changes
            </p>
        </div>
        <div class="right">
            <form action="{{ route('login') }}" id="" method="post">
                @csrf
{{-- 
                <div class="form-group row">
                    <div class="col-md-6 offset-md-3">
                        <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">Login with Google</a>
                        <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">Login with Facebook</a>
                        <a href="{{ route('login.github') }}" class="btn btn-dark btn-block">Login with Github</a>
                    </div>
                </div>

                <p style="text-align: center">OR</p> --}}
                <h1>SignIn</h1>
                <p class="invalid-feedback" role="alert">
                    <strong id="Message"></strong>
                </p>
                @error('error')
                  <p class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </p>
               @enderror
                @error('email')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                @error('password')
                <p class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </p>
                @enderror
                <input class="input" type="text" placeholder="Enter unique id" name="unique_id" value="{{ old('unique_id') }}"
                    required autocomplete="off">
                <input class="input" name="password" type="password" placeholder="Enter your password" required
                    autocomplete="off">
                <div class="login-btn-box">
                    <button class="submit">Log In</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('admin-assets/js/app.min.js')}}"></script> 

    <script>
        $(document).ready(function(){
            @if(Session::has('5fernsadminerror'))
               
                $('#Message').html("{{ Session::get('5fernsadminerror') }}");
            @elseif(Session::has('5fernsadminsuccess'))
                $('#Message').html("{{ Session::get('5fernsadminsuccess') }}");
            @endif
            });

    </script>
</body>

</html>