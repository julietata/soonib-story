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

        <div class="d-flex w-25 flex-column bg-white border rounded m-2 px-0">
            <div class="d-flex align-items-center px-3 pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                <p class="text-primary fw-semibold fs-5 m-0">{{$data[$i]->user->name}}, {{$data[$i]->user->gender}}</p>
            </div>
            <p class="text-primary mt-3 fs-5 px-3 flex-grow-1">{{$data[$i]->content}}</p>
            <div class="d-flex justify-content-end">
                <p class="fs-6 text-dark mt-2 px-3">{{$data[$i]->timestamp}}</p>
            </div>
            <div>
                <div class="d-flex w-100 position-relative bottom-0">
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
            </div>
        </div>

        @endfor
    </div>
{{--    <nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0 max-w-prose mx-auto">--}}
{{--        <div class="-mt-px w-0 flex-1 flex">--}}
{{--            <a href="{{$data->previousPageUrl()}}" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">--}}
{{--                <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />--}}
{{--                </svg>--}}
{{--                Previous--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="hidden md:-mt-px md:flex">--}}
{{--            @for($i = 1; $i <= $data->lastPage(); $i++)--}}
{{--                @if($i == $data->currentPage())--}}
{{--                    <a href="#" class="border-indigo-500 text-indigo-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium" aria-current="page">--}}
{{--                        {{$i}}--}}
{{--                    </a>--}}
{{--                @else--}}
{{--                    <a href="{{$data->url($i)}}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium">--}}
{{--                        {{$i}}--}}
{{--                    </a>--}}
{{--                @endif--}}
{{--            @endfor--}}
{{--        </div>--}}
{{--        <div class="-mt-px w-0 flex-1 flex justify-end">--}}
{{--            <a href="{{$data->nextPageUrl()}}" class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">--}}
{{--                Next--}}
{{--                <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                </svg>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </nav>--}}
@endsection
