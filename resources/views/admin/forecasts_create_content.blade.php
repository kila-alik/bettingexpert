<div class="card-box">
    <h4 class="header-title m-b-30">Добавить прогноз</h4>

    <form action="{{ route('forecasts.store') }}" method="post">
        <div class="form-group">
            <label for="alias">URL адрес(alias)</label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="{{ old('alias') }}">
        </div>
        <div class="form-group">
            <label for="sort_ord">Ординар/экспресс <span class="text-danger">*</span></label>
            <select name="sort_ord" class="selectpicker" data-style="btn-custom btn-block" id="sort_ord">
                <option value="0">Ординар</option>
                <option value="1">Экспресс</option>
            </select>
        </div>

        <div class="form-group" id="forecasts_express">

            <div class="form-group">
                <a href="#" id="plus-forecast" class="btn btn-success col-md-12"><i class="fa fa-plus-circle fa-2x "></i></a>
                <div class="alert alert-success" id="coeff_summ">
                    <b>Общий коэфф:</b> <span>0.00</span>
                </div>
            </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <a href="#" class="btn btn-danger minus-forecaste"><i class="fa fa-minus-circle fa-4x "></i></a>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-form-label">Вид<span class="text-danger">*</span></label>
                        <select class="form-control btn-success btn-outline-success"  data-style="btn-custom btn-success" name="express[sort_id][]">
                            <option value="">Выбрать вид прогноза</option>

                            @foreach($sorts as $sort)
                                <option value="{{ $sort->id }}">{{ $sort->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Игра</label>
                        <input type="text" class="form-control" name="express[game][]" value="" placeholder="Игра">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-form-label">Матч</label>
                        <input type="text" class="form-control" name="express[match][]" value="" placeholder="Матч">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-form-label">Коэфф</label>
                        <input type="text" class="form-control coeff_input" name="express[coeff][]" value="" placeholder="Коэфф">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-form-label">Время</label>
                        <input type="text" class="form-control" name="express[date][]" value="" placeholder="Время">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-form-label">Прогноз</label>
                        <input type="text" class="form-control" name="express[forecast][]" value="" placeholder="Прогноз">
                        <input type="hidden" class="form-control" name="express[result][]" value="" placeholder="Результат">
                    </div>
                </div>


        </div>
        <div id="sort_ordinar">
            <div class="form-group">
                <label for="sort_id">Вид<span class="text-danger">*</span></label>
                <select class="selectpicker"  data-style="btn-custom btn-success" name="sort_id" id="sort_id">
                    <option value="">Выбрать вид прогноза</option>

                    @foreach($sorts as $sort)
                        <option value="{{ $sort->id }}" @if(old('sort_id')==$sort->id)selected="selected" @endif>{{ $sort->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="game">Игра<span class="text-danger">*</span></label>
                <input name="game" placeholder="Игра" class="form-control" id="game" value="{{ old('game') }}">
            </div>
            <div class="form-group">
                <label for="match">Матч<span class="text-danger">*</span></label>
                <input name="match" type="text" placeholder="Матч" class="form-control" id="match" value="{{ old('match') }}">
            </div>
            <div class="form-group">
                <label for="coeff">Коэфф <span class="text-danger">*</span></label>
                <input name="coeff" type="text" placeholder="Коэфф" class="form-control" id="coeff" value="{{ old('coeff') }}">
            </div>
            <div class="form-group">
                <label class="col-form-label">Прогноз</label>
                <input type="text" class="form-control" name="forecast" placeholder="Прогноз" value="{{ old('forecast') }}">
            </div>
            <div class="form-group">
                <label for="date">Время <span class="text-danger">*</span></label>
                <input name="date" type="text" placeholder="2018-01-31 23:00:00" class="form-control" id="date" value="{{ old('date') }}">
            </div>
        </div>

        <div class="form-group">
            <label for="paid">Платный/Бесплатный <span class="text-danger">*</span></label>
            <select name="paid" class="selectpicker" data-style="btn-custom btn-block" id="paid">
                <option value="0"@if(old('paid')==0) selected="selected" @endif>Платный</option>
                <option value="1"@if(old('paid')==1) selected="selected" @endif>Бесплатный</option>
            </select>
        </div>

        <div class="form-group" id="price_group">
            <label for="price">Цена <span class="text-danger">*</span></label>
            <input name="price" type="text" placeholder="Цена" class="form-control" id="price" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="description">Описание<span class="text-danger">*</span> (Рекомендуемая длина: больше чем 550 символов)</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Описание">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="title">Title<span class="text-danger">*</span> (Рекомендуемая длина: 35-65 символов) <span class="text-success">0</span> символов</label>
            <input name="title" type="text" placeholder="Title" class="form-control" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="meta_keywords">Meta Keywords <span class="text-danger">*</span></label>
            <input name="meta_keywords" type="text" placeholder="Meta Keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords') }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description<span class="text-danger">*</span> (Рекомендуемая длина: 70-320 символов) <span class="text-success">0</span> символов</label>
            <input name="meta_description" type="text" placeholder="Meta Description" class="form-control" id="meta_description" value="{{ old('meta_description') }}">
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
</div> <!-- end card-box -->