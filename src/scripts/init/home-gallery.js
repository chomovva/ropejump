( function () {

	jQuery( document ).ready( function () {

		function IsNumeric( number ){
			return ! isNaN( number );
		}

		const settings = jQuery.extend( {
			rowHeight: 175,
			margins: 14,
			lastRow: 'center',
			border: 0,
		}, typeof( HomeGallerySettings ) == 'undefined' ? {} : HomeGallerySettings );

		for ( var key in settings ) {
			if ( IsNumeric( settings[ key ] ) ) {
				settings[ key ] = parseInt( settings[ key ] );
			}
		}

		jQuery( "#gallery-wrap" ).justifiedGallery( settings );

	} );

} )();