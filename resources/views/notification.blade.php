@extends('template')
@section('content')
    <div class="p-5">
{{--        <p class="text-white fw-bold fs-2 d-flex align-items-center">Notification</p>--}}
        <div class="d-flex justify-content-between align-items-center flex-row">
            <p class="text-white fw-bold fs-2 d-flex align-items-center">Notification</p>
            <a href="/createNotification" class="btn btn-light bg-white py-2 px-4 fs-5 fw-semibold d-flex align-items-center">Create Notification</a>
        </div>
        <div>

            @if(count($detail) < 1)
            <div class="bg-white rounded fs-5 p-2 ps-3 m-3">
                <span>
                    No Notification
                </span>
            </div>
            @else

                @foreach($detail as $notification)

                    @if($notification['notifDetail']->user->name === 'Admin')
                        <div class="bg-secondary rounded fs-5 p-2 ps-3 m-3 d-flex justify-content-between">
                            <div>
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('storage/assets/Soonib Story.png')}}" class="rounded-circle me-2" style="width: 25px"/>
                                    <span>
                                        <strong>Soonib Story</strong>
                                    </span>
                                </div>
                                <p>
                                    {{$notification['notifDetail']->content}}
                                </p>
                            </div>
                            <span class="fw-bold text-white pe-3">
                                {{$notification['time']}} {{$notification['unit']}}
                            </span>
                        </div>
                    @else
                        <div class="bg-white rounded fs-5 p-2 ps-3 m-3 d-flex justify-content-between">
                            <span>
                                <strong>{{$notification['notifDetail']->user->name}}</strong> {{$notification['notifDetail']->content}} your message
                            </span>
                            <span class="fw-bold text-muted pe-3">
                                {{$notification['time']}} {{$notification['unit']}}
                            </span>
                        </div>
                    @endif

                @endforeach
            @endif

        </div>
    </div>

@endsection
