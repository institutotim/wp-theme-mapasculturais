(function($) {

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
      if(direction.indexOf('connect-right') !== -1) {
        var width = $(window).width() - $el.offset().left;
        css['width'] = width;
        css['padding-right'] = width - $el.originalWidth;
      } else if(direction.indexOf('connect-left') !== -1) {
        var currentOffset = $el.offset().left;
        if(currentOffset > 0) {
          css['padding-left'] = $el.originalOffset.left + currentOffset;
          css['margin-left'] = -$el.originalOffset.left - currentOffset;
        }
      }
      $el.css(css);
    }
    $('.connect-border').each(function() {
      var $el = $(this);
      $el.originalOffset = $el.offset();
      $el.originalWidth = $el.width();
      connect($el, $el.attr('class'));
      $(window).resize(function() {
        connect($el, $el.attr('class'));
      })
    })
  });
  /*
   * Do count
   */
  $(document).ready(function() {
    var doCount = function($el, idle) {
      var target = parseInt($el.data('number'));
      var current = parseInt($el.text());
      console.log(target.toString().length);
      if(target > current) {
        var text = current + 1;
        if(current.toString().length !== target.toString().length) {
          for(var i = 1; i < target.toString().length; i++) {
            text = '0' + text;
          }
        }
        $el.text(text);
      } else {
        clearInterval(idle);
      }
    };
    $('.do-count').each(function() {
      var idle;
      $el = $(this);
      idle = setInterval(function() {
        doCount($el, idle);
      }, 1000/25);
    })
  });

})(jQuery);
