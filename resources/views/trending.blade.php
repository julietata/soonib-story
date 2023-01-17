@extends('template')
@section('content')
@foreach($count as $c)
<div class="d-flex w-100 flex-column bg-white border rounded my-3 m-2 px-0">
    <div class="d-flex align-items-center px-3 pt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
        @if($c->anonymous == false)
                <p class="text-primary fw-semibold fs-5 m-0">{{$c->message->user->name}}, {{$c->message->user->gender}}</p>
        @else
                <p class="text-primary fw-semibold fs-5 m-0">Anonymous, {{$c->message->user->gender}}</p>
        @endif
    </div>
    <p class="text-primary mt-3 fs-5 px-3 flex-grow-1">{{$c->message->content}}</p>
    <div class="d-flex justify-content-end">
        <p class="fs-6 text-dark mt-2 px-3">{{$c->message->timestamp}}</p>
    </div>
</div>
    @endforeach
@endsection
