@extends('template')
@section('content')
    <div class="p-5">
        <p class="text-white fw-bold fs-2">Notification</p>
        <div>

            @if(count($detail) < 1)
            <div class="bg-white rounded fs-5 p-2 ps-3 m-3">
                <span>
                    No Notification
                </span>
            </div>
            @else

                @foreach($detail as $notification)

                    <div class="bg-white rounded fs-5 p-2 ps-3 m-3 d-flex justify-content-between">
                        <span>
                            <strong>{{$notification['notifDetail']->user->name}}</strong> {{$notification['notifDetail']->content}} your message
                        </span>
                        <span class="fw-bold text-muted pe-3">
                            {{$notification['time']}} {{$notification['unit']}}
                        </span>
                    </div>

                @endforeach
            @endif

        </div>
    </div>

@endsection
