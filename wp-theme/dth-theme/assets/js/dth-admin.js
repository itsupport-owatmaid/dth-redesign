(function ($) {
  'use strict';

  $(document).on('click', '.dth-media-pick', function (e) {
    e.preventDefault();

    var button = $(this);
    var input = $('#' + button.data('target'));
    var multiple = !!button.data('multiple');

    var frame = wp.media({
      title: button.text(),
      button: { text: button.text() },
      multiple: multiple
    });

    frame.on('select', function () {
      var urls = frame.state().get('selection').map(function (item) {
        return item.toJSON().url;
      });
      input.val(multiple ? urls.join(', ') : urls[0]).trigger('change');
    });

    frame.open();
  });
}(jQuery));
