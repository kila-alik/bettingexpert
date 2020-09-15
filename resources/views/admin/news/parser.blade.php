<div class="card-box">
    <h4 class="header-title m-b-30">Парсер новостей</h4>
    <div class="form-group">
        <label for="name">Ссылка парсинга</label>
        <input type="text" disabled="disabled" value="https://sportrbc.ru/filter/ajax/?category=football&offset=500&limit=10" class="form-control">
    </div>
    <form action="{{ route('news.parser.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Категория<span class="text-danger">*</span></label>
            <select name="category" id="" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Категория парсинга<span class="text-danger">*</span></label>
            <select name="parser_category" id="" class="form-control">
                    <option value="worldcup2018">Worldcup2018(ЧМ-2018)</option>
                    <option value="football">Football</option>
                    <option value="hockey">Hockey</option>
                    <option value="biathlon">Biathlon(Биатлон)</option>
                    <option value="boxing">Boxing(Единоборства)</option>
                    <option value="tennis">Tennis</option>
                    <option value="formula1">Formula1</option>
                    <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Лимит<span class="text-danger">*</span></label>
            <input type="text" name="limit" class="form-control" placeholder="10">
        </div>
        <div class="form-group">
            <label for="name">Offset<span class="text-danger">*</span></label>
            <input type="text" name="offset" class="form-control" placeholder="500">
        </div>
        <div class="form-group">
            <label for="name">Год начало<span class="text-danger">*</span></label>
            <select name="year" id="">
                @for($i = 2015; $i <= 2018; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group text-left m-b-0 m-t-50">
            {{ csrf_field() }}
            <button class="btn btn-success waves-effect waves-light" type="submit">
                Запустить
            </button>
        </div>

    </form>
</div>