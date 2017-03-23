<?php $__env->startSection('content'); ?><div class="container">

    <!-- ========================================= SIDEBAR ========================================= -->
    <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

        <!-- ========================================= PRODUCT FILTER ========================================= -->

        <!-- ========================================= PRODUCT FILTER : END ========================================= -->
        <!-- ========================================= CATEGORY TREE ========================================= -->

        <!-- ========================================= CATEGORY TREE : END ========================================= -->
        <!-- ========================================= LINKS ========================================= -->

        <!-- ========================================= LINKS : END ========================================= -->
        <div class="widget">
            <div class="simple-banner">
                <a href="#"><img alt="" class="img-responsive" src="<?php echo url(''); ?>/assets/images/banners/banner-simple.jpg"></a>
            </div>
        </div>
        <!-- ========================================= FEATURED PRODUCTS ========================================= -->
        <div class="widget">
            <h1 class="border">Featured Products</h1>
            <ul class="product-list">
                <?php
                if (!empty($featured_all_products)) {
                    foreach ($featured_all_products as $f_product) {
                        ?>
                        <li class="sidebar-product-list-item">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <a href="<?= url('') ?>/product-detail/<?= $f_product->product_id ?>" class="thumb-holder">
                                        <img alt="" src="<?php echo $f_product->product_img[0]['src']; ?>">
                                    </a>
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="<?= url('') ?>/product-detail/<?= $f_product->product_id ?>"><?= $f_product->product_name ?> </a>
                                    <div class="price">

                                        <div class="price-current">&euro;<?= $f_product->price ?></div>
                                    </div>
                                </div>  
                            </div>
                        </li><!-- /.sidebar-product-list-item -->

                        <?php
                    }
                }
                ?>
            </ul><!-- /.product-list -->

        </div><!-- /.widget -->

        <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
    </div>

    <!-- ========================================= SIDEBAR : END ========================================= -->

    <!-- ========================================= CONTENT ========================================= -->

    <div class="col-xs-12 col-sm-9 no-margin wide sidebar">



        <section id="gaming">
            <div class="grid-list-products">
                <h2 class="section-title"><?= $category_name->category_name ?></h2>

                <div class="control-bar">  

                    <form action="<?= url('') ?>/category-id/<?= $category_name->category_id ?>" method="post" class="form_save">
                        <?php echo e(csrf_field()); ?>

                        <div id="popularity-sort" class="le-select">
                            <select class="order_by" name="order_by">
                                <option value=" ">Order By</option>
                                <option value="price" <?= (isset($slug) && $slug == 'price') ? "selected" : "" ?>>Price</option>
                                <option value="name" <?= (isset($slug) && $slug == 'name') ? "selected" : "" ?>>Name</option>
                            </select>    
                        </div>
                    </form>


                </div><!-- /.control-bar -->

                <div class="tab-content">
                    <div id="grid-view" class="products-grid fade tab-pane in active">

                        <div class="product-grid-holder">
                            <div class="row no-margin">
                                <?php
                                if (!empty($all_products)) {
                                    foreach ($all_products as $product) {
                                        ?>
                                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                                            <div class="product-item">

                                                <div class="image">
                                                    <img alt="" src="<?php echo $product->product_img[0]['src']; ?>">
                                                </div>
                                                <div class="body">

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
                                            </div><!-- /.product-item -->
                                        </div><!-- /.product-item-holder -->
                                        <?php
                                    }
                                } else {
                                    echo "No Products Found";
                                }
                                ?>


                            </div><!-- /.row -->
                        </div><!-- /.product-grid-holder -->

                     
                        
                    </div><!-- /.products-grid #grid-view -->



                </div><!-- /.tab-content -->
            </div><!-- /.grid-list-products -->

        </section><!-- /#gaming -->                        
    </div><!-- /.col -->
    <!-- ========================================= CONTENT : END ========================================= -->    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>