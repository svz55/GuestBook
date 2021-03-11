@include('errors')
<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded shadow-sm">
    <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Оставте комментарий</h6>
    </div>
</div>
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <form action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleInputEmail2">Комментарий</label>
            <textarea class="form-control" rows="3" name = "text"id="exampleInputEmail2"></textarea>
            @include('file')
        </div>
        <button type="submit" class="btn btn-dark">Отправить</button>
    </form>
</div>
