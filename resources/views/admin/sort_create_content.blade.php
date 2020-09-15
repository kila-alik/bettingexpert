<div class="card-box">
    <h4 class="header-title m-b-30">Добавить вид спорта</h4>

    <form action="{{ route('sort.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Игра<span class="text-danger">*</span></label>
            <input type="text" name="name" placeholder="Имя" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="alias">URL адрес(alias)<span class="text-danger">*</span></label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="{{ old('alias') }}">
        </div>
        <div class="form-group">
            <label>Иконка<span class="text-danger">*</span></label>
            <input type="file" name="icon" />
        </div>

        @if(count($errors->all()) > 0)
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }} <br />
            @endforeach
            </div>
        @endif

        @if(!empty(session('status')))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group text-left m-b-0">
            {{ csrf_field() }}
            <button class="btn btn-custom waves-effect waves-light" type="submit">
                Добавить
            </button>
        </div>

    </form>
</div>