( function () {

	var $nav = jQuery( '#nav' );
	var $burger = jQuery( '#burger' );
	var $close = $nav.find( '.close' );
	var $bg = $nav.find( '.bg' );
	var $body = jQuery( 'body' );

	function Toggle() {
		if ( $nav.hasClass( 'active' ) ) {
			$body.css( 'overflow', 'auto' );
			$nav.removeClass( 'active' );
		} else {
			$body.css( 'overflow', 'hidden' );
			$nav.addClass( 'active' );
		}
	}

	$burger.on( 'click', Toggle );
	$close.on( 'click', Toggle );
	$bg.on( 'click', Toggle );

} )();