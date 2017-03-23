@extends('layouts.general')
@section('content')

<section id="cart-page">
    <div class="container">
   
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
            <?php
            if (!empty($all_products)) {
                
                ?> <h3> <?= $friends->name ?>'s wishlist</h3><?php
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
            }else{}
            echo "No Wishlist Found";
            ?>


        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->

        <!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>
</section>
@stop