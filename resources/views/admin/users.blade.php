@extends('layouts.admin')
@section('content')
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">{{'Информация о пользователях'}}</h6>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-3">{{'Список пользователей'}}</h6>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Состояние</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><img width="50" height="50" src="{{$user->image}}"
                             class="avatar" alt="Avatar"> {{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->status=='1')
                            <a title="Бан" data-toggle="tooltip"><i class='fas fa-ban'
                                                                    style='font-size:18px;color:red'></i></a>
                        @else
                            <a title="Разбанить" data-toggle="tooltip"><i class='fas fa-check'
                                                                          style='font-size:18px;color:green'></i></a>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('comments.updateStatus',$user->id) }}">
                            @csrf
                            @method('PUT')
                            <button onclick="return confirm('Вы уверены что хотите изменить?')" type="submit"
                                    class="btn btn-dange"
                                    title="Удалить" data-toggle="tooltip">Изменить
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
            {{$users->links()}}
        </ul>
    </nav>
@endsection
