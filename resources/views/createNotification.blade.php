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
<div class="bg-primary min-vh-100 d-flex justify-content-center align-items-center w-100">
    <form action="/createNotification" method="post" class="w-50">
        @csrf
        <div class="w-100">
            <div class="rounded bg-support shadow px-4 py-3">
                <div class="rounded-md bg-gray-100 px-6 py-4">
                    <p class="fw-semibold fs-2">Notification</p>
                    <textarea name="notification" id="notification" cols="65" rows="3" class="border rounded px-2 py-2 w-100 mb-2 @error('notification') is-invalid @enderror" placeholder="Notification"></textarea>
                    @error('notification')
                    <p class="text-danger">
                        {{$message}}
                    </p>
                    @enderror

                    <div class="d-flex justify-content-end mt-2">
                        <a href="/notification" class="bg-danger py-2 px-4 rounded border-0 mt-2 fs-5 fw-semibold me-2 text-decoration-none text-black" id="cancel">Cancel</a>
                        <button class="bg-secondary py-2 px-4 rounded border-0 mt-2 fs-5 fw-semibold" id="add">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
