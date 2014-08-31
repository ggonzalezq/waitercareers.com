$( function(){
    
    $( '#jobs-by-state ul' ).addClass( 'none' );
    $( '#states' ).removeClass( 'none' );
    $( '#states' ).chosen( {
        width : '100%'
    } );
    
    $( '#states' ).chosen().change( function(){
        var $this = $( this );
        window.location = $this.val();
    } );
    
} );
