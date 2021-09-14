<?php
function ltg3ever_add_base_presets( $presets, $theme_slug ) {
	$fonts = array(
		'hlogo' => 'Noto+Serif+JP:600',
		'menu'  => 'Noto+Serif+JP:600',
		'title' => 'Noto+Serif+JP:600',
		'text'  => 'Noto+Serif+JP:500',
	);

	$base_presets = array(
		'ever_nav-float'           => array(
			'label'   => __( 'EVERGREEN' ),
			'options' => array(
				'lightning_theme_options'      => array(
					'header_layout'         => 'nav-float',
					'g_nav_scrolled_layout' => 'nav-container',
				),
				'lightning_header_top_options' => array(
					'header_top_hidden'                  => false,
					'header_top_tel_hidden'              => false,
					'header_top_btn_hidden'              => true,
					'header_top_hidden_menu_and_contact' => false,
				),
				'vk_campaign_text'             => array(
					'display_position' => 'header_prepend',
				),
				'lightning_header_trans_options' => array(
					'trans_mode'         => 'none',
				),
				'vk_font_selector'             => $fonts,
			),
		),
		'ever_blog'           => array(
			'label'   => __( 'EVERGREEN Blog Style' ),
			'options' => array(
				'lightning_theme_options'      => array(
					'header_layout'         => 'center',
					'g_nav_scrolled_layout' => 'nav-container',
				),
				'lightning_header_top_options' => array(
					'header_top_hidden'                  => false,
					'header_top_tel_hidden'              => true,
					'header_top_btn_hidden'              => true,
					'header_top_hidden_menu_and_contact' => true,
				),
				'vk_campaign_text'             => array(
					'display_position' => 'header_apppend',
				),
				'lightning_header_trans_options' => array(
					'trans_mode'         => 'none',
				),
				'vk_font_selector'             => $fonts,
			),
		),
	);
	return array_merge( $presets, $base_presets );
}
add_filter( 'lightning_base_presets', 'ltg3ever_add_base_presets', 10, 2 );

function ltg3ever_add_color_presets( $presets, $theme_slug ) {
	$page_header = array(
		'common' => array(
			'text_color'    => '#fff',
			'cover_color'   => '#000',
			'cover_opacity' => 0.7,
			'height_min'    => 11,
			'image_fixed'   => 'fixed',
		),
		'post'   => array(
			'text_color'    => '#fff',
			'cover_color'   => '#000',
			'cover_opacity' => 0.7,
		),
		'page'   => array(
			'text_color'    => '#fff',
			'cover_color'   => '#000',
			'cover_opacity' => 0.7,
		),
	);

	$colors = array(
		'trans_kokeiro' => array(
			'label'   => __( 'EVERGREEN ヘッダー透過 / 苔色 / 黒 / 背景 和紙01' ),
			'options' => array(
				'vk_campaign_text'               => array(
					'display_position'      => 'header_prepend',
					'main_background_color' => '#1d3384',
				),
				'lightning_theme_options'        => array(
					'color_header_bg'       => '#000000',
					'color_key'             => '#69821b',
					'color_global_nav_bg'   => '#000000',
					'global_nav_border_top' => false,
					'bg_texture'            => 'jpnpaper01',
				),
				'lightning_header_top_options'   => array(
					'header_top_background_color'    => '#000000',
					'header_top_text_color'          => 'rgba(255,255,255,0.9)',
					'header_top_border_bottom_color' => 'rgba(255,255,255,0.1)',
				),
				'lightning_header_trans_options' => array(
					'enable'             => 'all',
					'background_color'   => '#000000',
					'background_opacity' => 0.3,
					'text_color'         => '#fff',
				),
				'vk_page_header'                 => $page_header,
				'vk_footer_option'               => array(
					'footer_background_color' => '#000000',
					'footer_text_color'       => 'rgba(255,255,255,0.8)',
				),
				'vkExUnit_sns_options'           => array(
					'snsBtn_color' => '#151515',
				),
				'theme_mods_' . $theme_slug      => array(
					// 'background_image' => VEKUAN_DIR_URL . 'assets/images/jpn_cloth.jpg',
					'background_image' => '',
					'background_color' => '',
				),
			),
		),
	);

	// ヘッダーが塗りつぶしの場合概ね共通の項目
	$color_header_no_trans = array(
		'options' => array(
			'vk_campaign_text'               => array(
				'display_position'      => 'header_append',
				'main_background_color' => '#dd9933',
			),
			'lightning_theme_options'        => array(
				'global_nav_border_top' => false,
				'bg_texture'            => 'jpn_cloth',
			),
			'lightning_header_top_options'   => array(
				'header_top_text_color'          => '#fff',
				'header_top_border_bottom_color' => 'rgba(255,255,255,0.1)',
			),
			'lightning_header_trans_options' => array(
				'enable'             => 'normal',
				'background_color'   => '#000000',
				'background_opacity' => 0.3,
				'text_color'         => '#fff',
			),
			'vk_page_header'                 => $page_header,
			'vk_footer_option'               => array(
				'footer_background_color' => '#151515',
				'footer_text_color'       => 'rgba(255,255,255,0.8)',
			),
			'vkExUnit_sns_options'           => array(
				'snsBtn_color' => '#151515',
			),
			'theme_mods_' . $theme_slug      => array(
				'background_image' => '',
				'background_color' => '',
			),
		),
	);

	// カラーバリエーション
	$color_array = array(
		'eve_aka'    => array(
			'label'           => __( 'EVERGREEN aka / 苔 / 黒 / 背景 布' ),
			'color_key'       => '#69821b',
			'header_bg_color' => '#0f3811',
		),
		'eve_ao'         => array(
			'label'           => __( 'EVERGREEN 青 / 苔 / 黒/ 背景 布' ),
			'color_key'       => '#69821b',
			'header_bg_color' => '#0f2350',
		),
	);

	foreach ( $color_array as $key => $value ) {
		$colors[ $key ]          = $color_header_no_trans;
		$colors[ $key ]['label'] = $value['label'];
		$colors[ $key ]['options']['lightning_theme_options']['color_key']                        = $value['color_key'];
		$colors[ $key ]['options']['lightning_theme_options']['color_header_bg']                  = $value['header_bg_color'];
		$colors[ $key ]['options']['lightning_theme_options']['color_global_nav_bg']              = $value['header_bg_color'];
		$colors[ $key ]['options']['lightning_header_top_options']['header_top_background_color'] = $value['header_bg_color'];
	}
	return array_merge( $presets, $colors );
}
add_filter( 'lightning_color_presets', 'ltg3ever_add_color_presets', 10, 2 );
