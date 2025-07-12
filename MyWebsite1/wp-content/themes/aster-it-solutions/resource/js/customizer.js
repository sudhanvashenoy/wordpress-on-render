/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {
    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    clip: 'rect(1px, 1px, 1px, 1px)',
                    position: 'absolute',
                });
            } else {
                $('.site-title, .site-description').css({
                    clip: 'auto',
                    position: 'relative',
                });
                $('.site-title a, .site-description').css({
                    color: to,
                });
            }
        });
    });

    const aster_it_solutions_section_lists = ['banner','service'];
    aster_it_solutions_section_lists.forEach(aster_it_solutions_homepage_scroll_preview);

    function aster_it_solutions_homepage_scroll_preview(item, index) {
        // Collect information from customize-controls.js about which panels are opening.
        wp.customize.bind('preview-ready', function() {

            // Initially hide the theme option placeholders on load.
            $('.panel-placeholder').hide();
            item = item.replace(/-/g, '_');
            wp.customize.preview.bind(item, function(data) {
                // Only on the front page.
                if (!$('body').hasClass('home')) {
                    return;
                }

                // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
                if (true === data.expanded) {
                    $('html, body').animate({
                        'scrollTop': $('#aster_it_solutions_' + item + '_section').position().top
                    });
                }
            });

        });
    }

}(jQuery));

(function($) {
    wp.customize('aster_it_solutions_website_layout', function(value) {
        value.bind(function(newval) {
            if (newval) {
                $('body').addClass('site-boxed--layout');
            } else {
                $('body').removeClass('site-boxed--layout');
            }
        });
    });
})(jQuery);

(function($) {
    wp.customize('aster_it_solutions_layout_width_margin', function(value) {
        value.bind(function(newval) {
            $('body').css('margin', newval + 'px');
        });
    });
})(jQuery);

( function( $ ) {
    wp.customize( 'aster_it_solutions_sidebar_width', function( value ) {
        value.bind( function( newval ) {
            $( '.right-sidebar .asterthemes-wrapper .asterthemes-page' ).css( 'grid-template-columns', 'auto ' + newval + '%' );
            $( '.left-sidebar .asterthemes-wrapper .asterthemes-page' ).css( 'grid-template-columns', newval + '% auto' );
        } );
    } );
} )( jQuery );

(function($) {
    wp.customize('aster_it_solutions_pagetitle_height', function(value) {
        value.bind(function(newval) {
            $('body').css('padding', newval + 'px');
        });
    });
})(jQuery);

(function($) {
    wp.customize('aster_it_solutions_site_logo_width', function(value) {
        value.bind(function(newval) {
            $('.site-logo img').css('max-width', newval + 'px');
        });
    });
})(jQuery);