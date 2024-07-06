<?php
/**
 * The template part for top header
 *
 * @package Services Landing Page
 * @subpackage services-landing-page
 * @since services-landing-page 1.0
 */
?>

<!-- Top Header -->
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 align-self-center text-lg-start text-md-start text-center pb-lg-0 pb-md-0 pb-3">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('ecommerce_landing_page_logo_title_hide_show',true) == 1){ ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('ecommerce_landing_page_logo_title_hide_show',true) == 1){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('ecommerce_landing_page_tagline_hide_show',false) == 1){ ?>
                <p class="site-description mb-0">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-7 col-md-6 col-6 align-self-center text-lg-center text-md-center text-center" >
        <div class="menu-section">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-6 align-self-center text-lg-end text-md-start text-center myaccount-icon">
        <?php if ( get_theme_mod('ecommerce_landing_page_topbar_myaccount_icon','') != '' || get_theme_mod('ecommerce_landing_page_top_myaccount_icon_url','') != '') {?>
          <a href="<?php echo esc_url(get_theme_mod('ecommerce_landing_page_top_myaccount_icon_url',false));?>">
           <i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_topbar_myaccount_icon','fas fa-user')); ?>"></i>
          </a>
      </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>