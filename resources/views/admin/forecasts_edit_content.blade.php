<div class="card-box">
    <h4 class="header-title m-b-30">Добавить прогноз</h4>

    <form action="{{ route('forecasts.update', $forecast->id) }}" method="post">
        <div class="form-group">
            <label for="alias">URL адрес(alias)</label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="{{ $forecast->alias }}">
        </div>
        <div class="form-group">
            <label for="sort_ord">Ординар/экспресс <span class="text-danger">*</span></label>
            <select name="sort_ord" class="selectpicker" data-style="btn-custom btn-block" id="sort_ord">
                <option value="0"@if($forecast->sort_ord===0) selected="selected" @endif>Ординар</option>
                <option value="1"@if($forecast->sort_ord===1) selected="selected" @endif>Экспресс</option>
            </select>
        </div>

        <div class="form-group" id="forecasts_express">

            <div class="form-group">
                <a href="#" id="plus-forecast" class="btn btn-success col-md-12"><i class="fa fa-plus-circle fa-2x "></i></a>
                <div class="alert alert-success" id="coeff_summ">
                    <b>Общий коэфф:</b> <span>{{ !empty($forecast->express['coeff']) ? array_sum($forecast->express['coeff']) : 0 }}</span>
                </div>
            </div>

            @foreach($forecast->express['sort_id'] as $k=>$express)
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <a href="#" class="btn btn-danger minus-forecaste"><i class="fa fa-minus-circle fa-4x "></i></a>
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-form-label">Вид<span class="text-danger">*</span></label>
                        <select class="form-control btn-success btn-outline-success"  data-style="btn-custom btn-success" name="express[sort_id][]">
                            <option value="">Выбрать вид прогноза</option>

                            @foreach($sorts as $sort)
                                <option value="{{ $sort->id }}"@if($sort->id==$forecast->express['sort_id'][$k]) selected="selected"@endif>{{ $sort->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Игра</label>
                        <input type="text" class="form-control" name="express[game][]" value="{{ $forecast->express['game'][$k] }}" placeholder="Игра">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-form-label">Матч</label>
                        <input type="text" class="form-control" name="express[match][]" value="{{ $forecast->express['match'][$k] }}" placeholder="Матч">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-form-label">Коэфф</label>
                        <input type="text" class="form-control coeff_input" name="express[coeff][]" value="{{ $forecast->express['coeff'][$k] }}" placeholder="Коэфф">
                    </div>
                    <div class="form-group col-md-2">
                        <label class="col-form-label">Время</label>
                        <input type="text" class="form-control" name="express[date][]" value="{{ $forecast->express['date'][$k] }}" placeholder="Время">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-form-label">Прогноз</label>
                        <input type="text" class="form-control" name="express[forecast][]" value="{{ $forecast->express['forecast'][$k] }}" placeholder="Прогноз">
                    </div>
                    <div class="form-group col-md-1">
                        <label class="col-form-label">Результат</label>
                        <input type="text" class="form-control" name="express[result][]" value="{{ $forecast->express['result'][$k] }}" placeholder="Результат">
                    </div>
                </div>
            @endforeach


        </div>

        <div id="sort_ordinar">
            <div class="form-group">
                <label for="sort_id">Вид<span class="text-danger">*</span></label>
                <select class="selectpicker"  data-style="btn-custom btn-success" name="sort_id" id="sort_id">
                    <option value="">Выбрать вид прогноза</option>

                    @foreach($sorts as $sort)
                        <option value="{{ $sort->id }}"@if($sort->id===$forecast->sort_id) selected="selected"@endif>{{ $sort->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="game">Игра<span class="text-danger">*</span></label>
                <input name="game" placeholder="Игра" class="form-control" id="game" value="{{ $forecast->game }}">
            </div>
            <div class="form-group">
                <label for="match">Матч<span class="text-danger">*</span></label>
                <input name="match" type="text" placeholder="Матч" class="form-control" id="match" value="{{ $forecast->match }}">
            </div>
            <div class="form-group">
                <label for="coeff">Коэфф <span class="text-danger">*</span></label>
                <input name="coeff" type="text" placeholder="Коэфф" class="form-control" id="coeff" value="{{ $forecast->coeff }}">
            </div>
            <div class="form-group">
                <label class="col-form-label">Прогноз</label>
                <input type="text" class="form-control" name="forecast" value="{{ $forecast->forecast }}" placeholder="Прогноз">
            </div>
            <div class="form-group">
                <label class="col-form-label">Результат</label>
                <input type="text" class="form-control" name="result" value="{{ $forecast->result }}" placeholder="Результат">
            </div>
            <div class="form-group">
                <label for="date">Время <span class="text-danger">*</span></label>
                <input name="date" type="text" placeholder="Время" class="form-control" id="date" value="{{ $forecast->date }}">
            </div>
        </div>

        <div class="form-group">
            <label for="paid">Платный/Бесплатный <span class="text-danger">*</span></label>
            <select name="paid" class="selectpicker" data-style="btn-custom btn-block" id="paid">
                <option value="0"@if($forecast->paid===0) selected="selected" @endif>Платный</option>
                <option value="1"@if($forecast->paid===1) selected="selected" @endif>Бесплатный</option>
            </select>
        </div>

        <div class="form-group" id="price_group">
            <label for="price">Цена <span class="text-danger">*</span></label>
            <input name="price" type="text" placeholder="Цена" class="form-control" id="price" value="{{ $forecast->price }}">
        </div>

        <div class="form-group">
            <label for="description">Описание(Прогноз)<span class="text-danger">*</span> (Рекомендуемая длина: больше чем 550 символов) </label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Прогноз: тотал меньше 2.5,
            <br />
            Ваш проект отлично смотрится на любом устройстве. Контент можно легко прочитать, и пользователь свободно понимает, что вы хотели сказать ему или ей.">{{ $forecast->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="title">Title<span class="text-danger">*</span> (Рекомендуемая длина: 35-65 символов) <span class="text-success">{{ mb_strlen($forecast->title)  }}</span> символов</label>
            <input name="title" type="text" placeholder="Title" class="form-control" id="title" value="{{ $forecast->title }}">
        </div>

        <div class="form-group">
            <label for="meta_keywords">Meta Keywords <span class="text-danger">*</span></label>
            <input name="meta_keywords" type="text" placeholder="Meta Keywords" class="form-control" id="meta_keywords" value="{{ $forecast->meta_keywords }}">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description<span class="text-danger">*</span> (Рекомендуемая длина: 70-320 символов) <span class="text-success">{{ mb_strlen($forecast->meta_description)  }}</span> символов</label>
            <input name="meta_description" type="text" placeholder="Meta Description" class="form-control" id="meta_description" value="{{ $forecast->meta_description }}">
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
            <input type="hidden" name="_method" value="put">
            <button class="btn btn-custom btn-success waves-effect waves-light" value="1" name="submit" type="submit">
                Обновить
            </button>
            <button class="btn btn-custom waves-effect waves-light" value="2" name="submit" type="submit">
                Обновить и выйти
            </button>
        </div>

    </form>
</div> <!-- end card-box -->