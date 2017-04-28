(function($) {

  $(document).ready(function() {
    var $timeline = $('.timeline');
    if($timeline.length) {
      scrollLocate($timeline);
      var init = function() {
        $timeline.find('.timeline-init').hide();
        $timeline.find('.timeline-item').each(function() {
          scrollLocate($(this));
        });
      };
      $timeline.on('click', '.timeline-init', function(e) {
        e.preventDefault();
        $('html,body').animate({
          scrollTop: $timeline.find('.timeline-item:eq(0)').offset().top - 300
        }, 500, function() {
          init();
        });
      });
    }
  });

})(jQuery);
