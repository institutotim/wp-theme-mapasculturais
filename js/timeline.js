(function($) {

  $(document).ready(function() {
    var $timeline = $('.timeline');
    if($timeline.length) {
      scrollLocate($timeline);
      var first = $timeline.find('.timeline-item:eq(0)');
      var init = function() {
        $timeline.find('.timeline-init').hide();
        $timeline.find('.timeline-item').each(function() {
          scrollLocate($(this));
        });
      };
      if(first.length) {
        var offset = first.offset().top;
        var windowHeight = $(window).height();
        $(window).on('resize', function(ev) {
          offset = $timeline.find('.timeline-item:eq(0)').offset().top;
          windowHeight = $(window).height();
        });
        $(window).on('scroll', function(ev) {
          var scrollTop = $(window).scrollTop();
          if(scrollTop + (windowHeight/2) >= offset) {
            init();
          }
        });
        $timeline.on('click', '.timeline-init', function(e) {
          e.preventDefault();
          $('html,body').animate({
            scrollTop: $timeline.find('.timeline-item:eq(0)').offset().top - 300
          }, 500, function() {
            init();
          });
        });
      }
    }
  });

})(jQuery);
