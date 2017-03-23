<?php $__env->startSection('content'); ?><main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Sign In</h2>
                    <p>Hello, Welcome to your account</p>


                    <?php echo Form::open(array('url' => 'login','class'=>'login-form cf-style-1')); ?>


                    <div class="field-row">
                        <label>Email</label>
                        <input class="le-input" name="email" type="text">
                    </div><!-- /.field-row -->

                    <div class="field-row">
                        <label>Password</label>
                        <input class="le-input"  name="password" type="password">
                    </div><!-- /.field-row -->



                    <div class="buttons-holder">
                        <button type="submit" class="le-button huge">Secure Sign In</button>
                    </div><!-- /.buttons-holder -->
                    <?php echo Form::close(); ?>


                </section><!-- /.sign-in -->
            </div><!-- /.col -->

            <div class="col-md-6">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Create New Account</h2>
                    <p>Create your own Media Center account</p>

                    <?php echo Form::open(array('url' => 'register','class'=>'login-form cf-style-1')); ?>

                    <div class="field-row">
                        <label>Name</label>
                        <input class="le-input" name="name" type="text">
                    </div>
                    <div class="field-row">
                        <label>Email</label>
                        <input class="le-input" name="email" type="email">
                    </div><!-- /.field-row -->
                    <div class="field-row">
                        <label>Password</label>
                        <input class="le-input" name="password" type="password">
                    </div>
                    <div class="buttons-holder">
                        <button type="submit" class="le-button huge">Sign Up</button>
                    </div><!-- /.buttons-holder -->
                    <?php echo Form::close(); ?>


                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>