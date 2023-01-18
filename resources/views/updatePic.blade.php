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
    <script>
        function unlock(){
            document.getElementById('add').removeAttribute("disabled");
        }
    </script>
<div>
    <div class="bg-primary min-vh-100 d-flex justify-content-center align-items-center w-100">
        <form method="post" enctype="multipart/form-data" class="w-50">
            {{csrf_field()}}
            <div class="w-100">
                <div class="rounded bg-support shadow px-4 py-3">
                    <div class="rounded-md bg-gray-100 px-6 py-4">
                        <p class="fw-semibold fs-2">Profile Picture</p>
                        <input type="file" onchange="unlock()" id="update-image" placeholder="update-image" class="insert-page-input" name="update-image">
                        <div class="d-flex justify-content-end mt-2">
                            <a href="/settings" class="bg-danger py-2 px-4 rounded border-0 mt-2 fs-5 fw-semibold me-2 text-decoration-none text-black" id="cancel">Cancel</a>
                            <button class="bg-secondary py-2 px-4 rounded border-0 mt-2 fs-5 fw-semibold" id="add" disabled>Update</button>
                        </div>
                        @if($errors->has('update-image'))
                        <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('update-image')}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
