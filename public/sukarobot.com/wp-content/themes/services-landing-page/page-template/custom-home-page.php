<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php if( get_theme_mod( 'ecommerce_landing_page_show_hide_banner',true) == 1) { ?>
    <section id="banner" class="position-relative wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container  pt-xl-5 mt-xl-4 pt-lg-3 mt-lg-3 pt-md-2">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12 banner-main-text align-self-center">
            <div class="inner_carousel">
              <?php if(get_theme_mod('ecommerce_landing_page_tagline_title') != '') {?>
                <h2 class="mb-3 mt-3"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_tagline_title')) ?></h2>
              <?php }?>
              <?php if(get_theme_mod('ecommerce_landing_page_designation_text') != '') {?>
                <p class="slider-para"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_designation_text')) ?></p>
              <?php }?>
              <div class="row">
                <div class="col-lg-5 col-md-6 col-12 align-self-center">
                  <?php if ( get_theme_mod('ecommerce_landing_page_banner_button_label','') != '' ) {?>
                    <div class ="read-more mt-md-4 mt-0">
                      <a href="<?php echo esc_url(get_theme_mod('ecommerce_landing_page_top_button_url',false));?>"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_banner_button_label',''));?>
                        <span class="screen-reader-text"><?php esc_html_e( '','services-landing-page');?></span>
                      </a>
                    </div>
                  <?php }?>
                </div>
                <div class="col-lg-7 col-md-6 col-12 video-btn align-self-center d-flex">
                 <?php if ( get_theme_mod('services_landing_page_video_button_text','') != '' ) {?>
                    <a id="openBtn"><i class="<?php echo esc_attr(get_theme_mod('services_landing_page_video_button_icon','fas fa-play')); ?>"></i></a>
                    <p class="video-text align-self-center mb-0 ms-2"><?php echo esc_html( get_theme_mod('services_landing_page_video_button_text','') ); ?></p>
                      <div class="overlay" id="videoOverlay">
                        <div class="popup">
                          <span class="close-btn"><i class="fas fa-times"></i></span>
                          <iframe width="100%" height="100%" src="<?php echo esc_url(get_theme_mod('services_landing_page_video_button_url'));?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                      </div>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <?php if( get_theme_mod( 'services_landing_page_show_hide_image_sec',false) == 1) { ?>
            <div class="col-lg-6 col-md-6 col-12 banner-col-left align-self-lg-center position-relative">
              <div class="banner-image  text-center">
                <?php if(get_theme_mod('services_landing_page_banner_image',false) != '') {?>
                  <img src="<?php echo esc_url(get_theme_mod('services_landing_page_banner_image')); ?>" alt="" />
                <?php }?>
                <?php if(get_theme_mod('services_landing_page_activecientcount_title') != '' || get_theme_mod('services_landing_page_activecientcount_icon','fas fa-bolt') != '' ) {?>
                <div class="icon1">
                   <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_activecientcount_icon',' icon fas fa-bolt')); ?>"></i>
                    <p class="icon1-para"><?php echo esc_html(get_theme_mod('services_landing_page_activecientcount_title')) ?></p>
                </div>
              <?php }?>
              <?php if(get_theme_mod('services_landing_page_activecientcount_title1') != '' || get_theme_mod('services_landing_page_activecientcount_icon1') != '') {?>
                <div class="icon2">
                   <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_activecientcount_icon1','icon fa-solid fa-fan')); ?>"></i>
                   <p class="icon1-para"><?php echo esc_html(get_theme_mod('services_landing_page_activecientcount_title1')) ?></p>
                </div>
              <?php }?>
              <?php if(get_theme_mod('services_landing_page_activecientcount_title2') != '' || get_theme_mod('services_landing_page_activecientcount_icon2','fas fa-wrench') != '') {?>
                <div class="icon3">
                   <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_activecientcount_icon2','icon fas fa-wrench')); ?>"></i>
                   <p class="icon1-para"><?php echo esc_html(get_theme_mod('services_landing_page_activecientcount_title2')) ?></p>
                </div>
              <?php }?>
              <?php if(get_theme_mod('services_landing_page_activecientcount_title3') != '' || get_theme_mod('services_landing_page_activecientcount_icon3') != '') {?>
                <div class="icon4">
                   <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_activecientcount_icon3','icon fas fa-screwdriver')); ?>"></i>
                   <p class="icon1-para1"><?php echo esc_html(get_theme_mod('services_landing_page_activecientcount_title3')) ?></p>
                </div>
              <?php }?>
              <?php if(get_theme_mod('services_landing_page_activecientcount_title4') != '' || get_theme_mod('services_landing_page_activecientcount_icon4') != '') {?>
                <div class="icon5">
                  <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_activecientcount_icon4','icon fas fa-palette')); ?>"></i>
                  <p class="icon1-para1"><?php echo esc_html(get_theme_mod('services_landing_page_activecientcount_title4')) ?></p>
                </div>
              <?php }?>
              <?php if(get_theme_mod('services_landing_page_activecientcount_title5') != '' || get_theme_mod('services_landing_page_activecientcount_icon5') != '') {?>
                <div class="icon6">
                  <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_activecientcount_icon5','icon fas fa-gavel')); ?>"></i>
                  <p class="icon1-para1"><?php echo esc_html(get_theme_mod('services_landing_page_activecientcount_title5')) ?></p>
                </div>
              <?php }?>
              </div>

          <?php }?>

        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'ecommerce_landing_page_after_slider' ); ?>
  
  <!--  Feature Courses Section -->
  <section id="feature-courses-section" class="wow bounceInDown delay-1000 py-5" data-wow-duration="3s">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mainservice-sections position-relative">
          <div class="service-image">
            <?php if(get_theme_mod('services_landing_page_service_banner_image') != '') {?>
              <img src="<?php echo esc_url(get_theme_mod('services_landing_page_service_banner_image')); ?>" alt="" />
            <?php }?>
          </div>
          <div class="service-image-small">
            <?php if(get_theme_mod('services_landing_page_service_smallbanner_image') != '') {?>
              <img src="<?php echo esc_url(get_theme_mod('services_landing_page_service_smallbanner_image')); ?>" alt="" />
            <?php }?>
          </div>
          <div class="service-image-small-para">
            <?php if(get_theme_mod('services_landing_page_professional_image') != '' || get_theme_mod('services_landing_page_professional_title') != '') {?>
              <img src="<?php echo esc_url(get_theme_mod('services_landing_page_professional_image')); ?>" alt="" />
              <p class="service-span"><?php echo esc_html(get_theme_mod('services_landing_page_professional_title')) ?></p>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-service-section pb-4">
            <?php if(get_theme_mod('services_landing_page_service_title1') != '') {?>
              <h3 class="post-title-main-heading"><?php echo esc_html(get_theme_mod('services_landing_page_service_title1')) ?></h3>
            <?php }?>
            <?php if(get_theme_mod('services_landing_page_service_para') != '') {?>
              <p class="post-para"><?php echo esc_html(get_theme_mod('services_landing_page_service_para')) ?></p>
            <?php }?>
            <div class="row">
              <?php for ($i=1; $i <= 4 ; $i++) { ?>
                <div class="col-lg-12 col-md-6 d-flex gap-2 align-items-center mb-2">
                  <div class="list-main-sec">
                   <i class="<?php echo esc_attr(get_theme_mod('services_landing_page_list_icon'.$i, 'fas fa-check')); ?>"></i> 
                  </div>
                  <span class="list-sec mb-0"><?php echo esc_html(get_theme_mod('services_landing_page_page_list'.$i));?></span>
                </div>
              <?php }?>
            </div>
          </div>
          <div class="author-sec pt-4">
            <?php if(get_theme_mod('services_landing_page_service_author_image') != '') {?>
              <img src="<?php echo esc_url(get_theme_mod('services_landing_page_service_author_image')); ?>" alt="" />
            <?php }?>
            <div class="service-author">
              <?php if(get_theme_mod('services_landing_page_author_title') != '' || get_theme_mod('services_landing_page_author_text') != '' ) {?>
                <h4 class="post-title-heading"><?php echo esc_html(get_theme_mod('services_landing_page_author_title')) ?></h4>
                <p class="post-para-sec"><?php echo esc_html(get_theme_mod('services_landing_page_author_text')) ?></p>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- latest news and blog Section -->
  <?php if( get_theme_mod( 'ecommerce_landing_page_latest_news_blog_heading')|| get_theme_mod( 'ecommerce_landing_page_latest_news_blog_small_title') || get_theme_mod( 'ecommerce_landing_page_events_category')) { ?>
    <section id="latest-post-section" class="wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container"> 
        <div class="latest-post-head">
          <?php if( get_theme_mod('ecommerce_landing_page_latest_news_blog_heading') != '' ){ ?>
            <h4 class="heading-text text-center"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_latest_news_blog_heading',''));?></h4>
          <?php }?>
          <?php if( get_theme_mod('ecommerce_landing_page_latest_news_blog_small_title') != '' ){ ?>
            <p class="small-text text-center"><?php echo esc_html(get_theme_mod('ecommerce_landing_page_latest_news_blog_small_title',''));?></p>
          <?php }?>
        </div>
        <div class="row">
          <?php
            $ecommerce_landing_page_catdata=  get_theme_mod('ecommerce_landing_page_events_category');
            if($ecommerce_landing_page_catdata){
            $page_query = new WP_Query(array( 'category_name' => esc_html($ecommerce_landing_page_catdata ,'services-landing-page'))); ?>         
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4 col-md-6 pb-5">
                <div class="events-box position-relative">
                  <?php if(has_post_thumbnail()){
                   the_post_thumbnail(); ?>
                  <span class="event-date"><?php echo esc_html( get_the_date() ); ?></span>
                  <?php } ?>
                  <span class="event-location"><?php the_category(); ?></span>
                  <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h5>
                  <div class="author-comment d-flex gap-4 align-items-center">
                    <?php if( get_theme_mod( 'ecommerce_landing_page_blog_latest_post_author',true) == 1 || get_theme_mod( 'ecommerce_landing_page_blog_latest_post_comments',true) == 1 ) { ?>
                      <?php if(get_theme_mod('ecommerce_landing_page_blog_latest_post_author',true)==1){ ?>
                        <span class="entry-author">
                          <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_latest_post_author_icon','fas fa-user')); ?> me-2">
                          </i>
                          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?>
                            <span class="screen-reader-text"><?php the_author(); ?></span>
                          </a>
                        </span>
                      <?php } ?>
                      <?php if(get_theme_mod('ecommerce_landing_page_blog_latest_post_comments',true)==1){ ?>
                        <span class="entry-comments">
                          <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_latest_post_comments_icon','fas fa-comment')); ?> me-2" aria-hidden="true">
                          </i>
                          <?php comments_number( __('0 Comment', 'services-landing-page'), __('0 Comments', 'services-landing-page'), __('% Comments', 'services-landing-page') ); ?>
                        </span>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();}
          ?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'ecommerce_landing_page_after_latest_news_blog_section' ); ?>  

  <div id="content-vw" class="py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>