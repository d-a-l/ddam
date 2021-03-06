(function($) {
  Drupal.behaviors.selectize = {
    attach: function(context, settings) {
      if (typeof settings.selectize.settings != 'undefined') {
        $.each(settings.selectize.settings, function(index, value) {
          $('#' + index).selectize(JSON.parse(value));
        });
      }
    }
  }
})(jQuery);