<section id="contact-center-form-2" class="pt-250 pb-200 dark text-center">
    <div class="container">
        <h2>Сброс пароля</h2>
        <div class="compressed-box-33">

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form class="contact_form" id="contact-center-form-2-form" method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo e(csrf_field()); ?>



                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" class="spr-text-field form-control" placeholder="Email адрес" name="email" value="<?php echo e(old('email')); ?>" required autofocus >
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-block btn-primary"><i class="icon-user-lock icon-position-left icon-size-m"></i>
                    <span class="spr-option-textedit-link">Отправить ссылку сброса пароля</span>
                </button>
            </form>
        </div>
    </div>
    </div>
    <div class="bg"></div>
</section>