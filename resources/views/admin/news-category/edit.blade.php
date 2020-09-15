<div class="row">
    <div class="col-md-4">
        <div class="card-box">
            <h4 class="header-title m-b-30">Обновить вид спорта</h4>

            <form action="{{ route('news-category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Имя<span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Имя" class="form-control" id="name" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <label for="alias">URL адрес(alias)<span class="text-danger">*</span></label>
                    <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="{{ $category->alias }}">
                </div>

                @if(count($errors->all()) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    </div>
                @endif

                <div class="form-group text-left m-b-0 m-t-25">
                    {{ csrf_field() }}
                    <a href="{{ route('news-category.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"></i> назад</a>

                    <input type="hidden" name="_method" value="put">
                    <button class="btn btn-custom waves-effect waves-light pull-right" type="submit">
                        Обновить
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="col-md-8">
        @include('admin.news-category.index')
    </div>
</div>