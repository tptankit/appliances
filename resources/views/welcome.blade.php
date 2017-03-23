@extends('layouts.general')
@section('content')
<div id="top-banner-and-menu" class="homepage2">
    <div class="container">
        <div class="col-xs-12">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <div id="hero">
                <div id="owl-main" class="owl-carousel height-lg owl-inner-nav owl-ui-lg">

                    <div class="item" style="background-image: url(<?php echo url(''); ?>/assets/images/sliders/slider02.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left right" style="padding-right:0;">
                                <div class="big-text fadeInDown-1">
                                    Save up to a<span class="big"><span class="sign">$</span>400</span>
                                </div>

                                <div class="excerpt fadeInDown-2">
                                    on selected laptops<br>
                                    &amp; desktop pcs or<br>
                                    smartphones
                                </div>
                                <div class="small fadeInDown-2">
                                    terms and conditions apply
                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="single-product.html" class="big le-button ">shop now</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item" style="background-image: url(<?php echo url(''); ?>/assets/images/sliders/slider04.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left left" style="padding-left:7%;">
                                <div class="big-text fadeInDown-1">
                                    Want a<span class="big"><span class="sign">$</span>200</span>Discount?
                                </div>

                                <div class="excerpt fadeInDown-2">
                                    on desktop pcs
                                </div>
                                <div class="small fadeInDown-2">
                                    terms and conditions apply
                                </div>
                                <div class="button-holder fadeInDown-3">
                                    <a href="single-product.html" class="big le-button ">shop now</a>
                                </div>
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                </div><!-- /.owl-carousel -->
            </div>

            <!-- ========================================= SECTION – HERO : END ========================================= -->       </div>
    </div>
</div><!-- /.homepage2 -->

<!-- ========================================= HOME BANNERS ========================================= -->

<!-- ========================================= HOME BANNERS : END ========================================= -->
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">featured</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">new arrivals</a></li>
                <li><a href="#top-sales" data-toggle="tab">top sales</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                        <?php
                        if (!empty($all_products)) {
                            foreach ($all_products as $product) {
                                ?>
                                <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                    <div class="product-item">
                                        <div class="ribbon blue"><span>new!</span></div> 
                                        <div class="image">
                                            <img alt="" src="<?php echo $product->product_img[0]['src']; ?>">
                                        </div>
                                        <div class="body">
                                            <div class="label-discount clear"></div>
                                            <div class="title">
                                                <a href="<?= url('') ?>/product-detail/<?= $product->product_id ?>"><?= $product->product_name; ?></a>
                                            </div>

                                        </div>
                                        <div class="prices">

                                            <div class="price-current pull-right">&euro;<?= $product->price; ?></div>
                                        </div>
                                        <div class="hover-area">
                                            <div class="add-cart-button">
                                                <a href="<?= url('') ?>/addtocart/<?= $product->product_id ?>" class="le-button">add to cart</a>
                                            </div>
                                            <div class="wish-compare">
                                                <?php
                                                if (Auth::user()) {
                                                    ?>
                                                    <a class="btn-add-to-wishlist" href="<?= url('') ?>/addtowishlist/<?= $product->product_id ?>">add to wishlist</a>
                                                <?php } else { ?>
                                                    <a class="btn-add-to-wishlist" href="<?= url('') ?>/addtowishlistmsg">add to wishlist</a>
                                                    <?php
                                                }
                                                ?>


                                                <a class="btn-add-to-compare" href="#">compare</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>


                    </div>      
                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">

                        <?php
                        if (!empty($all_products)) {
                            foreach ($all_products as $product) {
                                ?>
                                <div class="col-sm-4 col-md-3 no-margin product-item-holder hover">
                                    <div class="product-item">
                                        <div class="ribbon blue"><span>new!</span></div> 
                                        <div class="image">
                                            <img alt="" src="<?php echo $product->product_img[0]['src']; ?>">
                                        </div>
                                        <div class="body">
                                            <div class="label-discount clear"></div>
                                            <div class="title">
                                                <a href="<?= url('') ?>/product-detail/<?= $product->product_id ?>"><?= $product->product_name; ?></a>
                                            </div>

                                        </div>
                                        <div class="prices">

                                            <div class="price-current pull-right">&euro;<?= $product->price; ?></div>
                                        </div>
                                        <div class="hover-area">
                                            <div class="add-cart-button">
                                                <a href="<?= url('') ?>/addtocart/<?= $product->product_id ?>" class="le-button">add to cart</a>
                                            </div>
                                            <div class="wish-compare">
                                                <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                                <a class="btn-add-to-compare" href="#">compare</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>






                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@stop