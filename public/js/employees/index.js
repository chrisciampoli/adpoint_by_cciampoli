$(function(){
   
    // Handler for navigating to the next page
    function navnext( next ) {
        $( ":mobile-pagecontainer" ).pagecontainer( "change", next, {
            transition: "slide"
        });
    }
    // Handler for navigating to the previous page
    function navprev( prev ) {
        $( ":mobile-pagecontainer" ).pagecontainer( "change", prev, {
            transition: "slide",
            reverse: true
        });
    }
   
    // Navigate to the next page on swipeleft
    $( document ).on( "swipeleft", ".ui-page", function( event ) {
        // Get the filename of the next page. We stored that in the data-next
        // attribute in the original markup.
        var next = $( this ).jqmData( "next" );
        // Check if there is a next page and
        // swipes may also happen when the user highlights text, so ignore those.
        // We're only interested in swipes on the page.
        if ( next ) {
            console.log('asdfads');
            navnext( next );
        }
    });
    
    // The same for the navigating to the previous page
    $( document ).on( "swiperight", ".ui-page", function( event ) {
        var prev = $( this ).jqmData( "prev" );
        if ( prev && ( event.target === $( this )[ 0 ] ) ) {
            navprev( prev );
        }
    });
    
    
});