<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function pd_tl_cpt_init() {
	$args = array(
		'label'           => 'Timelines',
		'public'          => false,
		'show_ui'         => true,
		'capability_type' => 'post',
		'hierarchical'    => false,
		'rewrite'         => array( 'slug' => 'timeline' ),
		'query_var'       => true,
		'menu_icon'       => 'dashicons-calendar',
		'supports'        => array( 'title' ),
	);
	register_post_type( 'timeline', $args );
}
add_action( 'init', 'pd_tl_cpt_init' );

function pd_tl_shortcode_meta_boxes() {
	add_meta_box( 'pd-tl-shortcode', __( 'Shortcode', 'timelines' ), 'pd_tl_shortcode_display_callback', 'timeline', 'side' );
}
add_action( 'add_meta_boxes', 'pd_tl_shortcode_meta_boxes' );

function pd_tl_shortcode_display_callback( $post ) {
	$post_id     = absint( $post->ID );
	$shortcode   = '[timeline id=\'' . $post_id . '\' orientation=\'vertical\']';
	$shortcode_display = '[timeline id=&apos;' . $post_id . '&apos; orientation=&apos;vertical&apos;]';

	// phpcs:ignore WordPress.WP.EnqueuedResources.NonEnqueuedStylesheet -- meta box inline style; admin-only micro-style not suitable for a full enqueue.
	echo '<style>.postbox .inside{padding:0;}</style>';
	echo '<em style="padding:12px 12px 0;display:inline-block;">' . esc_html__( 'Copy and paste this shortcode into your post or page. Default orientation is vertical.', 'timelines' ) . '</em><br/><br/>';
	echo '<code style="margin:0 5px 25px;display:inline-block;">' . esc_html( $shortcode_display ) . '</code>';
	echo '<input type="text" value="' . esc_attr( $shortcode ) . '" id="pdtl-shortcode-input" style="opacity:0;position:absolute;">';
	echo '<div id="major-publishing-actions"><div id="delete-action"></div><div id="publishing-action" style="float:none;">';
	echo '<a href="#" class="button button-primary button-large" onclick="pdTlCopyShortcode()" title="' . esc_attr__( 'Copy to clipboard', 'timelines' ) . '">' . esc_html__( 'Copy', 'timelines' ) . '</a>';
	wp_print_inline_script_tag(
		'function pdTlCopyShortcode(){' .
		'var el=document.getElementById("pdtl-shortcode-input");' .
		'el.select();el.setSelectionRange(0,99999);' .
		'document.execCommand("copy");' .
		// translators: %s is the copied shortcode text.
		'alert("' . esc_js( __( 'Copied:', 'timelines' ) ) . ' "+el.value);' .
		'}'
	);
	echo '<div class="clear"></div></div></div>';
}
