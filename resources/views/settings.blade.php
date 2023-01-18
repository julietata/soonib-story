@extends('template')
@section('content')
<div class="p-5">
    <div class="d-flex align-items-center mb-4">
        <img src="storage/assets/{{\Illuminate\Support\Facades\Auth::user()->image}}" width="100" height="100" class="bi bi-person-fill me-3" viewBox="0 0 16 16" alt="">

        <div>
            <p class="fw-bold fs-2 ms-2 mb-0 text-white"> {{\Illuminate\Support\Facades\Auth::user()->name}}</p>
            <p class="fw-bold fs-2 ms-2 mb-0 text-white"> {{\Illuminate\Support\Facades\Auth::user()->gender}}</p>
        </div>
    </div>
    <p class="text-white fw-bold fs-2 d-flex align-items-center">Settings</p>
    @auth
    @if (auth()->check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
        <a href="/logout" class="mx-2 my-3 btn btn-danger">
            <p class="m-0 text-primary fs-5 fw-semibold">Logout</p>
        </a>
    @else
        <div class="d-flex w-100 flex-column bg-white border rounded my-3 m-2 px-0">
            <a href="/updatepic/{{\Illuminate\Support\Facades\Auth::user()->id}}" class="mx-2 d-flex align-items-center my-3 text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-image me-3" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                </svg>
                <p class="m-0 text-primary fs-5 fw-semibold">Add Profile Picture</p>
            </a>
        </div>
        <div class="d-flex w-100 flex-column bg-white border rounded my-3 m-2 px-0">
            <a href="/updateProfile/{{\Illuminate\Support\Facades\Auth::user()->id}}" class="mx-2 d-flex align-items-center my-3 text-decoration-none">

                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-file-person me-3" viewBox="0 0 16 16">
                    <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                <p class="m-0 text-primary fs-5 fw-semibold">Edit Profile</p>
            </a>
        </div>
        <a href="/logout" class="mx-2 my-3 btn btn-danger">
            <p class="m-0 text-primary fs-5 fw-semibold">Logout</p>
        </a>

    @endif
    @endauth

</div>

@endsection
