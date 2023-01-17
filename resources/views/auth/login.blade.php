<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Soonib Story</title>
</head>
<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-support">
        <div class="bg-primary rounded w-75 shadow d-flex" id="container">
            <div class="w-50">
                <img src="{{asset('storage/assets/Soonib Story.png')}}" class="rounded-start h-100">
            </div>
            <div class="px-5 py-5 w-50">
                <div class="mb-5">
                    <h2 class="text-white text-center fs-1 fw-semibold">
                        Welcome Back!
                    </h2>
                    <p class="mt-2 text-white text-center">
                        We're so excited to see you again!
                    </p>
                </div>
                <form method="post">
                    {{csrf_field()}}
                    <div>
                        <div class="mb-3">
                            <label for="name" class="text-white me-3">Username</label>
                            <input type="text" name="name" id="name" placeholder="Username" required class="w-100 p-2 rounded">
                            @if($errors->has('name'))
                                <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('name')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="text-white me-3">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" required class="w-100 p-2 rounded">
                            @if($errors->has('password'))
                                <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('password')}}</div>
                            @endif
                        </div>
                        @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="text-danger fs-6 fw-light mb-3">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
                        @endif
                    </div>
                    <div class="mt-6">
                        <button id="logBtn" class="bg-secondary text-primary fw-bold fs-5 w-100 border-0 py-2 rounded mt-3">Login</button>
                        <p id="error" class="mt-3 text-center fs-5 text-danger fw-semibold"></p>
                        <p class="mt-3 text-center fs-6 text-white">
                            Need an account?
                            <a href="/register" class="fs-6 fw-semibold">
                                Register
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
