<?php
//about theme info
add_action( 'admin_menu', 'services_landing_page_gettingstarted' );
function services_landing_page_gettingstarted() {    	
	add_theme_page( esc_html__('About Services Landing Page', 'services-landing-page'), esc_html__('About Services Landing Page', 'services-landing-page'), 'edit_theme_options', 'services_landing_page_guide', 'services_landing_page_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function services_landing_page_admin_theme_style() {
   wp_enqueue_style('services-landing-page-custom-admin-style', esc_url(get_theme_file_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('services-landing-page-tabs', esc_url(get_theme_file_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'services_landing_page_admin_theme_style');

//guidline for about theme
function services_landing_page_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$services_landing_page_theme = wp_get_theme( 'services-landing-page' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Services Landing Page Theme', 'services-landing-page' ); ?> <span class="version"><?php esc_html_e( 'Version:', 'services-landing-page' ); ?><?php echo esc_html($services_landing_page_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','services-landing-page'); ?></p>
    </div>

   <div class="tab-sec">
		<div class="tab">
		  	<button class="tablinks" onclick="services_landing_page_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'services-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="services_landing_page_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'services-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="services_landing_page_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'services-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="services_landing_page_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'services-landing-page' ); ?></button>
		  	<button class="tablinks" onclick="services_landing_page_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'services-landing-page' ); ?></button>
		</div>
		
		<?php
			$services_landing_page_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$services_landing_page_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Services_Landing_Page_Plugin_Activation_Settings::get_instance();
				$services_landing_page_actions = $plugin_ins->recommended_actions;
				?>
				<div class="services-landing-page-recommended-plugins">
				    <div class="services-landing-page-action-list">
				        <?php if ($services_landing_page_actions): foreach ($services_landing_page_actions as $key => $services_landing_page_actionValue): ?>
				                <div class="services-landing-page-action" id="<?php echo esc_attr($services_landing_page_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($services_landing_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($services_landing_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($services_landing_page_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','services-landing-page'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($services_landing_page_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'services-landing-page' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Services Landing Page is a dynamic and versatile WordPress theme designed for businesses and corporations seeking to establish a strong online presence. With its customizable features and user-friendly interface, this theme offers endless possibilities for creating stunning websites. Leveraging the power of Elementor, users can easily design custom layouts that perfectly reflect their brand identity. The theme&#39;s fluid and responsive design ensures seamless viewing across all devices, including mobile and iOS platforms. For businesses in diverse industries such as photography, portfolio showcasing, or creative projects, this theme provides the ideal platform to exhibit their work effectively. Moreover, WooCommerce integration empowers users to seamlessly set up online stores and sell products or services directly from their website. With built-in SEO optimization, the theme ensures maximum visibility in search engine results, enhancing the chances of attracting potential customers. Whether you&#39;re operating a fashion boutique, an electronics store, or a food delivery service, the Services Landing Page WordPress Theme caters to your specific needs. Its clean and modern design, coupled with a range of customization options, allows businesses to create unique and engaging websites tailored to their target audience. From multi-vendor marketplaces to online supermarkets, the Services Landing Page WordPress Theme provides a solid foundation for businesses to thrive in the digital landscape.','services-landing-page'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'services-landing-page' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'services-landing-page' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'services-landing-page' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'services-landing-page'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'services-landing-page'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'services-landing-page'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'services-landing-page'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'services-landing-page'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'services-landing-page'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'services-landing-page'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'services-landing-page'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'services-landing-page'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'services-landing-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','services-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_banner') ); ?>" target="_blank"><?php esc_html_e('Banner Settings','services-landing-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_topbar_section') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','services-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_latest_news_blog_section') ); ?>" target="_blank"><?php esc_html_e('Latest News And Blog Section','services-landing-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','services-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','services-landing-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','services-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=services_landing_page_feature_courses_section') ); ?>" target="_blank"><?php esc_html_e('About Section','services-landing-page'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','services-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','services-landing-page'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','services-landing-page'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','services-landing-page'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','services-landing-page'); ?></span><?php esc_html_e(' Go to ','services-landing-page'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','services-landing-page'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','services-landing-page'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','services-landing-page'); ?></span><?php esc_html_e(' Go to ','services-landing-page'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','services-landing-page'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','services-landing-page'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','services-landing-page'); ?> <a class="doc-links" href="https://preview.vwthemesdemo.com/docs/free-services-landing-page/" target="_blank"><?php esc_html_e('Documentation','services-landing-page'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>		

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Services_Landing_Page_Plugin_Activation_Settings::get_instance();
			$services_landing_page_actions = $plugin_ins->recommended_actions;
			?>
				<div class="services-landing-page-recommended-plugins">
				    <div class="services-landing-page-action-list">
				        <?php if ($services_landing_page_actions): foreach ($services_landing_page_actions as $key => $services_landing_page_actionValue): ?>
				                <div class="services-landing-page-action" id="<?php echo esc_attr($services_landing_page_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($services_landing_page_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($services_landing_page_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($services_landing_page_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'services-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="services-landing-page-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','services-landing-page'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
						<h3><?php esc_html_e( 'Link to customizer', 'services-landing-page' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','services-landing-page'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','services-landing-page'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','services-landing-page'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','services-landing-page'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','services-landing-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','services-landing-page'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=ecommerce_landing_page_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','services-landing-page'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','services-landing-page'); ?></a>
								</div> 
							</div>

						</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Services_Landing_Page_Plugin_Activation_Woo_Products::get_instance();
				$services_landing_page_actions = $plugin_ins->recommended_actions;
				?>
				<div class="services-landing-page-recommended-plugins">
					    <div class="services-landing-page-action-list">
					        <?php if ($services_landing_page_actions): foreach ($services_landing_page_actions as $key => $services_landing_page_actionValue): ?>
					                <div class="services-landing-page-action" id="<?php echo esc_attr($services_landing_page_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($services_landing_page_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($services_landing_page_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($services_landing_page_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'services-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="services-landing-page-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','services-landing-page'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','services-landing-page'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','services-landing-page'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','services-landing-page'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','services-landing-page'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','services-landing-page'); ?></span></b></p>
	              	<div class="services-landing-page-pattern-page-btn">
				    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','services-landing-page'); ?>
				    		</a>
			    		</div>
	              	<p><?php esc_html_e('You can create a template as you like.','services-landing-page'); ?></span></p>
			  </div>
			<?php } ?>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'services-landing-page' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Services Landing Page is a dynamic and versatile WordPress theme designed for businesses and corporations seeking to establish a strong online presence. With its customizable features and user-friendly interface, this theme offers endless possibilities for creating stunning websites. Leveraging the power of Elementor, users can easily design custom layouts that perfectly reflect their brand identity. The theme&#39;s fluid and responsive design ensures seamless viewing across all devices, including mobile and iOS platforms. For businesses in diverse industries such as photography, portfolio showcasing, or creative projects, this theme provides the ideal platform to exhibit their work effectively. Moreover, WooCommerce integration empowers users to seamlessly set up online stores and sell products or services directly from their website. With built-in SEO optimization, the theme ensures maximum visibility in search engine results, enhancing the chances of attracting potential customers. Whether you&#39;re operating a fashion boutique, an electronics store, or a food delivery service, the Services Landing Page WordPress Theme caters to your specific needs. Its clean and modern design, coupled with a range of customization options, allows businesses to create unique and engaging websites tailored to their target audience. From multi-vendor marketplaces to online supermarkets, the Services Landing Page WordPress Theme provides a solid foundation for businesses to thrive in the digital landscape.','services-landing-page'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'services-landing-page'); ?></a>
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'services-landing-page'); ?></a>
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'services-landing-page'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'services-landing-page' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'services-landing-page'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'services-landing-page'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'services-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'services-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'services-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'services-landing-page'); ?></td>
								<td class="table-img"><?php esc_html_e('14', 'services-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'services-landing-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'services-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'services-landing-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'services-landing-page'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'services-landing-page'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'services-landing-page'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'services-landing-page'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( SERVICES_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'services-landing-page'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'services-landing-page'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'services-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'services-landing-page'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'services-landing-page'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'services-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'services-landing-page'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'services-landing-page'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'services-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'services-landing-page'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'services-landing-page'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'services-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','services-landing-page'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'services-landing-page'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'services-landing-page'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( SERVICES_LANDING_PAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'services-landing-page'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>