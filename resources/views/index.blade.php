@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Отзывы пользователей</h6>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Последние комментарии</h6>

        @foreach($comments as $comment)
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-128">
                    @if(!$comment->user_id)
                        <strong class="d-block text-gray-dark">{{$comment->email}}</strong>
                    @else
                        <strong class="d-block text-gray-dark">{{$comment->user['name']}}</strong>
                    @endif
                    {{$comment->text}}
                    @if($comment->link)
                        <a class="d-block text-gray-dark" href="{{asset('storage/'.$comment->link)}}" title="Скачать" >Скачать файл</a>
                    @endif
                    <strong class="d-block text-gray-dark"> {{$comment->created_at}}</strong>
                </p>
            </div>
        @endforeach
    </div>

    <nav aria-label="paginate">
        <ul class="pagination justify-content-center">
            {{$comments->links()}}
        </ul>
    </nav>

    @if((Auth::user()))
        @include('formForAuth')
    @elseif(!Auth::check())
        @include('formNoAuth')
    @endif
@endsection
