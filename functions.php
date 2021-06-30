<?php
// bodyクラスを追加
add_filter(
    'body_class',
    function ( $classes ) {
        return array_merge( $classes, array( 'ltg3-s-evergreen' ) );
    }
);

// Google Fontを追加.
add_action(
    'wp_enqueue_scripts',
    function () {
        // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
        wp_enqueue_style( 'ltg3-s-evergreen-googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap', array(), null );
    },
    12
);