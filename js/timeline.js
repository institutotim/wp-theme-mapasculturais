(function($) {

  $(document).ready(function() {
    var $timeline = $('.timeline');
    scrollLocate($timeline);
    if($timeline.length) {
      $timeline.find('.timeline-item').each(function() {
        var $item = $(this);
        scrollLocate($item);
      })
    }
  });

})(jQuery);
