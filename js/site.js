/**
 * Number.prototype.format(n, x)
 *
 * @param integer n: length of decimal
 * @param integer x: length of sections
 */
Number.prototype.format = function(n, x) {
  var re = "\\d(?=(\\d{" + (x || 3) + "})+" + (n > 0 ? "\\," : "$") + ")";
  return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, "g"), "$&.");
};

(function($) {
  $(document).ready(function() {
    $(".scroll-down").on("click", function(e) {
      e.preventDefault();
      $("html,body").animate(
        {
          scrollTop: $(window).height()
        },
        500
      );
    });
  });

  /*
   * Full height element
   */
  $(document).ready(function() {
    var doHeight = function($el) {
      $el.height($(window).height() - $el.offset().top);
    };
    $(".full-height").each(function() {
      var $el = $(this);
      doHeight($el);
      $(window).resize(function() {
        doHeight($el);
      });
    });
  });

  /*
   * Parent height element
   */
  $(document).ready(function() {
    var doHeight = function($el, parent) {
      $el.height($el.parents(parent).height());
    };
    $(".parent-height").each(function() {
      var $el = $(this);
      var parent = $el.data("parent");
      doHeight($el, parent);
      $(window).resize(function() {
        doHeight($el, parent);
      });
    });
  });

  /*
   * Connect border
   */
  $(document).ready(function() {
    var connect = function($el, direction) {
      var css = {};
      if (direction.indexOf("right") !== -1) {
        var width = $(window).width() - $el.offset().left;
        var padding = parseFloat($el.css("padding-left").split("px")[0]);
        css["width"] = width;
        if (direction.indexOf("no-padding") == -1) {
          css["padding-right"] = width - $el.originalWidth - padding;
        }
      } else if (direction.indexOf("left") !== -1) {
        var currentOffset = $el.offset().left;
        var margin = parseFloat($el.css("margin-left").split("px")[0]);
        var padding = parseFloat($el.css("padding-left").split("px")[0]);
        if (direction.indexOf("no-padding") == -1) {
          css["padding-left"] = currentOffset + padding;
        }
        css["margin-left"] = -currentOffset + margin;
      }
      $el.css(css);
    };
    $(".connect-border").each(function() {
      var $el = $(this);
      $el.originalWidth = $el.width();
      connect($el, $el.attr("class"));
      $(window).resize(function() {
        connect($el, $el.attr("class"));
      });
    });
  });
  /*
   * Do count
   */
  $(document).ready(function() {
    var doCount = function($el, idle) {
      var target = $el.data("target");
      var current = parseInt($el.data("current") || 0);
      var steps = 30;
      var skip = parseInt(target / steps) || 1;
      if (target > current) {
        var text = current + skip;
        $el.data("current", text);
        if (text >= target) {
          text = parseInt(target).format();
        } else {
          if (text.toString().length !== target.toString().length) {
            var amount = target.toString().length - text.toString().length;
            for (var i = 0; i < amount; i++) {
              text = "0" + text;
            }
          }
        }
        $el.text(text);
      } else {
        clearInterval(idle);
      }
    };
    $(".do-count").each(function() {
      var idle;
      var $el = $(this);
      $el.data("target", parseInt($el.text()));
      $el.text("0");
      idle = setInterval(function() {
        doCount($el, idle);
      }, 1000 / 25);
    });
  });

  // drag and drop add pauta
  document.addEventListener("DOMContentLoaded", function(event) {
    var node = $(".sort-container");
    if (node.length) {
      node.sortable({
        placeholder: "ui-state-highlight",
        handle: ".dragdrop-handle",
        opacity: 0.5,
        cursor: "move",
        update: function(event, ui) {
          $(".sort-order-value").each(function(index, element) {
            if (0 == index) {
              $(element)
                .parent()
                .find(".delete-handle")
                .hide();
            } else {
              $(element)
                .parent()
                .find(".delete-handle")
                .show();
            }
            $(element).val(element.value);
          });
        }
      });
      $(".sort-container").disableSelection();
    }
  });

  /*
   * Expandable
   */
  $(document).ready(function() {
    $(".expandable").each(function() {
      var node = $(this);
      var button = node.find(".expand");
      var text = button.text();
      var expanded = false;
      node.find(".more").hide();
      node.find(".expand").on("click", function() {
        if (expanded) {
          button.text(text);
          node.find(".more").hide();
        } else {
          button.text(button.data("expanded"));
          node.find(".more").show();
        }
        expanded = !expanded;
      });
    });
  });
})(jQuery);
