@extends('template')
@section('content')
<div class="p-5">
    <div class="d-flex align-items-center mb-4">
        <img src="../storage/assets/{{\Illuminate\Support\Facades\Auth::user()->image}}" width="100" height="100" class="bi bi-person-fill me-3" viewBox="0 0 16 16" alt="">
        <div>
            <p class="fw-bold fs-2 ms-2 mb-0 text-white"> {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
            <p class="fw-bold fs-2 ms-2 mb-0 text-white"> {{\Illuminate\Support\Facades\Auth::user()->gender}}</p>
        </div>
    </div>
    <p class="text-white fw-bold fs-2 d-flex align-items-center">Update Profile</p>
    <form method="post">
        {{csrf_field()}}
        <div class="d-flex w-100 flex-column bg-white border rounded my-3 m-2 px-0">
            <label for="name" class="fw-bold text-black me-3 w-25 p-2">Username</label>
            <input type="text" name="name" id="name" placeholder="{{\Illuminate\Support\Facades\Auth::user()->name}}" class="w-100 p-2" required>
            @if($errors->has('name'))
                <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('name')}}</div>
            @endif
        </div>
        <div class="d-flex w-100 flex-column bg-white border rounded my-3 m-2 px-0">
            <label for="name" class="fw-bold text-black me-3 w-25 p-2">Email</label>
            <div class="w-100 p-2">
                {{\Illuminate\Support\Facades\Auth::user()->email}}
            </div>
        </div>
        <div class="d-flex w-100 flex-column bg-white border rounded my-3 m-2 px-0">
            <label for="password" class="fw-bold text-black me-3 w-25 p-2">New Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="w-100 p-2" required>
            @if($errors->has('password'))
                <div class="text-danger fs-6 fw-light mb-3">{{$errors->first('password')}}</div>
            @endif
        </div>
        <button id="regBtn" class="bg-secondary text-primary fw-bold w-100 border-0 py-2 rounded mt-3">Update</button>
    </form>
</div>

@endsection
