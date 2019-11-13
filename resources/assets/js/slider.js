$( document ).ready(function( $ ) {
    $( '#example2' ).sliderPro({
        width: 300,
        height: 300,
        visibleSize: '100%',
        forceSize: 'fullWidth',
        autoSlideSize: true
    });

    // instantiate fancybox when a link is clicked
    $( ".slider-pro" ).each(function(){
        var slider = $( this );

        slider.find( ".sp-image" ).parent( "a" ).on( "click", function( event ) {
            event.preventDefault();
        
            if ( slider.hasClass( "sp-swiping" ) === false ) {
                var sliderInstance = slider.data( "sliderPro" ),
                    isAutoplay = sliderInstance.settings.autoplay;

                $.fancybox.open( slider.find( ".sp-image" ).parent( "a" ), {
                    index: $( this ).parents( ".sp-slide" ).index(),
                    afterShow: function() {
                        if ( isAutoplay === true ) {
                            sliderInstance.settings.autoplay = false;
                            sliderInstance.stopAutoplay();
                        }
                    },
                    afterClose: function() {
                        if ( isAutoplay === true ) {
                            sliderInstance.settings.autoplay = true;
                            sliderInstance.startAutoplay();
                        }
                    }
                        
                });
            }
        });
    });
});