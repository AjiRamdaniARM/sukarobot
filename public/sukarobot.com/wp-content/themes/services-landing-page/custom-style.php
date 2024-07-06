<?php

	$ecommerce_landing_page_custom_css = '';

	/*--------------------------- Slider Opacity -------------------*/

	$ecommerce_landing_page_theme_lay = get_theme_mod( 'services_landing_page_slider_opacity_color','');
	if($ecommerce_landing_page_theme_lay == '0'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.1'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.1';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.2'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.2';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.3'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.3';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.4'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.4';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.5'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.5';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.6'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.6';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.7'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.7';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.8'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.8';
		$ecommerce_landing_page_custom_css .='}';
		}else if($ecommerce_landing_page_theme_lay == '0.9'){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:0.9';
		$ecommerce_landing_page_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$ecommerce_landing_page_slider_image_overlay = get_theme_mod('services_landing_page_slider_image_overlay', true);
	if($ecommerce_landing_page_slider_image_overlay == false){
		$ecommerce_landing_page_custom_css .='#banner img{';
			$ecommerce_landing_page_custom_css .='opacity:1;';
		$ecommerce_landing_page_custom_css .='}';
	}

	$ecommerce_landing_page_slider_image_overlay_color = get_theme_mod('services_landing_page_slider_image_overlay_color', true);
	if($ecommerce_landing_page_slider_image_overlay_color != false){
		$ecommerce_landing_page_custom_css .='#banner{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($ecommerce_landing_page_slider_image_overlay_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	// banner background img

	$services_landing_page_banner_img_background_color = get_theme_mod('services_landing_page_banner_img_background_color');
	if($services_landing_page_banner_img_background_color != false){
		$ecommerce_landing_page_custom_css .='.banner-image::after{';
			$ecommerce_landing_page_custom_css .='background-color: '.esc_attr($services_landing_page_banner_img_background_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}

	$services_landing_page_banner_border_color = get_theme_mod('services_landing_page_banner_border_color');
	if($services_landing_page_banner_border_color != false){
		$ecommerce_landing_page_custom_css .='.banner-image{';
			$ecommerce_landing_page_custom_css .='border: 3px solid'.esc_attr($services_landing_page_banner_border_color).';';
		$ecommerce_landing_page_custom_css .='}';
	}