jQuery('document').ready( function(){
    var $developers_list = $( '#developers_list' );

    $developers_list.on( 'change', function() {

        if( $developers_list.val() !== 'default' && document.getElementById( $developers_list.val() ) === null )
        {
            $( '#selected_developers' ).append( '<div id="' + $developers_list.val() + '"><div class="btn remove-option-button">&times;</div>' + $developers_list.val() + '<br></div>' );
            $( '#developers' ).val( getDevsOnProject() );
        }
        $developers_list.val( 'default' );

    } );

    $( '#selected_developers' ).on( 'click', '.remove-option-button', function() {
        $( this ).parent().remove();
    } );

    function getDevsOnProject()
    {
        var devs_on_project = [];
        var devs_as_string = '';

        $.each( $( '#selected_developers' ).children(), function( index, value ) {
            if( $( value ).attr( 'id' ) )
            {
                devs_on_project.push( $( value ).attr( 'id' ) );
            }
        } );
        devs_as_string = devs_on_project.join( ',' );

        return devs_as_string;
    }
});
