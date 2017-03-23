<?php $__env->startSection('content'); ?>

<section id="cart-page">
    <div class="container">
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
            <?php
            if (!empty($all_products)) {
                foreach ($all_products as $product) {
                    ?>
                    <div class="row no-margin cart-item">
                        <div class="col-xs-12 col-sm-2 no-margin">
                            <a href="<?= url('') ?>/product-detail/<?= $product->product_id ?>" class="thumb-holder">
                                <img class="lazy" alt="" src="<?= $product->product_img[0]['src'] ?>">
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-5 ">
                            <div class="title">
                                <a href="<?= url('') ?>/product-detail/<?= $product->product_id ?>"><?= $product->product_name ?></a>
                            </div>
                            <div class="brand"><img src="<?= $product->brand ?>" width="100"></div>
                        </div> 

                        <div class="col-xs-12 col-sm-3 no-margin">
                            <div class="quantity">
                                <div class="le-quantity">

                                </div>
                            </div>
                        </div> 

                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">
                                &euro;<?= $product->price ?>
                            </div>
                            <a class="close-btn" href="<?= url('') ?>/remove_wishlist_item/<?= $product->wishlist_id ?>"></a>
                        </div>
                    </div><!-- /.cart-item -->
                    <?php
                }
            }else{
                echo "No Wishlist Added";
            }
            ?>


        </div>
        <div class="col-xs-12 col-md-9 items-holder no-margin">
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <h3>Share this wishlist to your friend</h3>
            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">



                    <?php echo Form::open(array('url' => 'share_wishlist','class'=>'login-form cf-style-1')); ?>


                    <div class="field-row">
                        <label>Enter your friend's Email</label>
                        <input class="le-input" name="email" type="text">
                    </div><!-- /.field-row -->




                    <div class="buttons-holder">
                        <button type="submit" class="le-button huge">Invite</button>
                    </div><!-- /.buttons-holder -->
                    <?php echo Form::close(); ?>


                </section><!-- /.sign-in -->
            </div><!-- /.col -->
        </div>

        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->

        <!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>