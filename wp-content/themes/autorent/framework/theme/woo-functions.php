<?php  



/*-------------------------------------------------------------------------
   REMOVE PRODUCT TABS STARTS
 ------------------------------------------------------------------------- */ 

function autorent_woo_remove_product_tabs( $tabs ) {

    global $product, $post;

    $product_type = get_product($post->ID)->product_type;

    if($product_type === 'uou_booking'){

      unset( $tabs['description'] );          
      unset( $tabs['additional_information'] ); 
         
      return $tabs;

    }else{

      return $tabs;
    }
    
}

add_filter( 'woocommerce_product_tabs', 'autorent_woo_remove_product_tabs', 98 );

/*-------------------------------------------------------------------------
  REMOVE PRODUCT TABS END
------------------------------------------------------------------------- */


/*-------------------------------------------------------------------------
  ADDED CUSTOM INFORMATION TAB START 
------------------------------------------------------------------------- */

function autorent_top_rated_reviews_product_tab( $tabs ) {

     $type = get_the_terms( get_the_ID(),'types' );
     
   
    /*$tabs['top_rated_review'] = array(
        'title'     => __( 'Top Rated Reviews', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'autorent_woo_new_product_tab_content'
    );*/


    $tabs['amenities'] = array(
        'title'     => __( 'Amenities', 'woocommerce' ),
        'priority'  => 55,
        'callback'  => 'autorent_amenities_tab_content'
    );

      
    return $tabs;
 
}


/*-------------------------------------------------------------------------
  Callback function for amenities start
------------------------------------------------------------------------- */



function autorent_amenities_tab_content(){

    $amenities = get_the_terms(get_the_ID(),'amenity');  ?>  
        
        <!-- start row -->
        <div class="row">

          <?php if(isset($amenities) && is_array($amenities)){ ?>
           
            
            <ul class="check-list">
              <?php foreach($amenities as $key => $value){ ?>
                
                <li class="col-sm-4"><?php echo esc_attr($amenities[$key]->name); ?></li>
               
              <?php } ?>
            </ul>
           
           
          <?php } ?>

        </div>
        <!-- end row -->

<?php

}



/*-------------------------------------------------------------------------
  Callback function for amenities end
------------------------------------------------------------------------- */





/*-------------------------------------------------------------------------
  Callback function for top rated product start
------------------------------------------------------------------------- */



function autorent_woo_new_product_tab_content() { ?>


  <?php 

    $product_reviews = get_comments( array( 'post_id' => get_the_ID() ) );
    //$rating = intval( get_comment_meta( $product_reviews->comment_ID, 'rating', true ) );
    //wp_list_comments();



   
    if(isset($product_reviews) && !empty($product_reviews)){

      echo '<div id="reviews"><div  id="comments"><ol class="commentlist">';


      foreach($product_reviews as $key => $value){
        $rating = intval( get_comment_meta( $value->comment_ID, 'rating', true ) ); ?>

        <?php if($rating === 5)  :  ?>



        <li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

          <div id="comment-<?php echo esc_attr($value->comment_ID); ?>" class="comment_container">
            

            <div class="comment-text">

              <?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>

                <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>">
                  <span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo esc_attr($rating); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
                </div>

              <?php endif; ?>


                <p class="meta">
                  <strong itemprop="author"><?php echo esc_attr($value->comment_author); ?></strong> <?php

                    if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
                      if ( wc_customer_bought_product( $value->comment_author_email, $value->user_id, $value->comment_post_ID ) )
                        echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> ';

                  ?>&ndash; <time itemprop="datePublished" datetime="<?php echo esc_attr(get_comment_date( 'c' )); ?>"><?php echo esc_attr(get_comment_date( __( get_option( 'date_format' ), 'woocommerce' ) )); ?></time>:
                </p>

      

              <div itemprop="description" class="description"><?php echo esc_attr($value->comment_content); ?></div>
            </div>
          </div>
        </li>


        <?php endif; ?>


        
      <?php }

      echo '</ol></div></div>';
    }else{  ?>

      <p class="woocommerce-noreviews"><?php _e('There are no top rated reviews yet.','concierge'); ?></p>

    <?php }   ?>


<?php
}



/*-------------------------------------------------------------------------
  Callback function for top rated product end
------------------------------------------------------------------------- */



add_filter( 'woocommerce_product_tabs', 'autorent_top_rated_reviews_product_tab' );

/*-------------------------------------------------------------------------
  ADDED CUSTOM INFORMATION TAB END
------------------------------------------------------------------------- */




/*-------------------------------------------------------------------------
  START DISABLE WOO-COMMERCE CSS
------------------------------------------------------------------------- */


function autorent_dequeue_styles( $enqueue_styles ) {
  //unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
  //unset( $enqueue_styles['woocommerce-layout'] );     // Remove the layout
  unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
  return $enqueue_styles;
}

add_filter( 'woocommerce_enqueue_styles', 'autorent_dequeue_styles' );


/*-------------------------------------------------------------------------
  END DISABLE WOO-COMMERCE CSS
------------------------------------------------------------------------- */



/*-------------------------------------------------------------------------
  START SHOP PAGE REDIRECT FROM CART PAGE
------------------------------------------------------------------------- */

function autorent_shop_page_redirect(){

  global $concierge_option_data; 

  if(isset($concierge_option_data['concierge-select-search-page']) && !empty($concierge_option_data['concierge-select-search-page'])){
    
    $search_page_id = $concierge_option_data['concierge-select-search-page'];  
    $shop_page_url = get_permalink($search_page_id );
                    
  }else{

    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
   
  }

  return $shop_page_url;

}

add_filter('woocommerce_return_to_shop_redirect','autorent_shop_page_redirect' );

/*-------------------------------------------------------------------------
  END SHOP PAGE REDIRECT FROM CART PAGE
------------------------------------------------------------------------- */






