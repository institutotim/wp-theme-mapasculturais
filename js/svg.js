(function($) {

  $(document).ready(function() {

    var animatePath = function(path, fps, cb) {
      fps = fps || 100;
      var current = 0,
      handle = 0,
      length = path[0].getTotalLength();
      // path.css({
      //   strokeDasharray: length + ' ' + length,
      //   strokeDashoffset: length
      // });
      var draw = function() {
        var progress = current/fps;
        if(progress > 1) {
          window.cancelAnimationFrame(handle);
          if(typeof cb == 'function')
          cb();
        } else {
          current++;
          var val = Math.floor(length * (1 - progress));
          path.css({
            strokeDasharray: val + ' ' + length,
            // strokeDashoffset: -val
          });
          handle = window.requestAnimationFrame(draw);
        }
      };
      draw();
    }
    var animateSvgPaths = function(svg, fps) {
      var paths = svg.find('path');
      paths.each(function() {
        animatePath($(this), fps);
      });
    };
    var scrollLocate = function(block, cb) {
      var halfWindow = $(window).height() / 2;
      var checkScroll = function() {
        if(block.is(':visible')) {
          var relTop = block.offset().top - $(window).scrollTop();
          var relBottom = relTop + block.innerHeight();
          if(relTop <= (halfWindow - (block.height()/2) + 100) && relBottom >= halfWindow) {
            block.addClass('onscreen');
            setTimeout(function() {
              block.addClass('appeared');
            }, 500);
            cb();
          } else {
            block.removeClass('onscreen');
          }
        }
      };
      $(window).scroll(checkScroll);
      checkScroll();
    };

    (function() {

      var svg = $('#mc_svg');

      svg.parent().height(svg.height());

      $(window).resize(function() {
        svg.parent().height(svg.height());
      });

      svg.find('#g5467 circle').attr({'r': 0});

      var items = [
        '#g5512',
        '#g5476',
        '#g5504',
        '#g5492'
      ];
      items.forEach(function(item, i) {
        var sItem = Snap(item);
        sItem.node._origTransform = sItem.attr('transform');
        sItem.attr('transform', sItem.node._origTransform + 'S0');
      });

      var texts = $('#mc_svg text');
      texts.each(function() {
        var text = Snap($(this)[0]).attr('fill-opacity', 0);
      });

      scrollLocate($('.main-text'), _.once(function() {

        (function() {
          var path = '#mc_svg #connect-line-mask';
          var length = Snap(path).getTotalLength();
          Snap(path).attr({ strokeDasharray: length + ' ' + length})
          Snap.animate(length*2, length, function(val) {
            Snap(path).attr({
              strokeDashoffset: val
            });
          }, 2000, mina.ease);
        })();

        setTimeout(function() {
          Snap('#mc_svg #g5467 circle').animate({
            'r': 26.74
          }, 1000, mina.bounce);
        }, 400);

        var initAnim = 1000;
        items.forEach(function(item, i) {
          var sItem = Snap(item);
          setTimeout(function() {
            sItem.animate({transform: sItem.node._origTransform+'S1'}, 400, mina.bounce);
          }, initAnim + (i * 280));
        });

        texts.each(function() {
          var text = Snap($(this)[0]);
          setTimeout(function() {
            text.animate({'fill-opacity': 1}, 400, mina.linear);
          }, 2200);
        });

      }));

    })();

  });

})(jQuery);
