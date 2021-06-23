<?php

add_filter(
    'body_class',
    function ( $classes ) {
        return array_merge( $classes, array( 'ltg3-s-evergreen' ) );
    }
);
