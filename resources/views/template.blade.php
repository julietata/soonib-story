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
<div class="d-flex justify-content-center h-100 min-vh-100">
    <div class="bg-white w-25">
        <div class="w-100 py-2">
            <div class="justify-content-between px-3">
                <div class="d-flex align-items-center mb-3">
                    <a href="/">
                        <img src="{{asset('storage/assets/Soonib Story.png')}}" width="100" class="me-3">
                    </a>
                    <div class="d-flex fs-5 fw-semibold">
                        Hello, @if(auth()->check()) {{auth()->user()->name}} @else Guest @endif
                    </div>
                </div>
                <div class="d-flex flex-column">
                    @can('isLogin')
                        <a href="/createMessage" class="mx-2 d-flex align-items-center my-3 text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-circle-fill me-3" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>
                            <p class="m-0 text-primary fs-5 fw-semibold">Create Message</p>
                        </a>
                        <a href="/profile" class="mx-2 d-flex align-items-center my-3 text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-fill me-3" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <p class="m-0 text-primary fs-5 fw-semibold">Profile</p>
                        </a>
                        <a href="/notification" class="mx-2 d-flex align-items-center my-3 text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-bell-fill me-3" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                            </svg>
                            <p class="m-0 text-primary fs-5 fw-semibold">Notification</p>
                        </a>
                        <a href="/settings" class="mx-2 d-flex align-items-center my-3 text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-gear-fill me-3" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                            </svg>
                            <p class="m-0 text-primary fs-5 fw-semibold">Settings</p>
                        </a>
                        <a href="/trending" class="mx-2 d-flex align-items-center my-3 text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-award-fill me-3" viewBox="0 0 16 16">
                                <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
                                <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                              </svg>
                              <p class="m-0 text-primary fs-5 fw-semibold">Trending</p>
                        </a>
{{--                        <a href="/logout" class="position-relative bottom-0 mb-4 bg-primary text-white text-decoration-none py-2 px-3 fw-bold rounded mx-2">--}}
{{--                            Sign out--}}
{{--                        </a>--}}
                    @else
                        <a href="/login" class="bg-primary text-white text-decoration-none py-2 px-3 fw-bold rounded ms-3">
                            Sign in
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <div class="bg-primary w-75">
        @yield('content')
    </div>
</div>

{{--<footer class="bg-white p-3 d-flex justify-content-center align-items-center">--}}
{{--    <p class="text-primary fw-semibold m-0">--}}
{{--        &copy; 2022 All rights reserved.--}}
{{--    </p>--}}
{{--</footer>--}}
</body>
</html>
