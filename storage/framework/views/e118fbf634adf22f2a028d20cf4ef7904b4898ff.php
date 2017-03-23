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
                            <a class="close-btn" href="<?= url('') ?>/remove_cart_item/<?= $product->product_id ?>"></a>
                        </div>
                    </div><!-- /.cart-item -->
                    <?php
                }
            }else{
                echo "No Products added in Cart.";
            }
            ?>


        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->

        <div class="col-xs-12 col-md-3 no-margin sidebar ">
            <div class="widget cart-summary">
                <h1 class="border">shopping cart</h1>
                <div class="body">
                    <ul class="tabled-data no-border inverse-bold">
                        <li>
                            <label>cart subtotal</label>
                            <div class="value pull-right">&euro;<?= (isset($product_sum) ? number_format($product_sum, 2) : "00.00") ?></div>
                        </li>
                        <li>
                            <label>shipping</label>
                            <div class="value pull-right">free shipping</div>
                        </li>
                    </ul>
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>order total</label>
                         <div class="value pull-right">&euro;<?= (isset($product_sum) ? number_format($product_sum, 2) : "00.00") ?></div>
                        </li>
                    </ul>
                    <div class="buttons-holder">
                        <a class="le-button big" href="#">checkout</a>
                        <a class="simple-link block" href="#">continue shopping</a>
                    </div>
                </div>
            </div><!-- /.widget -->

            <div id="cupon-widget" class="widget">
                <h1 class="border">use coupon</h1>
                <div class="body">
                    <form>
                        <div class="inline-input">
                            <input data-placeholder="enter coupon code" class="placeholder" type="text">
                            <button class="le-button" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.widget -->
        </div><!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>