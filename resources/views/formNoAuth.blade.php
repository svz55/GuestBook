@include('errors')
<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded shadow-sm">
    <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Оставте комментарий</h6>
    </div>
</div>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <form action="{{route('comments.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleInputEmail2">Комментарий</label>
            <textarea class="form-control" rows="3" name = "text"id="exampleInputEmail2"></textarea>
        </div>
        <div class="form-group">
            <label for="name" >{{ __('Имя') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <div class="alert alert-danger my-3" role="alert">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="email" ></label>{{ __('E-Mail') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="alert alert-danger my-3" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Отправить</button>
    </form>
</div>
