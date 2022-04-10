<?php
/**
 * EVERGREEEN Preset Function
 *
 * @package         LIGHTNING_G3_EVERGREEN
 */

/**
 * Evergreen Base Presets
 *
 * @param array  $presets    現在のプリセットの配列.
 * @param string $theme_slug テーマのスラッグ.
 */
function ltg3ever_add_base_presets( $presets, $theme_slug ) {
	$fonts = array(
		'hlogo' => 'Noto+Sans+JP:700',
		'menu'  => 'Noto+Sans+JP:400',
		'title' => 'Noto+Sans+JP:700',
		'text'  => 'Noto+Sans+JP:400',
	);

	$base_presets = array(
		'ever_nav-float'          => array(
			'label'   => __( 'Evergreen', 'lightning-g3-evergreen' ),
			'options' => array(
				'lightning_theme_options'        => array(
					'header_layout'         => 'nav-float',
					'g_nav_scrolled_layout' => 'nav-container',
				),
				'lightning_header_top_options'   => array(
					'header_top_hidden'                  => false,
					'header_top_tel_hidden'              => false,
					'header_top_btn_hidden'              => true,
					'header_top_hidden_menu_and_contact' => false,
				),
				'vk_campaign_text'               => array(
					'display_position' => 'header_prepend',
				),
				'lightning_header_trans_options' => array(
					'trans_mode' => 'none',
				),
				'vk_font_selector'               => $fonts,
			),
		),
		// ナビ縦書き
		'ever_nav-float-vertical' => array(
			'label'   => __( 'EVERGREEN ナビ縦書き', 'lightning-g3-evergreen' ),
			'options' => array(
				'lightning_theme_options'        => array(
					'header_layout'         => 'nav-float_and_vertical',
					'g_nav_scrolled_layout' => 'logo-and-nav-container',
				),
				'lightning_header_top_options'   => array(
					'header_top_hidden'                  => false,
					'header_top_tel_hidden'              => false,
					'header_top_btn_hidden'              => false,
					'header_top_hidden_menu_and_contact' => false,
				),
				'vk_campaign_text'               => array(
					'display_position' => 'header_prepend',
				),
				'lightning_header_trans_options' => array(
					'trans_mode' => 'gradation_pc',
				),
				'vk_font_selector'               => $fonts,
			),
		),
		// 中央
		'ever_nav-center'         => array(
			'label'   => __( 'EVERGREEN 中央', 'lightning-g3-evergreen' ),
			'options' => array(
				'lightning_theme_options'        => array(
					'header_layout'         => 'center',
					'g_nav_scrolled_layout' => 'nav-container',
				),
				'lightning_header_top_options'   => array(
					'header_top_hidden'                  => false,
					'header_top_tel_hidden'              => false,
					'header_top_btn_hidden'              => false,
					'header_top_hidden_menu_and_contact' => false,
				),
				'vk_campaign_text'               => array(
					'display_position' => 'header_apppend',
				),
				'lightning_header_trans_options' => array(
					'trans_mode' => 'none',
				),
				'vk_font_selector'               => $fonts,
			),
		),
	);
	return array_merge( $presets, $base_presets );
}
add_filter( 'lightning_base_presets', 'ltg3ever_add_base_presets', 10, 2 );

/**
 * Evergreen Color Presets
 *
 * @param array  $presets    現在のプリセットの配列.
 * @param string $theme_slug テーマのスラッグ.
 */
function ltg3ever_add_color_presets( $presets, $theme_slug ) {
	$page_header = array(
		'common' => array(
			'text_color'    => '#fff',
			'cover_color'   => '#000',
			'cover_opacity' => 0.6,
			'height_min'    => 15,
			'image_fixed'   => false,
		),
		'post'   => array(
			'text_color'    => '#fff',
			'cover_color'   => '#000',
			'cover_opacity' => 0.6,
		),
		'page'   => array(
			'text_color'    => '#fff',
			'cover_color'   => '#000',
			'cover_opacity' => 0.6,
		),
	);

	$colors = array(
		'trans_green' => array(
			'label'   => __( 'EVERGREEN ヘッダートップ透過 / 緑 / 緑', 'lightning-g3-evergreen' ),
			'options' => array(
				// キャンペーンテキスト
				'vk_campaign_text'               => array(
					'display_position'              => 'header_prepend',
					'main_background_color'         => '#e21a23',

					'main_text_color'               => '#fff',
					'button_text_color'             => '#333',
					'button_background_color'       => '#fff',
					'button_text_hover_color'       => '#333',
					'button_background_hover_color' => '#fff',

				),
				'lightning_theme_options'        => array(
					'color_header_bg'       => false,
					'color_key'             => '#3c8b86',
					'color_global_nav_bg'   => '',
					'global_nav_border_top' => false,
				),
				// ヘッダートップ
				'lightning_header_top_options'   => array(
					'header_top_background_color'    => '#ffffff',
					'header_top_text_color'          => 'rgba(0,0,0,0,0.9)',
					'header_top_border_bottom_color' => 'rgba(0,0,0,0.04)',
				),
				// ヘッダーの透過
				'lightning_header_trans_options' => array(
					'enable'             => 'front',
					'background_color'   => '#ffffff',
					'background_opacity' => 0,
					'text_color'         => '#fff',
				),
				'vk_page_header'                 => $page_header,
				'vk_footer_option'               => array(
					'footer_background_color' => '#3c8b86',
					'footer_text_color'       => 'rgba(255,255,255,0.8)',
				),
				'vkExUnit_sns_options'           => array(
					'snsBtn_color' => '#3c8b86',
				),
				'theme_mods_' . $theme_slug      => array(
					'background_image' => '',
					'background_color' => '',
				),
			),
		),
	);

	// ヘッダーが塗りつぶしの場合概ね共通の項目
	$color_header_no_trans = array(
		'options' => array(
			// キャンペーンテキスト
			'vk_campaign_text'               => array(
				'display_position'              => 'header_append',
				'main_background_color'         => '#fff',
				'main_text_color'               => '#333',
				'button_text_color'             => '#fff',
				'button_background_color'       => '#b1271b',
				'button_text_hover_color'       => '#fff',
				'button_background_hover_color' => '#b1271b',
			),
			'lightning_theme_options'        => array(
				'global_nav_border_top' => false,
			),
			'lightning_header_top_options'   => array(
				'header_top_text_color'          => '#fff',
				'header_top_border_bottom_color' => 'rgba(255,255,255,0.1)',
			),
			// ヘッダー
			'lightning_header_trans_options' => array(
				'enable'             => 'normal',
				'background_color'   => '',
				'background_opacity' => 0,
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
		'eve_red'    => array(
			'label'           => __( 'EVERGREEN 赤系 / 赤 / 黒', 'lightning-g3-evergreen' ),
			'color_key'       => '#b1271b',
			'header_bg_color' => '#d82c1c',
		),
		'eve_orange' => array(
			'label'           => __( 'EVERGREEN 橙系 / 橙 / 黒', 'lightning-g3-evergreen' ),
			'color_key'       => '#ef9f2f',
			'header_bg_color' => '#e77619',
		),
		'eve_blue'   => array(
			'label'           => __( 'EVERGREEN 青系 / 青 / 黒', 'lightning-g3-evergreen' ),
			'color_key'       => '#2084B9',
			'header_bg_color' => '#165290',
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
