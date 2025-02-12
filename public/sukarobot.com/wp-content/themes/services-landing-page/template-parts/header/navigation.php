<?php
/**
 * The template part for header
 *
 * @package Services Landing Page 
 * @subpackage services-landing-page
 * @since services-landing-page 1.0
 */
?>

<div id="header" class="py-lg-0 ">
  <div class="toggle-nav mobile-menu text-center">
    <button role="tab" onclick="ecommerce_landing_page_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','services-landing-page'); ?></span></button>
  </div>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'services-landing-page' ); ?>">
      <?php 
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'main-menu clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
       ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="ecommerce_landing_page_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','services-landing-page'); ?></span></a>
    </nav>
  </div>
</div>