@extends('layouts.admin')
@section('content')
    <div class="d-flex align-items-center p-3 my-3 text-white-7 bg-dark rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Информация о комментариях</h6>
        </div>
    </div>
    <div class="my-5 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-3">Список пользователей</h6>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Дата</th>
                <th>Комментарий</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td><img width="50" height="50" src="{{$comment->user['image']}}" class="avatar"
                             alt="Avatar">{{$comment->user['name'] }}
                    </td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->text}}</td>
                    <td>
                        <form method="POST" action="{{ route('comments.destroy',$comment->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Вы уверены что хотите удалить?')" type="submit"
                                    class="btn btn-dange"
                                    title="Удалить" data-toggle="tooltip">
                                <i class='fas fa-trash' style='font-size:18px;color:red'></i>
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="paginate">
        <ul class="pagination justify-content-center">
            {{$comments->links()}}
        </ul>
    </nav>
@endsection
