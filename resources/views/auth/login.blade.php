<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-center h-100">
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="container align-content-center p-5 h-100">
        <main class="form-signin mx-auto mt-4 col-md-4 h-100 loginDiv">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img class="w-50 h-50 mb-3" src="img/logo.png" alt="">
                <h1 class="h3 mb-3 fw-normal">Please log in</h1>
                <div class="form-floating">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-floating">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label mb-3 " for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </form>
        </main>
    </div>

</body>
</html>
