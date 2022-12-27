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
<div class="min-vh-100 bg-support d-flex align-items-center justify-content-center py-5 px-4">
    <div class="px-5 py-5 bg-primary rounded w-50" id="container">
        <div class="mb-5">
            <h2 class="text-white text-center fs-1 fw-semibold">
                Create an Account
            </h2>
        </div>
        <form method="post">
            {{csrf_field()}}
            <div>
                <div class="d-flex align-items-center mb-3">
                    <label for="name" class="text-white me-3 w-25">Username</label>
                    <input type="text" name="name" id="name" placeholder="Username" class="w-100 p-2" required>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <label class="text-white me-3 w-25">Gender</label>
                    <input type="radio" name="gender" id="male" value="male" required>
                    <label for="male" class="text-white mx-3">Male</label>
                    <input type="radio" name="gender" id="female" value="female" class="ml-4" required>
                    <label for="male" class="text-white mx-3">Female</label>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <label for="email" class="text-white me-3 w-25">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="w-100 p-2" required>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <label for="password" class="text-white me-3 w-25">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="w-100 p-2" required>
                </div>
            </div>
            <div class="mt-6">
                <button id="regBtn" class="bg-secondary text-primary fw-bold w-100 border-0 py-2 rounded mt-3">Register</button>
                <p id="error" class="mt-3 text-center fs-5 text-danger fw-semibold"></p>
                <p class="mt-3 text-center fs-6 text-white">
                    Already Have an Account?
                    <a href="/login" class="fs-6 fw-semibold">
                        Login
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
</body>
</html>
