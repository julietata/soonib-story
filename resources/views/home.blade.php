@extends('template')
@section('content')
    <div class="p-4 pb-0 d-flex align-items-center w-50">
        <form class="w-100">
            <input id="search" name="key" class="border rounded-start py-2 px-2 w-100" placeholder="Search" type="search">
        </form>
        <div class="border rounded-end p-2 bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </div>
    </div>
    <div class="d-flex justify-content-evenly flex-wrap w-100 p-3 bg-primary m-0">
        @for($i = 0; $i < count($data); $i++)
            <div class="d-flex flex-column bg-white border rounded m-2 px-0" style="width: 30%;">
                <div class="d-flex align-items-center px-3 pt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    @if($data[$i]->anonymous == false)
                        <p class="text-primary fw-semibold fs-5 m-0">{{$data[$i]->user->name}}, {{$data[$i]->user->gender}}</p>
                    @else
                        <p class="text-primary fw-semibold fs-5 m-0">Anonymous, {{$data[$i]->user->gender}}</p>
                    @endif
                </div>
                <p class="text-primary mt-3 fs-5 px-3 flex-grow-1">{{$data[$i]->content}}</p>
                <div class="d-flex justify-content-end">
                    <p class="fs-6 text-dark mt-2 px-3">{{$data[$i]->timestamp}}</p>
                </div>
                <div>
                    @if(auth()->check() && $data[$i]->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                        <div class="d-flex w-100 position-relative bottom-0">
                            <div class="w-100 bg-white border-top border-end border-0 py-2 d-flex justify-content-center">
                                <a href="/updateMessage/{{$data[$i]->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="w-100">
                                <form action="/delete/{{$data[$i]->id}}" method="post">
                                    {{csrf_field()}}
                                    <button class="w-100 bg-white border-top border-end border-0 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="d-flex w-100 position-relative bottom-0">
                            <div class="w-100">
                                <form action="/fav/{{$data[$i]->id}}" method="post">
                                    {{csrf_field()}}
                                    <button class="w-100 bg-white border-top border-end border-0 py-2">
                                    @php
                                        $check = 0;
                                    @endphp
                                    @for($j = 0; $j < count($favorites); $j++)
                                    @if($data[$i]->id == $favorites[$j]->message_id)
                                    @php
                                        $check = 1;
                                    @endphp
                                    @endif
                                    @endfor
                                    @if($check == 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="yellow" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                        </svg>
                                    @endif
                                    </button>
                                </form>
                            </div>
                            <div class="w-100">
                                <form action="/dislike/{{$data[$i]->id}}" method="post">
                                    {{csrf_field()}}
                                    <button class="w-100 bg-white border-top border-end border-0 py-2">
                                    @php
                                        $check = 0;
                                    @endphp
                                    @for($j = 0; $j < count($like); $j++)
                                    @if($data[$i]->id == $like[$j]->message_id)
                                    @php
                                        $check = 1;
                                    @endphp
                                    @endif
                                    @endfor
                                    @if($check == 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="Red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg>
                                    @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endfor
    </div>
    <div class="d-flex justify-content-center align-items-center my-5 pt-5" style="list-style-type:none;">
        {{$data->links("pagination::bootstrap-4")}}
    </div>
@endsection
