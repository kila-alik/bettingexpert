<div class="card-box">
    <h4 class="header-title m-b-30">Добавить новость</h4>

    <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Имя<span class="text-danger">*</span></label>
            <input type="text" name="title" placeholder="Имя" class="form-control" id="name" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="alias">URL адрес(alias)</label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias"
                   value="{{ $news->alias }}">
        </div>
        <div class="form-group">
            <label for="description">Текст <span class="text-danger">*</span></label>
            <textarea name="text" class="form-control" id="description" cols="30" rows="5"
                      placeholder="">{{ $news->text }}</textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords<span class="text-danger">*</span></label>
            <input type="text" name="keywords" placeholder="Keywords" class="form-control" id="keywords"
                   value="{{ $news->keywords }}">
        </div>
        <div class="form-group">
            <label for="description">Description<span class="text-danger">*</span></label>
            <input type="text" name="description" placeholder="Description" class="form-control" id="description"
                   value="{{ $news->description }}">
        </div>
        <div class="form-group">
            <label>Картинка<span class="text-danger">*</span></label>
            <input type="file" name="image"/>
        </div>
        <div class="form-group">
            <img src="{{ URL::asset('/images/'.$news->image)  }}" height="200" alt="">
        </div>
        <div class="form-group">
            <label for="category">Категория<span class="text-danger">*</span></label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id === $news->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @if(count($errors->all()) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }} <br/>
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
            <input type="hidden" name="_method" value="put">
            <button class="btn btn-custom waves-effect waves-light" type="submit">
                Обновить
            </button>
        </div>

    </form>
</div>