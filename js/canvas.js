(function($) {

  $(document).ready(function() {
    var $canvas = $('.page-header .cavas');
    if($canvas.length) {
      new Constellation($canvas);
    }
  });

  function Constellation(container, color) {

    // Dots and lines
    var container     = $(container),
        canvas        = $('<canvas></canvas>').prependTo(container)[0],
        ctx           = canvas.getContext('2d'),
        color         = color || 'rgba(255,255,255,0.2)',
        idle          = null,
        mousePosition = {};

    ctx.scale(1,1);

    canvas.width          = container.outerWidth();
    canvas.height         = container.outerHeight();
    canvas.style.width    = canvas.width+"px";
    canvas.style.height   = canvas.height+"px";
    canvas.style.display  = 'block';
    canvas._offset        = $(canvas).offset();

    $(window).resize(function() {
      canvas._offset = $(canvas).offset();
    });

    ctx.fillStyle = color;
    //ctx.lineWidth = .5;
    ctx.lineWidth = 1;
    ctx.strokeStyle = color;

    // var dotNum = Math.max((canvas.width*canvas.height/1500),600);
    dotNum = parseInt(canvas.width*canvas.height/10000);
    // dotNum = 50;
    //dots = { nb: 600, distance: 80, d_radius: 3000, array: [] };
    dots = { nb: dotNum, distance: 150, d_radius: 100, array: [] };

    function Dot() {
      this.x = Math.random() * canvas.width;
      this.y = Math.random() * canvas.height;

      this.vx = -.5 + Math.random();
      this.vy = -.5 + Math.random();

      this.radius = Math.random();
    }

    Dot.prototype = {
      create: function(){
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
        ctx.fill();
      },
      animate: function(){
        for(var i = 0, dot = false; i < dots.nb; i++) {
          dot = dots.array[i];
          if(dot.y < 0 || dot.y > canvas.height){
            dot.vx = dot.vx;
            dot.vy = - dot.vy;
          } else if(dot.x < 0 || dot.x > canvas.width){
            dot.vx = - dot.vx;
            dot.vy = dot.vy;
          }
          dot.x += dot.vx;
          dot.y += dot.vy;
        }
      },
      line: function(){
        for(var i = 0; i < dots.nb; i++){
          for(var j = 0; j < dots.nb; j++){
            i_dot = dots.array[i];
            j_dot = dots.array[j];
            if(
              (i_dot.x - j_dot.x) < dots.distance &&
              (i_dot.y - j_dot.y) < dots.distance &&
              (i_dot.x - j_dot.x) > - dots.distance &&
              (i_dot.y - j_dot.y) > - dots.distance
            ) {
              if(
                mousePosition.x && mousePosition.y &&
                (i_dot.x - mousePosition.x) < dots.d_radius &&
                (i_dot.y - mousePosition.y) < dots.d_radius &&
                (i_dot.x - mousePosition.x) > - dots.d_radius &&
                (i_dot.y - mousePosition.y) > - dots.d_radius
              ) {
                ctx.beginPath();
                ctx.setLineDash([1,1]);
                ctx.moveTo(i_dot.x, i_dot.y);
                ctx.lineTo(j_dot.x, j_dot.y);
                ctx.stroke();
                ctx.closePath();
              } else {
                ctx.beginPath();
                ctx.setLineDash([1,5]);
                ctx.moveTo(i_dot.x, i_dot.y);
                ctx.lineTo(j_dot.x, j_dot.y);
                ctx.stroke();
                ctx.closePath();
              }
            }
          }
        }
      }
    };

    function createDots() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      for(var i = 0; i < dots.nb; i++){
        dots.array.push(new Dot());
        dot = dots.array[i];
        // dot.create();
      }
      dot.line();
      dot.animate();
    }

    $(window).on('mousemove mouseleave', function(e) {
      if (e.type == 'mousemove') {
        mousePosition.x = e.pageX - canvas._offset.left;
        mousePosition.y = e.pageY - canvas._offset.top;
      }
      if (e.type == 'mouseleave') {
        mousePosition.x = false;
        mousePosition.y = false;
      }
    });

    idle = setInterval(createDots, 1000/30);

  }

})(jQuery);
