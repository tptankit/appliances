<?php $__env->startSection('content'); ?>

<div id="single-product">
    <div class="container">

        <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">

                <div id="owl-single-product">

                    <?php
                    if (!empty($product[0]->product_img)) {

                        foreach ($product[0]->product_img as $img) {
                            ?>
                            <div class="single-product-gallery-item" id="silde<?= $img['img_id'] ?>">
                                <a data-rel="prettyphoto" href="<?= $img['src'] ?>">
                                    <img class="img-responsive"  style="height: 400px" alt="" src="<?php echo url(''); ?>/assets/images/blank.gif" data-echo="<?= $img['src'] ?>" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <?php
                        }
                    }
                    ?><!-- /.single-product-gallery-item -->
                </div><!-- /.single-product-slider -->


                <div class="single-product-gallery-thumbs gallery-thumbs">

                    <div id="owl-single-product-thumbnails">

                        <?php
                        if (!empty($product[0]->product_img)) {

                            foreach ($product[0]->product_img as $img) {
                                ?>
                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="0" href="silde<?= $img['img_id'] ?>">
                                    <img width="67" alt="" src="<?php echo url(''); ?>/assets/images/blank.gif" data-echo="<?= $img['src'] ?>" />
                                </a>


                                <?php
                            }
                        }
                        ?>




                    </div><!-- /#owl-single-product-thumbnails -->

                    <div class="nav-holder left hidden-xs">
                        <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                    </div><!-- /.nav-holder -->

                    <div class="nav-holder right hidden-xs">
                        <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                    </div><!-- /.nav-holder -->

                </div><!-- /.gallery-thumbs -->

            </div><!-- /.single-product-gallery -->
        </div><!-- /.gallery-holder -->        
        <div class="no-margin col-xs-12 col-sm-7 body-holder">
            <div class="body">
                <div class="star-holder inline"><div class="star" data-score="4"></div></div>
                <div class="availability"><label>Availability:</label><span class="available">  in stock</span></div>

                <div class="title"><a href="#"><?= $product[0]->product_name ?></a></div>

                <?php if ($product[0]->brand != null) { ?>
                    <div class="brand"><img src="<?= $product[0]->brand ?>"></div>
                <?php } ?>


                <div class="buttons-holder">
                    <?php
                    if (Auth::user()) {
                        ?>
                        <a class="btn-add-to-wishlist" href="<?= url('') ?>/addtowishlist/<?= $product[0]->product_id ?>">add to wishlist</a>
                    <?php } else { ?>
                        <a class="btn-add-to-wishlist" href="<?= url('') ?>/addtowishlistmsg">add to wishlist</a>
                        <?php
                    }
                    ?>

                </div>
                <h3></h3>
                <div class="excerpt">
                    <?php
                    $feature = json_decode($product[0]->key_feature);
                    ?>
                    <ul style="list-style: circle;margin-left: 15px">
                        <?php foreach ($feature as $list) { ?>
                            <li><?= $list ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="prices">

                    <div class="price-current">&euro;<?= $product[0]->price ?></div>
                </div>

                <div class="qnt-holder">
                    <div class="le-quantity">
                        <form>
                            <a class="minus" href="#reduce"></a>
                            <input name="quantity" readonly="readonly" type="text" value="1" />
                            <a class="plus" href="#add"></a>
                        </form>
                    </div>
                    <a id="addto-cart" href="<?= url('') ?>/addtocart/<?= $product[0]->product_id ?>" class="le-button huge">add to cart</a>
                </div><!-- /.qnt-holder -->
            </div><!-- /.body -->

        </div><!-- /.body-holder -->
    </div><!-- /.container -->
</div><!-- /.single-product -->

<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
<section id="single-product-tab">
    <div class="container">
        <div class="tab-holder">

            <ul class="nav nav-tabs simple" >
                <li class="active"><a href="#description" data-toggle="tab">Description</a></li>

                <li><a href="#reviews" data-toggle="tab">Reviews (3)</a></li>
            </ul><!-- /.nav-tabs -->

            <div class="tab-content">
                <div class="tab-pane active" id="description">
                    <?= $product[0]->product_description ?>
                </div><!-- /.tab-pane #description -->



                <div class="tab-pane" id="reviews">
                    <div class="comments">
                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="<?php echo url(''); ?>/assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Smith</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="4"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->

                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="<?php echo url(''); ?>/assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">Jane Smith</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="5"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->

                        <div class="comment-item">
                            <div class="row no-margin">
                                <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                                    <div class="avatar">
                                        <img alt="avatar" src="<?php echo url(''); ?>/assets/images/default-avatar.jpg">
                                    </div><!-- /.avatar -->
                                </div><!-- /.col -->

                                <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                                    <div class="comment-body">
                                        <div class="meta-info">
                                            <div class="author inline">
                                                <a href="#" class="bold">John Doe</a>
                                            </div>
                                            <div class="star-holder inline">
                                                <div class="star" data-score="3"></div>
                                            </div>
                                            <div class="date inline pull-right">
                                                12.07.2013
                                            </div>
                                        </div><!-- /.meta-info -->
                                        <p class="comment-text">
                                            Integer id purus ultricies nunc tincidunt congue vitae nec felis. Vivamus sit amet nisl convallis, faucibus risus in, suscipit sapien. Vestibulum egestas interdum tellus id venenatis. 
                                        </p><!-- /.comment-text -->
                                    </div><!-- /.comment-body -->

                                </div><!-- /.col -->

                            </div><!-- /.row -->
                        </div><!-- /.comment-item -->
                    </div><!-- /.comments -->

                    <div class="add-review row">
                        <div class="col-sm-8 col-xs-12">
                            <div class="new-review-form">
                                <h2>Add review</h2>
                                <form id="contact-form" class="contact-form" method="post" >
                                    <div class="row field-row">
                                        <div class="col-xs-12 col-sm-6">
                                            <label>name*</label>
                                            <input class="le-input" >
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <label>email*</label>
                                            <input class="le-input" >
                                        </div>
                                    </div><!-- /.field-row -->

                                    <div class="field-row star-row">
                                        <label>your rating</label>
                                        <div class="star-holder">
                                            <div class="star big" data-score="0"></div>
                                        </div>
                                    </div><!-- /.field-row -->

                                    <div class="field-row">
                                        <label>your review</label>
                                        <textarea rows="8" class="le-input"></textarea>
                                    </div><!-- /.field-row -->

                                    <div class="buttons-holder">
                                        <button type="submit" class="le-button huge">submit</button>
                                    </div><!-- /.buttons-holder -->
                                </form><!-- /.contact-form -->
                            </div><!-- /.new-review-form -->
                        </div><!-- /.col -->
                    </div><!-- /.add-review -->

                </div><!-- /.tab-pane #reviews -->
            </div><!-- /.tab-content -->

        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>