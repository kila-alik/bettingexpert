<section class="pt-150 pb-150 dark text-center">
    <div class="container">
        <h2>Вход</h2>
        <div class="mb-20">
            Авторизация через`
            <a href="<?php echo e(route('socialLogin', 'vkontakte')); ?>" class="btn btn-primary" title="Vkontakte"><i class="icon icon-vk"></i></a>
            <a href="<?php echo e(route('socialLogin', 'facebook')); ?>" class="btn btn-primary" title="Facebook"><i class="icon-facebook"></i></a>
        </div>
        <div class="compressed-box-33">
            <form class="contact_form" id="contact-center-form-2-form" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo e(csrf_field()); ?>



                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" class="spr-text-field form-control" placeholder="Email адрес" name="email" value="<?php echo e(old('email')); ?>" required autofocus >
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>


                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" class="spr-text-field form-control" placeholder="Пароль" name="password" value="<?php echo e(old('password')); ?>" required >
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label class="form-group checkbox text-left"><input type="checkbox" class="spr-checkbox check spr-form-required" placeholder="Запомнить меня" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><span class="lbl lbl-style">Запомнить меня</span></label>
                </div>

                <button type="submit" data-loading-text="•••" data-complete-text="Completed!" data-reset-text="Try again later..." class="btn btn-block btn-primary"><i class="icon-user-lock icon-position-left icon-size-m"></i><span class="spr-option-textedit-link">Вход</span></button>
                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">Забыли пароль?</a>
            </form>
        </div>
    </div>
    </div>
    <div class="bg"></div>
</section>