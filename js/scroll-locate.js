(function($) {
  var halfWindow;
  $(document).ready(function() {
    $(window).resize(function() {
      halfWindow = $(window).height() / 2;
    });
    $(window).resize();
  });
  scrollLocate = function(block, cb) {
    var checkScroll = function() {
      if(block.is(':visible')) {
        var relTop = block.offset().top - $(window).scrollTop();
        var relBottom = relTop + block.innerHeight();
        if(relTop <= (halfWindow + (halfWindow/3)) && relBottom >= halfWindow) {
          block.addClass('onscreen appeared');
          if(typeof cb == 'function')
            cb();
        } else {
          block.removeClass('onscreen');
        }
      }
    };
    $(window).scroll(checkScroll);
    checkScroll();
  };
})(jQuery);
