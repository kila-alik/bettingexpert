<div class="card-box">
    <h4 class="header-title m-b-30">Добавить прогноз</h4>

    <form action="<?php echo e(route('forecasts.store')); ?>" method="post">
        <div class="form-group">
            <label for="alias">URL адрес(alias)</label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="<?php echo e(old('alias')); ?>">
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

                            <?php $__currentLoopData = $sorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sort->id); ?>"><?php echo e($sort->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

                    <?php $__currentLoopData = $sorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($sort->id); ?>" <?php if(old('sort_id')==$sort->id): ?>selected="selected" <?php endif; ?>><?php echo e($sort->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>
            <div class="form-group">
                <label for="game">Игра<span class="text-danger">*</span></label>
                <input name="game" placeholder="Игра" class="form-control" id="game" value="<?php echo e(old('game')); ?>">
            </div>
            <div class="form-group">
                <label for="match">Матч<span class="text-danger">*</span></label>
                <input name="match" type="text" placeholder="Матч" class="form-control" id="match" value="<?php echo e(old('match')); ?>">
            </div>
            <div class="form-group">
                <label for="coeff">Коэфф <span class="text-danger">*</span></label>
                <input name="coeff" type="text" placeholder="Коэфф" class="form-control" id="coeff" value="<?php echo e(old('coeff')); ?>">
            </div>
            <div class="form-group">
                <label class="col-form-label">Прогноз</label>
                <input type="text" class="form-control" name="forecast" placeholder="Прогноз" value="<?php echo e(old('forecast')); ?>">
            </div>
            <div class="form-group">
                <label for="date">Время <span class="text-danger">*</span></label>
                <input name="date" type="text" placeholder="2018-01-31 23:00:00" class="form-control" id="date" value="<?php echo e(old('date')); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="paid">Платный/Бесплатный <span class="text-danger">*</span></label>
            <select name="paid" class="selectpicker" data-style="btn-custom btn-block" id="paid">
                <option value="0"<?php if(old('paid')==0): ?> selected="selected" <?php endif; ?>>Платный</option>
                <option value="1"<?php if(old('paid')==1): ?> selected="selected" <?php endif; ?>>Бесплатный</option>
            </select>
        </div>

        <div class="form-group" id="price_group">
            <label for="price">Цена <span class="text-danger">*</span></label>
            <input name="price" type="text" placeholder="Цена" class="form-control" id="price" value="<?php echo e(old('price')); ?>">
        </div>

        <div class="form-group">
            <label for="description">Описание<span class="text-danger">*</span> (Рекомендуемая длина: больше чем 550 символов)</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Описание"><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="form-group">
            <label for="title">Title<span class="text-danger">*</span> (Рекомендуемая длина: 35-65 символов) <span class="text-success">0</span> символов</label>
            <input name="title" type="text" placeholder="Title" class="form-control" id="title" value="<?php echo e(old('title')); ?>">
        </div>

        <div class="form-group">
            <label for="meta_keywords">Meta Keywords <span class="text-danger">*</span></label>
            <input name="meta_keywords" type="text" placeholder="Meta Keywords" class="form-control" id="meta_keywords" value="<?php echo e(old('meta_keywords')); ?>">
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description<span class="text-danger">*</span> (Рекомендуемая длина: 70-320 символов) <span class="text-success">0</span> символов</label>
            <input name="meta_description" type="text" placeholder="Meta Description" class="form-control" id="meta_description" value="<?php echo e(old('meta_description')); ?>">
        </div>

        <div class="form-group">
            <label for="sort_ord"><i class="fa fa-user-circle-o"></i> Прогнозист <span class="text-danger">*</span></label>
            <select name="forecaster_id" class="selectpicker" data-style="btn-custom btn-block" id="sort_ord">
                <?php $__currentLoopData = $forecasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($forecaster->id); ?>"><?php echo e($forecaster->name); ?> (<?php echo e($forecaster->email); ?>) | <?php echo e($forecaster->sort->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <?php if(count($errors->all()) > 0): ?>
            <div class="alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?> <br />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty(session('status'))): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <div class="form-group text-left m-b-0">
            <?php echo e(csrf_field()); ?>

            <button class="btn btn-custom waves-effect waves-light" type="submit">
                Добавить
            </button>
        </div>

    </form>
</div> <!-- end card-box -->