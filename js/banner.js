$(document).ready(function() {
    function rotateBanner($element, source) {
        $.get(source, function(data) {
            console.log(data);
            var current_image = 1;
            window.setInterval(function() {
                $element
                    .attr('href', data[current_image]['link'])
                    .find('img').attr({
                        'src': data[current_image]['image'],
                        'alt': data[current_image]['alt']
                    });
                current_image = (current_image + 1) % data.length;
            }, 7000);
        }, 'json');
    }

    rotateBanner($("#homepage-link"), "json/banner_images.js");
});
