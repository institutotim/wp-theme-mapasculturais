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

})(jQuery);
