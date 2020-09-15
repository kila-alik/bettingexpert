<div class="row">
    <div class="col-md-4">
        <div class="card-box">
            <h4 class="header-title m-b-30">Добавить категорию</h4>

            <form action="{{ route('news-category.store') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Имя<span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Имя" class="form-control" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="alias">URL адрес(alias)<span class="text-danger">*</span></label>
                    <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="{{ old('alias') }}">
                </div>

                @if(count($errors->all()) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
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
    </div>
    <div class="col-md-8">
        @include('admin.news-category.index')
    </div>
</div> <!-- end row -->