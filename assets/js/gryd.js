( function( $ ) {

    function boardwalk_colors() {

        $( '.without-featured-image' ).each( function() {
            // If the previous post had no image, add the narrow class
            if ( $( this ).prev().hasClass( 'without-featured-image' )  ) {
                $( this ).addClass( 'NARROW' );
            }

            // If there was no image two posts ago, add the wide class
            if ( $( this ).prev().prev().hasClass( 'without-featured-image' ) ) {
                $( this ).addClass( 'WIDE' );
            }

        } );
    }

    $( window ).load( boardwalk_colors );

    $( document ).on( 'post-load', boardwalk_colors );

} )( jQuery );