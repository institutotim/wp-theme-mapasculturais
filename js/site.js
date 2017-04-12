(function($) {

  $(document).ready(function() {
    $('.scroll-down').on('click', function(e) {
      e.preventDefault();
      $('html,body').animate({
        scrollTop: $(window).height()
      }, 500);
    });
  });

  /*
   * Full height element
   */
  $(document).ready(function() {
    var doHeight = function($el) {
      $el.height($(window).height() - $el.offset().top);
    };
    $('.full-height').each(function() {
      var $el = $(this);
      doHeight($el);
      $(window).resize(function() {
        doHeight($el)
      });
    })
  });
  /*
   * Connect border
   */
  $(document).ready(function() {
    var connect = function($el, direction) {
      var css = {};
      if(direction.indexOf('right') !== -1) {
        var width = $(window).width() - $el.offset().left;
        css['width'] = width;
        css['padding-right'] = width - $el.originalWidth;
      } else if(direction.indexOf('left') !== -1) {
        var currentOffset = $el.offset().left;
        var margin = parseFloat($el.css('margin-left').split('px')[0]);
        var padding = parseFloat($el.css('padding-left').split('px')[0]);
        css['padding-left'] = currentOffset + padding;
        css['margin-left'] = -currentOffset + margin;
      }
      $el.css(css);
    }
    $('.connect-border').each(function() {
      var $el = $(this);
      $el.originalWidth = $el.width();
      connect($el, $el.attr('class'));
      $(window).resize(function() {
        connect($el, $el.attr('class'));
      });
    })
  });
  /*
   * Do count
   */
  $(document).ready(function() {
    var doCount = function($el, idle) {
      var target = $el.data('target');
      var current = parseInt($el.text());
      var steps = 30;
      var skip = target/steps;
      if(target > current) {
        var text = current + skip;
        if(text > target) {
          text = target;
        } else {
          if(text.toString().length !== target.toString().length) {
            for(var i = 1; i < target.toString().length; i++) {
              text = '0' + text;
            }
          }
        }
        $el.text(text);
      } else {
        clearInterval(idle);
      }
    };
    $('.do-count').each(function() {
      var idle;
      var $el = $(this);
      $el.data('target', parseInt($el.text()));
      $el.text('0');
      idle = setInterval(function() {
        doCount($el, idle);
      }, 1000/25);
    })
  });

})(jQuery);
