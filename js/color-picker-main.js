(function($) {
    $(function() {
        var options = {
            defaultColor: false,
            change: function(event, ui){},
            clear: function() {},
            hide: true,
            palettes: true
        };
        $('#twitter-color-picker').wpColorPicker(options);
        $('#facebook-color-picker').wpColorPicker(options);
        $('#instagram-color-picker').wpColorPicker(options);
        $('#youtube-color-picker').wpColorPicker(options);
        $('#pinterest-color-picker').wpColorPicker(options);
    });
})(jQuery);