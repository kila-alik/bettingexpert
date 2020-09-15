<section id="contact-center-form-2" class="pt-125 pb-125 dark text-center">
    <div class="container">
        <h2>Обратная связь</h2>
        <h4 class="mb-20">Вы очень важны для нас,
            <br>вся полученная информация всегда будет оставаться конфиденциальной.
        </h4>
        <div class="mb-20">
            <a href="mailto:info@sportprognoz.pw"><i class="icon-envelop"></i> info@sportprognoz.pw </a><br />
        </div>
        <div class="compressed-box-33">
            <form action="<?php echo e(route('contact')); ?>" method="post" class="contact_form" novalidate="novalidate" id="contact-center-form-2-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Полное имя" name="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo e(old('email')); ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="6" placeholder="Ваше сообщение или вопрос" name="message"><?php echo e(old('message')); ?></textarea>
                </div>
                <?php echo e(csrf_field()); ?>

                <?php echo Captcha::display($attributes=[], $options = ['lang'=> 'ru']); ?>

                <button type="submit" class="btn btn-block btn-primary"><i class="icon-paper-plane icon-position-left icon-size-m"></i><span>Отправить сообщение</span></button>
            </form>
            <?php if(count($errors->all()) > 0): ?>
                <div class="alert-danger alert">
                    <?php echo e($errors->all()[0]); ?>

                </div>
            <?php endif; ?>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="bg"></div>
</section>