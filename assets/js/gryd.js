(function ($) {

    function boardwalk_colors() {

        var has_thumbs = [];

        $('.hentry').each(function () {

            // Grab the lenght of the array to start
            var has_thumbs_length = has_thumbs.length;

            // Limit the array to two values
            if (has_thumbs_length > 2) {
                has_thumbs.shift()
            }

            // As long as there are at least two posts, check our array
            if (has_thumbs_length >= 2) {
                // If the current and previous post had no image, add the narrow class
                if ($(this).hasClass('without-featured-image') && has_thumbs[1] === true) {
                    $(this).addClass('NARROW')
                }
                // If current post and the second to last post had no image, add the wide class
                if ($(this).hasClass('without-featured-image') && has_thumbs[0] === true) {
                    $(this).addClass('WIDE')
                }
            }

            // Add the current post's featured image status to the array
            has_thumbs.push($(this).hasClass('without-featured-image'))
        });
    }

    $(window).load(boardwalk_colors);

    $(document).on('post-load', boardwalk_colors);

})(jQuery);