@extends('layouts.app')
@section('content')
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded shadow-sm">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">{{ __('Сбросить пароль') }}</h6>
        </div>
    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">

        @if (session('status'))
            <div class="alert alert-info my-3" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <div class="alert alert-danger my-3" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Сбросить пароль') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
